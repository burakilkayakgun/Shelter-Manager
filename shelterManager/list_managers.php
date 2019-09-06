<html>
<head>
	<title>List of Shelter Managers</title>
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

			$sql = "SELECT  ID,Username FROM shelter_managers";

			$result = $conn->query($sql);

			if($result->num_rows >0){
				echo " <a href = 'homepage.php'> Go back </a>" ;
				?>
				<table border = 1 cellpadding="10">
					<tr>
						<th>Delete</th>
						<th>Update</th>
						<th>ID</th>
						<th>Username</th>
					</tr>
				<?php

				while($row = $result->fetch_assoc()){
					?>
					<tr>
						<td> <a href="delete_manager.php?id=<?php echo $row["ID"]; ?>"><img src="img/delete.png" alt = "Delete"/> </a></td>
						<td> <a href="update_manager.php?id=<?php echo $row["ID"]; ?>"><img src="img/update.png" alt = "Update"/> </a></td>
						<td><?php echo $row["ID"]; ?></td>
						<td><?php echo $row["Username"]; ?></td>

					</tr>
					<?php
				}
				?>
				</table>
				<?php
			}else{
				echo "0 Result";
			}
		}
		$conn->close();
	?>

</body>
</html>