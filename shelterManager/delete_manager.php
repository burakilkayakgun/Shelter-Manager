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

			$sql = "SELECT  ID,Username FROM shelter_managers WHERE ID = " . $_GET['id'];

			$result = $conn->query($sql);

			if($result->num_rows > 0){
				echo " <a href = 'list_managers.php'> Go back </a>" ;
				?>
				<form action="delete_manager_response.php" method="post">
					<?php

					$temp = $result->fetch_assoc();
					?>
					<p>ID: <input type="text" name="ID" value = "<?php echo $temp["ID"] ?>" readonly /> </p>
					<p>Username: <input type="text" name="username" value = "<?php echo $temp["Username"] ?>" readonly /> </p>
					<p><input type="submit" value="Delete"  />  </p>
				</form>
				<?php
			}else{
				echo "Record does not exist";
			}

		}
		$conn->close();
	?>

</body>
</html>