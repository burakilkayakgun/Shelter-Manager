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
			
			$Name=$_POST['name'];
			$Surname=$_POST['surname'];
			$Phone=$_POST['phone'];

			$old_animal = "SELECT ID,Name FROM animals WHERE SponsorName IS NULL AND SponsorSurname IS NULL ORDER BY ID ASC LIMIT 1";

			$old_anim = $conn->query($old_animal);

			$system_old_animal= $old_anim->fetch_assoc() ;

			$sql= "INSERT INTO sponsors(Fname,Lname,Phone,Animal)" .
			"VALUES ('" . $Name . "', '" . $Surname . "', '" . $Phone . "', '" . $system_old_animal['Name'] . "')";

			$update_animal = " UPDATE animals SET SponsorName = '" . $Name . "',SponsorSurname = '" . $Surname . "'  WHERE ID = " . $system_old_animal['ID'] ;
			$conn->query($update_animal);

			if($conn->query($sql) === TRUE){
				echo "Sponsor was created <a href = 'homepage.php'> Go back </a>" ;

			}else{
				echo "Error updatig manager: " . $conn->error;
			}
		}
		$conn->close();
	?>
</body>
</html>