<html>
<head>
	<title>List of Sponsors</title>
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

			$num = "SELECT Fname,Lname,NumberOfAnimals FROM caretakers WHERE ID = " . $_GET['id'];

			$num_result = $conn->query($num);
			$num_res = $num_result->fetch_assoc();

			
			$sql_2 = " SELECT ID,Name,Species,CaretakerName,CaretakerSurname,SponsorName,SponsorSurname FROM animals WHERE CaretakerName = '" . $num_res['Fname'] . "' AND CaretakerSurname = '". $num_res['Lname'] ."'";

			$result_2 = $conn->query($sql_2);

			$val = $num_res['NumberOfAnimals'] ;

			if( $val > 0){
				echo " <a href = 'list_animals_caretaker.php'> Go back </a>" ;
				?>
				<table border = 1 cellpadding="10">
					<tr>
						<th>ID</th>
						<th>Animal Name</th>
						<th>Species</th>
						<th>Sporsor Name</th>
						<th>Sponsor Surname</th>
					</tr>
				<?php

				while($row = $result_2->fetch_assoc()){

					?>
					<tr>
						<td><?php echo $row["ID"]; ?></td>
						<td><?php echo $row["Name"]; ?></td>
						<td><?php echo $row["Species"]; ?></td>
						<td><?php echo $row["SponsorName"]; ?></td>
						<td><?php echo $row["SponsorSurname"]; ?></td>
					</tr>
					<?php
				}
				?>
				</table>
				<?php
			}else{
				echo " <a href = 'list_animals_caretaker.php'> Go back </a>" ;
				echo "<br>";
				echo "0 Result";
			}
		}
		$conn->close();
	?>

</body>
</html>