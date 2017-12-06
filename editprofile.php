<?php
  
  define('DB_SERVER', '127.0.0.1');
  define('DB_USERNAME', 'root');
  define('DB_PASSWORD', '');
  define('DB_DATABASE', 'eduportal');
  
  $db = mysqli_connect(DB_SERVER,DB_USERNAME,DB_PASSWORD,DB_DATABASE) or die(mysqli_error());
  $error="";
  session_start();
  $uname=$_SESSION['user_session'];
 
  if(!(isset($_SESSION['user_session']))){
    //mysqli_close($connection); // Closing Connection
    header('Location: index.php'); // Redirecting To Home Page
    }
  $sql = "SELECT * FROM users WHERE username = '" . $_SESSION['user_session'] . "'";
  $result = mysqli_query($db,$sql);
  $row=mysqli_fetch_assoc($result);

  if(isset($_POST['username'])){
    $username="";
    /*$password="";*/
    $firstname="";
    $lastname="";
    $email="";
    $uname= $_SESSION['user_session'];

    @$username=$_POST['username'];
    /*@$password=md5($_POST['password']);*/
    @$firstname=$_POST['firstname'];
    @$lastname=$_POST['lastname'];
    @$email=$_POST['email'];



    $username=mysqli_escape_string($db,$username);
    /*$password=mysqli_escape_string($db,$password);*/
    $firstname=mysqli_escape_string($db,$firstname);
    $lastname=mysqli_escape_string($db,$lastname);
    $email=mysqli_escape_string($db,$email);

  if(empty($username) || empty($firstname) || empty($lastname) || empty($email)){
    echo "<script>alert('Please fill all the fields');</script>";
  }

  $query=
  @mysqli_query($db,"UPDATE users SET username='$username',firstname='$firstname', lastname='$lastname', email='$email' WHERE username='$uname'");
  


  if($query){
    echo "<script> alert('Profile updated successfully !');</script>";
    
  }
  else{
    echo "<script> alert('Profile not updated !');</script>";
    $username="";
    $password="";
    $firstname="";
    $lastname="";
    $email="";


  }
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

        <h2 style="margin-top: 12%;font-family: 'Capriola', sans-serif;text-align: center;">Edit Profile</h2>
        <br><br>
        <div class="container" style="margin-top: 0%; font-family: 'Capriola', sans-serif;margin-left: 40%;min-height: 100vh;">
          
            <form action="<?php echo $_SERVER['PHP_SELF']?> " method="post">
            <label>Username </label><input type="text" name="username" value="<?php echo $row['username']; ?>"> <br>
            
            <label>First Name:</label> <input type="text" name="firstname" value="<?php echo $row['firstname']; ?>"><br>
            <label>Last Name</label> <input type="text" name="lastname" value="<?php echo $row['lastname']; ?>"><br>
            <label>Email</label> <input type="text" name="email" value="<?php echo $row['email']; ?>"><br>
            <input type="submit" name="update" value="update" class="btn btn-success">
          </form>
           
            
        
        
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

<?php

 


?>