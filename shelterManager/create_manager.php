<html>
<head>
	<title>Create a Manager</title>
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
			<form action="create_manager_response.php" method="post" >
				<p>Username: <input type="text" name="name" value="" /> </p>
				<p>Password: <input type="password" name="pass" value="" /> </p>
				<p><input type="submit" value="Create Manager" /></p>
			</form>

		<?php
		}
		$conn->close();
	?>
</body>
</html>