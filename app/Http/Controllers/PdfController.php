<?php

namespace App\Http\Controllers;

//use Codedge\Fpdf\Fpdf\Fpdf;
use Illuminate\Http\Request;
require_once('resources/fpdf186/fpdf.php');
require_once("resources/phpqrcode/qrlib.php");
/*$pdf = new \FPDF();
$pdf->AddPage();
$pdf->SetFont('Arial','B',16);
$pdf->Cell(40,10,'Hello World!');
$pdf->Output();*/

class PdfController extends Controller
{
	//protected $fpdf;
 
    public function __construct()
    {
       //$pdf = new FPDF;
    }

    public function index() {

        //create a QR Code and save it as a png image file named test.png
        \QRcode::png("coded number here","./public/images/qr.png");

        $get =   $_GET;
        $item_id = $get['item_id'];
        $pdf = new \FPDF('P','mm');
        $pdf->AddPage("L", ['60', '30']);
        //$pdf->Image('https://gasesespecialesdecolombia.com.co/crm/public/images/logo.png', 1, 20, 30);
        $pdf->Image('https://gasesespecialesdecolombia.com.co/crm/public/images/qr.png', 32, -1, 30);
    	$pdf->SetFont('Arial', 'B', 7);
        $productName = 'DIOX CARBONO OXIGENO NITROGENO';
        //16 Chars
        $partsName = str_split($productName, 18);
        $pdf->SetXY(2, 2);
        $y=5;
        foreach($partsName as $key => $value){
            $pdf->Text(2, $y, $value);
            $y+=3;
        }
        
        //$pdf->MultiCell(30, 2, '',1, 'L', 0);

        $pdf->SetFont('Arial', 'B', 12);
        $pdf->Text(20, 15, '28,8%');
        $pdf->SetFont('Arial', '', 7);
        $pdf->Text(20, 18, 'BALANCE');
        
    	$pdf->SetFont('Arial', '', 5);
        $pdf->Text(2, 21, 'VENCE:');
        $pdf->Text(10, 21, 'dic-2024');

    	$pdf->SetFont('Arial', '', 5);
        $pdf->Text(2, 25, 'LOTE:');
    	$pdf->SetFont('Arial', 'B', 7);
        $pdf->Text(10, 25, '58806');


        $pdf->SetFont('Arial', '', 7);
        $pdf->Text(13, 29, 'Gases Especiales de Colombia');
        
     

      
         
        $pdf->Output();

        exit;
    }
}