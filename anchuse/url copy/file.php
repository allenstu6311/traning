<?php
$errMsg = "";
try {
	require_once("./url.php");
	//.......確定是否上傳成功
	if( $_FILES["pic"]["error"] == UPLOAD_ERR_OK){
		//----------------------
		//先檢查images資料夾存不存在
		if( file_exists("images") === false){
			mkdir("images");
		}
		//將檔案copy到要放的路徑
		$fileInfoArr = pathinfo($_FILES["pic"]["name"]);
		$fileName = uniqid().".{$fileInfoArr["extension"]}"; //parthinfo()回傳資訊 此為固定值 類似.png .wng等副檔名 

		$from = $_FILES["pic"]["tmp_name"];//tmp_name為規定欄位
		$to = "images/$fileName";
		if(copy( $from, $to)===true){
			//將檔案名稱寫回資料庫
			$sql = "INSERT INTO `PROD` (`PROD_ID`, `PROD_NAME`, `PROD_PRICE`, `PROD_PIC`, `PROD_EVALUTION`, `PROD_TIMES`,`label`) values(7, :PROD_NAME, :PROD_PRICE, :fileName,  :PROD_EVALUTION, :PROD_TIMES, :label)";
			$products = $pdo->prepare( $sql );
			$products -> bindValue(":PROD_NAME", $_POST["name"]);//?
			$products -> bindValue(":PROD_PRICE", $_POST["price"]);
            $products -> bindValue(":fileName", $fileName);
			$products -> bindValue(":PROD_EVALUTION", $_POST["evaluation"]);
			$products -> bindValue(":PROD_TIMES", $_POST["people"]);
            $products -> bindValue(":label", $_POST["label"]);

		
			$products -> execute();
			echo "商品編號:", $pdo->lastInsertId();
			// header("location:prodList.php");
		}

	}else{
		echo "錯誤代碼 : {$_FILES["upFile"]["error"]} <br>";
		echo "新增失敗<br>";
	}
} catch (PDOException $e) {
	$errMsg .= "錯誤原因 : ".$e -> getMessage(). "<br>";
	$errMsg .= "錯誤行號 : ".$e -> getLine(). "<br>";	
}
echo $errMsg;

?> 