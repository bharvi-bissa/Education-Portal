<?php
	session_start();
	define('DB_SERVER', '127.0.0.1');
	define('DB_USERNAME', 'root');
	define('DB_PASSWORD', '');
	define('DB_DATABASE', 'eduportal');
	$uname="";
	$db = @mysqli_connect(DB_SERVER,DB_USERNAME,DB_PASSWORD,DB_DATABASE) or die(mysqli_error());
	
	$uname=$_SESSION['user_session'];
	$course="css";
	
	
	

	if (isset($_POST['done'])){
		
			$mycomment=mysqli_escape_string($db,$_POST['review_text']);
			
			mysqli_query($db,"INSERT INTO reviews (r_author,r_course,r_review) values ('$uname','$course','$mycomment')");
			
			exit();
			
	}


	if(isset($_POST['display'])){
		
		$result=mysqli_query($db,"SELECT * FROM reviews WHERE r_course='$course'");
		

		while($row=mysqli_fetch_array($result,MYSQLI_ASSOC)){
			?>
			<div id="comment_box" style="border:1px solid #d6d6c2;box-shadow:10px 10px 5px #888888" >
				<p style="margin-top: 1%;margin-left: 0.5%;"><strong><?php echo $row['r_author']; ?></strong></p>
				<p style="    margin-top: 1%; margin-left: 0.5%;"><?php echo $row['r_review']; ?></p>
				<br>
				
				<br>
			</div>
			<br>
				<?php
		}
		exit();
	}
?>
