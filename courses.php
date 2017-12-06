<?php 
  require "connections.php";
  $error="";
  $uname="";
	session_start();
	if((isset($_SESSION['user_session']))){
    //mysqli_close($connection); // Closing Connection
    header('Location: usercourses.php'); // Redirecting To Home Page
    }

     if(isset($_POST['user'])){
    if(empty($_POST['user']) || empty($_POST['pass1'])){
      /*$error="Please Fill All The Fields.";*/
      echo "<script>alert('Fill all fields');</script>";
    }
    else{
      $username=$_POST['user'];
      $password=$_POST['pass1'];


      // To protect from MySQL injection
      $username = stripslashes($username);
      $password = stripslashes($password);
      $username = mysqli_real_escape_string($db, $username);
      $password = mysqli_real_escape_string($db, $password);
      $password = md5($password);

      $sql="SELECT id FROM users WHERE username ='$username' and password='$password'";
      $result=mysqli_query($db,$sql);
      $row=mysqli_fetch_array($result,MYSQLI_ASSOC);

      if(mysqli_num_rows($result) == 1)
        /*if(row['password']==$password*/{

        session_start();
        $_SESSION['user_session'] = $username; // Initializing Session
        
        header("location: userindex.php"); // Redirecting To Other Page
        
      }else{
        $error="incorrect username or passoword ";
        
        echo '<script type="text/javascript">alert("' . $error . '")</script>';
        /*echo "<script>alert('incorrect username or passoword');</script>";*/


      } 
    }
  
  }
		
?>

<!DOCTYPE html>
<html>
<head>
	<title>Courses | WebNation</title>
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
</head>
<body>
<div>
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
              <ul class="nav navbar-nav navbar-right" >
              	<li ><a href="index.php">Home</a></li>
                <li ><a href="#loginmodal"  data-toggle="modal">Sign In</a></li>
                <li ><a href="index.php">Sign Up</a></li>
                <li ><a href="courses.php">Courses</a></li>
                </ul>

              <!--SOCIAL ICONS-->

            </div><!-- /.navbar-collapse -->
          </div><!-- /.container-fluid -->
        </nav>
        </div>

        <div class="container coursecont">
        	<h2><strong>Courses We Offer</strong> </h2>
        	<hr class="customhr">
		<div class="col-sm-4">
			<div class="grow reveal" >
				<a href="html.php"><img src="assets/img/html.png" class="img-rounded img-responsive reveal" alt="image" width="150" height="150" style="margin-top: 10%;margin-left: 25%;"></a>
			</div>
		</div>
		<div class="col-sm-4" >
			<div  class="grow reveal">
				<a href="css.php"><img src="assets/img/css.png" class="img-rounded img-responsive reveal" alt="image" width="150" height="150" style="margin-top: 10%;margin-left: 25%;"></a>
			</div>
		</div>
		<div class="col-sm-4" >
			<div  class="grow reveal">
				<a href="javascript.php"><img src="assets/img/javascript.png" class="img-rounded img-responsive reveal " alt="image" width="150" height="150" style="margin-top: 10%;margin-left: 25%;"></a>
			</div>
		</div>
		<div class="col-sm-4" >
			<div  class="grow reveal">
				<a href="jquery.php "><img src="assets/img/JQuery.png" class="img-rounded img-responsive reveal" alt="image" width="200" height="200" style="margin-top: 14%;margin-left: 25%;"></a>
			</div>
		</div>
		<div class="col-sm-4" >
			<div  class="grow reveal">
				<a href="php.php"><img src="assets/img/php.png" class="img-rounded img-responsive reveal" alt="image" width="200" height="200" style="margin-top: 25%;margin-left: 25%;"></a>
			</div>
		</div>
		<div class="col-sm-4" >
			<div  class="grow reveal">
				<a href="angular.php"><img src="assets/img/angularjs.png" class="img-rounded img-responsive reveal" alt="image" width="120" height="120" style="margin-top: 25%;margin-left: 25%;"></a>
			</div>
		</div>


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
	<script src="https://cdn.jsdelivr.net/scrollreveal.js/3.3.1/scrollreveal.min.js"></script>
	<script type="text/javascript">

      window.sr = ScrollReveal();
      
      sr.reveal('.reveal', { duration: 1000 });

      </script>

      <div id="loginmodal" class="modal fade" role="dialog">
  <div class="modal-dialog">

    <!-- Modal content-->
    <div class="modal-content" style="font-family: 'Capriola', sans-serif;">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal">&times;</button>
        <h4 class="modal-title">Login</h4>
      </div>
      <div class="modal-body" style="font-family: 'Capriola', sans-serif;">
        <form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="post">
          <div class="form-group">
            <label>Username:</label>
            <input name="user" class="form-control" >
          </div>
          <div class="form-group">
            <label for="pwd">Password:</label>
            <input type="password" class="form-control"  name="pass1">
          </div>
          
          <button type="submit" class="btn btn-primary" name="" style="border-radius: 0px;">Login</button>
        </form>

      </div>
      <div class="modal-footer">
        <!-- <button type="button" class="btn btn-default" data-dismiss="modal">Close</button> -->
        <!-- <button type="submit" class="btn btn-primary" name="submit" style="border-radius: 0px;">Login</button> -->
      </div>
    </div>

  </div>
</div>
    <!-- Include all compiled plugins (below), or include individual files as needed -->
    <script src="assets/js/bootstrap.min.js"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
</body>
</html>
