<?php
session_start();
?>
<!DOCTYPE html>
<html class="no-js">
<head>
	<meta charset="utf-8">
	<meta content="IE=edge,chrome=1" http-equiv="X-UA-Compatible">
	<title>股票投資組合暨資金配置系統</title>
	<meta content="The fixed navigation UI pattern that puts content first, works (mostly) everywhere, and needs no jQuery!" name="description">
	<meta content="width=device-width" name="viewport">
    <link rel="shortcut icon" type="image/gif" href="img/logo0.png">
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
	<div class="menu-trigger"></div>
	<nav id="navbar">
		<ul>
        	<li style=" padding-top:0; padding-bottom:0;"><a href="./index.html"><img src="img/logo3.png" height="80px" width="auto"></a></li>
			<li><a href="./AssetAllocation.php">資產配置</a></li>
			<li><a href="#">報酬試算</a></li>
		</ul>

		<ul>
        	<li><a href="http://www.ncue.edu.tw/front/bin/home.phtml">NCUE</a></li>
			<li><a href="#">ABOUT</a></li>
            <li><a href="#">NEWS</a></li>
		</ul>
	</nav>
<!--php註解-->
<?php /*?>
<?php
	$mysqli = new mysqli('localhost', 'u676594242_IM105', '1uPqYHlF9r', 'u676594242_cpaas') or die ('connect die');
	
?>
<?php */?>
	<div class="block">
		<div id="bar">
            <div class="button"><p>看類股<img src="img/bar_down.png"></p></div>
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
            <div id="bar">
            <div class="button"><p>看熱門股<img src="img/bar_down.png"></p></div>
                
            </div>
        </div>
        <!--<div class="button"><img src="img/bar_down.png"></div>-->
    	<!--
        <div class="keyIn">
        	股票代碼：<input name="stockNumber" type="text"><input name="btn_send" type="button" value="增加">
        </div>
        -->
<!--php註解-->
<?php /*?>
<?php
	$sqlstr1 = "select number from category where category = '金融保險';";
	$result1 = mysql_query($sqlstr1)or die ('die1');
	$sqlstr2 = "select * from stockinfo where categoryNumber = '$result1';";
	$result2 = mysql_query($sqlstr2)or die ('die2');
	$NumberOfRow = mysql_num_rows($result2);
	
?>
<?php */?>
        <form>
        <div class="keyIn">
          股票名稱/代碼搜尋：
          <select data-placeholder="輸入選取欲選擇類股" style="width:350px;" class="chosen-select" multiple tabindex="6">
            <option value=""></option>
            <optgroup label="水泥">
              <option></option>
            </optgroup>
            <optgroup label="食品">
              <option></option>
            </optgroup>
            <optgroup label="塑膠">
              <option></option>
            </optgroup>
            <optgroup label="紡織纖維">
              <option></option>
            </optgroup>
            <optgroup label="電機機械">
              <option></option>
            </optgroup>
            <optgroup label="電器電纜">
              <option></option>
            </optgroup>
            <optgroup label="化工">
              <option></option>
            </optgroup>
            <optgroup label="生技醫療">
              <option></option>
            </optgroup>
            <optgroup label="玻璃纖維">
              <option></option>
            </optgroup>
            <optgroup label="造紙">
              <option></option>
            </optgroup>
            <optgroup label="鋼鐵">
              <option></option>
            </optgroup>
            <optgroup label="橡膠">
              <option></option>
            </optgroup>
            <optgroup label="半導體">
              <option></option>
            </optgroup>
            <optgroup label="電腦及周邊設備">
              <option></option>
            </optgroup>
            <optgroup label="光電">
              <option></option>
            </optgroup>
            <optgroup label="通信網路">
              <option></option>
            </optgroup>
            <optgroup label="電子零組件">
              <option></option>
            </optgroup>
            <optgroup label="電子通路">
              <option></option>
            </optgroup>
            <optgroup label="資訊服務">
              <option></option>
            </optgroup>
            <optgroup label="其他電子">
              <option></option>
            </optgroup>
            <optgroup label="建材營造">
              <option></option>
            </optgroup>
            <optgroup label="航運業">
              <option></option>
            </optgroup>
            <optgroup label="觀光">
              <option></option>
            </optgroup>
            <optgroup label="金融保險">
            <!--php註解-->
            <?php /*?>
            <?
			  for($i=0; $i<$NumberOfRow; $i++){
				  $row = mysql_fetch_row($result2, MYSQL_NUM);
				  $temp = $row[0] + " " + $row[1];
				  ?>
				  <option>
				  <?
				  echo"$temp";
			  }
			?>
			<?php */?>
                  </option>
              <option>2801 彰銀</option>
              <option>2809 京城銀</option>
              <option>2812 台中銀</option>
              <option>2816 旺旺保</option>
              <option>2820 華票</option>
              <option>2823 中壽</option>
              <option>2832 台產</option>
              <option>2833 台壽保</option>
              <option>2834 臺企銀</option>
              <option>2836 高雄銀</option>
              <option>2837 凱基銀</option>
              <option>2838 聯邦銀</option>
              <option>2845 遠東銀</option>
              <option>2847 大眾銀</option>
              <option>2849 安泰銀</option>
              <option>2850 新產</option>
              <option>2851 中再保</option>
              <option>2852 第一保</option>
              <option>2855 統一證</option>
              <option>2856 元富證</option>
              <option>2867 三商壽</option>
              <option>2880 華南金</option>
              <option>2881 富邦金</option>
              <option>2882 國泰金</option>
              <option>2883 開發金</option>
              <option>2884 玉山金</option>
              <option>2885 元大金</option>
              <option>2886 兆豐金</option>
              <option>2887 台新金</option>
              <option>2888 新光金</option>
              <option>2889 國票金</option>
              <option>2890 永豐金</option>
              <option>2891 中信金</option>
              <option>2892 第一金</option>
              <option>5880 合庫金</option>
              <option>6005 群益證</option>
            </optgroup>
            <optgroup label="貿易百貨">
              <option></option>
            </optgroup>
            <optgroup label="油氣燃氣">
              <option></option>
            </optgroup>
            <optgroup label="存託憑證">
              <option></option>
            </optgroup>
            <optgroup label="其他">
              <option></option>
            </optgroup>
          </select>
        </div>
        
        <div class="cart" id="cart">
            <div class="total"><!--尚未有任何選股--></div>
            <ul class="list"></ul>
            <div id="option">
            <!--
                資本：<input name="stockNumber" type="text">元<br>
                預期報酬：<input name="stockNumber" type="text">%<br>
            -->
            </div>
        </div>
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
	</form>
	
</body>
</html>