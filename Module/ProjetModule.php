<?php
   include_once(__DIR__ .'/../dataObjet/Projet.php');
    
   function HtmlProjet(Projet $pro)
   {
        ?>
            <div class = "blockProjet" >
                <img class= "blockProjetIllu"
                src = "rsc/img/illu/<?php echo $pro->GetAdressImg();?>.png" 
                alt = "Image <?php echo $pro->GetTitre();?>.">
                <div class="blockProjetContent">
                    <h3 class = "blockProjetTitre" ><?php echo $pro->GetTitre();?></h3>
                    <div class="blockProjetInfo">
                        <div class="infoLangages" >
                            <h4>List langage:</h4>
                            <div class = "listLangages">
                                <?php
                                    foreach($pro->GetLangs() as $key => $lang)
                                    {
                                        ?>
                                        <div class = "blockLangMini">
                                            <img class="tinyImg" src="rsc/img/logos/<?php echo $lang->GetImg();?>.png" 
                                            alt="Logo <?php echo $lang->GetName();?>">
                                            <p class = "nameLangMini"><?php echo $lang->GetName();?></p>
                                        </div>
                                        <?php
                                    }
                                ?>
                            </div>
                        </div>
                        <?php
                        
                        if($pro->GetExp() != null || $pro->GetForm() != null)
                        {
                            $lProd = $pro->GetExp();
                            if($lProd == null)
                                $lProd = $pro->GetForm();
                            ?>
                            <div class="infoLieuProd" >
                                <h4>Lieu de production:</h4>
                                <img class="tinyImg" src="rsc/img/entreprise/<?php echo $lProd->GetEntr()->GetName();?>.png"
                                alt="logo <?php echo $lProd->GetEntr()->GetName();?>">
                                <p>
                                    <?php echo $lProd->GetEntr()->GetName();?> - 
                                    <?php echo $lProd->GetEntr()->GetAdress();?>
                                </p>

                            </div>
                            <?php
                        }
                        ?>
                    </div>
                    <p class="blockProjetText" ><?php echo $pro->GetText()?></p>
                </div>
            </div>
        <?php
   }
?>