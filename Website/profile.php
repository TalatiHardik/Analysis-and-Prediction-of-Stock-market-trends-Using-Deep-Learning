
<?php 
  session_start(); 

  if (!isset($_SESSION['username'])) {
  	$_SESSION['msg'] = "You must log in first";
  	header('location: login.php');
  }
  if (isset($_GET['logout'])) {
  	session_destroy();
  	unset($_SESSION['username']);
  	header("location: index.php");
  }
?>


<?php 
	$username = $_SESSION['username'];
    $SN = $_GET['shortName'];
	$con=mysqli_connect("localhost:3306","root","","registration");
	if (mysqli_connect_errno())
	{
		echo "Failed to connect to MySQL: " . mysqli_connect_error();
	}

	$result = mysqli_query($con,"SELECT * FROM stock where shortName = '$SN'");


	$row = mysqli_fetch_array($result)
	
?>

<!DOCTYPE html>
<html>
<head>
	<!-- IMPORTANT META TAG -->

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Profile</title>
	<!-- Google Fonts -->
    <link href="https://fonts.googleapis.com/css?family=Raleway:100,200,300,400,500,600,700" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,400,600,700" rel="stylesheet">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="css/bootstrap/bootstrap.min.css" type="text/css">

    <!-- Font Awesome -->
    <link rel="stylesheet" href="css/font-awesome/css/all.min.css" type="text/css">
    <!--    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.3.1/css/all.css" integrity="sha384-mzrmE5qonljUremFsqc01SB46JvROS7bZs3IO2EmfFsd15uHvIt+Y8vEf7N7fWAU" crossorigin="anonymous">-->

    <!-- Owl Carosuel -->
    <link rel="stylesheet" href="css/owl-carousel/owl.carousel.min.css" type="text/css">
    <link rel="stylesheet" href="css/owl-carousel/owl.theme.default.min.css" type="text/css">


<!--
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>

