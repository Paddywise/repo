<!doctype html>

<html>

	<head>
		<meta charset="utf-8">
		<meta name="viewport" content="width=device-width, initial-scale=1">

		<link href="css/bootstrap.css" rel="stylesheet">
		<link href="css/style.css" rel="stylesheet" type="text/css">

		<script src="js/bootstrap.bundle.min.js"></script>

		<title>Homepage | paWe</title>
	</head>

	<body>
		<header>
			<!-- NAVIGATION ------------->
			<nav class="navbar navbar-expand-lg navbar-light bg-light">
			  <div class="container-fluid">
					<a class="navbar-brand" href="#">
						<img class="d-inline-block align-top" src="Bilder/logo.png" alt="logo" height="61" width="109">
					</a>
			    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
			      <span class="navbar-toggler-icon"></span>
			    </button>
			    <div class="collapse navbar-collapse" id="navbarSupportedContent">
			      <ul class="navbar-nav me-auto mb-2 mb-lg-0">
			        <li class="nav-item">
			          <a class="nav-link" aria-current="page" href="#home">Home</a>
			        </li>
			        <li class="nav-item">
			          <a class="nav-link" href="#project1">Project v1.0</a>
			        </li>
			        <li class="nav-item">
			          <a class="nav-link" href="#project2" aria-disabled="false">Project v2.0</a>
			        </li>
							<li class="nav-item">
			          <a class="nav-link disabled" href="#project2" tabindex="-1" aria-disabled="true">leer</a>
			        </li>
			      </ul>
						<!--
			      <form class="d-flex">
			        <input class="form-control me-2" type="search" placeholder="Search" aria-label="Search">
			        <button class="btn btn-outline-success" type="submit">Search</button>
			      </form>
						-->
			    </div>
			  </div>
			</nav>
		</header>

		<!-- HOME ------------->
		<section id="home" class="section-padding text-center py-5">
			<div class="container-fluid py-2">
				<h1 class="display-1">Home</h1>
				<hr>
			</div>
			<div class="container bg-dark bg-gradient text-white rounded py-5">
				<p class="lead">Herzlich Willkommen</p>
				<p class="lead">Diese Website dient zu Testzwecken für Backend-Programmierung</p>
			</div>
		</section>


		<!-- PROJECT1 ------------->
		<section id="project1" class="text-center py-5">
			<h2 class="display-2">Project v1.0</h2>
			<hr>

			<div class="container">
				<form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post">
					<div class="form-floating mb-3">
						<input type="text" class="form-control" id="floatingName" tabindex="1" placeholder="Nachname" name="lastname">
						<label for="floatingName">Nachname</label>
					</div>
					<div class="form-floating mb-3">
						<input type="text" class="form-control" id="floatingVorname" tabindex="2" placeholder="Vorname" name="firstname">
						<label for="floatingVorname">Vorname</label>
					</div>
					<input class="button btn btn-primary" type="submit" value="Speichern"/>
				</form>
			</div>

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


		<!-- PROJECT2 ------------->
		<section id="project2" class="text-center py-5">
			<h2 class="display-2">Project v2.0</h2>
			<hr>
		</section>


		<!-- FOOTER ------------->
		<footer class="container-fluid text-center bg-secondary mt-0 py-2">
			<p class="lead">&copy; by paWe</p>
		</footer>

	</body>
</html>
