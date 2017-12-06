<?php 
	require "connections.php";

	$msg = '';
	$sample = '';

	if(isset($_POST["username"]))
	{
		$username=$_POST['username'];
		$firstname = $_POST['fname'];
		$lastname = $_POST['lname'];
		$email = $_POST['email'];
		$pass1=$_POST['pass'];
	
		$username = mysqli_real_escape_string($db, $username);
		$firstname = mysqli_real_escape_string($db, $firstname);
		$lastname = mysqli_real_escape_string($db, $lastname);
		$email = mysqli_real_escape_string($db, $email);
		$password = md5($pass1);

	 	$sql="SELECT email FROM users WHERE email='$email'";
		$result=mysqli_query($db,$sql);
		$row=mysqli_fetch_array($result,MYSQLI_ASSOC);

		if(mysqli_num_rows($result) == 1)
		{
			$msg = "Sorry...This email already exist...";
			echo $msg;
			/*echo "<script>alert("Sorry...This email already exist...")</script>";*/
		}

		else
		{
			$query = mysqli_query($db, "INSERT INTO users (username, firstname, lastname,email,password) VALUES ('$username', '$firstname', '$lastname','$email','$password')");
			
			/*echo json_encode(array('status' => 'ok'));*/
			/*if($query)
			{*/
				$msg = "Thank You! you are now registered.";
				echo "Registered";
				/*echo "<script>alert("Registered")</script>";*/

			/*}*/
		}
	}
?>
