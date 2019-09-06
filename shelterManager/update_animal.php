<!DOCTYPE html>
<html>
<head>
	<title>Update a Animal</title>
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

			$sql = "SELECT ID,Name,Species,CaretakerName,CaretakerSurname FROM animals WHERE ID = " . $_GET['id'];

			$result = $conn->query($sql);

			if($result->num_rows > 0){
				echo " <a href = 'list_animals.php'> Go back </a>" ;
				?>
				
					<?php

					$temp = $result->fetch_assoc();
					?>
				<form action="update_animal_response.php?id=<?php echo $temp["ID"]; ?>" method="post">
					<p>ID: <input type="text" name="ID" value = "<?php echo $temp["ID"] ?>" readonly /> </p>
					<p>Name: <input type="text" name="name" value = "<?php echo $temp["Name"] ?>" /> </p>
					<p>Species: <input type="text" name="species" value = "<?php echo $temp["Species"] ?>" /> </p>
					<p>Caretaker Name: <input type="text" name="Cname" value = "<?php echo $temp["CaretakerName"] ?>" /> </p>
					<p>Caretaker Surname: <input type="text" name="Csurname" value = "<?php echo $temp["CaretakerSurname"] ?>" /> </p>
					<p><input type="submit" value="Update"  />  </p>
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