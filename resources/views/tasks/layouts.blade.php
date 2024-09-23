<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>CRM</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-4bw+/aepP/YC94hEpVNVgiZdgIC5+VKNBQNGCHeKRQN+PtmoHDEXuppvnDJzQIu9" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css">
    <link href="{{ url('public/css/main.css')}}" rel="stylesheet"  crossorigin="anonymous">

</head>
<body>   

    <div class="container">
    <img style="width:60px; padding:5px;" src="{{url('/public/images/logo.png')}}" alt="CRM"/>
            @yield('content')
    </div> 

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-HwwvtgBNo3bZJJLYd8oVXjrBZt8cqVSpeBNS5n7C8IVInixGAoxmnlMuBnhbgrkm" crossorigin="anonymous"></script>
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<!-- REPAIR CALL FROM RESOURCES -->
<script src="{{ url('public/js/sketchpad.js')}}"></script>
<script type="text/javascript" src="{{ url('public/js/instascan.min.js')}}" ></script>

<div class="modal" id="modalCamera" tabindex="-1" role="dialog">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title">Scanner de productos</h5>
        <button type="button" class="close btn-danger closeModal" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body" >
          <video style="width:100%" id="scannerCamera"></video>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-danger closeModal" data-dismiss="modal">Close</button>
      </div>
    </div>
  </div>
</div>



<script type="text/javascript">
  let scanner = new Instascan.Scanner({ video: document.getElementById('scannerCamera') });
var sketchpad = new Sketchpad({
  element: '#firmaBox',
  width: 500,
  height: 300,
});

$(".borrarFirma").click(function(event){
    event.preventDefault();
    sketchpad.undo();
});

$(".closeModal").click(function(){
  $("#modalCamera").modal('toggle');
  scanner.stop();
});

$(".openModalCamera").click(function(){
    event.preventDefault();
    $("#modalCamera").modal('show');

    
      scanner.addListener('scan', function (content) {

        let newTR = '<tr>';
        newTR += '<th scope="row">1</th>';
        newTR += '<td>'+content+'</td>';
        newTR += '<td>CO2</td>';
        newTR += '</tr>';

        $("#productsTable").append(newTR);

        console.log(content);
        scanner.stop();
        $("#modalCamera").modal('toggle');
      });
      Instascan.Camera.getCameras().then(function (cameras) {
        if (cameras.length > 0) {
          scanner.start(cameras[0]);
        } else {
          console.error('No cameras found.');
        }
      }).catch(function (e) {
        console.error(e);
      });
});



</script>
</body>
</html> 