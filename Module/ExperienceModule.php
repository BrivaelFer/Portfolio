<?php
    include_once(__DIR__ .'/../dataObjet/Experience.php');

    function HtmlExp(Experience $exp)
    {
        ?>
            <div class = "blockExp">
                <div class = "expG">
                    <img class = "expLogoEntr" src="rsc/img/entreprise/<?php echo $exp->GetEntr()->GetName();?>.png" 
                    alt="Logo <?php echo $exp->GetEntr()->GetName();?>.">
                    <div class="expGInfo">
                        <h3 class = "expTitre"><?php echo $exp->GetTitre();?></h3>
                        <h4 class = "expNameEntr"><?php echo $exp->GetEntr()->GetName();?> - <?php echo $exp->GetEntr()->GetAdress();?></h4>
                        <p class = "expAdressEntr"></p>
                    </div>
                </div>
                <div class="expLangTache">
                    <div class = "expLang">
                        <h5>Langage(s) utilisé(s) :</h5>
                        <div class="listLangages">
                            <?php
                            foreach($exp->GetLang() as $key=>$lang)
                            {
                                ?>
                                <div class='blockLangMini'>
                                    <img class="tinyImg" src="rsc/img/logos/<?php echo $lang->GetImg();?>.png" 
                                    alt="Logo <?php echo $lang->GetName();?>">
                                    <p><?php echo $lang->GetName();?></p>
                                </div>
                                <?php
                            }
                            ?>
                        </div>
                    </div>
                    <div class="expTache">
                        <h5>Tache Effectué :</h5>
                        <p><?php echo $exp->GetTache();?></p>
                    </div>
                </div>
                
            </div>
        <?php
    }
?>