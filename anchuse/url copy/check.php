<?php
try{

header('Access-Control-Allow-Origin:*');
header("Content-Type:application/json;charset=utf-8");

  require_once("./url.php");

  $sql  = "select memId from memeber where memId=?";
  $member = $pdo->prepare($sql);

  $member->bindValue(1,$_GET["memId"]);
  $member->execute();

  if( $member->rowCount() !=0){ //此帳號已存在, 不可用
    echo "1";
  }else{ //此帳號可使用
    echo "此帳號可使用";
  } 
}catch(PDOException $e){
  echo $e->getMessage();
  echo "error";
}
?>