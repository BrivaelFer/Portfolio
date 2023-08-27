<?php
   include_once(__DIR__ .'/../dataObjet/Projet.php');
    
   function HtmlProjet(Projet $pro)
   {
        ?>
            <div class = "blockProjet"  href = "">
                <img class= "illuProjet"
                src = "src/img/projet/<?php echo $pro->GetAdressImg();?>.png" 
                alt = "Logo <?php echo $pro->GetTitre();?>.">
                <h3 class = "titreProjet" ><?php echo $pro->GetTitre();?></h3>
                <div class = "listLangages">
                    <?php
                        foreach($pro->GetLangs() as $key => $lang)
                        {
                            ?>
                            <div class = "blockLangMini" href = "">
                                <img src="src/img/lang/<?php echo $lang->GetName();?>.png" 
                                alt="Logo <?php echo $lang->GetName();?>">
                                <p class = "nameLangMini"><?php echo $lang->GetName();?></p>
                            </div>
                            <?php
                        }
                    ?>
                </div>
                <?php
                    
                    if($pro->GetExp() != NULL)
                    {
                        $exp = $pro->GetExp();
                        /**CORRIGER */
                        ?>
                        <div>
                            <p>Lieu de production:</p>
                            <img src="src/img/entreprise/<?php echo $exp->GetEntr()->GetName();?>"
                            alt="logo <?php echo $exp->GetEntr()->GetName();?>">
                            <p>
                                <?php echo $exp->GetEntr()->GetName();?> <br>
                                <?php echo $exp->GetEntr()->GetAdress();?>
                            </p>

                        </div>
                        <?php
                    }
                ?>
                <p><?php echo $pro->GetText()?></p>
                
            </div>
        <?php
   }
?>