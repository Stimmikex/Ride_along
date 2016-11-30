<?php
	$pageName = 'Offer Ride';
?>
<!DOCTYPE html>
<html class="no-js" lang="IS_is">
	<head>
		<?php require_once 'inc/head.php'; ?>
	</head>
	<body>
		<?php require_once 'inc/header.php'; ?>
		<?php
			if (!isset($_POST['check'])) {
		?>
		<form action="" method="POST" accept-charset="UTF-8">
			<label>Nearest Location</label>
			<select name="from" class="offer_location">
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
			<select name="to" class="offer_location">
				<option value="-1" disabled selected>Pick</option>
				<?php
					$res->execute();

					while ($row = $res->fetch(PDO::FETCH_ASSOC)) {
						echo '<option value="'.$row['id'].'">'.$row['name'].'</option>';
					}

					$res = null;
				?>
			</select>
			<input type="submit" name="check" value="Check" class="offer_submit">
		</form>
		<?php
			} else {
				if (isset($_POST['to'], $_POST['from'])) {
					$toID = $_POST['to'];
					$fromID = $_POST['from'];

					$checkQuery = "SELECT request.message AS request_message,
											request.time_stamp AS request_time,
											users.fname AS user_name,
											users.picture AS user_picture
												FROM request
											INNER JOIN users
												ON request.user_id=users.id
											WHERE request.to_id=:to_id
											AND request.from_id=:from_id
											AND request.available=1
												ORDER BY request.id ASC";
					$checkRes = $db->prepare($checkQuery);
					$checkRes->bindParam(':to_id', $toID);
					$checkRes->bindParam(':from_id', $fromID);
					$checkRes->execute();

					if ($checkRes->rowCount() > 0) {
						$counter = 0;

						echo '<div style="display:none;" id="data"><span id="datalength">'.$checkRes->rowCount().'</span>';

						while ($row = $checkRes->fetch(PDO::FETCH_ASSOC)) {
							echo '<span id="data'.$counter.'">'.$row['user_name'].';'.$row['user_picture'].';'.$row['request_time'].';'.$row['request_message'].'</span>';

							$counter++;
						}

						echo '</div>';

						echo '<div class="user_info"></div>';
					} else {
						echo '<h3>No requests found.</h3>';
					}

					$checkQuery = $checkRes = null;
				}
			}
		?>
		<?php require_once 'inc/footer.php'; ?>
		<script type="text/javascript">
			$(function() {
				let data = [];
				let dataLength = parseInt($('#datalength').text());
				let index = 0;

				for (let i = 0; i < dataLength; i++) {
					let tmpUserName = $('#data' + i).text().split(';')[0];
					let tmpUserPicture = $('#data' + i).text().split(';')[1];
					let tmpTimeStamp = $('#data' + i).text().split(';')[2];
					let tmpMessage = $('#data' + i).text().split(';')[3];

					data[i] = [tmpUserName, tmpUserPicture, tmpTimeStamp, tmpMessage];
				}

				function displayRequest(requestIndex) {
					$('.user_info').html('<img src="' + data[requestIndex][1] + '"><h3>' + data[requestIndex][0] + '</h3><p><b>Message:</b> ' +
											data[requestIndex][3] + '</p><p><b>Time of request:</b> ' + data[requestIndex][2] + '</p>' +
											'<label>Pick up?</label><br><input type="button" value="Yes" class="response_btn"><input type="button" value="No" class="response_btn">');
					
					$('.response_btn').on('click', function() {
						if (requestIndex < dataLength - 1) {
							displayRequest(requestIndex + 1);
						} else {
							$('.user_info').html('<h3>Nothing to display.</h3>');
						}
					});
				}

				if (dataLength > 0) {
					displayRequest(0);
				}
			});
		</script>
	</body>
</html>