-->
    <!-- Custom CSS -->
    <link rel="stylesheet" href="css/style.css" type="text/css">
    <link rel="stylesheet" type="text/css" href="profile.css">

    
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
		                    <div class="dropdown-divider"></div>
		                    <a class="dropdown-item" href="index.php?logout='1'">Logout</a>
		                </div>
	                
	                </li>
                <?php endif ?>
            </ul>

        </div>
    </nav>

	<section id="des">
		<div class="container">
			<div class="row">
                <h1 id="why-us-heading" class="text-center col-md-12">
                	<?php echo $row['name']; ?>
                </h1>
            </div>
            <div class="container">
            	<div class="row">
            		<p>Catagory: <?php echo $row['catagory']; ?></p>
            	</div>
                <br>

             <ul class="nav nav-tabs" role="tablist">
                    <li class="nav-item">
                      <a class="nav-link active tab" data-toggle="tab" href="#graph">Graph</a>
                    </li>
                    <li class="nav-item">
                      <a class="nav-link tab" data-toggle="tab" href="#news">News</a>
                    </li>
                    <li class="nav-item">
                      <a class="nav-link tab" data-toggle="tab" href="#risk">Risk Analysis</a>
                    </li>

                  



                  </ul>



                <div class="tab-content">
 <div id="graph" class="container tab-pane active" style="border:0;"><br>
                 <div class="container">
                  <h4 align="center">Prediction Graphs</h4>
                  <br>
                    <?php 
                        
                        if($row['isGraph'] == 1)
                        {
                            echo $row['graph'];
                        }
                        else
                        { 
                    ?>
                        <!-- Nav tabs -->
                  <ul class="nav nav-tabs" role="tablist">
                    <li class="nav-item">
                      <a class="nav-link active tab" data-toggle="tab" href="#open">Open</a>
                    </li>
                    <li class="nav-item">
                      <a class="nav-link tab" data-toggle="tab" href="#close">Close</a>
                    </li>
                    <li class="nav-item">
                      <a class="nav-link tab" data-toggle="tab" href="#high">High</a>
                    </li>
                    <li class="nav-item">
                      <a class="nav-link tab" data-toggle="tab" href="#low">low</a>
                    </li>
                  </ul>

                

                  <!-- Tab panes -->
                  <div class="tab-content">
                    <div id="open" class="container tab-pane active" style="border:0;"><br>
                        <?php
                            echo "<img src='data/".$SN."/".$SN."_open.png'>";   
                        ?>
                    </div>
                    <div id="close" class="container tab-pane fade" style="border:0;"><br>
                        <?php
                            echo "<img src='data/".$SN."/".$SN."_close.png'>";
                        ?>
                    </div>
                    <div id="high" class="container tab-pane fade" style="border:0;"><br>
                        <?php
                            echo "<img src='data/".$SN."/".$SN."_high.png'>";
                        ?>
                    </div>
                    <div id="low" class="container tab-pane fade" style="border:0;"><br>
                        <?php
                            echo "<img src='data/".$SN."/".$SN."_low.png'>";
                        ?>
                    </div>
                  </div>
                  <?php
                        }
                        
                    ?>
                </div>

                
                    


                <br>

              <div class="container">
                  <h4>Data Set</h4>
                  <br>
                  <!-- Nav tabs -->
                  <ul class="nav nav-tabs" role="tablist">
                    <li class="nav-item">
                      <a class="nav-link active tab" data-toggle="tab" href="#test">Test Data</a>
                    </li>
                    <li class="nav-item">
                      <a class="nav-link tab" data-toggle="tab" href="#train">Train Data</a>
                    </li>
                    <li class="nav-item">
                      <a class="nav-link tab" data-toggle="tab" href="#predicted">Predicted</a>
                    </li>
                  </ul>

                  <!-- Tab panes -->
                  <div class="tab-content">
                    <div id="test" class="container tab-pane active" style="border:0;"><br>
                     <?php
                     if($row['test'])
                     {
                        echo "<table style='border: 1px solid white'>\n\n"; 
                        $f = fopen("data/".$SN."/".$SN."_test.csv", "r");
                        while (($line = fgetcsv($f)) !== false) {
                                echo "<tr>";
                                foreach ($line as $cell) {
                                        echo "<td style='border: 1px solid white'>" . htmlspecialchars($cell) . "</td>";
                                }
                                echo "</tr>\n";
                        }
                        fclose($f);
                        echo "\n</table>";
                    }
                    else{
                        echo "<p>No Data Available</p>";
                    }
                    ?>
                    </div>
                    <div id="train" class="container tab-pane fade" style="border:0;"><br>
                      <?php
                     if($row['train'])
                     {
                        echo "<table style='border: 1px solid white'>\n\n"; 
                        $f = fopen("data/".$SN."/".$SN."_train.csv", "r");
                        while (($line = fgetcsv($f)) !== false) {
                                echo "<tr>";
                                foreach ($line as $cell) {
                                        echo "<td style='border: 1px solid white'>" . htmlspecialchars($cell) . "</td>";
                                }
                                echo "</tr>\n";
                        }
                        fclose($f);
                        echo "\n</table>";
                    }
                    else{
                        echo "<p>No Data Available</p>";
                    }
                    ?>
                    </div>
                    <div id="predicted" class="container tab-pane fade" style="border:0;"><br>
                    <?php
                     if($row['predicted'])
                     {
                        echo "<table style='border: 1px solid white'>\n\n"; 
                        $f = fopen("data/".$SN."/".$SN."_predicted.csv", "r");
                        while (($line = fgetcsv($f)) !== false) {
                                echo "<tr>";
                                foreach ($line as $cell) {
                                        echo "<td style='border: 1px solid white'>" . htmlspecialchars($cell) . "</td>";
                                }
                                echo "</tr>\n";
                        }
                        fclose($f);
                        echo "\n</table>";
                    }
                    else{
                        echo "<p>No Data Available</p>";
                    }
                    ?>
                    </div>
                  </div>
                </div>
                </div>
                	


                  


                	<div id="risk" class="container tab-pane " style="border:0;"><br>
                        <div class="container" style='overflow: hidden'>
                      <?php 

					   $FA_cluster = "";
					   $SM_cluster = "";
                       echo "<input type='text' id='myInput' onkeyup='myFunction(".$FA_cluster.")' placeholder='Search for stocks..' style='margin-bottom:10px'>"; 

                       ?>
                        <h4 align="center" >Similar Stocks</h4>
                        
                       <?php
						if (($fp = fopen("data/join_data.csv", "r")) !== false) {
						    while (($row = fgetcsv($fp)) !== false) {
						    	if(strcasecmp($SN,$row[0]) == 0) {
						           // echo 'Found ' . $row[1] ."\n";
						            $FA_cluster  = $row[1];
						        }
						       
						       
						    }						   

						    fclose($fp);
						}
						if (($fp = fopen("data/join_data.csv", "r")) !== false) {
						     while (($row = fgetcsv($fp)) !== false) {
						  		if(strcasecmp($SN,$row[2]) == 0) {
						            //echo 'Found ' . $row[3] ."\n";
						            $SM_cluster  = $row[3];
						        }
						    }						   

						    fclose($fp);
						}


                       
                        if (file_exists("data/data_dif.csv"))
                         {
                            echo "<table style='border: 1px solid white ; float : right ; margin-right:30px 'id='myTable'>\n\n"; 
                            $f = fopen("data/join_data.csv", "r");
                            $custom = array(0,1); 
                            $count = 0;
                            $data = 0;
                            while (($line = fgetcsv($f)) !== false) {
                                  if($count == 0){
                                    echo "<tr align = 'center'>";
                                        foreach ($custom as $cell) {
                                                echo "<th style='border: 1px solid white'  >". ucfirst(htmlspecialchars($line[$cell])) . "</th>";
                                          
                                        }
                                    echo "</tr>\n";
                                    $count = 1;
                                }
                                else{
                                        echo "<tr>";
                                        foreach ($custom as $cell) {
                                        	if(strcasecmp($FA_cluster,$line[1]) == 0){
                                       
                                                echo "<td class = 'show'  style='border: 1px solid white'>" . ucfirst(htmlspecialchars($line[$cell])) . "</td>";
                                                $data = 1;
                                            }
                                            else
	                                        {
	                                        	 echo "<td class = 'hide' style='border: 1px solid white; display:none'>" . ucfirst(htmlspecialchars($line[$cell])) . "</td>"; 
	                                        }  
                                        }
                                    echo "</tr>\n";
                                    }
                            }
                            if($data == 0){
                            	echo "<tr><td>No data available<td></tr>";
                            }
                            fclose($f);
                            echo "\n</table>";  
                                
                         } 
                        else
                         {     
                                echo "<p>No Data Available</p>";
                         }
                        
                          if (file_exists("data/data_dif.csv"))
                         {
                             echo "<table style='border: 1px solid white' id='myTable2'>\n\n"; 
                            $f = fopen("data/join_data.csv", "r");
                            $custom = array(2,3); 
                            $count = 0;
                            $data = 0;
                            while (($line = fgetcsv($f)) !== false) {
                                  if($count == 0){
                                    echo "<tr align = 'center'>";
                                        foreach ($custom as $cell) {
                                                echo "<th style='border: 1px solid white'  >". ucfirst(htmlspecialchars($line[$cell])) . "</th>";
                                          
                                        }
                                    echo "</tr>\n";
                                    $count = 1;
                                }
                                else{
                                        echo "<tr>";
                                        foreach ($custom as $cell) {
                                        if(strcasecmp($SM_cluster,$line[3]) == 0){
                                                echo "<td class = 'show' style='border: 1px solid white'>" . ucfirst(htmlspecialchars($line[$cell])) . "</td>"; 
                                                $data = 1;  
                                        }
                                        else
                                        {
                                        	 echo "<td class = 'hide' style='border: 1px solid white; display:none'>" . ucfirst(htmlspecialchars($line[$cell])) . "</td>"; 
                                        }    
                                        }
                                    echo "</tr>\n";
                                    }
                            }
                            if($data == 0){
                            	echo "<tr><td>No data available<td></tr>";
                            }
                            fclose($f);
                            echo "\n</table>";  
                                
                         } 
                        else
                         {     
                                echo "<p>No Data Available</p>";
                         } 
                         
                        ?>
                    </div> </div> 


                    <div id="news" class="container tab-pane " style="border:0;"><br>
                        <div class="container">
                        <h4 align="center" >News</h4>
                       <?php
                       if (file_exists("data/accuracy.csv"))
                         {
                             $f = fopen("data/accuracy.csv", "r");
                             while (($line = fgetcsv($f)) !== false) {
                                $custom = array(0); 
                                foreach ($custom as $cell) {
                                if(strcasecmp($SN,$line[$cell]) == 0)
                                {
                                    echo "<h6 align='left'>Accuracy:-$line[2]</h6>";

                                }
                                }

                             }
                                
                         } 
                         ?>
                         

                          <div align="right" style="margin-left: 685px;">
                            <h6 style="font-size: 14px;text-align: left;">Label:</h6>
                            <p style="font-size: 12px; text-align: left; margin-bottom: 0;">'1' indicates that stock value will go up.</p>
                            <p style="font-size: 12px; text-align: left;">'0' indicates that stock value will go down.</p>
                          </div>

                          <?php

                        if (file_exists("data/".$SN."/Prediction_final.csv"))
                         {
                             echo "<table style='border: 1px solid white'>\n\n"; 
                            $f = fopen("data/".$SN."/Prediction_final.csv", "r");
                            $custom = array(0,1,2,4); 
                            $count = 0;
                            while (($line = fgetcsv($f)) !== false) {
                                if($count == 0 || $count == 1){
                                    echo "<tr style='font-size: 13px'>";
                                        foreach ($custom as $cell) {
                                                echo "<th style='border: 1px solid white'  >". ucfirst(htmlspecialchars($line[$cell])) . "</th>";
                                          
                                        }
                                    echo "</tr>\n";
                                    $count = 1;
                                }
                                else{
                                        echo "<tr>";
                                        foreach ($custom as $cell) {
                                            if($cell == 0){
                                                echo "<td style='border: 1px solid white'>" . ucfirst(htmlspecialchars($line[$cell])) . "</td>";
                                            }
                                            else{
                                                if(htmlspecialchars($line[$cell]) == 1)
                                                    echo "<td style='border: 1px solid white'>Up</td>";
                                                else
                                                    echo "<td style='border: 1px solid white'>Down</td>";
                                            }
                                        }
                                    echo "</tr>\n";
                                    }
                            }
                            fclose($f);
                            echo "\n</table>";    
                                
                         } 
                        else
                         {     
                                echo "<p>No Data Available</p>";
                         } 
                        ?>
                    </div> </div> 

                
                </div>
                
                <?php
                /*
echo "<html><body><table>\n\n";
$f = fopen("so-csv.csv", "r");
while (($line = fgetcsv($f)) !== false) {
        echo "<tr>";
        foreach ($line as $cell) {
                echo "<td>" . htmlspecialchars($cell) . "</td>";
        }
        echo "</tr>\n";
}
fclose($f);
echo "\n</table></body></html>";
*/
?>

        
		</div>
		
	</section>


    <!-- jquery -->

	<script>
	function myFunction() {
	  var input, filter, table, tr, td, i, txtValue;
	  input = document.getElementById("myInput");
	  filter = input.value.toUpperCase();
	  table = document.getElementById("myTable");
	  tr = table.getElementsByTagName("tr");

	  if(input.value != ""){

	  	  var point = []; 
		  for (i = 0; i < tr.length; i++) {
		    td = tr[i].getElementsByTagName("td")[0];
		    td2 = tr[i].getElementsByTagName("td")[1];
		    if (td) {
		      txtValue = td.textContent || td.innerText;

		      if (txtValue.toUpperCase().indexOf(filter) > -1) {
		      //  tr[i].style.display = "";
		        td.style.display = "";
		        td2.style.display = "";
		        point[td2.textContent] = 1 ; 
		      } else {
		       // tr[i].style.display = "none";
		       	  td.style.display = "none";
		          td2.style.display = "none";
		      }
		    }       
		  }
		   for (i = 0; i < point.length; i++) {
		   	if(point[i] != undefined)
		   	{
		   		for (i = 0; i < tr.length; i++) {
		   			td = tr[i].getElementsByTagName("td")[0];
		   			td2 = tr[i].getElementsByTagName("td")[1];
		   			if (td) {
		   			  td.style.display = "none";
				      td2.style.display = "none";
				      txtValue = td2.textContent || td2.innerText;
				      if (point[txtValue] == 1) {
				        td.style.display = "";
				        td2.style.display = "";
				      }
				       else {
				        td.style.display = "none";
				        td2.style.display = "none";
				      } 
				    } 


		   		}
		   		
		   	}

		   }
		  
		  table = document.getElementById("myTable2");
		  tr = table.getElementsByTagName("tr");
		  var points = []; 
		  for (i = 0; i < tr.length; i++) {
		    td = tr[i].getElementsByTagName("td")[0];
		    td2 = tr[i].getElementsByTagName("td")[1];
		    if (td) {
		      txtValue = td.textContent || td.innerText;
		      if (txtValue.toUpperCase().indexOf(filter) > -1) {
		       // tr[i].style.display = "";
		        td.style.display = "";
		        td2.style.display = "";
		        points[td2.textContent] = 1 ; 
		      }
		       else {
		        //tr[i].style.display = "none";
		        td.style.display = "none";
		        td2.style.display = "none";
		      } 
		    }       
		  }
		   for (i = 0; i < points.length; i++) {
		   	if(points[i] != undefined)
		   	{
		   		for (i = 0; i < tr.length; i++) {
		   			td = tr[i].getElementsByTagName("td")[0];
		   			td2 = tr[i].getElementsByTagName("td")[1];
		   			if (td) {
		   			  td.style.display = "none";
				      td2.style.display = "none";
				      txtValue = td2.textContent || td2.innerText;
				      if (points[txtValue] == 1) {
				        td.style.display = "";
				        td2.style.display = "";
				      }
				       else {
				        td.style.display = "none";
				        td2.style.display = "none";
				      } 
				    } 


		   		}
		   		
		   	}

		   }
		  
/*
		    if (td) {
		      txtValue = td.textContent || td.innerText;
		      if (txtValue.toUpperCase().indexOf(filter) > -1) {
		        tr[i].style.display = "";
		        td.style.display = "";
		      } else {
		        tr[i].style.display = "none";
		      }
		    }       
		  }*/
	  }
	  else{

	  	 var x = document.getElementsByClassName("hide");
	  	 for(i=0;i<x.length;i++)
	  	 	x[i].style.display = "none";
	  	 var x = document.getElementsByClassName("show");
	  	 for(i=0;i<x.length;i++)
	  	 	x[i].style.display = "";
	  }
	}
	</script>
    <script src="js/jquery.js" type="text/javascript"></script>

    <!-- Bootstrap JS -->
    <script src="js/bootstrap/bootstrap.min.js" type="text/javascript"></script>

    <!-- FontAwesome -->
    <script src="js/FontAwesome/fontawesome.min.js" type="text/javascript"></script>

    <!-- Owl Carosuel-->
    <script src="js/owl-carousel/owl.carousel.min.js" type="text/javascript"></script>

    <!-- Custom Javascript -->
    <script src="js/script.js" type="text/javascript"></script>

	<script type="text/javascript" src="profile.js"></script>
	
</body>
</html>

<?php mysqli_close($con); ?>