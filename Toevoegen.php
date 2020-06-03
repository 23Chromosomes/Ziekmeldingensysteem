<!doctype html>

<html lang="en">
<head>
	<title>Ziekmelding</title>
	<meta name="description" content="Hendrik's Ziekmeldings Site">
	<meta charset="utf-8">
	<link href='https://fonts.googleapis.com/css?family=Roboto' rel='stylesheet'>
	<link rel="stylesheet" href="SideNavLayered.css">
	<link rel="shortcut icon" type="image/png" href="https://i.imgur.com/oNxiEuP.png"/>
	<!-- ˅ REMOVE THIS, IF YOU DONT WANT MATERIAL ICONS FONT ˅ -->
	<link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons">
	<!-- ^ REMOVE THIS, IF YOU DONT WANT MATERIAL ICONS FONT ^ -->
</head>
<body>
<ul class="Navbar">
	<li class="Nav-Item"><a href="ZiekmeldenHome.php">Home</a></li>
    <li class="Nav-Item"><a href="Toevoegen.php">Toevoegen</a></li>
    <li class="Nav-Item"><a href="Ziekmelden.php">Ziekmelden</a></li>
    <li class="Nav-Item"><a href="ZiekenRapport.php">Overzicht</a></li>
</ul>

<input type="checkbox" id="Nav-Trigger" class="Nav-Trigger" />
<Label for="Nav-Trigger"></Label>

<div class="Site-Wrapper">
	<div class="Perfect-Layout">
		
	<header style="text-align: center;">
		<!-- header content -->
		<h1>Ziekmeldings Website<h1>
	</header>

		<div class="Perfect-Layout-Body">

			<section class="Perfect-Layout-Content">
				<!-- Main page content -->
                <div class="FormBox">
                    <form method="POST" class="TextBoxes">
                        <h1>Student Toevoegen</h1>
                        <input name="VNaam" type="text" placeholder="Voornaam"><br/>
                        <input name="ANaam" type="text" placeholder="Achternaam"/><br/>
                        <input name="Leeftijd" type="text" placeholder="Leeftijd"/><br/>
                        <input name="Klas" type="text" placeholder="Klas"/><br/>
                        <!-- SUBMIT BTN,  (INPUT that acts like a BUTTON and looks like one) -->
                        <input type="submit" name="btnToevoegen" value="Student Toevoegen" class='SubmitBtn' />
                    </form>
                </div>
                <?php
                        #Database Connectie
                        $host = "localhost";
                        $dbname = "ziekmeldingen";
                        $username = "root";
                        $password = "";

                        $conn = new PDO ("mysql:host=".$host.";dbname=".$dbname.";",$username, $password);

                        #Student Toevoegen
                        if (isset($_POST["btnToevoegen"])){

                            $VNaam = $_POST["VNaam"];
                            $ANaam  = $_POST["ANaam"];
                            $Leeftijd = $_POST["Leeftijd"];
                            $Klas = $_POST["Klas"];

                            #Insert Data In Database
                            $query = "INSERT INTO studenten(VNaam, ANaam, Leeftijd, Klas) VALUES" . "('$VNaam', '$ANaam', '$Leeftijd', '$Klas')";
                            $stm = $conn->prepare($query);
                            if($stm->execute()){
                                //Verstuurt je terug naar pagina, geen dubbel toevoeging pagina refresh
                                $URL="Toevoegen.php";
                                echo "<script type='text/javascript'>document.location.href='{$URL}';</script>";
                                echo '<META HTTP-EQUIV="refresh" content="0;URL='.$URL.'">';
                            }else echo "!ERROR!";
                        }
                ?>
			</section>

			<!-- Sidebars website if you need it
			<div class="Perfect-Layout-Sidebar-1 PL-Sidebar" style="background: white;">
				<h1>sidebar 1 content<h1>
			</div>

			<div class="Perfect-Layout-Sidebar-2 PL-Sidebar" style="background: white;">
				<h1>sidebar 2 content<h1>
			</div>-->

		</div>

	<footer style="text-align: center;">
		<!-- footer content -->
		<h1>Hendrik Visser<h1>
	</footer>
			
	</div>
</div>
</body>
</html>
