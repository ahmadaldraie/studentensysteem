<?php
declare(strict_types=1);

require_once 'Punten.php';

$punten = new Punten();
$student = new Persoon();
$module = new Module();
?>

<!DOCTYPE html>
<html lang="nl">
    <head>
        <meta charset="utf-8">
        <title>overzicht</title>
        <link rel="stylesheet" href="style.css">
    </head>
    <body>
        <header>
            <a href="home.php"><img src="logo.png" alt="VDAB-campus"></a>
        </header>
        <div class="wrapper">
            <div class="container" id="overzicht">
                <h1>zoekresultaat</h1>
                <?php //************** Zoeken per student en module **************// 
                if($_GET['student'] != '' && $_GET['module'] != '') { 
                $student->studentZoeken($_GET['student']);
                $module->moduleZoeken($_GET['module']);
                $zoekresultaat = $punten->puntenVanEenStudentPerModuleVragen($student, $module);
                if($zoekresultaat === -1)
                    print("<h2>De student <span>" . $student->getFullname() . "</span> heeft geen resultaat voor de module <span>" . $module->getNaam() . "</span></h2>");
                else { ?>
                <h2>Student Informatie</h2>
                <div class="info">
                    <p><strong>Naam: </strong> <?php echo $student->getFullname(); ?></p>
                    <p><strong>Geboortedatum: </strong> <?php echo $student->getGeboortedatum(); ?></p>
                    <p><strong>Geslacht: </strong> <?php echo $student->getGeslacht(); ?></p>
                </div>
                <table>
                    <thead>
                        <tr>
                            <th>Module</th>
                            <th>Punten</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td><?php echo $module->getNaam(); ?></td>
                            <td style="text-align: right;"><?php echo $zoekresultaat; ?></td>
                        </tr>
                    </tbody>
                </table>
                <?php }
                }
                //************** Zoeken per student **************//
                else if($_GET['student'] != '') { 
                $student->studentZoeken($_GET['student']);
                $zoekresultaat = $punten->lijstPuntenVragen($student);
                if(count($zoekresultaat) === 0)
                    print("<h2>De student <span>" . $student->getFullname() .  "</span> heeft geen resultaten!</h2>");
                else { ?>
                <h2>Student Informatie</h2>
                <div class="info">
                    <p><strong>Naam: </strong> <?php echo $student->getFullname(); ?></p>
                    <p><strong>Geboortedatum: </strong> <?php echo $student->getGeboortedatum(); ?></p>
                    <p><strong>Geslacht: </strong> <?php echo $student->getGeslacht(); ?></p>
                </div>
                <table>
                    <thead>
                        <tr>
                            <th>Module</th>
                            <th>Punten</th>
                        </tr>
                    </thead>
                    <tbody>
                    <?php foreach ($zoekresultaat as $rij) { ?>
                        <tr>
                            <td><?php echo $rij['module']; ?></td>
                            <td style="text-align: right;"><?php echo $rij['punten']; ?></td>
                        </tr>
                    <?php } ?>
                    </tbody>
                </table>
                <?php }
                }
                //************** Zoeken per module **************//
                else if($_GET['module'] != '') { 
                $module->moduleZoeken($_GET['module']);
                $zoekresultaat = $punten->lijstPuntenVragen($module);
                if(count($zoekresultaat) === 0)
                    print("<h2>De module <span>" . $module->getNaam() .  "</span> heeft geen resultaten!</h2>");
                else { ?>
                <h2>Module Informatie</h2>
                <div class="info">
                    <p><strong>Naam: </strong> <?php echo $module->getNaam(); ?></p>
                </div>
                <table>
                    <thead>
                        <tr>
                            <th>Student</th>
                            <th>Punten</th>
                        </tr>
                    </thead>
                    <tbody>
                    <?php foreach ($zoekresultaat as $rij) { ?>
                        <tr>
                            <td><?php echo $rij['student']; ?></td>
                            <td style="text-align: right;"><?php echo $rij['punten']; ?></td>
                        </tr>
                    <?php } ?>
                    </tbody>
                </table>
                <?php }
                }
                else print('<h2>Geen resultaat!</h2>') ?>
                <p><a href="zoeken.php">Terug naar de zoekpagina</a></p>
            </div>
        </div>
        <footer>
            <p>&copy; Copyright vdab</p>
        </footer>
    </body>
</html>