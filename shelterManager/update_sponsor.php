<!DOCTYPE html>
<html>
<head>
	<title>Update a Sponsor</title>
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

			$sql = "SELECT ID,Fname,Lname,Phone,Animal FROM sponsors WHERE ID = " . $_GET['id'];

			$result = $conn->query($sql);

			if($result->num_rows > 0){
				echo " <a href = 'list_sponsor.php'> Go back </a>" ;
				?>
				
					<?php

					$temp = $result->fetch_assoc();
					?>
					<form action="update_sponsor_response.php?id=<?php echo $temp["ID"]; ?>" method="post">
					<p>ID: <input type="text" name="ID" value = "<?php echo $temp["ID"] ?>" readonly /> </p>
					<p>First Name: <input type="text" name="Fname" value = "<?php echo $temp["Fname"] ?>" /> </p>
					<p>Surname: <input type="text" name="Lname" value = "<?php echo $temp["Lname"] ?>" /> </p>
					<p>Phone: <input type="text" name="Phone" value = "<?php echo $temp["Phone"] ?>" /> </p>
					<p>Animal: <input type="text" name="Animal" value = "<?php echo $temp["Animal"] ?>" /> </p>
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