<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Featured Diary</title>

	<link href="https://fonts.googleapis.com/css2?family=Shalimar&display=swap" rel="stylesheet">		<!-- Embedding fonts from the web -->
	<link href="https://fonts.googleapis.com/css2?family=Petemoss&display=swap" rel="stylesheet">

	<link rel="stylesheet" type="text/css" href="Authors_styles.css">
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
	<h1>Authors</h1>
	<div style="color: ghostwhite;">
		<?php
			$servername = "localhost";
			$username = "root";
			$password = "";
			$dbname = "the_travel_diaries";
			

			// Create connection
			$conn = new mysqli($servername, $username, $password, $dbname);


			// Check connection
			if ($conn->connect_error) 
			{
				 die("Connection failed: " . $conn->connect_error);
			}

			$sql = "SELECT author_name FROM registered_users";
			
			$result = $conn->query($sql);

			if ($result!=false && $result->num_rows > 0)
			{
				//Output Each Value
				while($row = $result->fetch_assoc())		//fetch association is basically fetching one row at a time
				{
					echo "<h3>".$row["author_name"]."</h3>"."<br>";		//$row[]is the way to access individual row elements
				}
			}
		?>	


	</div>
</body>
</html>