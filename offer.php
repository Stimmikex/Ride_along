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

					$checkQuery = "SELECT message, time_stamp, user_id FROM request WHERE to_id=:to_id AND from_id=:from_id AND available=1 ORDER BY id ASC";
					$checkRes = $db->prepare($checkQuery);
					$checkRes->bindParam(':to_id', $toID);
					$checkRes->bindParam(':from_id', $fromID);
					$checkRes->execute();

					if ($checkRes->rowCount() > 0) {
						$counter = 0;

						echo '<div style="display:none;" id="data"><span id="datalength">'.$checkRes->rowCount().'</span>';

						while ($row = $checkRes->fetch(PDO::FETCH_ASSOC)) {
							echo '<span id="data'.$counter.'">'.$row['user_id'].';'.$row['time_stamp'].';'.$row['message'].'</span>';

							$counter++;
						}

						echo '</div>';
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

				for (let i = 0; i < parseInt($('#datalength').text()); i++) {
					let tmpUserID = $('#data' + i).text().split(';')[0];
					let tmpTimeStamp = $('#data' + i).text().split(';')[1];
					let tmpMessage = $('#data' + i).text().split(';')[2];

					data[i] = [tmpUserID, tmpTimeStamp, tmpMessage];
				}
			});
		</script>
	</body>
</html>