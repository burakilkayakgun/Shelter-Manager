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
			
			$id=$_POST['name'];
			$pass=$_POST['pass'];

			$sql= "INSERT INTO shelter_managers(Username,Password)" .
			"VALUES ('" . $id . "', '" . $pass . "')";

			if($conn->query($sql) === TRUE){
				echo "Manager was created <a href = 'homepage.php'> Go back </a>" ;

			}else{
				echo "Error updatig manager: " . $conn->error;
			}
		}
		$conn->close();
	?>
</body>
</html>