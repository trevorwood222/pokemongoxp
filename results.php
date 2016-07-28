<?php 
$current_level 		= intval($_GET['clvl']);
$current_xp 			= intval($_GET['cxp']);
$xp_earned 				=	intval($_GET['xpe']);

// check if all values are set

include($_SERVER["DOCUMENT_ROOT"] . "/inc/header.php");
include($_SERVER["DOCUMENT_ROOT"] . "/inc/levels.php");

if($current_level == "" || $current_xp < 0 || $xp_earned == ""){
	echo '<p>'.$lg['error1'].'</p><a href="/">'.$lg['back'].'</a>';
	include($_SERVER["DOCUMENT_ROOT"] . "/inc/footer.php");
	exit();
}



?>


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
	}elseif($hours > 1){$hours = $hours." ".$lg['hours']." ";
	}else{$hours = $hours." ". $lg['hour']." ";}
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
<br>
<p class="made_by">Made by Trevor Wood - <a href="https://twitter.com/frogg616">Twitter</a></p>


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
