<?php
include_once(__DIR__ .'/../dataObjet/Formation.php');

function HtmlFormation(Formation $fromation)
{
    ?>
    <div class="blockFormation">
        <h3 class="initFormtion"><?php echo $fromation->GetIntitule(); ?></h3>
        <img class="formationImg"
        src="rsc/img/orga/<?php echo $fromation->GetOrga()->GetNom();?>.png" 
        alt="Logo <?php echo $fromation->GetOrga()->GetNom(); ?>">
        <h4><?php echo $fromation->GetOrga()->GetNom()." ".$fromation->GetOrga()->GetVille(); ?></h4>
        <p class='dateFrom'>
            Débuts: <?php echo $fromation->GetStratDate(); ?> <br>
            Fin : 
            <?php 
                if($fromation->GetEnd())
                    echo $fromation->GetEndDate();
                else
                    echo '(en cours)';
            ?>
        </p>
        <p><?php echo $fromation->GetDesc() ?></p>
    </div>
    <?php
}