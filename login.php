<?php
use classes\{database};

include("heads.php");

session_start();
$notice = "";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
	// check the database is connected to system
	if (database::is_connected()) {
		$username = filter_input(INPUT_POST, "login_username", FILTER_SANITIZE_SPECIAL_CHARS);
		$password = filter_input(INPUT_POST, "login_password", FILTER_SANITIZE_SPECIAL_CHARS);
		$do_a_login = database::query("SELECT * FROM accounts WHERE username = '$username' AND password = '$password'");
		// if ever user accidentally login without or wrong info
		// it will immediately set a warning
		if (empty($username)) { 
			$notice = "Please Insert Username!";
		} elseif (empty($password)) {
			$notice = "Please Insert Password!";
		} else {
			if (!$user->isEmpty()) {
				$user->register = $username;
				if (!$user->isEmpty()) {
					// check if username and password from database are correct
					if ($user->account()['username'] === $username && $user->account()['password'] === $password) {
						$_SESSION['account_id'] = $user->account()['id']; // Register user using Unique ID to server, even the page is refresh wont lose until it logout or timeout
						$_SESSION['account_username'] = $user->account()['username']; // Register user using Username to server, even the page is refresh wont lose until it logout or timeout
						header("Location: home.php"); 
						// Redirect after user to home
					} else {
						$notice = "Incorrect Email/Password!";
					}
				}
			} else {
				$notice = "Incorrect Email/Password!";
			}
		}
	} else {
		header("Location: login.php?Error");
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
			<div class="formss">
				<p style="color: red"><?php echo $notice?></p>
				<form action="<?php htmlspecialchars($_SERVER["PHP_SELF"]) ?>" method="POST">
					<input type="text" class="forms_input" name="login_username" placeholder="Username" />
					<input type="password" class="forms_input" name="login_password" placeholder="Password" />
					<br />
					<div>
						<button type="submit" class="forms_input">Login</button>
					</div>
				</form>
			</div>
		</div>

		<div class="ctn">
			<a href="register.php"><div class="btn">Register</div></a>
			<a href="index.php"><div class="btn">Home</div></a>
		</div>
	</div>
</body>
</html>