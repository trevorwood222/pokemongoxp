<?php 
$current_level 		= intval($_GET['clvl']);
$current_xp 			= intval($_GET['cxp']);
$xp_earned 				=	intval($_GET['xpe']);

// check if all values are set

if($current_level == "" || $current_xp < 0 || $xp_earned == ""){
	include($_SERVER["DOCUMENT_ROOT"] . "/inc/header.php");
	include($_SERVER["DOCUMENT_ROOT"] . "/inc/levels.php");
	echo '<p>'.$lg['error1'].'</p><a href="/">'.$lg['back'].'</a>';
	include($_SERVER["DOCUMENT_ROOT"] . "/inc/footer.php");
	exit();
}

//set cookies
setcookie("current_level", $current_level, time() + (86400 * 365), "/"); //
setcookie("current_xp", $current_xp, time() + (86400 * 365), "/"); //
setcookie("xp_earned", $xp_earned, time() + (86400 * 365), "/"); //


include($_SERVER["DOCUMENT_ROOT"] . "/inc/header.php");
include($_SERVER["DOCUMENT_ROOT"] . "/inc/levels.php");

?>

<div id="fb-root"></div>

<!-- facebook -->
<script>(function(d, s, id) {
  var js, fjs = d.getElementsByTagName(s)[0];
  if (d.getElementById(id)) return;
  js = d.createElement(s); js.id = id;
  js.src = "//connect.facebook.net/en_US/sdk.js#xfbml=1&version=v2.7&appId=520425911493829";
  fjs.parentNode.insertBefore(js, fjs);
}(document, 'script', 'facebook-jssdk'));</script>


<!-- twitter -->
<script>window.twttr = (function(d, s, id) {
  var js, fjs = d.getElementsByTagName(s)[0],
    t = window.twttr || {};
  if (d.getElementById(id)) return t;
  js = d.createElement(s);
  js.id = id;
  js.src = "https://platform.twitter.com/widgets.js";
  fjs.parentNode.insertBefore(js, fjs);
 
  t._e = [];
  t.ready = function(f) {
    t._e.push(f);
  };
 
  return t;
}(document, "script", "twitter-wjs"));</script>




<div class="results_container">

	<div class="results_main_header">
		<a style="float:left;" href="/"><?php echo $lg['back2']; ?></a>
		<a style="float:right;" href="/rawdata"><?php echo $lg['rawdata'];?></a>
		<div style="clear:both;"></div>
		<?php echo $lg['main1'];?>
	</div>


	<div class="results_ul_header">
		<div class="first"><?php echo $lg['lvl'];?></div>
		<div class="second"><?php echo $lg['time_to_reach_level'];?></div> 
		<div style="clear:both;"></div>
	</div>

	<ul class="results_ul">
	<?php
	$levels_count = count($levels)-1;
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
		}elseif($hours > 1){$hours = number_format($hours)." ".$lg['hours']." ";
		}else{$hours = number_format($hours)." ". $lg['hour']." ";}

		// minutes will never be singular, but leaving here for completion
		if($minutes == 0){$minutes = "";
		}elseif($minutes > 1){$minutes = $minutes." ".$lg['minutes'];
		}else{$minutes = $minutes." ".$lg['minute'];}

		// display results
		echo 
		'<li>
			<div class="first">'.$a_level.'</div>
			<div class="second">'.$hours.$minutes.'</div>
			<div class="three highlightoff"><div class="redButton small">'.$lg['rewards'].'</div></div>
			<div style="clear:both;"></div>
			<div class="rewards" style="display:none;">'.$rewards.'</div>
		</li>';
	} 


	?>
	</ul>
	<div class="results_share_div">
		<!-- facebook share -->
		<div class="fb-share-button" <?php echo 'data-href="http://www.pokemongoxp.com/?lg='.$set_lg.'"'; ?> data-layout="button" data-size="large" data-mobile-iframe="true"><a class="fb-xfbml-parse-ignore" target="_blank" href="https://www.facebook.com/sharer/sharer.php?u=http%3A%2F%2Fwww.pokemongoxp.com%2F&amp;src=sdkpreparse">Share</a></div>

		<!-- twitter share-->
		<a class="twitter-share-button" data-size="large" <?php echo 'data-url="http://www.pokemongoxp.com/results?clvl='.$current_level.'&cxp='.$current_xp.'&xpe='.$xp_earned.'&lg='.$set_lg.'"';  echo 'href="https://twitter.com/intent/tweet?text='.$lg['twittermessage'].'"'; ?>>Tweet</a>

		<div style="clear:both;"></div>
	</div>



	<div class="results_footer_div">
		<p>This website is not affiliated with Niantic or The Pokemon Company.</p>
		<p>Made by Trevor Wood - <a href="https://twitter.com/frogg616">Twitter</a></p>
	</div>

</div>

<script type="text/javascript" src="//code.jquery.com/jquery-1.10.2.js"></script>
<!-- <script type="text/javascript" src="//code.jquery.com/ui/1.11.0/jquery-ui.js"></script> -->
<script type="text/javascript">
	$('.redButton').on('click',function(){
		$(this).parent().parent().find(".rewards").slideToggle('fast');
	});
</script>


<?php
include($_SERVER["DOCUMENT_ROOT"] . "/inc/footer.php");
?>
