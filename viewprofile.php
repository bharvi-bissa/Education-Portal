<?php
  
 require "connections.php";
  $error="";
  session_start();
  $uname=$_SESSION['user_session'];
  $sql="select * from users where username='$uname'";
  if(!(isset($_SESSION['user_session']))){
    //mysqli_close($connection); // Closing Connection
    header('Location: index.php'); // Redirecting To Home Page
    }

    if(isset($_POST["deleteacc"]))
    {
      $sql="delete * from users where username='$uname'"; 
      header("location:index.php");
    }
     
?>

<!DOCTYPE html>
<html>
<head>
	<title></title>
	<meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
	<link href="assets/css/bootstrap.min.css" rel="stylesheet">
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">

    <link href="assets/css/custom.css" rel="stylesheet">
    <link rel="assets/css/font-awesome.min.css" rel="stylesheet">
    <link href="assets/css/animate.css" rel="stylesheet">
    
	<link href="https://fonts.googleapis.com/css?family=Lobster" rel="stylesheet">
	<link href="https://fonts.googleapis.com/css?family=Lobster|Roboto" rel="stylesheet">
	<link href='http://fonts.googleapis.com/css?family=Capriola' rel='stylesheet' type='text/css'>
	<link href='http://fonts.googleapis.com/css?family=Open+Sans:400,300,300italic,400italic,600,600italic,700,700italic,800,800italic' rel='stylesheet' type='text/css'>
</	
<body>
	<nav class="navbar navbar-default navbar-fixed-top  " id="navbar1"  style="/*background:transparent*/;border:none;color:#fff;opacity: 3%;background-color: #fff;
  border-color: rgba(34, 34, 34, 0.05);
  
  -webkit-transition: all 0.35s;
  -moz-transition: all 0.35s;
  margin-bottom: 0px;
  transition: all 0.60s;">
          <div class="container">
            <!-- Brand and toggle get grouped for better mobile display -->
            <div class="navbar-header" >
              <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1" aria-expanded="false" style="border:none;float: left;">
                <span class="sr-only">Toggle navigation</span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
              </button>
              <a class="navbar-brand " href="#" style="font-family: 'Capriola', sans-serif;font-size: 25px"; >WebNation</a>
            </div>

            <!-- Collect the nav links, forms, and other content for toggling -->
            <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1" style="border:none;">
              
              <!--SOCIAL ICONS-->
              <ul class="nav navbar-nav navbar-right" style="border:none; ">
                <li><a href="index.php" >Home</a></li>
                <li><a href="courses.php">Courses</a></li>
                <li class="dropdown">
                <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false"><span class=" glyphicon glyphicon-user"></span><?php echo $_SESSION["user_session"]; ?><span class="caret"></span></a>
                <ul class="dropdown-menu" style="font-family: 'Capriola', sans-serif;color: #006699;">
                  <li><a href="viewprofile.php">Profile</a></li>
                  <li><a href="editprofile.php">Edit Profile</a></li>
                  <li><a href="logout.php">Logout</a></li>
                  
                  
                </ul>
                </ul>

              <!--SOCIAL ICONS-->

            </div><!-- /.navbar-collapse -->
          </div><!-- /.container-fluid -->
        </nav>
        <h2>Your Profile</h2>
        <br><br>
        <div class="container" style="margin-top: 0%; font-family: 'Capriola', sans-serif;margin-left: 40%;min-height: 100vh;">
        <h2>Your Profile</h2>
          <?php
            $sql=
            $result = mysqli_query($db,$sql);
            while ($row=mysqli_fetch_assoc($result)) {
               # code...
               $sql= "select * from users where username='$uname'";
                echo "Username :".$row['username']."" ."<br><br>";
                echo "First Name :".$row['firstname']."" ."<br><br>";
                echo "Last Name :".$row['lastname']."" ."<br><br>";
                echo "Email :".$row['email']."" ."<br><br>";

             } 
          ?>
        <input type="button" name="editprofile" class="btn btn-default" value="Edit" style="border-radius: 0px;font-family: 'Capriola', sans-serif;">
        
        </div>

        <div class="footer" style="font-family: 'Capriola', sans-serif;">
    <div class="container">
      <div class="col-md-4 w3l_footer_grid reveal">
        <h2><a href="">WebNation</a></h2>
        <p style="">WebNation is an education portal for teaching web development from basic to intermediate level.Learn front-end development and back-end development by building real projects. Build beautiful websites, arcade games, your personal website and much more. Learn the fundamentals of how the web works and gain working knowledge with HTML, CSS and Javascript.Best of all we guide you through the process with 1 on 1 coaching if you ever get stuck.</p>
      </div>
      <div class="col-md-4 w3l_footer_grid reveal">
        <h3 style="margin-left: 11%;">Address</h3>
        <ul class="w3_address reveal">
          <li><i class="glyphicon glyphicon-map-marker" aria-hidden="true"></i>1234k Avenue, 4th block, <span>New York City.</span></li>
          <li><i class="glyphicon glyphicon-envelope" aria-hidden="true"></i><a href="mailto:info@example.com">info@example.com</a></li>
          <li><i class="glyphicon glyphicon-earphone" aria-hidden="true"></i>+1234 567 567</li>
        </ul>
      </div>
      <div class="col-md-4 w3l_footer_grid">
        <h3>Navigation</h3>
        <ul class="agileinfo_footer_grid_nav reveal">
          <li><a href="services.html"><span class="glyphicon glyphicon-arrow-right" aria-hidden="true"></span></span>Sign Up</a></li>
          <li><a href="portfolio.html"><span class="glyphicon glyphicon-arrow-right" aria-hidden="true"></span>Sign In</a></li>
          <li><a href="short-codes.html"><span class="glyphicon glyphicon-arrow-right" aria-hidden="true"></span>Courses</a></li>
          <li><a href="mail.html"><span class="glyphicon glyphicon-arrow-right" aria-hidden="true"></span>Mail Us</a></li>
        </ul>
      </div>
      
      <div class="clearfix"> </div>
      <div class="w3agile_footer_copy">
        <p>© 2016 WebNation. All rights reserved | Design by <a href="">Bharvi Bissa</a></p>
      </div>
    </div>
  </div>

        

    
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
    <!-- Include all compiled plugins (below), or include individual files as needed -->
    <script src="assets/js/bootstrap.min.js"></script>

    
    
</body>
</html>

