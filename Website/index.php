<?php 
  session_start(); 

  if (!isset($_SESSION['username'])) {
  	$_SESSION['msg'] = "You must log in first";
  	//header('location: login.php');
  }
  if (isset($_GET['logout'])) {
  	session_destroy();
  	unset($_SESSION['username']);
  	//header("location: login.php");
  }
  $queryString="";
?>


<!DOCTYPE html>
<html lang="en">

<head>

    <!-- IMPORTANT META TAG -->

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Title -->
    <title>StockPredict</title>

    <!-- fav icon -->

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

</head>

<body>

    <!-- Preloader -->
    <div id="preloader">
        <div id="status">&nbsp;</div>
    </div>

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

    <section id="home">

        <!-- Bcakground img -->
        <div id="home-bg"></div>

        <!-- Home Content -->
        <div id="home-content">

            <div id="home-content-inner" class="text-center">

                <div id="home-heading">
                    <h1 id="home-heading">Stock</h1>
                    <h1 id="home-heading">Prediction &<span> Anaysis</span></h1>
                </div>

                <div class="container">
                    <br />
                    <div class="row justify-content-center">
                        <div class="col-12 col-md-10 col-lg-8">
                            <form method="GET" action="catagory.php">
                                <div class="row no-gutters align-items-center">
                                    <!--end of col-->
                                    <div class="col">
                                        <input class="form-control form-control-lg form-control-borderless" type="search" name="cat" placeholder="Search" required/>
                                    </div>
                                    <!--end of col-->
                                    <div class="col-auto">
                                        <button class="btn btn-lg btn-primary" id="btn-search" type="submit"><i class="fas fa-search"></i></button>
                                    </div>
                                    <!--end of col-->
                                </div>
                            </form>
                        </div>
                        <!--end of col-->

                    </div>

                </div>
            </div>
        </div>
        <a href="#why-us" id="angle-down"><i class="fas fa-angle-down"></i></a>
    </section>

    <section id="why-us">

        <div class="container">
            <div class="row">
                <h1 id="why-us-heading" class="text-center col-md-12">How to use this <span>System?</span></h1>
            </div>
            <div class="row features">
                <p class="col-md-6 why-us-icon"><i class="fas fa-share-alt"></i></p>
                <div class="col-md-6">
                    <h2 class="why-us-heading-2 text-center">STEP 1</h2>
                    <p class="why-us-p">Predicting stock value for tomorrow by analysing historic data of a particular stock. Recurrent Neural Network (RNN) model is used for this system. Stock historic data is downloaded from yahoo finance. </p>
                </div>
            </div>
            <div class="row features">
                <div class="col-md-6">
                    <h2 class="why-us-heading-2 text-center">STEP 2</h2>
                    <p class="why-us-p">Verify the trend of the stock based on external factor and news which cannot be analysed using historic data. Both Support Vector Machine and Naive Bayes system are used. News headlines are web scrapped from moneycontrol.com. </p>
                </div>
                <p class="col-md-6 why-us-icon"><i class="fas fa-newspaper"></i></p>
            </div>
            <div class="row features">
                <p class="col-md-6 why-us-icon" style="margin-top: 50px"><i class="fas fa-chart-line"></i></p>
                <div class="col-md-6">
                    <h2 class="why-us-heading-2 text-center">STEP 3</h2>
                    <p class="why-us-p">Use Risk Analysis System to find out to which cluster your stock belongs to and check the movement of other stock in that cluster, since stocks in a particular cluster are related to each other their movement is interdependent. Kmeans clustering is used to create this module. Data is 10 year historic data for (Open price - Close price) for a particular day. </p>
                </div>
            </div>
        </div>

    </section>

    <section id="testimonial">

        <div class="container">
            <div class="row">
                <h2 class="text-center col-md-12" id="testimonial-heading">Testimonials</h2>
            </div>
            <div class="row">
                <div class="col-md-4">
                    <blockquote>
                        It is a long established fact that a reader will be distracted by the readable content of a page when looking at its layout. The point of using Lorem Ipsum is that it has a more-or-less normal distribution of letters, as opposed to using 'Content here, content here', making it look like readable English.
                        <cite><img src="img/customer/customer-1.jpg">Alberto Duncan</cite>
                    </blockquote>
                </div>
                <div class="col-md-4">
                    <blockquote>
                        It is a long established fact that a reader will be distracted by the readable content of a page when looking at its layout. The point of using Lorem Ipsum is that it has a more-or-less normal distribution of letters, as opposed to using 'Content here, content here', making it look like readable English.
                        <cite><img src="img/customer/customer-2.jpg">Joana Silva</cite>
                    </blockquote>
                </div>
                <div class="col-md-4">
                    <blockquote>
                        It is a long established fact that a reader will be distracted by the readable content of a page when looking at its layout. The point of using Lorem Ipsum is that it has a more-or-less normal distribution of letters, as opposed to using 'Content here, content here', making it look like readable English.
                        <cite><img src="img/customer/customer-3.jpg">Milton Chapman</cite>
                    </blockquote>
                </div>
            </div>
        </div>

    </section>


    <section id="write-us">

        <div class="row">
            <h1 class="text-center col-md-12" id="write-us-heading">Get In <span>Touch</span></h1>
        </div>

        <div class="container" id="contact-form">

            <form>
                <h3>Send Message</h3>
                <p>Lorem Ipsum is simply dummy text of the printing and typesetting industry.</p>
                <div class="row">

                    <div class="col-md-6">
                        <div class="form-group">
                            <input type="text" class="form-control" id="name" placeholder="Your Name">
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <input type="email" class="form-control" id="email" placeholder="Email Address">
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <input type="text" class="form-control" id="phone" placeholder="Phone No.">
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <input type="text" class="form-control" id="subject" placeholder="Subject">
                        </div>
                    </div>
                </div>
                <div class="form-group">
                    <textarea class="form-control" id="message" placeholder="Message"></textarea>
                </div>
                <div id="submit-div" class="text-center">
                    <a class="btn btn-general" id="btn-submit" href="#" title="Text" role="button">Submit</a>
                </div>

            </form>

        </div>

    </section>

    <section id="footer">

        <div class="row">

            <p class="text-center col-md-12">Copyright &copy; Stock</p>

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