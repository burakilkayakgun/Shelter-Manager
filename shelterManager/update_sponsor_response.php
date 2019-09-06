<html>
<head>
	<title>Update a Shelter Manager</title>
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
			
			$sql = "UPDATE sponsors SET Fname = '" . $_POST['Fname'] . "', Lname = '".  $_POST['Lname'] ."', Phone = '". $_POST['Phone'] ."', Animal = '" . $_POST['Animal'] ."' WHERE ID = " . $_POST['ID'] ;

			$sql_5 = "SELECT  ID,Fname,Lname,Phone,Animal FROM sponsors WHERE ID = " . $_GET['id'];

			$temp_2 = $conn->query($sql_5);
			$temp = $temp_2->fetch_assoc();

			$sql_2 = "SELECT ID,SponsorName,SponsorSurname FROM animals WHERE SponsorName = '" . $temp['Fname'] . "' AND SponsorSurname = '" . $temp['Lname'] . "' ";

			$temp_table = $conn->query($sql_2);

			if($temp_table->num_rows > 0){
				while($table_row = $temp_table->fetch_assoc()){
					$sql_3 = "UPDATE animals SET SponsorName = '" . $_POST['Fname'] . "', SponsorSurname = '". $_POST['Lname'] ."' WHERE ID = " . $table_row['ID'];
					$conn->query($sql_3);
				}
			}




			if($conn->query($sql) === TRUE){
				echo "Record was updated <br />";
				echo " <a href = 'list_sponsor.php'> Go back </a>" ;
			}else{
				echo "Error updatig record: " . $conn->error;
			}
		}
		$conn->close();
	?>
</body>
</html>