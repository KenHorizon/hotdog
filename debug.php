<?php
use classes\{database};

include("heads.php");

$notice = "";
foreach ($_POST as $key => $value){
    echo "{$key} = {$value} \r\n";
    if (!empty($_POST[$key])) {
    
    }
}
if ($_SERVER["REQUEST_METHOD"] == "POST") {
	$language = $_POST["languages"];
	$languages = "";
	
	foreach($language as $get_language) {
		$languages .= $get_language. ", ";
	}
    echo $languages;
}

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <title>Super Hotdog</title>
    <link rel="stylesheet" href="css/style.css" />

</head>

<body>
	<div class="wrapper">
		<p class="header">SUPER HOTDOG!!</p>
		<div class="ctn">
			<form action="<?php htmlspecialchars($_SERVER["PHP_SELF"]) ?>" method="POST">
            <input class="forms_input" type="text" name="n1" placeholder="1"  required>
            <input class="forms_input" type="text" name="n2" placeholder="2"  required>
            <div class="forms_lang_select text">
                <label for="eng_select">English</label>
                <input class="forms_input" type="checkbox" id="eng_select" name="languages[]" value="English" placeholder="English">
                <label for="fil_select">Tagalog</label>
                <input class="forms_input" type="checkbox" id="fil_select" name="languages[]" value="Tagalog" placeholder="Tagalog">
                <label for="jap_select">Japanese</label>
                <input class="forms_input" type="checkbox" id="jap_select" name="languages[]" value="Japanese" placeholder="Japanese">
                <label for="taw_select">Taiwanese</label>
                <input class="forms_input" type="checkbox" id="taw_select" name="languages[]" value="Taiwanese" placeholder="Taiwanese">
                <label for="spa_select">Spanish</label>
                <input class="forms_input" type="checkbox" id="spa_select" name="languages[]" value="Spanish" placeholder="Spanish">
            </div>
                <input class="forms_input" type="submit" value="Create">
			</form>
	</div>
</body>
</html>