<!DOCTYPE html>
<html>
<head>
	<title>Delete a Caretaker</title>
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

			$sql = "SELECT  ID,Fname,Lname,NumberOfAnimals FROM caretakers WHERE ID = " . $_GET['id'];

			$result = $conn->query($sql);

			if($result->num_rows > 0){
				echo " <a href = 'list_caretakers.php'> Go back </a>" ;
				?>
				
					<?php

					$temp = $result->fetch_assoc();
					?>
				<form action="delete_caretaker_response.php?id=<?php echo $temp["ID"]; ?>" method="post">
					<p>ID: <input type="text" name="ID" value = "<?php echo $temp["ID"] ?>" readonly /> </p>
					<p>First Name: <input type="text" name="Fname" value = "<?php echo $temp["Fname"] ?>" readonly /> </p>
					<p>Surname: <input type="text" name="Lname" value = "<?php echo $temp["Lname"] ?>" readonly /> </p>
					<p>Number of Animals: <input type="text" name="number" value = "<?php echo $temp["NumberOfAnimals"] ?>" readonly /> </p>
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