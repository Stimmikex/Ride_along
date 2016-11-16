<?php
	$pageName = 'Login';
?>
<!DOCTYPE html>
<html class="no-js" lang="IS_is">
	<head>
		<?php require_once 'inc/head.php'; ?>
	</head>
	<body>
		<!--[if lt IE 8]>
			<p class="browserupgrade">You are using an <strong>outdated</strong> browser. Please <a href="http://browsehappy.com/">upgrade your browser</a> to improve your experience.</p>
		<![endif]-->
		<?php require_once 'inc/header.php'; ?>
		<p>This is the login page!</p>
		<h1 class="page_title"><?php echo $page_name2; ?></h1>
		<form action="<?php $_SERVER['PHP_SELF']; ?>" method="POST" accept-charset="UTF-8">
			<label for="icon_email">Email:*</label>
			<input type="text" name="email" required>
			<label for="password">Password:*</label>
			<input type="password" name="password" id="login-password" required>
			<input type="button" class="btn waves-effect waves-light" value="Login" id="login-button" onclick="formhash(this.form, this.form.password);">
			<!--<button class="btn waves-effect waves-light" value="Login" id="login-button" onclick="formhash(this.form, this.form.password);">Submit</button>-->
			<a href="register.php" align="center">If you don't have an account you can register here.</a>
		</form>
		<?php require_once 'inc/footer.php'; ?>
	</body>
</html>