<?php
include($_SERVER["DOCUMENT_ROOT"] . "/inc/header.php");
include($_SERVER["DOCUMENT_ROOT"] . "/inc/levels.php"); 
?>

<div style="padding:15px;">
	<h1><?php echo $lg['rawdataforpokemongo']; ?></h1>
	<a href="/"><?php echo $lg['back3']; ?></a>
	<p><?php echo $lg['lastupdated'].": ".$last_level_update;?></p>
</div>
<table class="rawdata_table">

	<tr>
		<th><?php echo $lg['level']; ?></th>
		<th><?php echo $lg['xp_req']; ?></th>
		<th><?php echo $lg['total_xp_req']; ?></th>
		<th><?php echo $lg['unlocked_items']; ?></th>
		<th><?php echo $lg['rewards']; ?></th>
	</tr>

	<?php 
	// displays all data from levels
	foreach ($levels as $value) {
		//exclude level 0
		if($value['level'] == 0){continue;}
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

<?php
include($_SERVER["DOCUMENT_ROOT"] . "/inc/footer.php");
?>