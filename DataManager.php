<?php
include_once('dataObjet/Entreprise.php');
include_once('dataObjet/Experience.php');
include_once('dataObjet/Langage.php');
include_once('dataObjet/LProjet.php');
class DataManager
{
    public function GetEtreprises()
    {
        $result = [
            ['id_entre' => '0', 'name_entre' => 'nomEntre0', 'adr_entre' => 'Adress0'],
            ['id_entre' => '1', 'name_entre' => 'nomEntre1', 'adr_entre' => 'Adress1'],
            ['id_entre' => '2', 'name_entre' => 'nomEntre2', 'adr_entre' => 'Adress2'],
            ['id_entre' => '3', 'name_entre' => 'nomEntre3', 'adr_entre' => 'Adress3']
        ];

        $entreprises = [];
        foreach($result as $key=>$row){
            $entreprises[] = new Entreprise($row['id_entre'], $row['name_entre'], $row['adr_entre']);
        }
    }
}

