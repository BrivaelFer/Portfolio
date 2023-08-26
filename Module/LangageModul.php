<?php 
    include_once('//dataObjet/Langage.php');
    
    function HtmlLang(Langage $lang)
    {
        ?>
            <div class = "blockLangage"  href = "">
                <img class= "logoLang"
                src = "src/img/lang/<?php echo $lang->GetName();?>.png" 
                alt = "Logo <?php echo $lang->GetName();?>.">
                <h3 class = "NameLang" ><?php echo $lang->GetName();?></h3>
                <div class = "level"></div>
            </div>
        <?php
    }
?>