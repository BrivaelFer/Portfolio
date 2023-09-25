<?php
    include_once('DataManager.php');
    include_once('Module/ExperienceModule.php');
    include_once('Module/LangageModul.php');
    include_once('Module/ProjetModule.php');
    
    class ModulManager
    {
        private DataManager $DM;

        public function __construct() {
            $this->DM = new DataManager();
        }

        public function AffichageLangages()
        {
            ?> 
            <div class = "module" id = "langageModule">
                <h2>Langages</h2>
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
            <div class = "module" id = "langageModule">
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
            <div class = "module" id = "langageModule">
                <?php
                    foreach($this->DM->GetAllExp() as $key=>$exp)
                    {
                        HtmlExp($exp);
                    }
                ?>
            </div>
            <?php
        }
    }