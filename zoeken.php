<?php
declare(strict_types=1);

require_once 'Punten.php';

$persoon = new Persoon();
$module = new Module();
?>

<!DOCTYPE html>
<html lang="nl">
    <head>
        <meta charset="utf-8">
        <title>Zoeken</title>
        <link rel="stylesheet" href="style.css">
    </head>
    <body>
        <header>
            <a href="home.php"><img src="logo.png" alt="VDAB-campus"></a>
        </header>
        <div class="wrapper">
            <a href="home.php">Ga terug</a>
            <div class="container">
                <h1>Zoeken</h1>
                <form method="get" action="overzicht.php">
                    <p>
                        <select name="student" id="student">
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
                        <select name="module" id="module">
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
                    <input type="submit"  value="zoeken">
                </form>
            </div>
        </div>
        <footer>
            <p>&copy; Copyright vdab</p>
        </footer>
    </body>
</html>