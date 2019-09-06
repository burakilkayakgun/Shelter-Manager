<html>
<head>
	<title>Create a Animal</title>
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
			
			$choose_caretaker = "SELECT  ID,Fname,Lname,Animal,NumberofAnimals FROM caretakers ORDER BY NumberOfAnimals ASC LIMIT 1";

			$choose = $conn->query($choose_caretaker);

			$system_caretaker = $choose->fetch_assoc();

			$Name=$_POST['name'];
			$Species=$_POST['species'];
			
	
			$sql_2 = "SELECT ID,Fname,Lname,Animal,NumberOfAnimals FROM caretakers WHERE Fname = '" . $system_caretaker['Fname'] . "' AND Lname = '" . $system_caretaker['Lname'] . "' ";
			$result =  $conn->query($sql_2);

			

			if( $result->num_rows >0){
				
					// add new animal 
					$sql= "INSERT INTO animals(Name,Species,CaretakerName,CaretakerSurname)" .
					  "VALUES ('" . $Name . "', '" . $Species . "', '" . $system_caretaker['Fname'] . "', '" . $system_caretaker['Lname'] . "')";

					// update the caretakers number of animals 
					while($temp_caretaker = $result->fetch_assoc()){
						$sql_3 = " UPDATE caretakers SET NumberOfAnimals = " . $temp_caretaker['NumberOfAnimals'] . "+1 WHERE ID = " .$temp_caretaker["ID"] ; 
						$conn->query($sql_3);
					}


					if($conn->query($sql) === TRUE){
						echo "Animal was created <a href = 'homepage.php'> Go back </a>" ;
					}else{
						echo "Error updatig manager: " . $conn->error;
					}
								
			}else{
				echo "There is not a caretaker like " . $system_caretaker['Fname'] . " " . $system_caretaker['Lname'] .".<br/>" ;
				echo " <a href = 'create_animal.php'> Try again <br/> </a>" ;
				echo " <a href = 'homepage.php'> Go Home page </a>" ;
			}
		}
		$conn->close();
	?>
</body>
</html>