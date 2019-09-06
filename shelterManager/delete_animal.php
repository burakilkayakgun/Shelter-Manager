<!DOCTYPE html>
<html>
<head>
	<title>Delete a Sponsor</title>
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

			$sql = "SELECT ID,Name,Species,CaretakerName,CaretakerSurname,SponsorName,SponsorSurname FROM animals WHERE ID = " . $_GET['id'];

			$result = $conn->query($sql);

			if($result->num_rows > 0){
				echo " <a href = 'list_animals.php'> Go back </a>" ;
				?>
				
					<?php

					$temp = $result->fetch_assoc();
					?>
					<form action="delete_animal_response.php?id=<?php echo $temp["ID"]; ?>" method="post">
					<p>ID: <input type="text" name="ID" value = "<?php echo $temp["ID"] ?>" readonly /> </p>
					<p>Name: <input type="text" name="name" value = "<?php echo $temp["Name"] ?>" readonly /> </p>
					<p>Species: <input type="text" name="species" value = "<?php echo $temp["Species"] ?>" readonly /> </p>
					<p>Caretaker Name: <input type="text" name="Cname" value = "<?php echo $temp["CaretakerName"] ?>" readonly /> </p>
					<p>Caretaker Surname: <input type="text" name="Csurname" value = "<?php echo $temp["CaretakerSurname"] ?>" readonly /> </p>
					<p>Sponsor Name: <input type="text" name="Sname" value = "<?php echo $temp["SponsorName"] ?>" readonly /> </p>
					<p>Sponsor Surname: <input type="text" name="Ssurname" value = "<?php echo $temp["SponsorSurname"] ?>" readonly /> </p>
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