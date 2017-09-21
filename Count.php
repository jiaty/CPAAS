<?php
session_start();
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>股票投資組合暨資金配置系統</title>
</head>

<body>

<?

	//首先，先來定義資料庫相關存取資料
	$db_host = "localhost";
	$db_user = "u676594242_IM105";
	$db_pass = "1uPqYHlF9r";
	$db_select = "u676594242_cpaas";
	
	//使用PDO存取資料庫時，需要將資料庫依下列格式撰寫，讓程式讀取資料庫
	$dbconnect = "mysql:host=".$db_host.";$db_user=".$db_user."";
	
	//建立使用PDO方式連線的物件，並放入指定的相關資料
	$dbgo = new PDO($dbconnect, $db_user, $db_pass); //??
	
	//建立查詢資料表的SQL語法
	$sql_stockinfo = $dbgo -> fetch("SELECT * FROM stockinfo"); //??
	
	if ($dbgo->errorCode())
	{
		echo "有錯誤！有錯誤！";
		print_r($dbgo->errorInfo());
	}
	
	echo $sql_stockinfo;
	
	$dbgo = NULL;



?>

</body>
</html>