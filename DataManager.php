<?php
include_once('dataObjet/Entreprise.php');
include_once('dataObjet/Experience.php');
include_once('dataObjet/Langage.php');
include_once('dataObjet/Projet.php');
include_once('dataObjet/Formation.php');
include_once('dataObjet/OrganismeFormation.php');

/**Récupérassion et insertion des donnée de la DB*/
class DataManager
{
    /**Connection à la DB*/
    private function connect()
    {
    
        try{
            $db = new PDO('mysql:host=localhost;dbname=cv_php_db;charset=utf8','root','',
            array(PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION));
        }catch(Exception $e){
            die('Erreur: '.$e->getMessage());
        }
        return $db;
    }

    
    /**Ajout d'entreprise */
    public function AddEtreprises($name, $adress)
    {
        try
        {
            $info = [$name, $adress];

            $s = "INSERT INTO entreprise(name_entr, adr_entr)
            VALUE (?,?)";
            $pre = $this->connect()->prepare($s);
            $pre->execute($info);
        }
        catch(Exception $e)
        {
            die('Erreur: '.$e->getMessage());
        }
    }
    /**
     * Récupération des donnée des entreprises
     * 
     * Retrune une table d'objets Entreprise
     */
    public function GetAllEtreprises()
    {
        $s = "SELECT * FROM entreprise";

        $pre = $this->connect()->query($s);

        $entreprises = [];
        foreach($pre->fetchAll() as $key=>$row){
            $entreprises[] = new Entreprise(
                $row['id_entr'], 
                $row['name_entr'], 
                $row['adr_entr']
            );
        }
        return $entreprises;
    }
    /**
     * argument : idEntr = id d'une entreprise
     * 
     * Récupération des donnée d'une entreprise
     * 
     * Retrune un objet Entreprise
     */
    public function GetEtreprise($idEntr)
    {
        $s = "SELECT * FROM entreprise
        WHERE id_entr = $idEntr";
        $pre = $this->connect()->query($s);
        $result = $pre->fetch();

        return new Entreprise($result['id_entr'], $result['name_entr'], $result['adr_entr']);
    }
    /**
     * arg : 
     *      titre = titre experiance
     *      idEntr = id d'une entreprise
     *      start = date début expérience
     *      end = date fin expérience
     *      tache = string listant tache
     *      idsLang = tableau id de langage
     * 
     * Ajoute une experiance à la BDD
     */
    public function AddExp($titre, $idEntr, $start, $end, $tache, Array $idsLang)
    {
        $s = "INSERT INTO experience( titre_exp, start_exp, end_exp, tache_exp, id_entr_exp)
            VALUES (?,?,?,?,?)";
        $pre = $this->connect()->prepare($s);
        $pre->execute([$titre, $start, $end, $tache, $idEntr]);

        $s = "SELECT LAST_INSERT_ID()";
        $idExp = $this->connect()->query($s)->fetch();

        $s = "INSERT INTO utilise(id_lang_ut, id_exp_ut) VALUES";
        $fl = true;
        foreach($idsLang as $key=>$row)
        {
            if(!$fl){$s += ", ";}

            $s += "($row, $idExp)";
        }
        $pre = $this->connect()->query($s);
    }
     /**
      * Récupère les donnée de la table experience
      *
      * Retourne un tableau d'objets Experience
      */
    public function GetAllExp()
    {
        $s = "SELECT * FROM experience";

        $pre = $this->connect()->query($s);
        $exps = [];
        foreach($pre->fetchAll() as $key=>$row){
            $exps[] = new Experience(
                $row['id_exp'], 
                $row['titre_exp'], 
                $row['start_exp'],
                $row['end_exp'],
                $row['tache_exp'],
                $this->GetEtreprise($row['id_entr_exp']),
                $this->GetExpLang($row['id_exp'])
            );
        }
        return $exps;
    }
    /**
     * arg : idExp = id experience
     * 
     * Récupère les données d'une experience dont id = idExp
     * 
     * Retourne une objet Experience
     */
    public function GetExp($idExp)
    {
        if($idExp == '')
            return NULL;
        $s = "SELECT * FROM experience
        WHERE id_Exp = $idExp";

        $pre = $this->connect()->query($s);
        $exp= $pre->fetch();

        return new Experience(
            $exp['id_exp'], 
            $exp['titre_exp'], 
            $exp['start_exp'],
            $exp['end_exp'],
            $exp['tache_exp'],
            $this->GetEtreprise($exp['id_entr_exp']),
            $this->GetExpLang($exp['id_exp'])
        );
    }

    public function AddLangage($name, $level)
    {
        $s = "INSERT INTO langage(name_lang, lev_lang)
        VALUE (?,?)";

        $pre = $this->connect()->prepare($s);
        $pre->execute([$name, $level]);
    }

