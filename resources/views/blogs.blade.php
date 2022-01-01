@extends('layouts.header')
@section('content')
    

<div class="container" style="    padding-top: 2rem;">


  <div class="row">
    <div class="col-md-5">
    <h2 style="text-align: center; margin-bottom:35px"> Blog List</h2>
  </div>
  <div class="col-md-2">
    <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModal">Add Blogs</button>

  </div>

  <div class="col-md-3">
    <span> Hello, {{session('name')}} 

      <a href="{{url('logout')}}" class="btn btn-secondary" >Logout</a></span>
  </div>
</div>
  <div class="row">
    @if(!empty($data['blogs']))
   @foreach ($data['blogs'] as $blog)
       
 
    <div class="col-md-4">
<div class="card" >
  <img class="card-img-top" src="{{asset('/uploads/blogs/'.$blog->image.'/'.$blog->image)}}" alt="Card image cap">
  <div class="card-body">
    <h5 class="card-title" style="text-transform: uppercase">{{$blog->title}}</h5>
    @if(strlen($blog->description > 100))
    <p class="card-text">{{substr($blog->description,0,100)}}...</p>

    @else

    <p class="card-text">{{substr($blog->description,0,100)}}</p>

    @endif
  </div>
  <ul class="list-group list-group-flush">
    <li class="list-group-item"><b>Hastags : {{$blog->tags}}</b></li>
   
  </ul>
  <div class="card-body">
    <a href="{{url('editblog/'.$blog->id)}}" class="card-link btn  btn-warning">Edit</a>
    <a onclick="return confirm('Are you sure to delete blog')?window.location.href='{{url('deleteblog/'.$blog->id)}}':false;" class="card-link btn btn-danger">Delete</a>
  </div>
</div>
</div>
@endforeach
@endif
</div>


</div>








<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <form class="px-4 py-3" action="{{url('create_blog')}}" method="post" enctype="multipart/form-data"    style="    padding: 2rem !important;">
        @csrf
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Add New Blog</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
       
 
          <div class="form-group">
            <label for="exampleDropdownFormEmail1">Blog Title </label>
            <input type="text" class="form-control" required name="title" id="exampleDropdownFormEmail1" placeholder="Enter Blog Title">
          </div>
          <div class="form-group">
            <label for="exampleDropdownFormEmail1">Blog Description</label>
   <textarea  name="description" class="form-control" rows="5" placeholder="Enter Blog Description"></textarea>
          </div>
  
          <div class="form-group">
            <label for="exampleDropdownFormEmail1">Tags</label>
            <input type="text" class="form-control" name="tags" id="exampleDropdownFormEmail1" required  placeholder="Seperate Mulitple Tags with comma ','">
          </div>
  
          <div class="form-group">
            <label for="exampleDropdownFormPassword1">Blog Image</label>
            <input type="file" name="image" class="form-control" id="exampleDropdownFormPassword1" required >
          </div>
        
        


      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        <button type="submit" class="btn btn-primary">Create Blog</button>
      </div>
    </form>
    </div>
  </div>
</div>

















@endsection