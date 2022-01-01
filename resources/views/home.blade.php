@extends('layouts.header')
@section('content')



<div class="container" style="    padding-top: 2rem;">


    <div class="row">
      <div class="col-md-8">
      <h2 style="text-align: center; margin-bottom:35px"> Read Latest Blogs </h2>
    </div>
    <div class="col-md-4">
        @if(session('userid')==null)
      <a href="{{url('login')}}" class="btn btn-primary" >Login</a>
      @else
   
        <span> Hello, {{session('name')}} 
      <a href="{{url('blogs')}}" class="btn btn-primary" >View Dashboard</a></span>
      <a href="{{url('logout')}}" class="btn btn-secondary" >Logout</a>
        @endif
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
  
  </div>
  </div>
  @endforeach
  @endif
  </div>
  
  
  </div>
  
















@endsection