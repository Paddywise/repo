<!doctype html>

<html>

	<head>
		<meta charset="utf-8">
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<script src="https://kit.fontawesome.com/c732a4fc0b.js" crossorigin="anonymous"></script>
		<script	src="JavaScript/javascript.js"></script>
	
		<title>Homepage | paWe</title>
		
		<link rel="stylesheet" href="CSS/style.css" type="text/css">
		<link href="https://fonts.googleapis.com/css2?family=Piazzolla:wght@500&display=swap" rel="stylesheet">
	</head>
	
	<body>
		<!------------- HEADER ------------->
		<header>
			<div id="logo">
				<a href="#home"><img src="Bilder/logo.png" alt="logo" height="61" width="109"></a>
			</div>
			
			<!------------- NAVIGATION ------------->
			<nav id="navi">
				<i class="fas fa-bars"></i>
				<ul>
					<a href="#home"><li>Home</li></a>
					<a href="#project1"><li>Project v1.0</li></a>
					<a href="#project2"><li>Project v2.0</li></a>
					<a href="#"><li>leer</li></a>
				</ul>
			</nav>
		</header>
		
		
		<!------------- HOME ------------->
		<section id="home">
			<hr>
			<h1>Home</h1>
			<hr>
			<p>Herzlich Willkommen</p>
			<p>Diese Website dient zu Testzwecken für Backend-Programmierung</p>
		</section>
		
		
		<!------------- PROJECT1 ------------->
		<section id="project1">
			<h2>Project v1.0</h2>
			<hr>

			
			<form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post">
				<input class="p1" type="text" tabindex="1" placeholder="Name" name="lastname"/><br>
				<input class="p1" type="text" tabindex="2" placeholder="Vorname" name="firstname"/><br>
				<input class="button" type="submit" value="Speichern"/>
			</form>
			
			<?php
				$servername = "localhost";
				$user = "Besucher";
				$pw = $error = $lastname = $firstname = "";
				$db = "db";
				$connect = new mysqli($servername, $user, $pw, $db);
				
				if($connect->connect_error) {
					die("Verbindung fehlgeschlagen ".$connect->connect_error);
				}
				else {
					if($_SERVER["REQUEST_METHOD"] == "POST") {
						if(empty(security($_POST["lastname"])) and empty(security($_POST["firstname"]))) {
							$error = "Bitte mindestens ein Feld ausfüllen";
						}
						else {
							$lastname = security($_POST["lastname"]);
							$firstname = security($_POST["firstname"]);
							$sql = "INSERT INTO namen (Name, Vorname) VALUES ('$_POST[lastname]', '$_POST[firstname]')";
							if($connect->query($sql) === TRUE) {
								echo "Datensatz gespeichert<br>";
								$_POST["lastname"] = "";
								$_POST["firstname"] = "";
							}
							else {
								echo "Fehler: ".$connect->error;
							}
						}
					}
					
				}
				
				$sql_s = "SELECT * FROM namen ORDER BY ID";
				$res = $connect->query($sql_s);
				
				if($res->num_rows > 0) {
					while($i = $res->fetch_assoc()) {
						echo "<br><br>ID: ".$i["ID"]."<br>Name: ".$i["Name"]."<br>Vorname: ".$i["Vorname"];
					}
				}


				function security($data) {
					$data = trim($data);
					$data = stripslashes($data);
					$data = htmlspecialchars($data);
					return $data;
				}
				//echo htmlspecialchars($_SERVER["PHP_SELF"]);
				
				echo $error;
				
				$connect->close();
			?>

		</section>
		
			
		<!------------- PROJECT2 ------------->
		<section id="project2">
			<h2>Project v2.0</h2>
			<hr>
		</section>
		
		
		<!------------- FOOTER ------------->
		<footer>
			<p>&copy; by paWe</p>
		</footer>
		
		
	</body>
</html>