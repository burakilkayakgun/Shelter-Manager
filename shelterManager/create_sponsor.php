<html>
<head>
	<title>Create a Sponsor</title>
</head>
<body>
	<?php
		$servername = "localhost";
		$username = "root";
		$password = "";
		$dbname = "sheltermanager";


		$conn = new mysqli($servername, $username, $password, $dbname);

		if ($conn->connect_error) {
			die("Connection failed: " . $conn->connect_error);
		}else{
			echo " <a href = 'homepage.php'> Go back </a>" ;
		?>
			<form action="create_sponsor_response.php" method="post" >
				<p>Name: <input type="text" name="name" value="" /> </p>
				<p>Surname: <input type="text" name="surname" value="" /> </p>
				<p>Phone: <input type="text" name="phone" value="" /></p>
				<p><input type="submit" value="Create Sponsor" /></p>
			</form>

		<?php
		}
		$conn->close();
	?>
</body>
</html>