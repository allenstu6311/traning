<?php
session_start();

try{

header('Access-Control-Allow-Origin:*');
header("Content-Type:application/json;charset=utf-8");
    require_once("./url.php");
    $sql = "select * from `memeber` where memId=:memId and memPsw=:memPsw"; 
    $member = $pdo->prepare($sql);
    $member->bindValue(":memId", $_GET["memId"]);
    $member->bindValue(":memPsw", $_GET["memPsw"]);
    $member->execute();
  
    if( $member->rowCount()==0){ //查無此人
      echo "1";
    }else{ //登入成功
      //自資料庫中取回資料
      $memRow = $member->fetch(PDO::FETCH_ASSOC);
      //登入成功後將登入者資料寫入session
 
      $_SESSION["memId"] = $memRow["memId"];
      $_SESSION["memName"] = $memRow["ename"];
      $_SESSION["memPsw"] = $memRow["memPsw"];
      $_SESSION["tel"] = $memRow["tel"];
      //送出登入者的姓名資料
      $result =['tel'=>$_SESSION["tel"],"memId"=>$_SESSION["memId"],"memName"=>$_SESSION['memName'],"memPsw"=>$_SESSION['memPsw']];

      echo json_encode($result);
    }
  }catch(PDOException $e){
    echo $e->getMessage();
  }


?>
