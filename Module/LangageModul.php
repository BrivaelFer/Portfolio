<?php 
    include_once(__DIR__ .'/../dataObjet/Langage.php');
    
    function HtmlLang(Langage $lang)
    {
        ?>
            <div class = "blockLangage"  href = "">
                <img class= "logoLang"
                src = "rsc/img/logos/<?php echo $lang->GetImg();?>.png" 
                alt = "Logo <?php echo $lang->GetName();?>.">
                <h3 class = "NameLang" ><?php echo $lang->GetName();?></h3>
                <div class = "level"></div>
            </div>
        <?php
    }
?>