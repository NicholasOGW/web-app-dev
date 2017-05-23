<?php
	include('../includes/db.php');
?>

<script type="text/javascript" src="../includes/functions_js.js"></script>

<?php 
	if($_SERVER['REQUEST_METHOD'] == 'POST'):
		include('../includes/functions_php.php');
		$lotEmpty = checkLotEmpty($_POST['name'], $_POST['lot'], $_POST['zone'], $_POST['floor']);
		if($lotEmpty):
			$db = initdb();
			$sql = 'INSERT INTO tenant (id, name, lot, zone, floor, category) 
					VALUES (?,?,?,?,?,?)';
					
			if($stmt = $db->prepare($sql)):
				extract($_POST);
				if($stmt->bind_param('isssss', $id, $name, $lot, $zone, $floor, $category)):
					if($stmt->execute()):
						header('Location: index.php');
						exit;
					else:
						die('execute() failed: ' . htmlspecialchars($stmt->error));
					endif;
				else:
					die('bind_result() failed: ' . htmlspecialchars($stmt->error));
				endif;
			else:
				die("prepare() failed: " . htmlspecialchars($db->error) );
			endif;	
			$db->close();
		else:
			echo '<script>informLotOccupied();</script>';
		endif;
	else:
		include('_form.php');
	endif;
?>
