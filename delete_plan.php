<?php
	$pageName = 'insert_name';
?>
<!DOCTYPE html>
<html class="no-js" lang="IS_is">
	<head>
		<?php require_once 'inc/head.php'; ?>
	</head>
	<body>
		<?php require_once 'inc/header.php'; ?>
		<?php

			$scheduleQuery = "SELECT id,
										plan_name
									FROM planner
										WHERE user_id=:user_id";
			$scheduleRes = $db->prepare($scheduleQuery);
			$scheduleRes->bindParam(':user_id', $userID);
			$scheduleRes->execute();

			$locationQuery = "SELECT name FROM location WHERE id = :location_id";
			$locationRes = $db->prepare($locationQuery);
			echo '<ul class="footer_planner_ul">';

			while ($row = $scheduleRes->fetch(PDO::FETCH_ASSOC)) {
				echo '<h4>'.$row['plan_name'].'</h4>';
				echo '<a href="info_plan.php?id='.$row['id'].'">Info</a>';
				echo '<li><form method="post">';
				// echo $days[$day].", ".$row['leaving'].", ".$row['to_id'].", ".$row['from_id'].", ".$row['plan_id'];
				// $locationRes->bindParam(':location_id', $row['from_id']);
				// $locationRes->execute();
				
				// while ($row2 = $locationRes->fetch(PDO::FETCH_ASSOC)) {
				// 	echo 'From: '.$row2['name'].'<br>';
				// }
				
				// $locationRes->bindParam(':location_id', $row['to_id']);
				// $locationRes->execute();

				// while ($row2 = $locationRes->fetch(PDO::FETCH_ASSOC)) {
				// 	echo 'To: '.$row2['name'].'<br>';
				// }
				?>
				  	<!--<button type='submit' name='delete' value=".$row['plan_id']." class='delete_planner'>Delete</button>-->
					<input type="submit" name="delete_<?php echo $row['id']; ?>" value="Delete" class="delete_planner">

				<?php
					if (isset($_POST['delete_'.$row['id']])) {
						echo "true";
						$deleteQuery = "DELETE FROM weekplanner WHERE plan_id = :plan_id";
						$deleteRes = $db->prepare($deleteQuery);
						$deleteRes->bindParam(':plan_id', $row['id']);
						$deleteRes->execute();
						$deleteRes = null;

						$deletePlan = "DELETE FROM planner WHERE id = :plans_id";
						$deletePlanRes = $db->prepare($deletePlan);
						$deletePlanRes->bindParam(':plans_id', $row['id']);
						$deletePlanRes->execute();
						$deletePlanRes = null;

						header('Location: profile.php');
					}
				echo '</form>';
				echo '</li>';
			}
			echo '</ul>';

		?>
		<?php require_once 'inc/footer.php'; ?>
	</body>
</html>