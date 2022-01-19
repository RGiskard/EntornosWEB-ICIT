<?php
	include("includes/config.php");
    include("includes/classes/Account.php");
	include("includes/classes/Constants.php");
	$account = new Account($con);
    include("includes/handlers/register_handler.php");
    include("includes/handlers/login_handler.php");

	// Get input value
	function getInputValue($text) {
		if(isset($_POST[$text])) {
			echo $_POST[$text];
		}
	}
?>

<html>

<head>
	<title>SpotICIT - Enjoy your free music</title>
	<link rel="stylesheet" type="text/css" href="assets/css/register.css">
</head>

<body>
	<div id="background">
		<!-- LOGIN CONTAINER -->
		<div id="loginContainer">
			<div id="inputContainer">
				<!-- ACCOUNT LOGIN FORM -->
				<form id="loginForm" action="register.php" method="POST">
					<h2>Login to your account</h2>
					<p>
						<?php echo $account->getError(Constants::$loginFailed); ?>
						<label for="loginUsername">Username</label>
						<input id="loginUsername" name="loginUsername" type="text" placeholder="e.g. johnsmith" required>
					</p>
					<p>
						<label for="loginPassword">Password</label>
						<input id="loginPassword" name="loginPassword" type="password" placeholder="" required>
					</p>
					<button type="submit" name="loginButton">Log In</button>
				</form>

				<!-- ACCOUNT REGISTRATION FORM -->
				<form id="registerForm" action="register.php" method="POST">
					<h2>Create your account - for FREE!</h2>
					<p>
						<?php echo $account->getError(Constants::$usernameInvalidLength); ?>
						<?php echo $account->getError(Constants::$usernameExisted); ?>
						<label for="username">Username</label>
						<input id="username" name="username" type="text" placeholder="e.g. johnsmith" value="<?php getInputValue('username'); ?>" required>
					</p>
					<p>
						<?php echo $account->getError(Constants::$firstNameInvalidLength); ?>
						<label for="firstName">First name</label>
						<input id="firstName" name="firstName" type="text" placeholder="e.g. John" value="<?php getInputValue('firstName'); ?>" required>
					</p>
					<p>
						<?php echo $account->getError(Constants::$lastNameInvalidLength); ?>
						<label for="lastName">Last name</label>
						<input id="lastName" name="lastName" type="text" placeholder="e.g. Smith" value="<?php getInputValue('lastName'); ?>" required>
					</p>
					<p>
						<?php echo $account->getError(Constants::$emailDoNotMatch); ?>
						<?php echo $account->getError(Constants::$emailInvalid); ?>
						<?php echo $account->getError(Constants::$emailRegistered); ?>
						<label for="email">Email</label>
						<input id="email" name="email" type="email" placeholder="e.g. example@example.com" value="<?php getInputValue('email'); ?>" required>
					</p>
					<p>
						<label for="email2">Confirm email</label>
						<input id="email2" name="email2" type="email" placeholder="e.g. example@example.com" value="<?php getInputValue('email2'); ?>" required>
					</p>
					<p>
						<?php echo $account->getError(Constants::$passwordDoNotMatch); ?>
						<?php echo $account->getError(Constants::$passwordInvalid); ?>
						<?php echo $account->getError(Constants::$passwordInvalidLength); ?>
						<label for="password">Password</label>
						<input id="password" name="password" type="password" placeholder="" required>
					</p>
					<p>
						<label for="password2">Confirm password</label>
						<input id="password2" name="password2" type="password" placeholder="" required>
					</p>
					<button type="submit" name="registerButton">Sign Up</button>
				</form>
			</div>
		</div>
	</div>
</body>

</html>
