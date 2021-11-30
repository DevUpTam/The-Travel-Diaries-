<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>The Travel Diaries</title>\
	<link href="https://fonts.googleapis.com/css2?family=Shalimar&display=swap" rel="stylesheet">		<!-- Embedding fonts from the web -->
	<link href="https://fonts.googleapis.com/css2?family=Petemoss&display=swap" rel="stylesheet">
	<link rel="stylesheet" type="text/css" href="SignUpStyles.css">
	<style>
		body 
		{

 		background-image: url('andrew-ly-KZ0SZ2fEd20-unsplashEdit.jpg');
  		background-repeat: no-repeat;
  		background-attachment: fixed;
  		background-size: cover;
		}
		
	</style>
</head>
<body>
	<form method="POST" action="#">




	<div>

	    <h1 style="color: ghostwhite;font-size: 60px;font-family: 'Shalimar',cursive;font-size: 90px;text-align: center;font-family: 'Shalimar',cursive;font-weight: 200;">Sign Up</h1>
	    <p style="color: ghostwhite; font-size: 35px;font-family: 'Shalimar',cursive; text-align: center;">Please fill in this form to create an account.</p>
	    <hr style="width:75%">

	    <div class="container">

		    <label for="user_name" style="color: ghostwhite; font-size: 40px;font-family: 'Shalimar',cursive;"><b>Username</b></label>
		    <br>
		    <input type="text" placeholder="Enter Username" name="user_name" required>
		    <br>

		    <label for="user_password" style="color: ghostwhite;font-size: 40px;font-family: 'Shalimar',cursive;"><b>Password</b></label>
		    <br>
		    <input type="password" placeholder="Enter Password" name="user_password" required>



		    <p style="color: ghostwhite;font-family: 'Shalimar',cursive;font-size: 30px;">By creating an account you agree to our <a href="#" style="color:goldenrod;">Terms & Privacy</a>.</p>

		    <div class="clearfix">
		      <button type="submit" class="signupbtn" name="form_submit">Sign Up</button>
		    </div>

		</div>
    </div>

	</form>

	<?php


		if(isset($_POST['form_submit']))			//Ensures that connection is made only when user submitys the form 
		{
			$servername = "localhost";
			$username = "root";
			$password = "";
			$dbname = "the_travel_diaries";
			$userName = $_POST['user_name'];
			$userPassword = $_POST['user_password'];

			// Create connection
			$conn = new mysqli($servername, $username, $password, $dbname);


			// Check connection
			if ($conn->connect_error) 
			{
			  die("Connection failed: " . $conn->connect_error);
			}

			$sql = "INSERT INTO registered_users (user_name, user_password)
			VALUES ('$userName','$userPassword')";

			if ($conn->query($sql) === TRUE) 
			{
			  echo "<h3>"."New record created successfully"."</h3>"."<br><br>";					//This can contain HTML Markup	
			}					 
			else 
			{
			  echo "Error: " . $sql . "<br>" . $conn->error;
			}

		}

		else
		{
			echo 'Not Submitted';
		}

		
	?>
	
</body>
</html>