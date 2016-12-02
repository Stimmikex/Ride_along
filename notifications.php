<?php
	$pageName = 'Notifications';
?>
<!DOCTYPE html>
<html class="no-js" lang="IS_is">
	<head>
		<?php require_once 'inc/head.php'; ?>
	</head>
	<body>
		<?php require_once 'inc/header.php'; ?>
		<?php
			if ($logged === 'out') {
				header('Location: index.php');
			}

			$notificationQuery = "SELECT id, title, sent, seen FROM notifications WHERE user_id=:user_id ORDER BY id DESC";
			$notificationRes = $db->prepare($notificationQuery);
			$notificationRes->bindParam(':user_id', $userID);
			$notificationRes->execute();

			if ($notificationRes->rowCount() === 0) {
				echo '<h3>No notifications found.</h3>';
			} else {
				while ($row = $notificationRes->fetch(PDO::FETCH_ASSOC)) {
					$seen = intval($row['seen']);

					echo '<div class="notification-div"><p>';
					
					if ($seen === 0)
						echo '<b>';
					
					echo '<a href="notification.php?nid='.$row['id'].'">'.$row['title'].'</a>';

					if ($seen === 0)
						echo '</b>';
					
					echo '</p><p><b>Sent:</b> '.$row['sent'].'</p></div>';
					echo '<hr>';
				}
			}

			$notificationQuery = $notificationRes = null;
		?>
		<?php require_once 'inc/footer.php'; ?>
	</body>
</html>