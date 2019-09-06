<html>
<head>
	<title>Create a Caretakar</title>
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
			<form action="create_caretaker_response.php" method="post" >
				<p>First Name: <input type="text" name="Fname" value="" /> </p>
				<p>Surname: <input type="text" name="Sname" value="" /> </p>
				<p><input type="submit" value="Create Manager" /></p>
			</form>

		<?php
		}
		$conn->close();
	?>
</body>
</html>