<?php
session_start();
?>
<!DOCTYPE html>
<html class="no-js">
<head>
	<meta charset="utf-8">
	<meta content="IE=edge,chrome=1" http-equiv="X-UA-Compatible">
	<title>股票投資組合暨資金配置系統</title>
	<meta content="以效率前緣法，計算出資產配置的黃金比例，為股票投資資金配置的決策支援系統。" name="description">
	<meta content="width=device-width" name="viewport">
    <link rel="shortcut icon" type="image/gif" href="file:///C|/Users/yachieh/Documents/project/專題/CPAAS/img/logo0.png">
	<link rel="stylesheet" href="file:///C|/Users/yachieh/Documents/project/專題/CPAAS/css/stickymenu.css">
    <link rel="stylesheet" href="file:///C|/Users/yachieh/Documents/project/專題/CPAAS/css/style.css">
    <link rel="stylesheet" href="file:///C|/Users/yachieh/Documents/project/專題/CPAAS/css/cart.css">
    <link rel="stylesheet" href="file:///C|/Users/yachieh/Documents/project/專題/CPAAS/css/chosen.css">
    <style type="text/css" media="all">
		/* fix rtl for demo */
		.chosen-rtl .chosen-drop { left: -9000px; }
  	</style>
</head>

<body>

	<div class="menu-trigger"></div>
	<nav id="navbar">
		<ul>
        	<li style=" padding-top:0; padding-bottom:0;"><a href="file:///C|/Users/yachieh/Documents/project/專題/CPAAS/index.html"><img src="file:///C|/Users/yachieh/Documents/project/專題/CPAAS/img/logo3.png" height="80px" width="auto"></a></li>
			<li><a href="file:///C|/Users/yachieh/Documents/project/專題/CPAAS/AssetAllocation.php">資產配置</a></li>
			<li><a href="#">報酬試算</a></li>
		</ul>

		<ul>
        	<li><a href="http://www.ncue.edu.tw/front/bin/home.phtml">NCUE</a></li>
			<li><a href="file:///C|/Users/yachieh/Documents/project/專題/CPAAS/About.html">ABOUT</a></li>
            <li><a href="#">NEWS</a></li>
		</ul>
	</nav>

	<div class="block">
		<div id="bar">
            <div class="button"><p>看熱門股<img src="file:///C|/Users/yachieh/Documents/project/專題/CPAAS/img/bar_down.png"></p></div>
            <h1>請將欲選擇個股拖放至選擇區</h1>
            <ul class="item-list">
                <li class="item" data-price="3691">
                    <div class="image"><p>碩禾<br>代號: 3691</p></div>
                </li>
                <li class="item" data-price="2231">
                    <div class="image"><p>為升<br>代號: 2231</p></div>
                </li>
                <li class="item" data-price="6414">
                    <div class="image"><p>樺漢<br>代號: 2231</p></div>
                </li>
                <li class="item" data-price="3611">
                    <div class="image"><p>鼎漢<br>代號: 3611</p></div>
                </li>
                <li class="item" data-price="2395">
                    <div class="image"><p>研華<br>代號: 2395</p></div>
                </li>
            </ul>
            
        </div>
        <!--<div class="button"><img src="img/bar_down.png"></div>-->
    	<form>
        <div class="keyIn">
          股票名稱/代碼搜尋：
          <select id="stockinfo" data-placeholder="輸入選取欲選擇類股" style="width:90%;" class="chosen-select" multiple tabindex="6">
              <option></option>

          </select>
        </div>
        
        <div class="cart" id="cart">
            <div class="total"><!--尚未有任何選股--></div>
            <ul class="list"></ul>
            <div id="option">
                資本：<input name="stockNumber" type="text">元<br>
                預期報酬：<input name="stockNumber" type="text">%<br>
            </div>
        </div>
    </div>
	<footer id="bottombar">
    	<small>Copyright.ⓒ2015 NCUE IM. All Rights Reserved.<br></small>
    </footer>

	<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.6.4/jquery.min.js" type="text/javascript"></script>
    <script type="text/javascript" src="file:///C|/Users/yachieh/Documents/project/專題/CPAAS/js/chosen.jquery.js"></script>
    <script type="text/javascript">
		var config = {
		  '.chosen-select'           : {},
		  '.chosen-select-deselect'  : {allow_single_deselect:true},
		  '.chosen-select-no-single' : {disable_search_threshold:10},
		  '.chosen-select-no-results': {no_results_text:'Oops, nothing found!'},
		  '.chosen-select-width'     : {width:"95%"}
		}
		for (var selector in config) {
		  $(selector).chosen(config[selector]);
		}
    </script>
	<script type="text/javascript" src="file:///C|/Users/yachieh/Documents/project/專題/CPAAS/js/jquery-latest.min.js"></script>
    <script type="text/javascript" src="file:///C|/Users/yachieh/Documents/project/專題/CPAAS/js/block.js"></script>
    <script type="text/javascript" src="file:///C|/Users/yachieh/Documents/project/專題/CPAAS/js/jquery.min.js"></script>
	<script type="text/javascript" src="file:///C|/Users/yachieh/Documents/project/專題/CPAAS/js/jquery-ui-1.10.3.custom.min.js"></script>
    <script type="text/javascript" src="file:///C|/Users/yachieh/Documents/project/專題/CPAAS/js/cart.js"></script>
	<script>
	window.onscroll=function(){document.getElementById('navbar').setAttribute('class', (window.pageYOffset>5?'fixednav clearfix':'clearfix'));};
	(function() {
		var $body = document.body
		, $menu_trigger = $body.getElementsByClassName('menu-trigger')[0];

		if ( typeof $menu_trigger !== 'undefined' ) {
			$menu_trigger.addEventListener('click', function() {
				$body.className = ( $body.className == 'menu-active' )? '' : 'menu-active';
			});
		}

	}).call(this);
	</script>
              <?php
$mysqlhost="localhost";
$mysqluser="root";
$mysqlpasswd="root1234";

// 建立資料庫連線
$link =mysql_connect($mysqlhost, $mysqluser, $mysqlpasswd);
if ($link == FALSE) {
	echo "不幸地，現在無法連上資料庫。請查詢資料庫連結是否有誤，請稍後再試。\n".mysql_error();
	exit();
}
		
mysql_query("set names utf8");
$mysqldbname="cpaas";
mysql_select_db($mysqldbname);

$shops = mysql_query("SELECT stockName FROM stockinfo WHERE categoryNumber='1' ");
if(!$shops){
   	echo "Execute SQL failed : ". mysql_error();
	exit;
}
$shopCodeArr=array();     //用來存哪些選項的陣列
$shopCount=0;
while($rows=mysql_fetch_array($shops))
{
	$shopCodeArr[$shopCount]=$rows[stockName];
	$shopCount++;
}
for($i=0;$i<count($shopCodeArr);$i++)
{
	echo "<script type=\"text/javascript\">";
	echo "document.getElementById(\"stockinfo\").options[$i]=new Option(\"$shopCodeArr[$i]\")";
	echo "</script>";
}
?>
	
</body>

</html>