<html>
<head>
	<title>Create an Animal</title>
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
			<form action="create_animal_response.php" method="post" >
				<p>Name: <input type="text" name="name" value="" /> </p>
				<p>Species: <input type="text" name="species" value="" /> </p>
				<p><input type="submit" value="Create Animal" /></p>
			</form>

		<?php
		}
		$conn->close();
	?>
</body>
</html>