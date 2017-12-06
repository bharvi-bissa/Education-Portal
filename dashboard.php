<?php
    session_start();
    $firstname="";
   require "connections.php";
    $row="";
    //selecting full row of members where userame ="Session variable name"
    $sql = "SELECT * FROM members WHERE username = '" . $_SESSION['user_session'] . "'";
    $result = mysqli_query($db,$sql);
    //$row = mysqli_fetch_array($result,MYSQLI_ASSOC);

    if(!(isset($_SESSION['user_session']))){
    //mysqli_close($connection); // Closing Connection
    header('Location: index.php'); // Redirecting To Home Page
    }

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <title>Welcome</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- <link rel="stylesheet" href="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.4/css/bootstrap.min.css"> -->
    <!-- <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script> -->
    <!-- <script src="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.4/js/bootstrap.min.js"></script> -->
    <link href="assets/css/bootstrap.min.css" rel="stylesheet">
    <link href="assets/css/dashboard.css" rel="stylesheet">
    <link rel="assets/css/font-awesome.min.css" rel="stylesheet">

</head>
<body>

    <div id="wrapper">

        <!-- Sidebar -->
        <div id="sidebar-wrapper">
            <ul class="sidebar-nav">
                <li style="margin-top: 20px;"><img src="assets/img/avatar.jpg" class="img-circle customimg" alt="profile-image" width="190" height="190"></li>
                <li><a href=""><?php echo "Welcome," ." " . $_SESSION['user_session']; ?></a></li>
                <li><a href="#">Account</a></li>
                <li><a href="logout.php">Logout</a></li>
            </ul>
        </div>

        <!-- Page content -->
        <div id="page-content-wrapper">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-sm-4">
                        <a href="#" class="btn btn-success" id="menu-toggle" style="border-radius: 0px;background-color: #004d80;">Menu</a>
                    </div>
                    <div class="col-sm-4">
                        <h2 style="margin-left: 20%;margin-top: 0%;"><?php echo "Welcome," ." " . $_SESSION['user_session']; ?></h2>      
                    </div>
                    
                </div>
            </div>
        </div>

    </div>

    <!-- Menu toggle script -->
    <!-- <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script> -->
    <script src="assets/js/jquery-3.1.0.min.js"></script>
    <!-- Include all compiled plugins (below), or include individual files as needed -->
    <script src="assets/js/bootstrap.min.js"></script>
    <script>
        $("#menu-toggle").click( function (e){
            e.preventDefault();
            $("#wrapper").toggleClass("menuDisplayed");
        });
    </script>

</body>
</html>
