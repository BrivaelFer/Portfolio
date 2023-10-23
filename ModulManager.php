<?php
    include_once('DataManager.php');
    include_once('Module/ExperienceModule.php');
    include_once('Module/LangageModul.php');
    include_once('Module/ProjetModule.php');
    include_once('Module/FormationModule.php');
    include_once('Module/Nav.php');
    include_once('Module/Footer.php');
    
    class ModulManager
    {
        private DataManager $DM;

        public function __construct() {
            $this->DM = new DataManager();
        }

        public function AffichageLangages()
        {
            ?> 
            <h2>Langages</h2>
            <div class = "module" id = "langageModule">
                <?php
                    foreach($this->DM->GetAllLangage() as $key=>$lang)
                    {
                        HtmlLang($lang);
                    }
                ?>
            </div>
            <?php
        }

        public function AffichageProjet()
        {
            ?> 
            <h2>Projets</h2>
            <div class = "module" id = "projetModule">
                <?php
                    foreach($this->DM->GetAllProjets() as $key=>$pro)
                    {
                        HtmlProjet($pro);
                    }
                ?>
            </div>
            <?php
        }
        public function AffichageExperience()
        {
            ?> 
            <h2>Experience</h2>
            <div class = "module" id = "expModule">
                <?php
                    foreach($this->DM->GetAllExp() as $key=>$exp)
                    {
                        HtmlExp($exp);
                    }
                ?>
            </div>
            <?php
        }
        public function AffichageFromation()
        {
            ?>
            
            <h2>Formations</h2>
            <div class = "module" id = "fromationModule">
                
                <?php
                foreach($this->DM->GetAllFormation() as $key=>$formation)
                {
                    HtmlFormation($formation);
                }
                ?>
            </div>
            <?php
        }
        public function AffichageNav()
        {
            HtmlNav();
        }
        public function AffichageFooter()
        {
            HtmlFooter();
        }
    }