    public function GetAllLangage()
    {
        $s = "SELECT * FROM langage
        ORDER BY lev_lang DESC";

        $pre = $this->connect()->query($s);

        $lang = [];
        foreach($pre->fetchAll() as $key=>$row){
            $lang[] = new Langage(
                $row['id_lang'], 
                $row['name_lang'], 
                $row['lev_lang'],
                $row['img_lang']
                );
        }
        return $lang;
    }

    public function GetLangage($idLang)
    {
        $s = "SELECT * FROM langage
        WHERE id_lang = $idLang";

        $lang = $this->connect()->query($s)->fetch();

        return new Langage(
            $lang['id_lang'], 
            $lang['name_lang'],
            $lang['lev_lang'],
            $lang['img_lang']
        );
    }

    private function GetExpLang($idExp)
    {
        $s = "SELECT * FROM langage INNER JOIN utilise ON id_lang = id_lang_ut
        WHERE id_exp_ut = $idExp";

        $pre = $this->connect()->query($s);

        $langs = [];
        foreach($pre->fetchAll() as $key=>$row)
        {
            $langs[] = new Langage(
                $row['id_lang'],
                $row['name_lang'],
                $row['lev_lang'],
                $row['img_lang']
            );
        }
        return $langs;
    }

    private function GetProjetLang($idPro)
    {
        $s = "SELECT * FROM langage INNER JOIN utilise ON id_lang = id_lang_ut
        WHERE id_projet_ut = $idPro";

        $pre = $this->connect()->query($s);
        
        $langs = [];
        foreach($pre->fetchAll() as $key=>$row)
        {
            $langs[] = new Langage(
                $row['id_lang'],
                $row['name_lang'],
                $row['lev_lang'],
                $row['img_lang']
            );
        }
        return $langs;
    }

    public function AddProjet($titre, $text, $img, Array $langs, $idExp = NULL )
    {

    }

    public function GetAllProjets()
    {
        $s = "SELECT * FROM projet";

        $pre =$this->connect()->query($s);

        $projets = [];
        foreach($pre->fetchAll() as $key=>$row)
        {
            $projets[] = new Projet(
                $row['id_projet'],
                $row['titre_projet'],
                $row['text_projet'],
                $row['img_projet'],
                $this->GetProjetLang($row['id_projet']),
                $this->GetExp($row['id_exp_projet']),
                $this->GetFormation($row['id_form_projet'])
            );
        }
        return $projets;
    }

    public function GetProjet($idPro)
    {
        $s = "SELECT * FROM projet
            WHERE id_projet = ?";

        $pre =$this->connect()->query($s);
        $projet = $pre->execute([$idPro])->fetch();
       
        return new Projet(
            $projet['id_projet'],
            $projet['titre_projet'],
            $projet['text_projet'],
            $projet['img_projet'],
            $this->GetProjetLang($projet['id_projet']),
            $this->GetExp($projet['id_exp_projet']),
            $this->GetFormation($projet['id_form_projet'])
        );
    }

    private function GetOrgaFormation($idOrga)
    {
        $s = "SELECT * FROM orga_formation 
            WHERE id_orga = $idOrga;";

        $pre = $this->connect()->query($s);
        $orga = $pre->fetch();

        return new OrganismeFormation(
            (int)$orga['id_orga'],
            $orga['name_orga'],
            $orga['ville_orga'],
            $orga['codep_orga'],
            $orga['adr_orga']
        );
    }

    public function GetAllFormation()
    {
        $s = "SELECT * FROM formation";

        $pre =$this->connect()->query($s);

        $formations = [];
        foreach($pre->fetchAll() as $key => $row)
        {
            $formations[] = new Formation(
                $row['id_form'],
                $row['inti_form'],
                $row['start_date_form'],
                $row['end_date_form'],
                $row['form_end'],
                $row['desc_form'],
                $this->GetFormLang($row['id_form']),
                $this->GetOrgaFormation($row['id_orga_form'])
            );
        }
        return $formations;
    }

    public function GetFormation($idF)
    {
        if($idF == null || $idF == 'null')
            return null;

        $s = "SELECT * FROM formation
            WHERE id_form = ?";
        
        $pre = $this->connect()->query($s);

        $formation = $pre->execute([$idF])->fetch();

        return new Formation(
                (int)$formation['id_form'],
                $formation['inti_form'],
                $formation['start_date_form'],
                $formation['end_date_form'],
                (bool)$formation['form_end'],
                $formation['desc_form'],
                $this->GetFormLang($formation['id_form']),
                $this->GetOrgaFormation($formation['id_orga_form'])
        );
    }

    private function GetFormLang($idForm)
    {
        $s = "SELECT * FROM langage INNER JOIN utilise ON id_lang = id_lang_ut
        WHERE id_form_ut = $idForm";

        $pre = $this->connect()->query($s);

        $langs = [];
        foreach($pre->fetchAll() as $key=>$row)
        {
            $langs[] = new Langage(
                $row['id_lang'],
                $row['name_lang'],
                $row['lev_lang'],
                $row['img_lang']
            );
        }
        return $langs;
    }
}

