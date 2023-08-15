<?php
    include_once('DataManager.php');
    $dataManager = new DataManager();

    $EntrArrey = $dataManager->GetAllEtreprises();

    foreach($EntrArrey as $key=>$obj)
    {
        echo $obj->getName();
    }
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Brivaël FER</title>
</head>
<body>
    
</body>
</html>