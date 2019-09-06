<html>
<head>
	<title>List of Caretaker in ASC</title>
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

			$sql = "SELECT  ID,Fname,Lname,Animal,NumberofAnimals FROM caretakers ORDER BY NumberOfAnimals ASC ";

			$result = $conn->query($sql);

			if($result->num_rows >0){
				echo " <a href = 'homepage.php'> Go back </a>" ;
				?>
				<table border = 1 cellpadding="10">
					<tr>
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
				echo " <a href = 'homepage.php'> Go back <br/></a>" ;
				echo "0 Result";
			}
		}
		$conn->close();
	?>

</body>
</html>