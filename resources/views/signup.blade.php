
<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">

    <title>Sign Up</title>
  </head>
  <body>
    
    <div class="container" >
    <div class="row" style="    padding-top: 2rem;">
    <div class="col-md-4"> 
    </div>
    <div class="col-md-4" style="  border-radius: 9px;  background-color: #f4f4f4;"> 
      <form class="px-4 py-3" action="{{url('signup_user')}}" method="post" enctype="multipart/form-data"    style="    padding: 2rem !important;">
        @csrf
        <h3 style="    text-align: center;
        margin-bottom: 10px;"> Sign Up</h3>
        <div class="form-group">
          <label for="exampleDropdownFormEmail1">Full Name</label>
          <input type="text" class="form-control" required name="name" id="exampleDropdownFormEmail1" placeholder="Enter Full Name">
        </div>
        <div class="form-group">
          <label for="exampleDropdownFormEmail1">Email Address</label>
          <input type="email" class="form-control" name="email" id="exampleDropdownFormEmail1" required  placeholder="Enter Email Id">
        </div>

        <div class="form-group">
          <label for="exampleDropdownFormEmail1">Mobile No</label>
          <input type="number" class="form-control" name="mobile" id="exampleDropdownFormEmail1" required  placeholder="Enter Mobile No">
        </div>

        <div class="form-group">
          <label for="exampleDropdownFormPassword1">Password</label>
          <input type="password" name="password" class="form-control" id="exampleDropdownFormPassword1" required placeholder="Password">
        </div>
      
        <button type="submit" class="btn btn-primary">Sign Up</button>
      </form>
      <div class="dropdown-divider"></div>
      <a style="margin-bottom: 15px" class="dropdown-item" href="{{ url('login')}}">Already have an account? Sign In</a>
      
    </div>
      <div class="col-md-4"> 
      </div>
 
    </div></div>

    @if(Session::has('error'))

    <script>

      var eror=@json(session('error'));
      alert(eror);
      </script>

    @endif


    @if(Session::has('success'))

    <script>

      var success=@json(session('success'));
      alert(success);
      </script>

    @endif


    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>
  </body>
</html>