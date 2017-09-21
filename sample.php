<!DOCTYPE html>
<html class="no-js">
<head>
	<meta charset="utf-8">
	<meta content="IE=edge,chrome=1" http-equiv="X-UA-Compatible">
	<title>股票投資組合暨資金配置系統</title>
	<meta content="The fixed navigation UI pattern that puts content first, works (mostly) everywhere, and needs no jQuery!" name="description">
	<meta content="width=device-width" name="viewport">
    <link rel="shortcut icon" type="image/gif" href="img/logo0.png">
	<link rel="stylesheet" href="./css/stickymenu.css">
    <link rel="stylesheet" href="./css/style.css">
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

	
    
	<footer id="bottombar">
    	Copyright.ⓒ2015 NCUE IM. All Rights Reserved.<br>
    </footer>
	
	<script>
	window.onscroll=function(){document.getElementById('navbar').setAttribute('class', (window.pageYOffset>5?'fixednav clearfix':'clearfix'));}
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