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

		    <br>
		    <label for="author_name" style="color: ghostwhite;font-size: 40px;font-family: 'Shalimar',cursive;"><b>Enter your name</b></label>
		    <br>
		    <input type="text" placeholder="Enter Name" name="author_name" required>


		    
		    <div class="clearfix">
		      <button type="submit" class="signupbtn" name="form_submit">Submit</button>
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
			$authorName = $_POST['author_name'];

			// Create connection
			$conn = new mysqli($servername, $username, $password, $dbname);


			// Check connection
			if ($conn->connect_error) 
			{
			  die("Connection failed: " . $conn->connect_error);
			}

			//Searching for the particular username in the database
			$sql1 = "SELECT user_name, user_password FROM registered_users";
			$result1 = $conn->query($sql1);

			if ($result1!=false && $result1->num_rows > 0)
			{
				
				while($row = $result1->fetch_assoc())		//fetch association is basically fetching one row at a time
				{
					if($row["user_name"]===$userName)			//$row[]is the way to access individual row elements
					{
						if($row["user_password"]===$userPassword)
						{
							//Updating or adding a value to the same
							$sql2 = "UPDATE registered_users SET author_name = '$authorName' WHERE user_name = '$userName'";
							

							if($conn->query($sql2) === TRUE)
								echo "<h3>"."Update Successful"."</h3>";
							else
								echo "<h3>"."Update Unsuccessful"."</h3>";
						}

					}		
				}
			}



		}

	?>
	
</body>
</html>