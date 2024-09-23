<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Gases Especiales de Colombia</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-4bw+/aepP/YC94hEpVNVgiZdgIC5+VKNBQNGCHeKRQN+PtmoHDEXuppvnDJzQIu9" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css">
</head>
<body>   

    <div class="container">
    <img src="{{url('/public/images/logo.png')}}" alt="Gases Especiales de Colombia"/>
            @yield('content')
    </div>
    <form id="formData">
    @csrf
    </form>
    <script src="https://code.jquery.com/jquery-1.12.4.min.js" ></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-HwwvtgBNo3bZJJLYd8oVXjrBZt8cqVSpeBNS5n7C8IVInixGAoxmnlMuBnhbgrkm" crossorigin="anonymous"></script>
<script>
jQuery(".createQR").click(function(){

        let id = jQuery(this).data('id');
        $("#qrItem").remove();
       $('#formData').append('<input type="file" name="image" value="https://gasesespecialesdecolombia.com.co/crm/public/images/logo.png" ><img id="qrItem" src="https://chart.googleapis.com/chart?cht=qr&chl='+id+'&chs=160x160&chld=L|0"  >');
        var form = document.getElementById('formData');
        var formData = new FormData(form);
        $.ajax({
            type:'POST',
            url: 'https://gasesespecialesdecolombia.com.co/crm/posts',
            data: formData,
            contentType: false,
            processData: false,
            success: (response) => {
            // alert('Form submitted successfully');
                //location.reload();
            },
            error: function(response){
                $('#ajax-form').find(".print-error-msg").find("ul").html('');
                $('#ajax-form').find(".print-error-msg").css('display','block');
                $.each( response.responseJSON.errors, function( key, value ) {
                    $('#ajax-form').find(".print-error-msg").find("ul").append('<li>'+value+'</li>');
                });
            }
        });
});
   /* jQuery(".createQR").click(function(){
        let id = jQuery(this).data('id');
        console.log(id);
        $("#qrItem").remove();
        $('#formData').html('<input type="file" value="https://chart.googleapis.com/chart?cht=qr&chl='+id+'&chs=160x160&chld=L|0" ><img id="qrItem" src="https://chart.googleapis.com/chart?cht=qr&chl='+id+'&chs=160x160&chld=L|0"  >');
        let url = 'https://gasesespecialesdecolombia.com.co/crm/inventory';
        var form = document.getElementById('formData');
        var formData = new FormData(form);
        var xhr = new XMLHttpRequest();
        // Add any event handlers here...
        xhr.onreadystatechange = function() {
            if (xhr.readyState == XMLHttpRequest.DONE) {
                var data = JSON.parse(xhr.response);
            }
        }
        xhr.open('POST', url, true);
        var tres = xhr.send(formData);
    });*/

</script>

</body>
</html> 