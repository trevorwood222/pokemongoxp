<?php 
$current_level 		= intval($_GET['clvl']);
$current_xp 			= intval($_GET['cxp']);
$xp_earned 				=	intval($_GET['xpe']);

// check if all values are set
if($current_level == "" || $current_xp < 0 || $xp_earned == ""){
	echo '<p>うんと、何かを打ち忘れましたか？ もう一回確認しててください。</p><a href="/">戻る</a>';
	exit();
}

include_once($_SERVER["DOCUMENT_ROOT"] . "/levels.php");
$levels_count = count($levels)-1;


?>

<!DOCTYPE html>
<html>
<head>
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Pokemon GO XP計算機の結果</title>

	<link href='https://fonts.googleapis.com/css?family=Open+Sans' rel='stylesheet' type='text/css'>
	<link rel="stylesheet" type="text/css" href="/css/style.css">

	<script type="text/javascript" src="//code.jquery.com/jquery-1.10.2.js"></script>
	<script type="text/javascript" src="//code.jquery.com/ui/1.11.0/jquery-ui.js"></script>

</head>
<body>

	<div class="results_main_header">
		<a style="float:left;" href="/jp">計算機に戻る</a>
		<a style="float:right;" href="/jp/rawdata">レベル情報を見る</a>
		<div style="clear:both;"></div>
		<?php echo "<p><b>$current_level</b> レベルで, <b>$current_xp</b> XPは, 5分ごとに <b>$xp_earned</b>XP をもらっているのならこれぐらいかかります.</p>";?>
	</div>

	<div class="results_ul_header">
		<div class="first">Lvl</div>
		<div class="second">レベルアップ時間</div> 
		<div style="clear:both;"></div>
	</div>

	<ul class="results_ul">
	<?php

	$minutes = 0;
	$hours = 0;
	$accumulative_xp = 0;

	for ($i=$current_level+1; $i <= $levels_count; $i++) { 
		$minutes = 0;//reset minutes
		$hours = 0;//reset hours

		// current level
		$a_level = $levels[$i]['level'];

		// xp_required for this level + xp required for previous levels
		$accumulative_xp = $levels[$i]['xp_req'] + $accumulative_xp;


		$total_xp_req = $levels[$i]['total_xp_req'];
		$unlocked_items = $levels[$i]['unlocked_items'];
		$rewards = $levels[$i]['rewards'];

		// accumulative xp minus current xp
		$xp_gap = $accumulative_xp-$current_xp;


		// subtract xp_earned from xp_gap until 0
		// increment minutes by 5
		while($xp_gap >= 1){
			$xp_gap = $xp_gap - $xp_earned;
			$minutes = $minutes+5;
		}

		// convert minutes to hours
		while($minutes >= 60){
			$hours = $hours+1;
			$minutes = $minutes - 60;
		}

		// add text to hours & minutes
		if($hours == 0){$hours = "";
		}else{$hours = $hours."時間 ";}
		if($minutes == 0){$minutes = "";
		}else{$minutes = $minutes."分";}

		// display results
		echo 
		'<li>
			<div class="first">'.$a_level.'</div>
			<div class="second">'.$hours.$minutes.'</div>
			<div class="three highlightoff"><div class="redButton small">賞罰</div></div>
			<div style="clear:both;"></div>
			<div class="rewards" style="display:none;">'.$rewards.'</div>
		</li>';
	} 

	?>
	</ul>
	<br>
	<p class="made_by">Made by Trevor Wood - <a href="https://twitter.com/frogg616">Twitter</a></p>




	<script type="text/javascript">
		$('.redButton').on('click',function(){
			$(this).parent().parent().find(".rewards").slideToggle('fast');
		});
	</script>



<script>
  (function(i,s,o,g,r,a,m){i['GoogleAnalyticsObject']=r;i[r]=i[r]||function(){
  (i[r].q=i[r].q||[]).push(arguments)},i[r].l=1*new Date();a=s.createElement(o),
  m=s.getElementsByTagName(o)[0];a.async=1;a.src=g;m.parentNode.insertBefore(a,m)
  })(window,document,'script','https://www.google-analytics.com/analytics.js','ga');

  ga('create', 'UA-71263008-2', 'auto');
  ga('send', 'pageview');

</script>





</body>
</html>