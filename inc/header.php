<?php 
// all ready and available languages
$available_languages = [
	"en" => "English",
	"zh" => "中文", //chinese
	"ja" => "日本語" //japanese
];

// check get for new language
if(isset($_GET['lg'])){
	$set_lg_check = $_GET['lg'];
	//check if valid language
	if(array_key_exists($set_lg_check, $available_languages)){
		// set language
		$set_lg = $set_lg_check;
		// set cookie
		$cookie_name = "lg";
		$cookie_value = $set_lg;
		setcookie($cookie_name, $cookie_value, time() + (86400 * 365), "/"); // 
		
	}
}

// check cookie for language
if(!isset($set_lg) && isset($_COOKIE['lg'])){
	$set_lg_check = $_COOKIE['lg'];
	if(array_key_exists($set_lg_check, $available_languages)){
		// set language
		$set_lg = $set_lg_check;
	}
}

// if language not set, set to english
if(!isset($set_lg)){
	$set_lg = "en";
}

// get language pack
switch ($set_lg) {
	case 'zh': include($_SERVER["DOCUMENT_ROOT"] . "/langs/chinese.php"); break;
	case 'ja': include($_SERVER["DOCUMENT_ROOT"] . "/langs/japanese.php"); break;
	default: include($_SERVER["DOCUMENT_ROOT"] . "/langs/english.php"); break;
}
	
?>

<!DOCTYPE html>
<html <?php echo 'lang="'.$lg['lang'].'"'; ?>>
<head>
	

	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Pokemon GO XP Calculator</title>

	<meta charset="UTF-8">
	<meta name="description" <?php echo 'content="'.$lg['desc'].'"';?>>
	<meta name="keywords" <?php echo 'content="'.$lg['keywords'].'"';?>>

	<link href='https://fonts.googleapis.com/css?family=Open+Sans' rel='stylesheet' type='text/css'>
	<link rel="stylesheet" type="text/css" href="/css/style.css">


	
	<link rel="apple-touch-icon" sizes="57x57" href="/apple-touch-icon-57x57.png">
	<link rel="apple-touch-icon" sizes="60x60" href="/apple-touch-icon-60x60.png">
	<link rel="apple-touch-icon" sizes="72x72" href="/apple-touch-icon-72x72.png">
	<link rel="apple-touch-icon" sizes="76x76" href="/apple-touch-icon-76x76.png">
	<link rel="apple-touch-icon" sizes="114x114" href="/apple-touch-icon-114x114.png">
	<link rel="apple-touch-icon" sizes="120x120" href="/apple-touch-icon-120x120.png">
	<link rel="apple-touch-icon" sizes="144x144" href="/apple-touch-icon-144x144.png">
	<link rel="apple-touch-icon" sizes="152x152" href="/apple-touch-icon-152x152.png">
	<link rel="apple-touch-icon" sizes="180x180" href="/apple-touch-icon-180x180.png">
	<link rel="icon" type="image/png" href="/favicon-32x32.png" sizes="32x32">
	<link rel="icon" type="image/png" href="/android-chrome-192x192.png" sizes="192x192">
	<link rel="icon" type="image/png" href="/favicon-16x16.png" sizes="16x16">
	<link rel="manifest" href="/manifest.json">
	<link rel="mask-icon" href="/safari-pinned-tab.svg" color="#5bbad5">
	<meta name="msapplication-TileColor" content="#da532c">
	<meta name="msapplication-TileImage" content="/mstile-144x144.png">
	<meta name="theme-color" content="#ffffff">


</head>
<body>