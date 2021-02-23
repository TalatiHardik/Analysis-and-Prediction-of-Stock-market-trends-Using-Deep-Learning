<?php
session_start();

// initializing variables
$username = "";
$email    = "";
$firstName = "";
$lastName = "";
$contact = "";
$address = "";
$errors = array(); 

// connect to the database
$db = mysqli_connect('localhost', 'root', '', 'registration');

// REGISTER USER
if (isset($_POST['reg_user'])) {
  // receive all input values from the form
  $username = mysqli_real_escape_string($db, $_POST['username']);
  $email = mysqli_real_escape_string($db, $_POST['email']);
  $password_1 = mysqli_real_escape_string($db, $_POST['password_1']);
  $password_2 = mysqli_real_escape_string($db, $_POST['password_2']);

  // form validation: ensure that the form is correctly filled ...
  // by adding (array_push()) corresponding error unto $errors array
  if (empty($username)) { array_push($errors, "Username is required"); }
  if (empty($email)) { array_push($errors, "Email is required"); }
  if (empty($password_1)) { array_push($errors, "Password is required"); }
  if ($password_1 != $password_2) {
	array_push($errors, "The two passwords do not match");
  }

  // first check the database to make sure 
  // a user does not already exist with the same username and/or email
  $user_check_query = "SELECT * FROM users WHERE username='$username' OR email='$email' LIMIT 1";
  $result = mysqli_query($db, $user_check_query);
  $user = mysqli_fetch_assoc($result);
  
  if ($user) { // if user exists
    if ($user['username'] === $username) {
      array_push($errors, "Username already exists");
    }

    if ($user['email'] === $email) {
      array_push($errors, "email already exists");
    }
  }

  // Finally, register user if there are no errors in the form
  if (count($errors) == 0) {
  	$password = md5($password_1);//encrypt the password before saving in the database

  	$query = "INSERT INTO users (username, email, password) 
  			  VALUES('$username', '$email', '$password')";
  	mysqli_query($db, $query);
  	$_SESSION['username'] = $username;
  	$_SESSION['success'] = "You are now logged in";
  	header('location: addProfile.php');
  }
}
// ... 

// LOGIN USER
if (isset($_POST['login_user'])) {
  $username = mysqli_real_escape_string($db, $_POST['username']);
  $password = mysqli_real_escape_string($db, $_POST['password']);

  if (empty($username)) {
    array_push($errors, "Username is required");
  }
  if (empty($password)) {
    array_push($errors, "Password is required");
  }

  if (count($errors) == 0) {
    $password = md5($password);
    $query = "SELECT * FROM users WHERE username='$username' AND password='$password'";
    $results = mysqli_query($db, $query);
    if (mysqli_num_rows($results) == 1) {
      $_SESSION['username'] = $username;
      $_SESSION['success'] = "You are now logged in";
      header('location: index.php');
    }else {
      array_push($errors, "Wrong username/password combination");
    }
  }
}

// ADD PROFILE
if (isset($_POST['add_profile'])) {
  $firstName = mysqli_real_escape_string($db, $_POST['firstName']);
  $lastName = mysqli_real_escape_string($db, $_POST['lastName']);
  $contact = mysqli_real_escape_string($db, $_POST['contact']);
  $address = mysqli_real_escape_string($db, $_POST['address']);
  $subType = mysqli_real_escape_string($db, $_POST['subType']);
  $payType = mysqli_real_escape_string($db, $_POST['payType']);
  $username = $_SESSION['username'];

  if($subType === "select")
  {
    echo "<script>alert('You have to select Subscription Type');</script";
  }
  else if($payType === "select")
  {
    echo "<script>alert('You have to select Payment Type');</script";
  }
  else
  {
    if (empty($firstName)) {
      array_push($errors, "First name is required");
    }
    if (empty($lastName)) {
      array_push($errors, "Last name is required");
    }
    if (empty($contact)) {
      array_push($errors, "Contact No. is required");
    }
    if (empty($address)) {
      array_push($errors, "Address is required");
    }
    if (strlen($contact) != '10') {
      array_push($errors, "Contact No. is invalid");
    }

    if (count($errors) == 0) {
      $query = "INSERT INTO details (username, firstName,lastName,contact,address,subType,payType) VALUES('$username','$firstName', '$lastName','$contact','$address' , '$subType', '$payType')";
      mysqli_query($db, $query) or die(mysqli_error($db));
      header('location: index.php');
    }
  }
}


?>