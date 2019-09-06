<?php
	$servername = "localhost";
	$username = "root";
	$password = "";
	$dbname = "sheltermanager";


	$conn = new mysqli($servername, $username, $password, $dbname);


	if ($conn->connect_error) {
		die("Connection failed: " . $conn->connect_error);
	} else{
		$id=$_POST['name'];
		$pass=$_POST['pass'];

		$sql = "SELECT Username FROM shelter_managers WHERE Username = '" . $id . "' AND Password = '" . $pass . "' ";

		$result = $conn->query($sql);

		if ($result->num_rows > 0) {
			session_start();
			$_SESSION['username'] = $id;

			header("Location:/shelterManager/homepage.php");
		}else{
			$conn->close();
			die("Wrong username or password <br/><a href = 'login.php'> Go back <br/></a>");
		}

	}


?>