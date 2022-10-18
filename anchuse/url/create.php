<?php

header('Access-Control-Allow-Origin:*');
header("Content-Type:application/json;charset=utf-8");

function create($name,$memId,$memPsw,$sex,$tel){


    require_once("./url.php");

    $sql = "insert into memeber values(null,'{$name}','{$memId}',{$memPsw},{$sex},{$tel})";
    

    $member = $pdo->exec($sql);

  
    //$member->rowCount();

    //echo $member->rowCount();
    
    
}

create($_GET['name'],$_GET['memId'],$_GET['memPsw'],$_GET['sex'],$_GET['tel']);

// create($_POST['name'],$_POST['memId'],$_POST['memPsw'],$_POST['sex'],$_POST['tel']);

?>