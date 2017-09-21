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
    <link rel="shortcut icon" type="image/gif" href="CPAAS/img/logo0.png">
	<link rel="stylesheet" href="css/stickymenu.css">
    <link rel="stylesheet" href="css/style.css">
    <link rel="stylesheet" href="css/cart.css">
    <link rel="stylesheet" href="css/chosen.css">
    <style type="text/css" media="all">
		/* fix rtl for demo */
		.chosen-rtl .chosen-drop { left: -9000px; }
  	</style>
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
    ?>

	<div class="menu-trigger"></div>
	<nav id="navbar">
		<ul>
        	<li style=" padding-top:0; padding-bottom:0;"><a href="index.html"><img src="img/logo3.png" height="80px" width="auto"></a></li>
			<li><a href="AssetAllocation.php">資產配置</a></li>
			<li><a href="#">報酬試算</a></li>
		</ul>

		<ul>
        	<li><a href="http://www.ncue.edu.tw/front/bin/home.phtml">NCUE</a></li>
			<li><a href="About.html">ABOUT</a></li>
            <li><a href="#">NEWS</a></li>
		</ul>
	</nav>

	<div class="block">
		<div id="bar">
            <div class="button"><p>看熱門股<img src="img/bar_down.png"></p></div>
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
    	<form method="post" action="AssetAllocationCount.php">
        <div class="keyIn">
          股票名稱/代碼搜尋：
          <select multiple name="selectedStock[]" id="stockinfo" data-placeholder="輸入選取欲選擇類股" style="width:90%;" class="chosen-select" tabindex="6">
              <optgroup label="金融保險">
             <?php
   			$sql = "SELECT stockName,new FROM stockInfo WHERE categoryNumber='1'";
			$sth= $link->query($sql);
			While($row =$sth->fetch())
				{
     				echo "<option> ".$row['new']." ".$row['stockName']."</option>"; 
     		  	} 
			?>
            </optgroup>
			<optgroup label="水泥">
            <?php
   			$sql = "SELECT stockName,new FROM stockInfo WHERE categoryNumber='2'";
			$sth= $link->query($sql);
			While($row =$sth->fetch())
				{
    				 echo "<option> ".$row['new']." ".$row['stockName']."</option>"; 
    		    } 
			?>
            </optgroup>
            <optgroup label="食品">
            <?php	

   			$sql = "SELECT stockName,new FROM stockInfo WHERE categoryNumber='3'";
			$sth= $link->query($sql);
			While($row =$sth->fetch())
				{
    				 echo "<option> ".$row['new']." ".$row['stockName']."</option>"; 
    		    } 
			?>
            </optgroup>
            <optgroup label="塑膠">
            <?php
   			$sql = "SELECT stockName,new FROM stockInfo WHERE categoryNumber='4'";
			$sth= $link->query($sql);
			While($row =$sth->fetch())
				{
    				 echo "<option> ".$row['new']." ".$row['stockName']."</option>"; 
    		    }
			$link = null; //結束與資料庫連線
			?>
            </optgroup>
          </select>
        </div>
        
        <div class="cart" id="cart">
            <div class="total"><!--尚未有任何選股--></div>
            <ul class="list"></ul>
            <div id="option">
                資本：<input name="stockNumber" type="text">元<br>
                預期報酬：<input name="stockNumber" type="text">%<br>
            </div>
            <button type="submit"><img src="CPAAS/img/submit.png" style="width: 50px; height:auto;"></button>
        </div>
        </form>
        
    </div>
	<footer id="bottombar">
    	<small>Copyright.ⓒ2015 NCUE IM. All Rights Reserved.<br></small>
    </footer>

	<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.6.4/jquery.min.js" type="text/javascript"></script>
    <script type="text/javascript" src="js/chosen.jquery.js"></script>
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
	<script type="text/javascript" src="js/jquery-latest.min.js"></script>
    <script type="text/javascript" src="js/block.js"></script>
    <script type="text/javascript" src="js/jquery.min.js"></script>
	<script type="text/javascript" src="js/jquery-ui-1.10.3.custom.min.js"></script>
    <script type="text/javascript" src="js/cart.js"></script>
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
             

	
</body>

</html>