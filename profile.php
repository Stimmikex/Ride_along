<?php
	$pageName = 'Profile';
?>
<!DOCTYPE html>
<html class="no-js" lang="IS_is">
	<head>
		<?php require_once 'inc/head.php'; ?>
	</head>
	<body>
		<?php require_once 'inc/header.php'; ?>
		<?php
			if ($logged === 'in') {
			$user_profile = $facebook->api('/me?fields=id,first_name,last_name,email,gender,locale,picture,cover');
			$user = new Users($db);
			$user_data = $user->checkUser('facebook',$user_profile['id'],$user_profile['first_name'],$user_profile['last_name'],$user_profile['email'],$user_profile['gender'],$user_profile['locale'],$user_profile['picture']['data']['url']);
			if(!empty($user_data)){
				$output = '<img src="'.$user_profile['cover']['source'].'" class="profile-cover">';
				$output .= '<h1>Profile</h1>';
				$output .= '<img src="'.$user_data['picture'].'">';
				$output .= '<br/>Name : ' . $user_data['fname'].' '.$user_data['lname'];
				$output .= '<br/>Email : ' . $user_data['email'];
				$output .= '<br/>Gender : ' . $user_data['gender'];
				$output .= '<br/>Locale : ' . $user_data['locale'];
				$output .= '<br/>You are logged in with: Facebook';
			}else{
				$output = '<h3 style="color:red">Some problem occurred, please try again.</h3>';
			}
		?>
		<div><?php echo $output; ?></div>
		<div>
			<a href="match.php">Matches</a><br>
			<a href="delete_plan.php">Delete Plans</a>
		</div>
		<?php
			} else {
				header('Location: index.php');
			}
		?>
		<?php require_once 'inc/footer.php'; ?>
	</body>
</html>