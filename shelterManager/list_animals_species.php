<html>
	<head>
		<title>Search Species</title>
	</head>
	<body>
		<?php
		echo " <a href = 'homepage.php'> Go back <br/></a>" ;
		?>
		<form action="list_animals_species_response.php" method="POST">
		<p>Species: <input type= "text" name="species" /></p>
		<p><input type="submit" value="Search" /></p>
		</form>
	</body>
</html>