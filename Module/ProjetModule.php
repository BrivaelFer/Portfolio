<?php
   include_once('//dataObjet/Projet.php');
    
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
                    if($pro->GetExp != NULL)
                    {
                        $exp = $pro->GetExp();

                        ?>
                        <div>
                            <p>Lieu de production:</p>
                            <img src="src/img/entreprise/<?php echo $exp->GetExp()->GetName();?>"
                            alt="logo <?php echo $exp->GetExp()->GetName();?>">
                            <p>
                                <?php echo $exp->GetExp()->GetName();?> <br>
                                <?php echo $exp->GetExp()->GetAdress();?>
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