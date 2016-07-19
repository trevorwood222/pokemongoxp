<!DOCTYPE html>
<html>
<head>
	<title>Raw Data for Pokemon Go</title>
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<link rel="stylesheet" type="text/css" href="/css/style.css">

</head>
<?php include_once($_SERVER["DOCUMENT_ROOT"] . "/levels.php"); ?>
<body>

	<div style="padding:15px;">
		<h1 >Raw Data for Pokemon Go</h1>
		<a href="/">Back to calculator</a>
		<p>Last Updated: <?php echo $last_level_update;?></p>
	</div>
	<table class="rawdata_table">

		<tr>
			<th>Level</th>
			<th>XP Required</th>
			<th>Total XP</th>
			<th>Unlocked Items</th>
			<th>Rewards</th>
		</tr>

		<?php 
		
		foreach ($levels as $value) {
			if($value['level'] == 0){
				continue;
			}
			echo '<tr>';
			echo '<td>'.$value['level'].'</td>';
			echo '<td>'.$value['xp_req'].'</td>';
			echo '<td>'.$value['total_xp_req'].'</td>';
			echo '<td>'.$value['unlocked_items'].'</td>';
			echo '<td>'.$value['rewards'].'</td>';
			echo '</tr>';
		}
		?>
	</table>


	<!-- <img src="https://www.primagames.com/media/files/Pokemon-Go-eggs.jpg/PRIMAP/resize/1200x/quality/80"> -->

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