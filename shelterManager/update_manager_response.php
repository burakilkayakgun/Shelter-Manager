<html>
<head>
	<title>Update a Shelter Manager</title>
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
			
			$sql = "UPDATE shelter_managers SET Username = '" . $_POST['username'] . "' WHERE ID = " . $_POST['ID'] ;

			if($conn->query($sql) === TRUE){
				echo "Record was updated <br />";
				echo " <a href = 'list_managers.php'> Go back </a>" ;
			}else{
				echo "Error updatig record: " . $conn->error;
			}
		}
		$conn->close();
	?>
</body>
</html>