<?php

	if(isset($_POST['submit']) && empty($_POST['email2'])==false)
	{	
		$email = $_POST['email2'];
		
		
		//servername,username,password,databasename
		$conn = new mysqli("localhost", "iamtaha", "taha1234", "tagency");
		// Check connection
		if ($conn->connect_error) {
  			  die("Connection failed: " . $conn->connect_error);
		} 


		if (filter_var($email, FILTER_VALIDATE_EMAIL)==false) {
		  header('location:index.html?token=invalid');
		}
		else
		{
			
			$sql="SELECT email FROM subscribe";
			$result = $conn->query($sql);
			if ($result->num_rows > 0) 
			{
				header('location:index.html?token=duplicate');
			}	
			else
			
			{
				
				$sql = "INSERT INTO subscribe(email) VALUES ('".$email."')";

				if ($conn->query($sql) === TRUE) {
					mail($email,"T Agency : Subscription","You have subscribe T Agency for receiving latest news and updates. You will frequently receive mails form us to keep you in touch.\n\nThank You,\nBest Regards,T Agency.\n\nEmail : info@tagency.in\nContact:+91 9874386374");
					header('location:index.html?token=success');
					
				} else {
					header('location:index.html');
				}
			}
			$conn->close();
		}
	}
	else
		header('location:index.html?token=invalid');
?>	