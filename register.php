<?php
use classes\{database};

include("heads.php");

$notice = "";
$clearCache = false;
$firstname;
$middlename;
$surname;
$username;
$password;
$year;
$day;
$month;
$languages;
$provinces;
$gender;

foreach ($_POST as $key => $value){
    if (empty($_POST[$key])) {
		$clearCache = true;
    }
}
if ($_SERVER["REQUEST_METHOD"] == "POST") {
	// Filter all varaibles
	$firstname = filter_input(INPUT_POST, "firstname", FILTER_SANITIZE_SPECIAL_CHARS);
	$middlename = filter_input(INPUT_POST, "middlename", FILTER_SANITIZE_SPECIAL_CHARS);
	$surname = filter_input(INPUT_POST, "surname", FILTER_SANITIZE_SPECIAL_CHARS);
	$username = filter_input(INPUT_POST, "username", FILTER_SANITIZE_SPECIAL_CHARS);
	$password = filter_input(INPUT_POST, "password", FILTER_SANITIZE_SPECIAL_CHARS);
	$year = filter_input(INPUT_POST, "year", FILTER_SANITIZE_SPECIAL_CHARS);
	$day = filter_input(INPUT_POST, "day", FILTER_SANITIZE_SPECIAL_CHARS);
	$month = filter_input(INPUT_POST, "month", FILTER_SANITIZE_SPECIAL_CHARS);
	// $language = filter_input(INPUT_POST, "languages", FILTER_SANITIZE_SPECIAL_CHARS);
	// For some reason filter_input not accepting array form
	$language = $_POST["languages"];
	$provinces = filter_input(INPUT_POST, "provinces", FILTER_SANITIZE_SPECIAL_CHARS);
	$gender = filter_input(INPUT_POST, "gender", FILTER_SANITIZE_SPECIAL_CHARS);
    $birthday = "{$year}-{$month}-{$day}";
	$languages = "";
	
	foreach ($language as $get_language) {
		$languages .= $get_language. ", ";
	}

	if ($clearCache) {
		$clearCache = false;
		$language = "";
		$firstname = "";
		$middlename = "";
		$surname = "";
		$username = "";
		$password = "";
		$year = "";
		$day = "";
		$month = "";
		$languages = "";
		$provinces = "";
		$gender = "";
		header("Location: register.php?invalid_input");
	} else {
        try {
            database::query("INSERT INTO accounts (surname, middlename, firstname, username, password, gender, province, languages, birthday) VALUES ('$surname', '$middlename', '$firstname', '$username', '$password', '$gender', '$provinces', '$languages', '$birthday')");
			$notice = "Your Account has been successfully registered";
			header("Location: index.php");
        } catch (mysqli_sql_exception) {
            $notice = "The email is already taken!";
			function_alert("The username is already taken!");
        }
	}
}

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
		<div class="ctn">
			<form action="<?php htmlspecialchars($_SERVER["PHP_SELF"]) ?>" method="POST">
				<div class="formss">
					<div class="forms_name_select">
						<input class="forms_input" type="text" name="surname" placeholder="Surname"  required>
						<input class="forms_input" type="text" name="middlename" placeholder="Middle Name"  required>
						<input class="forms_input" type="text" name="firstname" placeholder="First Name"  required>
					</div>
					<hr>
					<div class="forms_input_select">
						<input class="forms_input" type="text" name="username" placeholder="Username"  required>
						<input class="forms_input" type="text" name="password" placeholder="Password">
					</div>
					<hr>
					<div class="forms_name_select">
						<input class="forms_input" type="text" name="provinces" placeholder="Provinces" required>
					</div>
					<hr>
					<label for="gender">Gender</label>
					<select class="forms_select" id="gender" name="gender" required>
						<option>-</option>
						<option value="male">Male</option>
						<option value="female">Female</option>
						<option value="unknown">Unknown</option>
					</select>
					<label for="fbirthday">Brithday</label>
					<select class="forms_select" id="fbirthday" name="month" required>
						<option>-</option>
						<option value="0">Month</option>
						<option value="1">January</option>
						<option value="2">February</option>
						<option value="3">March</option>
						<option value="4">April</option>
						<option value="5">May</option>
						<option value="6">June</option>
						<option value="7">July</option>
						<option value="8">August</option>
						<option value="9">September</option>
						<option value="10">October</option>
						<option value="11">November</option>
						<option value="12">December</option>
					</select>
					<input type="number" inputmode="numeric" min="1" max="31" class="forms_input" name="day" placeholder="Day" required>
                    <input type="number" inputmode="numeric" min="1800" max="2060" class="forms_input" name="year" placeholder="Year" required>
					<hr>
					<div class="forms_lang_select text small_font">
							<label for="tag_select">
								<div class="forms_checkbox">
								<input class="forms_input_checkbox" type="checkbox" id="tag_select" name="languages[]" value="Tagalog" placeholder="Tagalog">
								Tagalog
								</div>
							</label>
							<label for="eng_select">
								<div class="forms_checkbox">
								<input class="forms_input_checkbox" type="checkbox" id="eng_select" name="languages[]" value="English" placeholder="English">
								English
								</div>
							</label>
							<label for="jap_select">
								<div class="forms_checkbox">
								<input class="forms_input_checkbox" type="checkbox" id="jap_select" name="languages[]" value="Japanese" placeholder="Japanese">
								Japanese
								</div>
							</label>
							<label for="taw_select">
								<div class="forms_checkbox">
								<input class="forms_input_checkbox" type="checkbox" id="taw_select" name="languages[]" value="Taiwanese" placeholder="Taiwanese">
								Taiwanese
								</div>
							</label>
							<label for="spa_select">
								<div class="forms_checkbox">
								<input class="forms_input_checkbox" type="checkbox" id="spa_select" name="languages[]" value="Spanish" placeholder="Spanish">
								Spanish
								</div>
							</label>
							<label for="bri_select">
								<div class="forms_checkbox">
								<input class="forms_input_checkbox" type="checkbox" id="bri_select" name="languages[]" value="British" placeholder="British">
								British
								</div>
							</label>
						</div>
					<hr>
					<input class="forms_input" type="submit" value="Create">
				</div>
			</form>
		</div>

		<div class="ctn">
			<a href="index.php"><div class="btn">Home</div></a>
			<a href="login.php"><div class="btn">Login</div></a>
		</div>
	</div>
</body>
</html>