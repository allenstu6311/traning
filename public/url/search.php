<?php
header('Access-Control-Allow-Origin:*');
header("Content-Type:application/json;charset=utf-8");

function init($keyWard){

    
require_once("./url.php");

$sql="select*from PROD where PROD_NAME like '%{$keyWard}%'";

$pdo->query($sql);


$book = $pdo->query($sql);

if($book->rowCount()==0){
    echo "";
}else{

    $books = $book->fetchAll();

$data=[];

foreach($books as $i=> $page){

    $data[]=$page;
};
echo json_encode($data);



}


}



init($_GET['keyWard']);




?>