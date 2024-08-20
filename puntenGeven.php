<?php
declare(strict_types=1);

require_once 'Punten.php';

$persoon = new Persoon();
$module = new Module();
if(isset($_GET['action']) && $_GET['action'] === "toevoeg") {
$persoon->studentZoeken($_POST['student']);
$module->moduleZoeken($_POST['module']);
$punten = new Punten();
$control = $punten->puntenVanEenStudentPerModuleVragen($persoon, $module);
if($control === (int) -1) {
    $punten->puntenGeven((int) $_POST['punten'], $persoon, $module);
    $resultaat = 'success';
}
else $resultaat = 'bestaat';
}
?>

<!DOCTYPE html>
<html lang="nl">
    <head>
        <meta charset="utf-8">
        <title>Punten geven</title>
        <link rel="stylesheet" href="style.css">
    </head>
    <body>
        <header>
            <a href="home.php"><img src="logo.png" alt="VDAB-campus"></a>
        </header>
        <div class="wrapper">
            <a href="home.php">Ga terug</a>
            <div class="container">
                <h1>Punten geven</h1>
                <form method="post" action="puntenGeven.php?action=toevoeg">
                    <p>
                        <select name="student" id="student" required>
                            <option value="" selected>Kies een student</option>
                            <?php 
                            $studenten = $persoon->getAlleStudenten();
                            foreach ($studenten as $student) { ?>
                            <option><?php echo $student; ?></option>
                            <?php
                            }
                            ?>
                        </select>
                    </p>
                    <p>
                        <select name="module" id="module" required>
                            <option value="" selected>Kies een module</option>
                            <?php 
                            $modules = $module->getAlleModules();
                            foreach ($modules as $eenModule) { ?>
                            <option><?php echo $eenModule; ?></option>
                            <?php
                            }
                            ?>
                        </select>
                    </p>
                    <p>Punten: <input type="number" name="punten" max="100" min="0" required></p>
                    <input type="submit"  value="Toekennen">
                </form>
                <?php
                if (isset($resultaat)) {
                    switch ($resultaat) {
                        case 'bestaat': print('<div class="feedback" style="color: #8F1731;">De student heeft al punten voor deze module</div>');
                        break;
                        default: print('<div class="feedback" style="color: #C7F464;">De punten worden toegevoegd</div>');
                    }
                }
                ?>
            </div>
        </div>
        <footer>
            <p>&copy; Copyright vdab</p>
        </footer>
    </body>
</html>