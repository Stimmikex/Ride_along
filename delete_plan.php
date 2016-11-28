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

			$scheduleQuery = "SELECT weekplanner.day AS day, 
								weekplanner.leaving AS leaving, 
								weekplanner.to_id AS to_id, 
								weekplanner.from_id AS from_id, 
								weekplanner.plan_id AS plan_id,
								planner.id AS id
								FROM weekplanner
									JOIN planner ON weekplanner.plan_id=planner.id
								WHERE planner.user_id=:user_id AND planner.id = weekplanner.plan_id ";
			$scheduleRes = $db->prepare($scheduleQuery);
			$scheduleRes->bindParam(':user_id', $userID);
			$scheduleRes->execute();

			$locationQuery = "SELECT name FROM location WHERE id = :location_id";
			$locationRes = $db->prepare($locationQuery);
			echo '<ul class="footer_planner_ul">';

			while ($row = $scheduleRes->fetch(PDO::FETCH_ASSOC)) {
				echo '<h4>'.$days[$row['day']].'</h4>';
				echo '<li class="footer_planner"><from method="post">Time: '.$row['leaving'].'<br>';
				// echo $days[$day].", ".$row['leaving'].", ".$row['to_id'].", ".$row['from_id'].", ".$row['plan_id'];
				$locationRes->bindParam(':location_id', $row['from_id']);
				$locationRes->execute();
				
				while ($row2 = $locationRes->fetch(PDO::FETCH_ASSOC)) {
					echo 'From: '.$row2['name'].'<br>';
				}
				
				$locationRes->bindParam(':location_id', $row['to_id']);
				$locationRes->execute();

				while ($row2 = $locationRes->fetch(PDO::FETCH_ASSOC)) {
					echo 'To: '.$row2['name'].'<br>';
					echo $row['plan_id'];
				}
				?>
				  	<!--<button type='submit' name='delete' value=".$row['plan_id']." class='delete_planner'>Delete</button>-->
					<input type='submit' name='delete' value='Delete' class='delete_planner'>

				<?php
					if (isset($_POST['delete'])) {
						echo "true";
						$deletePlan = "DELETE FROM planner WHERE plan_id = :plans_id";
						$deletePlanRes = $db->prepare($deletePlan);
						$deletePlanRes->bindParam(':plans_id', $row['plan_id']);
						$deletePlanRes->bindParam(':deleted', $_POST['Delete']);
						$deletePlanRes->execute();

						header('Location: profile.php');
					}
				echo "</from>";
				echo '</li>';
			}
			echo '</ul>';

		?>
		<?php require_once 'inc/footer.php'; ?>
	</body>
</html>