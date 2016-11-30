<?php
	$pageName = 'Check plan';
?>
<!DOCTYPE html>
<html class="no-js" lang="IS_is">
	<head>
		<?php require_once 'inc/head.php'; ?>
	</head>
	<body>
		<?php require_once 'inc/header.php'; ?>
		<form action="<?php $_SERVER['PHP_SELF']; ?>" method="POST" accept-charset="UTF-8">
			<label>Day:</label>
			<select name="day" class="request_location">
				<option value="-1" disabled selected>Pick</option>
				<?php
					for ($i=0; $i < 7; $i++) { 
					 	echo '<option value="'.$i.'">'.$days[$i].'</option>';
					 } 
				?>
			</select>	
			<label>Nearest Location</label>
			<select name="from" class="request_location">
				<option value="-1" disabled selected>Pick</option>
			    <?php
					$query = "SELECT id, name FROM location ORDER BY name ASC";
					$res = $db->prepare($query);
					$res->execute();

					while ($row = $res->fetch(PDO::FETCH_ASSOC)) {
						echo '<option value="'.$row['id'].'"name="from">'.$row['name'].'</option>';
					}
				?>
			</select>
			<label>Time: <b>*Leave empty for all plans</b></label>
			<input type="text" name="time" class="cp_time">
			<input type="submit" name="submit" value="check" class="cp_submit">
			<?php
				if (!isset($_POST['day'])) {
		 			echo "NO!!";
		 		}
		 		if (!isset($_POST['from'])) {
		 			echo "NO!!";
		 		}
			 	if (isset($_POST['submit'])) {
					$SelectQuery = "SELECT * FROM weekplanner WHERE day = :day AND from_id = :location";
			 	 	$SelectRes = $db->prepare($SelectQuery);
			 	 	$SelectRes->bindParam(':day', $_POST['day']);
			 	 	$SelectRes->bindParam(':location', $_POST['from']);
			 	 	$SelectRes->execute();
			 	 	echo '<div class="check_plan_output">';
			 	 	while ($row = $SelectRes->fetch(PDO::FETCH_ASSOC)) {
			 	 		echo $days[$row['day']].'<br>';
			 	 		echo 'Time: '.$row['leaving'].'<br>';

			 	 		$toquery = "SELECT id, name FROM location WHERE id = :id";
						$tores = $db->prepare($toquery);
						$tores->bindParam(':id',$row['from_id']);
						$tores->execute();

						while ($row2 = $tores->fetch(PDO::FETCH_ASSOC)) {
							echo 'From: '.$row2['name'].'<br>';
						}
						$tores = null;

						$fromquery = "SELECT id, name FROM location WHERE id = :id";
						$fromres = $db->prepare($fromquery);
						$fromres->bindParam(':id',$row['to_id']);
						$fromres->execute();

						while ($row2 = $fromres->fetch(PDO::FETCH_ASSOC)) {
							echo 'To: '.$row2['name'].'<br>';
						}
						$fromres = null;
						echo '</div>';
			 	 	}
			 	 	$SelectRes = null;
				}
			?>
		</form>
		<?php require_once 'inc/footer.php'; ?>
	</body>
</html>