<?php
  
  define('DB_SERVER', '127.0.0.1');
  define('DB_USERNAME', 'root');
  define('DB_PASSWORD', '');
  define('DB_DATABASE', 'bloguser');
  $db = mysqli_connect(DB_SERVER,DB_USERNAME,DB_PASSWORD,DB_DATABASE) or die(mysqli_error());
  $error="";
  if(isset($_POST['username'])){
    if(empty($_POST['username']) || empty($_POST['pass1'])){
      /*$error="Please Fill All The Fields.";*/
      echo "<script>alert('Fill all fields');</script>";
    }
    else{
      $username=$_POST['username'];
      $password=$_POST['pass1'];


      // To protect from MySQL injection
      $username = stripslashes($username);
      $password = stripslashes($password);
      $username = mysqli_real_escape_string($db, $username);
      $password = mysqli_real_escape_string($db, $password);
      $password = md5($password);

      $sql="SELECT id FROM members WHERE username ='$username' and password='$password'";
      $result=mysqli_query($db,$sql);
      $row=mysqli_fetch_array($result,MYSQLI_ASSOC);

      if(mysqli_num_rows($result) == 1){
        session_start();
        $_SESSION['user_session'] = $username; // Initializing Session
        header("location: dashboard.php"); // Redirecting To Other Page
      }else{
        $error="incorrect username or passoword";
      } 
    }
  
  }

?>

<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="theme-color" content="#cccccc" />
    <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
    <title>BlogPost</title>

    <!-- Bootstrap -->
    <link href="assets/css/bootstrap.min.css" rel="stylesheet">
    <link href="assets/css/custom.css" rel="stylesheet">
    <link rel="assets/css/font-awesome.min.css" rel="stylesheet">
    <link href="assets/css/animate.css" rel="stylesheet">
    
   <link href="https://fonts.googleapis.com/css?family=Lobster" rel="stylesheet">
   <link href="https://fonts.googleapis.com/css?family=Lobster|Roboto" rel="stylesheet">

    <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
      <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
  </head>
  <body >
        
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
              <a class="navbar-brand " href="#" style="font-family: 'Lobster', cursive;font-size: 25px"; >BlogPost</a>
            </div>

            <!-- Collect the nav links, forms, and other content for toggling -->
            <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1" style="border:none;">
              
              <!--SOCIAL ICONS-->
              <ul class="nav navbar-nav navbar-right" style="border:none; ">
                <li ><a href="#loginmodal"  data-toggle="modal">Login</a></li>
                <li ><a href="#registermodal" data-toggle="modal">Register</a></li>
                <li ><a href="#">Blog</a></li>
              </ul>
              <!--SOCIAL ICONS-->

            </div><!-- /.navbar-collapse -->
          </div><!-- /.container-fluid -->
        </nav>

        <div id="loginmodal" class="modal fade" role="dialog">
  <div class="modal-dialog">

    <!-- Modal content-->
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal">&times;</button>
        <h4 class="modal-title">Login</h4>
      </div>
      <div class="modal-body">
        <form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="post">
          <div class="form-group">
            <label>Username:</label>
            <input name="username" class="form-control" id="username">
          </div>
          <div class="form-group">
            <label for="pwd">Password:</label>
            <input type="password" class="form-control" id="pwd" name="pass1">
          </div>
          
          <button type="submit" class="btn btn-primary" style="border-radius: 0px;">Login</button>
        </form>

      </div>
      <div class="modal-footer">
        <!-- <button type="button" class="btn btn-default" data-dismiss="modal">Close</button> -->
        <!-- <button type="submit" class="btn btn-primary" name="submit" style="border-radius: 0px;">Login</button> -->
      </div>
    </div>

  </div>
</div>

      <div id="registermodal" class="modal fade">
      <div class="modal-dialog">
        <div class="modal-content">
          <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal"
              aria-hidden="true">&times;</button>
            <h4 class="modal-title">Register</h4>
          </div>
          <div class="modal-body" style="margin-left: 25%;">
              <form class="form-inline" method="post" id="regForm" style="margin-left: 0%;">
              <div class="form-group" method="post" id="regForm">
                <table class="mytable">
                  <tr><td>Username:</td><td><input type="text" name="username" id="username" style="margin-bottom: 5px;"></td></tr>
                  <tr><td>First Name:</td><td><input type="text" name="fname" id="firstname" style="margin-bottom: 5px;"></td></tr>
                  <tr><td>Last Name:</td><td><input type="text" name="lname" id="lastname" style="margin-bottom: 5px;"></td></tr>
                  <tr><td>Email:</td><td><input type="text" name="email" id="email" style="margin-bottom: 5px;"></td></tr>
                  <tr><td>Password:</td><td><input type="Password" name="pass1"  id="pass1" style="margin-bottom: 5px;"></td></tr>
                  <tr><td>Confirm Password:</td><td><input type="Password" name="pass2" id="pass2" style="margin-bottom: 5px;"></td></tr>
                </table>
              </div>
            </div>
          <div class="modal-footer">
            <button type="button" class="btn btn-default" data-dismiss="modal" style="border-radius: 0px">Close</button>
            <button type="button" class="btn btn-primary" id="submit" style="border-radius: 0px;" >Register</button>
          </div>
        </div>
      </div>
    </div>

        <div class="container cont "  >
          <h2 class="h2  animated fadeIn" id="myh2" >BlogPost</h2>  
          <hr class="customhr">
          <h3 class="h3 animated fadeIn" id="startchange">Post.Comment.Share</h3>
          </div>


          
   
     <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
    <!-- Include all compiled plugins (below), or include individual files as needed -->
    <script src="assets/js/bootstrap.min.js"></script>
  </body>
</html>

<script type="text/javascript">
    $(document).ready(function() {
      $('#registermodal').on('hidden.bs.modal', function () {
    $(this).find("input,textarea,select").val('').end();

      });

      $("button#submit").click(function(event) {
        event.preventDefault();
        var username =document.getElementById('username').value;
        var fname =document.getElementById('firstname').value;
        var lname =document.getElementById('lastname').value;
        var email =document.getElementById('email').value;
        var pass =document.getElementById('pass1').value;
        var passw=document.getElementById('pass2').value;

        if(pass!=passw){
          alert('Passwords Donot Match');
        }
        else
        $.ajax({
          type : 'POST',
          url : 'ajaxregister.php',
          data : {
            username : username,
            fname : fname,
            lname : lname,
            email : email,
            pass : pass
          },
          cache : false,
          success : function(data) {
            alert(data);
            console.log(data);

          }
        });
      });
    });

  </script>
