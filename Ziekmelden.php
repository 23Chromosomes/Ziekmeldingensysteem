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
		<h1>Ziekmelden<h1>
	</header>

		<div class="Perfect-Layout-Body">

			<section class="Perfect-Layout-Content" style="text-align: center">
				<!-- Main page content -->
                <?php
                #database connectie
                $host = "localhost";
                $dbname = "ziekmeldingen";
                $username = "root";
                $password = "";

                $conn = new PDO ("mysql:host=".$host.";dbname=".$dbname.";",$username, $password);

                #Tabel Studenten met Status
                echo "<table style='border: solid 2px white; background-color: rgba(0,0,0,0.5);position: relative;top: 10%;left: 50%;-webkit-transform: translate(-50%, -50%);transform: translate(-50%, -50%);margin-top: 53px;'>";
                echo "<tr><th>Naam</th><th>Achter Naam</th><th>Leeftijd</th><th>Klas</th><th>Status</th></tr>";

                try {
                    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

                    $query = "SELECT * FROM studenten ORDER BY VNaam DESC";
                    $stm = $conn->prepare($query);
                    $stm->execute();

                    $res = $stm->fetchAll(PDO::FETCH_OBJ);
                    foreach($res as $rij)
                    {
                        #Lijst Tabel
                        echo "<tr><td style='width: 175px; border: solid 1px white; background-color: rgba(0,0,0,0.5);'>$rij->VNaam</td>
                                <td style='width: 175px; border: solid 1px white; background-color: rgba(0,0,0,0.5);'>$rij->ANaam</td>
                                <td style='width: 175px; border: solid 1px white; background-color: rgba(0,0,0,0.5);'>$rij->Leeftijd</td>
                                <td style='width: 175px; border: solid 1px white; background-color: rgba(0,0,0,0.5);'>$rij->Klas</td>
                                <td style='width: 175px; border: solid 1px white; background-color: rgba(0,0,0,0.5);'><a style='text-decoration: none; color: orange' href='StatusWijzigen.php?SID=".$rij->SID."'>$rij->StatusZB</a></td></tr>";
                    }
                }
                catch(PDOException $e) {
                    echo "Foutmelding: " . $e->getMessage();
                }
                echo "</table>";
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
