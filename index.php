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
        <link rel="stylesheet" href="rsc/css/mainStyle.css">
        <title>Brivaël FER</title>
    </head>
    <body>
        
        <div class="intro">
            <h2>Brivaël FER</h2>
            <p> 
                Un chat curieux escalada le mur de briques rouges, observant le monde depuis sa position élevée.
                Les vagues de l'océan se brisaient doucement contre le rivage, comme si la mer chuchotait ses secrets à la plage.
                Un parfum envoûtant de fleurs printanières emplissait l'air, rappelant à tous que la nature se réveillait de son sommeil hivernal.
                Dans la vieille librairie, un livre ancien dévoila un parchemin caché, révélant une énigme vieille de plusieurs siècles.
                Un astronaute flotta en apesanteur dans l'espace, contemplant l'infini tout en se demandant ce que l'avenir réserverait à l'humanité.
            </p>
        </div>
        <?php
            $modulManager->AffichageProjet();
            $modulManager->AffichageLangages();
            $modulManager->AffichageExperience();
            $modulManager->AffichageFromation();
        ?>
    </body>
</html>