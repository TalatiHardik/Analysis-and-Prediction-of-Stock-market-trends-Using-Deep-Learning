
<?php 
  session_start(); 

  if (!isset($_SESSION['username'])) {
  	$_SESSION['msg'] = "You must log in first";
  	//header('location: index.php');
  }
  if (isset($_GET['logout'])) {
  	session_destroy();
  	unset($_SESSION['username']);
  	//header("location: index.php");
  }
?>

<?php 
    $con=mysqli_connect("localhost","root","","registration");
    if (mysqli_connect_errno())
    {
        echo "Failed to connect to MySQL: " . mysqli_connect_error();
    }

    if(!isset($_GET['cat']))
        header("location: index.php");
    $cat=$_GET['cat'];
    $querystring = preg_replace("#[^0-9a-zA-Z]#i", "%' OR catagory LIKE '%", $cat);
    $querystring = "%".$querystring."%";
    $title = "%".$cat."%";
    //echo $title;
    //echo "<script>alert($cat);</script>";
   // echo $querystring;

    $result = mysqli_query($con,"SELECT * FROM stock where catagory LIKE '$querystring' OR name LIKE '$title' OR shortName LIKE '$querystring'");

    //$row = mysqli_fetch_array($result)
?>


<!DOCTYPE html>
<html>
<head>
    <!-- IMPORTANT META TAG -->

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Catagory</title>
	<!-- Google Fonts -->
    <link href="https://fonts.googleapis.com/css?family=Raleway:100,200,300,400,500,600,700" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,400,600,700" rel="stylesheet">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="css/bootstrap/bootstrap.min.css" type="text/css">

    <!-- Font Awesome -->
    <link rel="stylesheet" href="css/font-awesome/css/all.min.css" type="text/css">

    <!-- Owl Carosuel -->
    <link rel="stylesheet" href="css/owl-carousel/owl.carousel.min.css" type="text/css">
    <link rel="stylesheet" href="css/owl-carousel/owl.theme.default.min.css" type="text/css">

    <!-- Custom CSS -->
    <link rel="stylesheet" href="css/style.css" type="text/css">
    <link rel="stylesheet" type="text/css" href="catagory.css">
</head>
<body style="background-color: #000">
	<!-- Navbar -->

    <nav class="navbar navbar-expand-lg fixed-top">
        <a class="navbar-brand" href="index.php">Stock</a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav mr-auto">
                <li class="nav-item active">
                    <a class="nav-link" href="index.php">Home <span class="sr-only">(current)</span></a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="#">About Us</a>
                </li>
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        Catagories
                    </a>
                    <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                        <?php echo '<a class="dropdown-item" href="catagory.php?cat=industry">Industry</a>';  ?>
                        <?php echo ' <a class="dropdown-item" href="catagory.php?cat=education">Education</a>' ?>
                        <?php echo '<a class="dropdown-item" href="catagory.php?cat=government">Government</a>'?>
                        <div class="dropdown-divider"></div>
                        <?php echo  '<a class="dropdown-item" href="catagory.php?cat=other">More catagories</a>' ?>
                    </div>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="#">Contact Us</a>
                </li>
                <?php  if (isset($_SESSION['username'])) : ?>
                
                    <li class="nav-item dropdown" style="margin-left: 600px">
                        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            <?php echo $_SESSION['username']; ?>
                        </a>
                        <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                            <!-- <a class="dropdown-item" href="profile.php">Profile</a> -->
                            <div class="dropdown-divider"></div>
                            <a class="dropdown-item" href="index.php?logout='1'">Logout</a>
                        </div>
                    
                    </li>
                <?php endif ?>
            </ul>

            <?php  if (!isset($_SESSION['username'])) : ?>
                <div id="login">
                    <a href="login.php"><button class="btn btn-login btn-general" id="btn-login" type="button">Login</button></a>
                    <a href="register.php"><button class="btn btn-sign-up btn-general" id="btn-sign-up" type="button">Sign Up</button></a>
                </div>
            <?php endif ?>
        </div>
    </nav>
    
    <section id="result">
        <div class="container">
            <h1><?php echo strtoupper($cat); ?></h1>
            <?php if(mysqli_num_rows($result) > 0) {
                while($row = mysqli_fetch_array($result))
                {
            ?>
            <div class="row">
                <h6 id="company-name"><?php echo $row['name'] ?></h6>
            </div>
            <div class="row">
                <p id="description">Catagory: <?php echo substr($row['catagory'], 0, 200)?></p>
            </div>
            <div class="row">
                <a id="link" href="profile.php?shortName=<?php echo $row['shortName'] ?>">Read More</a>
            </div>
            <div class="row" id="line"></div>
            <?php } }else{ ?>
                    <div class="row"><p>No result found</p></div>
            <?php 
                }
            ?>
        </div>
    </section>


    <!-- jquery -->
    <script src="js/jquery.js" type="text/javascript"></script>

    <!-- Bootstrap JS -->
    <script src="js/bootstrap/bootstrap.min.js" type="text/javascript"></script>

    <!-- FontAwesome -->
    <script src="js/FontAwesome/fontawesome.min.js" type="text/javascript"></script>

    <!-- Owl Carosuel-->
    <script src="js/owl-carousel/owl.carousel.min.js" type="text/javascript"></script>

    <!-- Custom Javascript -->
    <script src="js/script.js" type="text/javascript"></script>
</body>
</html>
