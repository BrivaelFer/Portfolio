<?php
include_once('dataObjet/Entreprise.php');
include_once('dataObjet/Experience.php');
include_once('dataObjet/Langage.php');
include_once('dataObjet/Projet.php');

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
     * argument : idExp = id d'une entreprise
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
        $result = fetch();

        return new Entreprise($result['id_entr'], $result['name_entr'], $result['adr_entr']);
    }

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
                GetEtreprise($row['id_entr_exp']),
                GetExpLang($row['id_exp'])
            );
        }
        return $entreprises;
    }

    public function GetExp($idExp)
    {
        $s = "SELECT * FROM experience
        WHERE id_Exp = $idExp";

        $exp = $this->connect()->query($s)->fetch();

        return new Experience(
            $exp['id_exp'], 
            $exp['titre_exp'], 
            $exp['start_exp'],
            $exp['end_exp'],
            $exp['tache_exp'],
            GetEtreprise($exp['id_entr_exp']),
            GetExpLang($exp['id_exp'])
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
        $s = "SELECT * FROM langage";

        $pre = $this->connect()->query($s);

        $lang = [];
        foreach($pre->fetchAll() as $key=>$row){
            $lang[] = new Langage($row['id_lang'], $row['name_lang'], $row['lev_lang']);
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
            $lang['lev_lang']
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
            $lang = new Langage(
                $row['id_lang'],
                $row['name_lang'],
                $row['lev_lang']
            );
        }
    }

    private function GetProjetLang($idPro)
    {
        $s = "SELECT * FROM langage INNER JOIN utilise ON id_lang = id_lang_ut
        WHERE id_projet_ut = $idPro";

        $pre = $this->connect()->query($s);
        
        $langs = [];
        foreach($pre->fetchAll() as $key=>$row)
        {
            $lang = new Langage(
                $row['id_lang'],
                $row['name_lang'],
                $row['lev_lang']
            );
        }
    }
}

