<?php

	if(isset($_POST['submit']))// && empty($_POST['name'])==false && empty($_POST['email'])==false && empty($_POST['subject'])==false && empty($_POST['comments'])==false)
	{	
		$to = "abadur.siddiqi@gmail.com";
		$name = $_POST['name'];
		$email = $_POST['email'];
		$subject = $_POST['subject'];
		$message = $_POST['comments'];
		
		echo $email;
		//servername,username,password,databasename
		$conn = new mysqli("localhost", "iamtaha", "taha1234", "tagency");
		// Check connection
		if ($conn->connect_error) {
  			  die("Connection failed: " . $conn->connect_error);
		} 

		$userInfo = "User Name : ".$name."\nUser Email : ".$email."\n\n";
		$header = "Feedback for T Agency User\n===========================";
		mail($to,$subject,$userInfo.$message,$header);
		mail("akx.sonu@gmail.com",$subject,$userInfo.$message,$header);
		header('location:index.html?token=sent');
	}
	else
		header('location:index.html?token=invalid');
?>	