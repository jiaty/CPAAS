<?php
session_start();
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>股票投資組合暨資金配置系統</title>
<meta content="以效率前緣法，計算出資產配置的黃金比例，為股票投資資金配置的決策支援系統。" name="description">
<link rel="shortcut icon" type="image/gif" href="CPAAS/img/logo0.png">
</head>

<body>

<?php //資料庫連線
  $host="localhost";
  $user="u920097311_im105";
  $passwd="cpaas105";
  $dbname="u920097311_cpaas";
  // 建立資料庫連線
  $shopCodeArr=array();     //用來存哪些選項的陣列
  $link =new PDO("mysql:host=".$host."; dbname=".$dbname, $user, $passwd, array(PDO::MYSQL_ATTR_INIT_COMMAND =>"SET NAMES utf8"));
  //PDO::MYSQL_ATTR_INIT_COMMAND 設定編碼
  
  $link->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION); //錯誤訊息提醒
  
  include_once("./matrix.class.php");
  include_once("./combination.class.php");
  
  $choosenStock = $_POST['selectedStock'];
  echo "使用者已選擇股票：<br>";
  //echo "系統POST值: <br>";
  //print_r($_POST['selectedStock']);
  //echo "<br>儲存之陣列變數:<br>";
  print_r($choosenStock);
  echo "<br>";
  $sum = count($_POST['selectedStock']); 
  echo "選擇股票筆數:<br>";
  echo $sum;
  echo "<br>";
  
  $stockPrice = array();
  $stockReturn = array();
  $stockKey = array();
  
  for($i=0;$i<$sum;$i++){
	  echo "所選股票:<br>";
	  echo $choosenStock[$i];
	  echo "<br>";
	  $key = substr( $choosenStock[$i] , 0 , 4 );
	  echo "key值:<br>";
	  echo $key;
	  echo "<br>";
	  $stockKey[$i] = $key;
	  
	  $stockPrice[$i] = array();
	  $stockReturn[$i] = array();
	  $j = 0;
	  
	  $sql = "SELECT price,rate_of_Return FROM remunerationInfo WHERE tickerSymbol='".$key."'";
	  $sth= $link->query($sql);
	  While($row =$sth->fetch())
	  {
		  //echo "".$row['price']." ".$row['rate_of_Return']." <br>";
		  $stockPrice[$i][$j] = $row['price'];
		  $stockReturn[$i][$j] = $row['rate_of_Return'];
		  $j++;
	  }
  }
  //echo "TEST：<br>";
  echo "StockPrice：<br>";
  print_r($stockPrice);
  echo "<br>";
  echo "StockReward：<br>";
  print_r($stockReturn);
  $link = null; //結束與資料庫連線
  
  //echo $j; //6
  $revenueAverage = array(); //此次選股個別股之期望報酬
  $priceAverage = array(); //此次選股個別股之股價平均
  $square_sum = array(); //離差平方和累計
  $MD = array(); //所有個股之全部離均差
  //$mdcross_sum = array(); //離均差交乘積和
  $priceVAR = array(); //股價變異數
  $priceSTDEV = array(); //股價標準差

  for($x=0;$x<$sum;$x++){
	//echo "<br>";
	//echo $choosenStock[$x];
	//echo "之個股期望報酬:<br>";
	$revenueAverage[$x] = (array_sum($stockReturn[$x]) / count($stockReturn[$x]));
	//echo $revenueAverage[$x];
	//echo "<br>";
	$priceAverage[$x] = (array_sum($stockPrice[$x]) / count($stockPrice[$x])); //股價平均
	$MD[$x] = array(); //個股離均差
	//計算股價變異數及標準差
	for($y=0;$y<$j;$y++){
	  $dif=(float)$stockPrice[$x][$y]-$priceAverage[$x]; //離均差
	  $MD[$x][$y] = $dif;
	  $square_sum[$x] += pow($dif, 2); //離均差平方和
	}
	$priceVAR[$x] = $square_sum[$x]/($sum-1);
	$priceSTDEV[$x] = sqrt($priceVAR[$x]);
  }
  echo "<br>個股期望報酬:<br>";
  print_r($revenueAverage);
  echo "<br>股價變異數:<br>";
  print_r($priceVAR);
  echo "<br>股價標準差:<br>";
  print_r($priceSTDEV);
  echo "<br>個股股價離均差:<br>";
  print_r($MD);
  echo "<br>排列組合:(for計算共變數)<br>";
  $combination = combination($stockKey, 2, 'np', 'nc');
  print_r($combination);
  //echo "<br>";
  //echo count($combination);
  //echo "<br>";
  $combinationMD = array();
  //$combination[$z][2]就存離均差交乘積和 原是$mdcross_sum
  //計算排列組合之離均差交乘積和
  for($z=0;$z<count($combination);$z++){
	  //$combination[$z][0]
	  //$combination[$z][1]
	  for($x=0;$x<$sum;$x++){
		  if($combination[$z][0] == $stockKey[$x]){
			$combinationMD[$z][0] = array();
		  	$combinationMD[$z][0] = $MD[$x]; //array
			//echo "<br>";
			//print_r($combinationMD[$z][0]);
			//echo "<br>";
		  }
		  if($combination[$z][1] == $stockKey[$x]){
			$combinationMD[$z][1] = array();
		  	$combinationMD[$z][1] = $MD[$x];
			//echo "<br>";
			//print_r($combinationMD[$z][1]);
			//echo "<br>";
		  }
	  }
	  if(count($combinationMD[$z][0]) == count($combinationMD[$z][1])){
		$MDcount = count($combinationMD[$z][0]);
		$MDsum = array();
		for($y=0;$y<$MDcount;$y++){
			$MDsum[$z]+=($combinationMD[$z][0][$y]*$combinationMD[$z][1][$y]);
			//echo $MDsum[$z];
			//echo "<br>";
		}
		$combination[$z][2] = $MDsum[$z];
	  }
	  //$combination[$z][2] = $combinationMD[$z][0]*$combinationMD[$z][1]; //wrong
	  //echo $combination[$z][2];
	  //echo "<br>";
  }
  for($i=0;$i<count($combination);$i++){
	  $combination[$i][3] = ($combination[$i][2]/($MDcount-1)); //計算共變數
  }
  echo "離均差交乘積和:([2]->交乘積和;[3]->共變數)<br>"; //成功
  print_r($combination);
  echo "<br>";
  //建立矩陣
  $matrix = array();
  for($r=0;$r<($sum);$r++){ //矩陣對角線:自己對自己的共變數=標準差
	  $matrix[$r][$r] = $priceSTDEV[$r];
  }
  //矩陣內共變數的安排
  $covarianceCount = 0;
  for($r=0;$r<$sum;$r++){
	for($c=0;$c<$sum;$c++){ //first row: $r=0 & first column: $c=0
	  if($matrix[$r][$c]==0)
		$matrix[$r][$c] = $combination[$covarianceCount][3];
	  if($matrix[$c][$r]==0){
		$matrix[$c][$r] = $combination[$covarianceCount][3];
		$covarianceCount++;
	  }
	}
  }
  for($r=0;$r<($sum);$r++){ //矩陣期望值:row
	  $matrix[$sum][$r] = $revenueAverage[$r];
	  $matrix[$sum+1][$r] =1;
  }
  for($c=0;$c<($sum);$c++){ //矩陣期望值:column
	  $matrix[$c][$sum] = $revenueAverage[$c];
	  $matrix[$c][$sum+1] = 1;
  }
  for($r=($sum);$r<($sum+2);$r++){ //矩陣右下角四個0的部分
	  for($c=($sum);$c<($sum+2);$c++){
		  $matrix[$r][$c] = 0;
	  }
  }
  
  echo "原矩陣:<br>";
  print_r($matrix);
  echo "<br>";
  $Matriz = new matrix($matrix);
  $Inverse= $Matriz->InversaMatriz($matrix);
  echo "反矩陣:<br>";
  print_r($Inverse);
  echo "<br>";
?>

</body>
</html>