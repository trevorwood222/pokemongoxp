<!DOCTYPE html>
<html>
<head>
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Pokemon GO XP Calculator</title>

	<meta charset="UTF-8">
	<meta name="description" content="Pokemon Go XP Calculator, Find out how long it will be until you reach your next trainer level and see what rewards await you!">
	<meta name="keywords" content="Pokemon Go, ">

	<link href='https://fonts.googleapis.com/css?family=Open+Sans' rel='stylesheet' type='text/css'>
	<link rel="stylesheet" type="text/css" href="/css/style.css">

</head>
<body>

	<div class="container">
		<div class="header">
			<h1>Pokémon GO<br>XP Calculator</h1>
			<!-- <p>How much longer until you level up?</p> -->
		</div>

		<div class="form_div">
			<form action="/results" method="get">
				<label for="clvl">Current Level</label>
				<input type="number" id="clvl" name="clvl" value="1" min="1" max="1000">

				<label for="cxp">Current XP amount</label>
				<input type="number" id="cxp" name="cxp" value="100" min="1" max="1500000">

				<label for="xpe">About how much XP are you earning every <b>5 minutes<b>?</label>
				<input type="number" name="xpe" id="xpe" value="250" min="50" max="150000">
					
				<input type="submit" value="Calculate!" class="redButton big">
				
			</form>
		</div>
		<div style="clear:both;"></div>

		<div class="language_option">
			<div style="float:right;">
				<p>Language: </p>
				<select onchange="javascript:location.href = this.value;">
					<option value="/cn/index.php">Chinese</option>
					<option value="index.php" selected>English</option>
					<option value="/jp/index.php">Japanese</option>
					<option value="/kr/index.php">Korean</option>
					<option value="/es/index.php">Spanish</option>
				</select>
				<div style="clear:both;"></div>
			</div>
			<div style="clear:both;"></div>
		</div>

	</div>

<script>
  (function(i,s,o,g,r,a,m){i['GoogleAnalyticsObject']=r;i[r]=i[r]||function(){
  (i[r].q=i[r].q||[]).push(arguments)},i[r].l=1*new Date();a=s.createElement(o),
  m=s.getElementsByTagName(o)[0];a.async=1;a.src=g;m.parentNode.insertBefore(a,m)
  })(window,document,'script','https://www.google-analytics.com/analytics.js','ga');

  ga('create', 'UA-71263008-2', 'auto');
  ga('send', 'pageview');

</script>

<!-- <a href="">EN</a>
<a href="">JP</a> -->




</body>
</html>
