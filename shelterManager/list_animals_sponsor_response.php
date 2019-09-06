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

			$sql = "SELECT Animal FROM sponsors WHERE ID = " . $_GET['id'];

			$result = $conn->query($sql);

			if($result->num_rows >0){
				echo " <a href = 'list_animals_sponsor.php'> Go back </a>" ;
				?>
				<table border = 1 cellpadding="10">
					<tr>
						<th>Animal Name</th>
					</tr>
				<?php

				while($row = $result->fetch_assoc()){
					?>
					<tr>
						<td><?php echo $row["Animal"]; ?></td>
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