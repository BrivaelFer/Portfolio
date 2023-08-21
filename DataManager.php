<?php
include_once('dataObjet/Entreprise.php');
include_once('dataObjet/Experience.php');
include_once('dataObjet/Langage.php');
include_once('dataObjet/Projet.php');
class DataManager
{
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

    public function GetAllEtreprises()
    {
        $s = "SELECT * FROM entreprise";

        $pre = $this->connect()->query($s);

        $entreprises = [];
        foreach($pre->fetchAll() as $key=>$row){
            $entreprises[] = new Entreprise($row['id_entr'], $row['name_entr'], $row['adr_entr']);
        }
        return $entreprises;
    }
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
        
    }
    public function GetExp($idExp)
    {

    }
    public function GetAllLangage()
    {

    }
    public function GetLangage($idLang)
    {

    }
}

