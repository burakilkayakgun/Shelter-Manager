<html>
<head>
	<title>Create a Caretaker</title>
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
			
			$Fname=$_POST['Fname'];
			$Sname=$_POST['Sname'];

			$sql= "INSERT INTO caretakers(Fname,Lname)" .
			"VALUES ('" . $Fname . "', '" . $Sname ."')";

			if($conn->query($sql) === TRUE){
				echo "Caretaker was created <a href = 'homepage.php'> Go back </a>" ;

			}else{
				echo "Error updatig manager: " . $conn->error;
			}
		}
		$conn->close();
	?>
</body>
</html>