<?
/*函式變數說明
$array  : 母集合
$number : 要取出的元素數量
$type_a   : p=重覆排列; np=不重覆排列;
$type_c   : c=重覆組合; nc=不重覆組合

*/

function combination($array, $number, $type_a, $type_c)
{
//更新array排序, 避免index不連續, 並移除重複元素
$array = array_unique($array);
sort($array);

//集合內元素數量
$size = count($array);

//計算所有組合數
$total = pow($size,$number);

 //取得所有排列
 for($i=0;$i<$number;$i++)
 {
  for($j=0;$j<$total;$j++)
  {
  $index = intval($j/pow($size,$i))%$size;
  $result[$j][$i] = $array[$index];
  }
 }

 //重新排列移除相同組合
 if($type_c == "c" || $type_c == "nc")
 {
  for($k=0; $k<$total; $k++)
  {
  sort($result[$k]);
  $result[$k] = implode(",",$result[$k]);
  }
  $result = array_unique($result);  
  sort($result);
  
  $length = count($result);
  for($k=0; $k<$length; $k++)
  {
   if(count($result[$k])!=0)
   {$result[$k] = explode(",",$result[$k]);}
   else
   {unset($result[$k]);}
  }
 }
 
 //移除重複選取組合
 if($type_a == "np" || $type_c == "nc")
 {
  $length = count($result); 
  for($k=0; $k<$length; $k++)
  {
  $result[$k] = array_unique($result[$k]);
  $length_ = count($result[$k]);
   if($length_ != $number)
   {unset($result[$k]);}
  }
  sort($result);
 }
return $result;
}
?>
