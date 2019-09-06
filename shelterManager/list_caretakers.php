<html>
<head>
	<title>List of Caretakers</title>
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

			$sql = "SELECT  ID,Fname,Lname,Animal,NumberofAnimals FROM caretakers";

			$result = $conn->query($sql);

			if($result->num_rows >0){
				echo " <a href = 'homepage.php'> Go back </a>" ;
				?>
				<table border = 1 cellpadding="10">
					<tr>
						<th>Delete</th>
						<th>Update</th>
						<th>ID</th>
						<th>First Name</th>
						<th>Second Name</th>
						<th>Animals</th>
						<th>Number Of Animals</th>
					</tr>
				<?php

				while($row = $result->fetch_assoc()){
					?>
					<tr>
						<td> <a href="delete_caretaker.php?id=<?php echo $row["ID"]; ?>"><img src="img/delete.png" alt = "Delete"/> </a></td>
						<td> <a href="update_caretaker.php?id=<?php echo $row["ID"]; ?>"><img src="img/update.png" alt = "Update"/> </a></td>
						<td><?php echo $row["ID"]; ?></td>
						<td><?php echo $row["Fname"]; ?></td>
						<td><?php echo $row["Lname"]; ?></td>
						<td><?php echo $row["Animal"]; ?></td>
						<td><?php echo $row["NumberofAnimals"]; ?></td>

					</tr>
					<?php
				}
				?>
				</table>
				<?php
			}else{
				echo " <a href = 'homepage.php'> Go back </a>" ;
				echo "<br>";
				echo "0 Result";
			}
		}
		$conn->close();
	?>

</body>
</html>