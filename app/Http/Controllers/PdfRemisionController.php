<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
require_once('resources/fpdf186/fpdf.php');
require_once("resources/phpqrcode/qrlib.php");

class PdfRemisionController extends Controller
{
    

    public function index() {

        //create a QR Code and save it as a png image file named test.png
        \QRcode::png("coded number here","./public/images/qr.png");

        $get =   $_GET;
        //$item_id = $get['item_id'];
        $pdf = new \FPDF('P','mm');
        $pdf->AddPage("P", 'A4');
        $pdf->SetFont('Arial', 'B', 12);
        //$pdf->Text(70, 15, 'CONTROL DE CILINDROS');
        $pdf->SetXY(5, 5);
        $pdf->MultiCell(200, 5, 'CONTROL DE CILINDROS', 0, 'C' , 0);
        $pdf->Image('https://gasesespecialesdecolombia.com.co/crm/public/images/logo.png', 5, 5, 80,28);
        $pdf->SetFont('Arial', '', 10);
        $pdf->Text(130, 20, utf8_decode('Dirección: Calle 73 Bis # 68C - 47'));
        $pdf->Text(130, 25, utf8_decode('Teléfono: (571) 7179283 - Celular: 311 849 3411'));
        $pdf->Text(130, 30, 'www.gasesespecialesdecolombia.com.co');

        $pdf->SetXY(5, 35);
        $pdf->SetFont('Arial', 'B', 11);
        $pdf->MultiCell(160, 6, 'Nombre del cliente:', 1, 'L' , 0);
        $pdf->SetFont('Arial', '', 11);
        $pdf->SetXY(45, 35);
        $pdf->MultiCell(60, 6, 'Gases especiales de colombia', 0, 'L' , 0);


        $pdf->SetFont('Arial', 'B', 11);
        $pdf->SetXY(100, 35);
        $pdf->MultiCell(50, 6, utf8_decode('Código:'), 0, 'L' , 0);
        $pdf->SetFont('Arial', '', 11);
        $pdf->SetXY(125, 35);
        $pdf->MultiCell(50, 6, '090100', 0, 'L' , 0);

        $pdf->SetFont('Arial', 'B', 11);
        $pdf->SetXY(5, 41);
        $pdf->MultiCell(160, 6, utf8_decode('Dirección:'), 1, 'L' , 0);
        $pdf->SetFont('Arial', '', 11);
        $pdf->SetXY(30, 41);
        $pdf->MultiCell(50, 6, 'Calle 73 Bis # 68C - 47', 0, 'L' , 0);

        $pdf->SetFont('Arial', 'B', 11);
        $pdf->SetXY(100, 41);
        $pdf->MultiCell(60, 6, utf8_decode('Teléfonos:'), 0, 'L' , 0);
        $pdf->SetFont('Arial', '', 11);
        $pdf->SetXY(125, 41);
        $pdf->MultiCell(50, 6, '3192085794', 0, 'L' , 0);


        $pdf->SetFont('Arial', 'B', 11);
        $pdf->SetXY(5, 47);
        $pdf->MultiCell(160, 6, utf8_decode('Fecha:'), 1, 'L' , 0);
        $pdf->SetFont('Arial', '', 11);
        $pdf->SetXY(30, 47);
        $pdf->MultiCell(50, 6, '10/10/2024', 0, 'L' , 0);



        $pdf->SetFont('Arial', 'B', 11);
        $pdf->SetXY(165, 35);
        $pdf->MultiCell(40, 6, utf8_decode('Remision:'), 1, 'C' , 0);
        $pdf->SetFont('Arial', 'B', 14);
        $pdf->SetXY(165, 41);
        $pdf->SetTextColor(214, 53, 19);
        $pdf->MultiCell(40, 12, '9000', 1, 'C' , 0);
        $pdf->SetTextColor(0,0,0);
        

        // Tabla cilindros recibidos
        $pdf->SetXY(5, 66);

        $pdf->MultiCell(100, 125, '', 1, 'L' , 0);

        $pdf->SetFillColor(192);
        $pdf->SetFont('Arial', 'B', 11);
        $pdf->SetXY(25, 60);
        $pdf->MultiCell(60, 6, utf8_decode('CILINDROS RECIBIDOS:'), 1, 'C' , 0);
        $pdf->SetXY(5, 66);
        $pdf->MultiCell(80, 6, utf8_decode('PRODUCTO'), 1, 'C' , 0);
        $pdf->SetXY(85, 66);
        $pdf->MultiCell(20, 6, utf8_decode('CANT.'), 1, 'C' , 0);

        //$pdf->RoundedRect(60, 30, 68, 46, 5, '13', 'DF');


        // Tabla cilindros Entregados
        $pdf->SetXY(105, 66);

        $pdf->MultiCell(100, 125, '', 1, 'L' , 0);

        $pdf->SetFont('Arial', 'B', 11);
        $pdf->SetXY(130, 60);
        $pdf->MultiCell(60, 6, utf8_decode('CILINDROS RECIBIDOS:'), 1, 'C' , 0);
        $pdf->SetXY(105, 66);
        $pdf->MultiCell(80, 6, utf8_decode('PRODUCTO'), 1, 'C' , 0);
        $pdf->SetXY(185, 66);
        $pdf->MultiCell(20, 6, utf8_decode('CANT.'), 1, 'C' , 0);
        
        $pdf->SetFont('Arial', '', 9);
        $pdf->SetXY(5, 200);
        


        $pdf->Image('https://gasesespecialesdecolombia.com.co/crm/public/images/legal-gesc.png', 5, 200, 200,45);
        $pdf->Image('https://gasesespecialesdecolombia.com.co/crm/public/images/box-firma.png', 5, 255, 90,30);
        $pdf->Image('https://gasesespecialesdecolombia.com.co/crm/public/images/box-firma.png', 115, 255, 90,30);
        $pdf->Line(10, 278, 89, 278);
        $pdf->Line(120, 278, 200, 278);

        //$pdf->Image('https://gasesespecialesdecolombia.com.co/crm/public/images/qr.png', 32, -1, 30);
        $pdf->SetFont('Arial', 'B', 10);
        
        $pdf->Text(9, 283, 'Firma GASES ESPECIALES DE COLOMBIA S.A.S');
        $pdf->Text(135, 283, utf8_decode('Firma ACEPTACIÓN CLIENTE'));

        $pdf->Text(45, 292, utf8_decode('Conserve este recibo como constancia de entrega y recepción de cilindros'));
        $pdf->Output();

        exit;
    }
    

}
