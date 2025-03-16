<?php
use classes\{database};

include("heads.php");

session_start(); // Start session
// If any accidentally click previous arrow on tab while clicked on logout they will
// immediately go to homepage to login again
if ($_SESSION["account_id"] === null) {
	function_alert("Your Session is Timed Out");
    header("Location: index.php?TimedOut");
} else {
	$user->register = $_SESSION['account_username'];
	$account_name = $user->account() === null ? "A" : $user->account()['username'];
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
		<div class="ctn text">
			<p> Username: <?php echo $account_name?> </p>
		</div>
		<div class="text">
			<table class="table_contents">
				<tr>
					<th>Username</th>
					<th>Surname</th>
					<th>First Name</th>
					<th>Middle Name</th>
					<th>Gender</th>
					<th>Province</th>
					<th>Languages</th>
					<th>Birthday</th>
				</tr>
				<?php
					$id;
					$username;
					$surname;
					$firstname;
					$middlename;
					$gender;
					if (database::is_connected()) {
						// Display all registered account in table form
						$account = database::query("SELECT * FROM accounts WHERE id");
						if (mysqli_num_rows($account) > 0) {
							while ($row = database::fetch($account)) {
								$id = $row['id'];
								$username = $row['username'];
								$surname = $row['surname'];
								$firstname = $row['firstname'];
								$middlename = $row['middlename'];
								$gender = $row['gender'];
								$province = $row['province'];
								$languages = $row['languages'];
								$birthday = $row['birthday'];
								echo "<tr>";
								echo "<td> ".$username." </td>";
								echo "<td> 	".$surname." </td>";
								echo "<td> ".$firstname." </td>";
								echo "<td> ".$middlename." </td>";
								echo "<td> ".$gender." </td>";
								echo "<td> ".$province." </td>";
								echo "<td> ".$languages." </td>";
								echo "<td> ".$birthday." </td>";
								echo "</tr>";
							}
						} else {
							echo "<tr>";
							echo "<td> - </td>";
							echo "<td> - </td>";
							echo "<td> - </td>";
							echo "<td> - </td>";
							echo "<td> - </td>";
							echo "<td> - </td>";
							echo "<td> - </td>";
							echo "<td> - </td>";
							echo "<td> - </td>";
							echo "</tr>";
						}
					} else {
						function_alert("No Database found connected");
					}
				?>
			</table>
		</div>

		<div class="ctn">
			<a href="index.php"><div class="btn">Logout</div></a>
		</div>
	</div>
</body>
</html>