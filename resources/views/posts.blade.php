<!DOCTYPE html>
<html>
<head>
    <title>Laravel 10 Ajax Form Validation Example - ItSolutionStuff.com</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js" ></script>
    <meta name="csrf-token" content="{{ csrf_token() }}" />
</head>
<body>
       
<div class="container">
    <div class="card bg-light mt-3">
        <div class="card-header">
            Laravel 10 Ajax Form Validation Example - ItSolutionStuff.com
        </div>
        <div class="card-body">
    
            <table class="table table-bordered mt-3">
                <tr>
                    <th colspan="3">
                        List Of Posts
                        <button type="button" class="btn btn-success float-end" data-bs-toggle="modal" data-bs-target="#postModal">
                          Create Post
                        </button>
                    </th>
                </tr>
                <tr>
                    <th>ID</th>
                    <th>Title</th>
                    <th>Body</th>
                </tr>
                @foreach($posts as $post)
                <tr>
                    <td>{{ $post->id }}</td>
                    <td>{{ $post->title }}</td>
                    <td>{{ $post->body }}</td>
                </tr>
                @endforeach
            </table>
    
        </div>
    </div>
</div>
    
<!-- Modal -->
<div class="modal fade" id="postModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Create Post</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        <form id="ajax-form" action="{{ route('posts.store') }}">
            @csrf
    
            <div class="alert alert-danger print-error-msg" style="display:none">
                <ul></ul>
            </div>
      
            <div class="mb-3">
                <label for="titleID" class="form-label">Title:</label>
                <input type="text" id="titleID" name="title" class="form-control" placeholder="Name">
            </div>
    
            <div class="mb-3">
                <label for="bodyID" class="form-label">Body:</label>
                <textarea name="body" class="form-control" id="bodyID"></textarea>
            </div>
       
            <div class="mb-3 text-center">
                <button class="btn btn-success btn-submit">Submit</button>
            </div>
      
        </form>
      </div>
    </div>
  </div>
</div>
       
</body>
    
<script type="text/javascript">
        
    /*------------------------------------------
    --------------------------------------------
    Form Submit Event
    --------------------------------------------
    --------------------------------------------*/
    $('#ajax-form').submit(function(e) {
        e.preventDefault();
       
        var url = $(this).attr("action");
        let formData = new FormData(this);
  
        $.ajax({
                type:'POST',
                url: 'https://gasesespecialesdecolombia.com.co/crm/posts',
                data: formData,
                contentType: false,
                processData: false,
                success: (response) => {
                    alert('Form submitted successfully');
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
    
</script>
    
</html>