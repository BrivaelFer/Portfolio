<?php
    include_once(__DIR__ .'/../dataObjet/Experience.php');

    function HtmlExp(Experience $exp)
    {
        ?>
            <div class = "blockExp">
                <div class = "expG">
                    <img class = "expLogoEntr" src="src/img/entreprise/<?php echo $exp->GetEntr()->GetName();?>" 
                    alt="Logo <?php echo $exp->GetEntr()->GetName();?>.">
                    <h3 class = "expTitre"><?php echo $exp->GetTitre();?></h3>
                    <h4 class = "expNameEntr"><?php echo $exp->GetEntr()->GetName();?></h4>
                    <p class = "expAdressEntr"><?php echo $exp->GetEntr()->GetAdress();?></p>
                    <p class = "expTache"></p>
                </div>
                <div class = "expLang">
                    <h5>Langage(s) utilisé(s)</h5>
                    <?php
                        foreach($exp->GetLang() as $key=>$lang)
                        {
                            ?>
                                <div>
                                    <img src="src/img/lang/<?php echo $lang->GetName();?>.png" 
                                    alt="Logo <?php echo $lang->GetName();?>">
                                    <p><?php echo $lang->GetName();?></p>
                                </div>
                            <?php
                        }
                    ?>
                </div>
                
            </div>
        <?php
    }
?>