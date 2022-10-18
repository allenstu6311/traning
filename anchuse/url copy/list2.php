<?php
header('Access-Control-Allow-Origin:*');
header("Content-Type:application/json;charset=utf-8");

require_once("./url.php");


$sql = "select * from prod where Label=1 and prod_id>4";

$book = $pdo->query($sql);

$books = $book->fetchAll();

$data=[];

foreach($books as $i=> $page){

?>

<?php

    $data[]=$page;
}
echo json_encode($data);

?>
