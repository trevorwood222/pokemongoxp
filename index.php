<?php 
include($_SERVER["DOCUMENT_ROOT"] . "/inc/header.php");
?>


<div class="container">
	<div class="header">
		<div class="pokemongoLogoContainer">
			<div class="pokemongoLogo"></div>
		</div>
		<h1><span style="display:none;">Pokémon GO</span><?php echo $lg['header']; ?></h1>
		<!-- <p>How much longer until you level up?</p> -->
	</div>

	<div class="form_div">
		<form action="/results" method="get">
			<label for="clvl"><?php echo $lg['curlvl'];?></label>
			<input type="number" id="clvl" name="clvl" value="1" min="1" max="1000">

			<label for="cxp"><?php echo $lg['curxp'];?></label>
			<input type="number" id="cxp" name="cxp" value="100" min="1" max="1500000">

			<label for="xpe"><?php echo $lg['xpe'];?></label>
			<input type="number" name="xpe" id="xpe" value="250" min="50" max="150000">
				
			<input type="submit" value="<?php echo $lg['calculate'];?>" class="redButton big">
			
		</form>
	</div>
	<div style="clear:both;"></div>

	<div class="language_option">
		<div style="float:right;">
			<p><?php echo $lg['language'];?>: </p>
			<select onchange="javascript:location.href = this.value;">
				<?php
				foreach ($available_languages as $key => $value) {
					echo '<option ';
					if($key == $set_lg){echo 'selected ';}
					echo 'value="/?lg='.$key.'">'.$value.'</option>';
				}
				?>
			</select>
			<div style="clear:both;"></div>
		</div>
		<div style="clear:both;"></div>
	</div>

</div>

<?php
include($_SERVER["DOCUMENT_ROOT"] . "/inc/footer.php");
?>
