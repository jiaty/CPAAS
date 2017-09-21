<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>CPAAS Model Test</title>
</head>

<body>
<?
$revenue_2891 = array(1.4925, 0.6437, 1.7468);
$price_2891 = array(23.8, 23.45, 23.3);
$revenue_2881 = array(0.4784, -0.7911, 0.637);
$price_2881 = array(63, 62.7, 63.2);

echo "2891中信金 報酬率樣本";
print_r($revenue_2891);
echo "<br>";
echo "2891中信金 收盤股價樣本";
print_r($price_2891);
echo "<br>";
echo "2881富邦金 報酬率樣本";
print_r($revenue_2881);
echo "<br>";
echo "2881富邦金 收盤股價樣本";
print_r($price_2881);
echo "<br>";

$revenue_average_2891 = array_sum($revenue_2891) / count($revenue_2891);
$revenue_average_2881 = array_sum($revenue_2881) / count($revenue_2881);
echo "2891中信金期望報酬: " , $revenue_average_2891 , "<br>";
echo "2881富邦金期望報酬: " , $revenue_average_2881 , "<br>";


$price_average_2891 = array_sum($price_2891) / count($price_2891);
$price_average_2881 = array_sum($price_2881) / count($price_2881);

if(count($price_2891) == count($price_2881))
	$count = count($price_2891);

$x_square_sum=0; //X 平方和累計
$y_square_sum=0; //Y 平方和累計
$XMD=array(); //X 離均差
$YMD=array(); //Y 離均差
$mdcross_sum=0; //X,Y 離均差交乘積和

//計算股價變異數及標準差
for($i=0; $i<$count; $i++)
{
	$xdif=(float)$price_2891[$i]-$price_average_2891; //X 離均差
	$ydif=(float)$price_2881[$i]-$price_average_2881; //Y 離均差
	$XMD[$i]=$xdif;
	$YMD[$i]=$ydif;
	$mdcross_sum += $xdif*$ydif; //X,Y 離均差乘積和
	$xdif_square_sum += pow($xdif, 2); //X 離均差平方和
	$ydif_square_sum += pow($ydif, 2); //Y 離均差平方和
}

$priceVAR_2891 = $xdif_square_sum / ($count-1);
$priceVAR_2881 = $ydif_square_sum / ($count-1);
echo "2891中信金股價變異數: " , $priceVAR_2891 , "<br>";
echo "2881富邦金股價變異數: " , $priceVAR_2881 , "<br>";


$priceSTDEV_2891 = sqrt($priceVAR_2891);
$priceSTDEV_2881 = sqrt($priceVAR_2881);
echo "2891中信金股價標準差: " , $priceSTDEV_2891 , "<br>";
echo "2881富邦金股價標準差: " , $priceSTDEV_2881 , "<br>";

$covariance_xy = $mdcross_sum / ($count-1);
echo "2891中信金2881富邦金股價共變數: " , $covariance_xy , "<br>";

include_once("./Matrix.class.php"); 
$matrix = array(
	 array( $priceSTDEV_2891, $covariance_xy, $revenue_average_2891, 1 ),
	 array( $covariance_xy, $priceSTDEV_2881, $revenue_average_2881, 1 ),
	 array( $revenue_average_2891, $revenue_average_2881, 0, 0 ),
	 array( 1, 1, 0, 0 ),
 	 );

$Matriz = new matrix($matrix);
$Inverse= $Matriz->InversaMatriz($matrix);

echo "原矩陣";
print_r($matrix);
echo "<br>";
echo "反矩陣";
print_r($Inverse);
echo "<br>";

echo "假設User期望報酬是: 1.3 <br>";
$E = 1.3;
$W1 = $Inverse[0][2] * $E + $Inverse[0][3];
$W2 = $Inverse[1][2] * $E + $Inverse[1][3];
echo "2891中信金配置比例是: <br>";
echo $W1;
echo "<br>";
echo "2881富邦金配置比例是: <br>";
echo $W2;
echo "<br>";


?>
</body>
</html>