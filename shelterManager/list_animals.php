<html>
<head>
	<title>List of Animals</title>
	<style>
		table{
			padding: 
			border = 2;
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

			$sql = "SELECT  ID,Name,Species,CaretakerName,CaretakerSurname
			,SponsorName,SponsorSurname FROM animals";

			$result = $conn->query($sql);

			if($result->num_rows >0){
				echo " <a href = 'homepage.php'> Go back </a>" ;
				?>
				<table border = 1 cellpadding="10">
					<tr>
						<th>Delete</th>
						<th>Update</th>
						<th>ID</th>
						<th>Name</th>
						<th>Species</th>
						<th>Caretaker Name</th>
						<th>Caretaker Surname</th>
						<th>Sponsor Name</th>
						<th>Sponsor Surname</th>
					</tr>
				<?php

				while($row = $result->fetch_assoc()){
					?>
					<tr>
						<td> <a href="delete_animal.php?id=<?php echo $row["ID"]; ?>"><img src="img/delete.png" alt = "Delete"/> </a></td>
						<td> <a href="update_animal.php?id=<?php echo $row["ID"]; ?>"><img src="img/update.png" alt = "Update"/> </a></td>
						<td><?php echo $row["ID"]; ?></td>
						<td><?php echo $row["Name"]; ?></td>
						<td><?php echo $row["Species"]; ?></td>
						<td><?php echo $row["CaretakerName"]; ?></td>
						<td><?php echo $row["CaretakerSurname"]; ?></td>
						<td><?php echo $row["SponsorName"]; ?></td>
						<td><?php echo $row["SponsorSurname"]; ?></td>
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