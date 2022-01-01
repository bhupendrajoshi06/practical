@extends('layouts.header')
@section('content')
    
    <div class="container" >
    <div class="row" style="    padding-top: 2rem;">
    <div class="col-md-1"> 
    </div>
    <div class="col-md-10" style="  border-radius: 9px;  background-color: #f4f4f4;"> 
      <form class="px-4 py-3" action="{{url('update/'.$data['blog']->id)}}" method="post" enctype="multipart/form-data"    style="    padding: 2rem !important;">
        @csrf
        <h3 style="    text-align: center;
        margin-bottom: 10px;"> Update Blog</h3>
        <div class="form-group">
          <label for="exampleDropdownFormEmail1">Title </label>
          <input type="text" class="form-control" required name="title" id="exampleDropdownFormEmail1" value="{{ $data['blog']->title }}" >
        </div>
        <div class="form-group">
          <label for="exampleDropdownFormEmail1">Tags</label>
          <input type="text" class="form-control" name="tags" id="exampleDropdownFormEmail1" required  value="{{ $data['blog']->tags }}" >
        </div>

        <div class="form-group">
          <label for="exampleDropdownFormEmail1">Blog Description</label>
 <textarea  name="description" class="form-control" rows="5"  >{{ $data['blog']->description }}</textarea>
        </div>

        <img style="width:40%" class="card-img-top" src="{{asset('/uploads/blogs/'.$data['blog']->image.'/'.$data['blog']->image)}}" alt="Card image cap">
        <div class="form-group">
          <label for="exampleDropdownFormEmail1">Image</label>
          <input type="file" class="form-control" name="image" id="exampleDropdownFormEmail1"  >
          <input type="hidden" class="form-control" name="himage" id="exampleDropdownFormEmail1" value="{{$data['blog']->image }}" >
        </div>


       
      
        <button type="submit" class="btn btn-primary">Update Blog</button>
             <a href="{{url('blogs')}}" class="btn btn-secondary"> Back</a>
      </form>
    
      
    </div>
      <div class="col-md-1"> 
      </div>
 
    </div></div>


    @endsection