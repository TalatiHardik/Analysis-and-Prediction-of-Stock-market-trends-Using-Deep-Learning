<!DOCTYPE html>
<html>
<head>
	<title>Register</title>

	<!-- Bootstrap 4 -->
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">

	<style type="text/css">
		body {
    background: url('https://images.unsplash.com/photo-1534408679207-69b9615e55a7?ixlib=rb-0.3.5&q=80&fm=jpg&crop=entropy&cs=tinysrgb&w=1080&fit=max&s=cfbabd80cd2d5cae495a2a732d473562') no-repeat center center fixed;
    -webkit-background-size: cover;
    -moz-background-size: cover;
    -o-background-size: cover;
    background-size: cover;
}

.card {
  width: 300px;
}

.nav-item .nav-link[disabled]:hover {
  
}
	</style>
	
</head>
<body>
	<div class="container mt-5 pt-5">
  <div class="card mx-auto border-0">
    <div class="card-header border-bottom-0 bg-transparent">
      <ul class="nav nav-tabs justify-content-center pt-4" id="pills-tab" role="tablist">
        <li class="nav-item">
          <a class="nav-link active text-primary" id="pills-login-tab" data-toggle="pill" href="#pills-login" role="tab" aria-controls="pills-login"
             aria-selected="true">Login</a>
        </li>

        <li class="nav-item">
          <a class="nav-link text-primary" id="pills-register-tab" data-toggle="pill" href="#pills-register" role="tab" aria-controls="pills-register"
             aria-selected="false">Register</a>
        </li>
      </ul>
    </div>

    <div class="card-body pb-4">
      <div class="tab-content" id="pills-tabContent">
        <div class="tab-pane fade show active" id="pills-login" role="tabpanel" aria-labelledby="pills-login-tab">
          <form>
            <div class="form-group">
              <input type="email" name="email" class="form-control" id="email" placeholder="Email" required autofocus>
            </div>

            <div class="form-group">
              <input type="password" name="password" class="form-control" id="password" id="password" placeholder="Password" required>
            </div>

            <div class="custom-control custom-checkbox">
              <input class="custom-control-input" id="customCheck1" checked="" type="checkbox">
              <label class="custom-control-label" for="customCheck1">Check me out</label>
            </div>

            <div class="text-center pt-4">
              <button type="submit" class="btn btn-primary">Login</button>
            </div>

            <div class="text-center pt-2">
              <a class="btn btn-link text-primary" href="#">Forgot Your Password?</a>
            </div>
          </form>
        </div>

        <div class="tab-pane fade" id="pills-register" role="tabpanel" aria-labelledby="pills-register-tab">
          <form>
            <div class="form-group">
              <input type="text" name="username" id="name" class="form-control" placeholder="Username" required autofocus>
            </div>

            <div class="form-group">
              <input type="email" name="email" id="email" class="form-control" placeholder="Email" required>
            </div>

            <div class="form-group">
              <input type="password" name="password" id="password" class="form-control" placeholder="Set a password" required>
            </div>

            <div class="form-group">
              <input type="password" name="password_confirmation" id="password-confirm" class="form-control" placeholder="Confirm password" required>
            </div>

            <div class="text-center pt-2 pb-1">
              <button type="submit" class="btn btn-primary">Register</button>
            </div>
          </form>
        </div>
      </div>
    </div>
  </div>
</div>


<!-- BootStrap 4 -->
<script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
</body>
</html>