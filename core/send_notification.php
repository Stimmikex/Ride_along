<?php
	if (isset($_POST['title'], $_POST['message'], $_POST['from_user_id'], $_POST['to_user_id'])) {
		require_once 'db_connect.php';

		$toUserID = filter_input(INPUT_POST, 'to_user_id', FILTER_VALIDATE_INT);
		$fromUserID = filter_input(INPUT_POST, 'from_user_id', FILTER_VALIDATE_INT);
		$title = filter_input(INPUT_POST, 'title', FILTER_SANITIZE_STRING);
		$message = filter_input(INPUT_POST, 'message', FILTER_SANITIZE_STRING);

		$insertQuery = "INSERT INTO notifications (user_id, title, message, from_user_id) VALUES (:to_user_id, :title, :message, :from_user_id)";
		$insertRes = $db->prepare($insertQuery);
		$insertRes->bindParam(':to_user_id', $toUserID);
		$insertRes->bindParam(':title', $title);
		$insertRes->bindParam(':message', $message);
		$insertRes->bindParam(':from_user_id', $fromUserID);
		$insertRes->execute();
		$insertQuery = $insertRes = null;
	}
?>