<?php
use classes\{database};

include("heads.php");

$notice = "";

?>

<!DOCTYPE html>
<html lang="en">
<!-- 
<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <title>Super Hotdog</title>
    <link rel="stylesheet" href="css/style.css" />

</head> -->
<?php
include("html_header.php");
?>

<body>
	<div class="wrapper">
		<p class="header">SUPER HOTDOG!!</p>
		<br>
		<div class="ctn">
			<a href="register.php"><div class="btn">Register</div></a>
			<a href="login.php"><div class="btn">Login</div></a>
		</div>
	</div>
</body>
</html>