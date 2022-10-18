<?php

session_start();


header('Access-Control-Allow-Origin:*');
header("Content-Type:application/json;charset=utf-8");

echo "ok"

// function get($memId,$memPsw){
  
//   require_once("./url.php");
//   $sql = "select * from `memeber` where memId='{$memId}' and memPsw={$memPsw}"; 
//   $member = $pdo->query($sql);

//   if($member->rowCount()==0){
//     echo "1";
//   }else{
    
//     $memRow = $member->fetch(PDO::FETCH_ASSOC);
//     //登入成功後將登入者資料寫入session

//     $_SESSION["memId"] = $memRow["memId"];
//     $_SESSION["memName"] = $memRow["ename"];
//     $_SESSION["memPsw"] = $memRow["memPsw"];
//     $_SESSION["tel"] = $memRow["tel"];
//     //送出登入者的姓名資料
//     $result =['tel'=>$_SESSION["tel"],"memId"=>$_SESSION["memId"],"memName"=>$_SESSION['memName'],"memPsw"=>$_SESSION['memPsw']];

//     echo json_encode($result);

//   }
// }
// get($_GET['memId'],$_GET['memPsw'])

    // require_once("./url.php");
    // $sql = "select * from `memeber` where memId=:memId and memPsw=:memPsw"; 
    // $member = $pdo->prepare($sql);
    // $member->bindValue(":memId", $_POST["memId"]);
    // $member->bindValue(":memPsw", $_POST["memPsw"]);
    // $member->execute();
  
    // if( $member->rowCount()==0){ //查無此人
    //   echo "1";
    // }else{ //登入成功
    //   //自資料庫中取回資料
    //   $memRow = $member->fetch(PDO::FETCH_ASSOC);
    //   //登入成功後將登入者資料寫入session
 
    //   $_SESSION["memId"] = $memRow["memId"];
    //   $_SESSION["memName"] = $memRow["ename"];
    //   $_SESSION["memPsw"] = $memRow["memPsw"];
    //   $_SESSION["tel"] = $memRow["tel"];
    //   //送出登入者的姓名資料
    //   $result =['tel'=>$_SESSION["tel"],"memId"=>$_SESSION["memId"],"memName"=>$_SESSION['memName'],"memPsw"=>$_SESSION['memPsw']];

    //   echo json_encode($result);
    // // }
?>