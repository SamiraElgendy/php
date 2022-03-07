<!DOCTYPE html>
<html lang="en">
<head>
  <title>Register</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
</head>
<body>

<div class="container">
    @if ($errors->any())
    <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
   @endif

  <h2>Edit posts</h2>


  <form action="{{url('/Blog/'.$data['id'])}}" method="post" enctype="multipart/form-data">

    @csrf
    @method('put')

    <div class="form-group">
        <label for="exampleInputName"> Description</label>
        <textarea class="form-control" id="exampleInputName" name="description">{{$data->description}}</textarea>
    </div>

    <div class="form-group">
        <label for="exampleInputName">Image</label>
        <input type="file" name="image">
    </div>
    @if(!empty($data->image))
    <img src="{{url('/images/'.$data['image'])}}" alt="" height="50px" width="50px">
    @else
     {{ 'No Image' }}
    @endif

    <br>
    <button type="submit" class="btn btn-primary">Edit</button>
</form>




</div>

</body>
</html>

