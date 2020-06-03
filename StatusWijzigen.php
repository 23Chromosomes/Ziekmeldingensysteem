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
                <?php
                #Update van studenten

                #database connectie
                $host = "localhost";
                $dbname = "ziekmeldingen";
                $username = "root";
                $password = "";

                $conn = new PDO ("mysql:host=".$host.";dbname=".$dbname.";",$username, $password);

                $SID = $_GET['SID'];

                #terug naar vorige pagina
                if(isset($_POST{'btnBack'})){
                    Header("location: Ziekmelden.php");
                }

                #wijzigen
                if(isset($_POST['BtnWijzig']))
                {
                    $StatusZB = $_POST["StatusZB"];

                    $query = "UPDATE studenten SET StatusZB = '$StatusZB' WHERE SID = '$SID'";
                    $stm = $conn->prepare($query);
                    if($stm->execute())
                    {
                       echo "Status Changed!";
                    }

                }

                #insert
                if(isset($_POST['BtnWijzig']))
                {
                    $DatumZMelding = $_POST["DatumZMelding"];
                    $DatumBMelding = $_POST["DatumBMelding"];

                    $query = "INSERT INTO periode(DatumZMelding, DatumBMelding, SID) VALUES" . "('$DatumZMelding', '$DatumBMelding', '$SID')";
                    $stm = $conn->prepare($query);
                    if($stm->execute())
                    {
                        Header("location: PeriodeRapport.php");
                    }

                }

                #query van update status en add periodes
                $query = "SELECT * FROM studenten WHERE SID = $SID";
                $stm = $conn->prepare($query);
                if($stm->execute())
                {
                    $res = $stm->fetch(PDO::FETCH_OBJ);
                    ?>
                    <div class="FormBox">
                        <form method="POST" class="TextBoxes">
                            <h1><?php echo $res->VNaam;?></h1>
                            <select name="StatusZB" style="text-align-last:center;">
                                <option hidden value="<?php echo $res->StatusZB; ?>"><?php echo $res->StatusZB; ?></option>
                                <option value="Gezond">Gezond</option>
                                <option value="Ziek">Ziek</option>
                                <option value="Afwezig">Afwezig</option>
                                <option value="Verzuim">Verzuim</option>
                            </select><br/>
                            <input type="date" name="DatumZMelding" value="<?php echo $res->DatumZMelding;?>">
                            <input type="date" name="DatumBMelding" value="<?php echo $res->DatumBMelding;?>">
                            <!-- SUBMIT BTN,  (INPUT that acts like a BUTTON and looks like one) -->
                            <input type="submit" name="BtnWijzig" value="Update" class='SubmitBtn' />
                            <input type="submit" name="btnBack" value="Terug" class='BackBtn' />
                        </form>
                    </div>
                    <?php

                }else "werkt niet?!?"

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
