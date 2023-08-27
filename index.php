<?php
    include_once('DataManager.php');
    include_once('ModulManager.php');
    
    $dataManager = new DataManager();
    $modulManager = new ModulManager();
?>
<!DOCTYPE html>
<html lang="fr">
    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Brivaël FER</title>
    </head>
    <body>
        <?php
            
            $modulManager->AffichageProjet();
            $modulManager->AffichageLangages();
            $modulManager->AffichageExperience();
        ?>
    </body>
</html>