<?php
	$pageName = 'Request';
?>
<!DOCTYPE html>
<html class="no-js" lang="IS_is">
	<head>
		<?php require_once 'inc/head.php'; ?>
	</head>
	<body>
		<?php require_once 'inc/header.php'; ?>
		<?php
			if ($logged === "out") {
				header('Location: index.php');
			}
		?>
		<form action="<?php $_SERVER['PHP_SELF']; ?>" method="POST" accept-charset="UTF-8">
			<label>Nearest Location</label>
			<select name="from" class="request_location">
				<option value="-1" disabled selected>Pick</option>
			    <?php
					$query = "SELECT id, name FROM location ORDER BY name ASC";
					$res = $db->prepare($query);
					$res->execute();

					while ($row = $res->fetch(PDO::FETCH_ASSOC)) {
						echo '<option value="'.$row['id'].'">'.$row['name'].'</option>';
					}
				?>
			</select>
			<label>Location of dropoff</label>
			<select name="to" class="request_location">
				<option value="-1" disabled selected>Pick</option>
			    <?php
					$res->execute();

					while ($row = $res->fetch(PDO::FETCH_ASSOC)) {
						echo '<option value="'.$row['id'].'">'.$row['name'].'</option>';
					}

					$res = null;
				?>
			</select>
			<label>Message</label>
			<div class="input-field">
				<textarea class="request_message" id="textarea" name="message" maxlength="200"></textarea>
				<div id="textarea_feedback"></div>
			</div>
			<input type="submit" name="submit" value="Add" class="request_submit">
			<?php
				if (isset($_POST['submit'])) {
					$from = $_POST['from'];
					$to = $_POST['to'];
					$message = $_POST['message'];
					$oauth_uid = $_SESSION['fb_238722499878103_user_id'];
					$userID = null;

					$userIdQuery = 'SELECT id FROM users WHERE oauth_uid=:oauth_uid LIMIT 1';
					$userIdRes = $db->prepare($userIdQuery);
					$userIdRes->bindParam(':oauth_uid', $oauth_uid);
					$userIdRes->execute();

					while ($row = $userIdRes->fetch(PDO::FETCH_ASSOC)) {
						$userID = $row['id'];
					}

					$userIdQuery = $userIdRes = null;

					$insert_request = "INSERT INTO request (to_id, from_id, message, user_id) VALUES (:to_id, :from_id, :message, :user_id)";
					$rideRes = $db->prepare($insert_request);
					$rideRes->bindParam(':to_id', $to);
					$rideRes->bindParam(':from_id', $from);
					$rideRes->bindParam(':message', $message);
					$rideRes->bindParam(':user_id', $userID);
					$rideRes->execute();
				}
			?>
		</form>
		<?php require_once 'inc/footer.php'; ?>
		<script type="text/javascript">
			$(document).ready(function() {
			    var text_max = 200;
			    $('#textarea_feedback').html(text_max + ' characters remaining');

			    $('#textarea').keydown(function() {
			        var text_length = $('#textarea').val().length;
			        var text_remaining = text_max - text_length;

			        $('#textarea_feedback').html(text_remaining + ' characters remaining');
			    });
			});
		</script>
	</body>
</html>