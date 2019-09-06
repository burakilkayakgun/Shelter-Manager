<!DOCTYPE html>
<html>
<head>
	<title>Delete a Shelter Manager</title>
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

			$choose_animal = "SELECT ID,Name,Species,CaretakerName,CaretakerSurname,SponsorName,SponsorSurname FROM animals WHERE SponsorName IS NULL ORDER BY ID ASC LIMIT 1";

			$choose = $conn->query($choose_animal);
			$system_animal = $choose->fetch_assoc();

			$sql_4 = " SELECT ID,Name,Species,CaretakerName,CaretakerSurname,SponsorName,SponsorSurname FROM animals WHERE Name = '" . $system_animal['Name'] . "' AND Species = '".  $system_animal['Species'] . "' ";
			$result = $conn->query($sql_4);

			if( $result->num_rows >0){
				$sql = "DELETE FROM animals WHERE ID = " . $_POST['ID'];

				$sql_2 = " UPDATE animals SET SponsorName = '". $_POST['Sname'] ."', SponsorSurname = '". $_POST['Ssurname'] . "' WHERE ID =". $system_animal['ID'];

				$sql_3 = " UPDATE sponsors SET Animal = '". $system_animal['Name'] ."' WHERE Fname = '". $_POST['Sname'] ."' AND Lname = '". $_POST['Ssurname'] . "' ";



				$temp = "SELECT ID,Fname,Lname,Animal,NumberOfAnimals FROM caretakers WHERE Fname = '" . $_POST['Cname'] . "' AND Lname = '" . $_POST['Csurname'] . "' ";

				$temp_res = $conn->query($temp);

				while($temp_caretaker = $temp_res->fetch_assoc()){
						$sql_7 = " UPDATE caretakers SET NumberOfAnimals = " . $temp_caretaker['NumberOfAnimals'] . "-1 WHERE ID = " .$temp_caretaker["ID"] ; 
						$conn->query($sql_7);
					}

				$conn->query($sql_2);
				$conn->query($sql_3);

				if($conn->query($sql) === TRUE){
					echo "Record deleted <br/>";
					echo " <a href = 'list_animals.php'> Go back </a>" ;
				}else{
					echo "Error :" . $conn->error;
				}

			}else{
				echo "There is not a caretaker like " . $system_animal['Name'] . " " . $system_animal['Species'] .".<br/>" ;
				echo " <a href = 'delete_animal.php'> Try again <br/> </a>" ;
				echo " <a href = 'homepage.php'> Go Home page </a>" ;
			}
		}
		$conn->close();
	?>

</body>
</html>