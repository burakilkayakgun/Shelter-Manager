<!DOCTYPE html>
<html>
<head>
	<title>Delete a Shelter Manager</title>
	<style>
		table{
			padding: 
			padding-top: 100px;
		}
	</style>
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

			$sql = "DELETE FROM shelter_managers WHERE ID = " . $_POST['ID'];

			if($conn->query($sql) === TRUE){
				echo "Record deleted <br/>";
				echo " <a href = 'list_managers.php'> Go back </a>" ;
			}else{
				echo "Error :" . $conn->error;
			}


		}
		$conn->close();
	?>

</body>
</html>