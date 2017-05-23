<script type="text/javascript" src="../includes/functions_js.js"></script>
<?php
	include('../includes/db.php');
?>
<?php 
	if($_SERVER['REQUEST_METHOD'] == 'POST'):
		echo "post";
		include('../includes/functions_php.php');
		$lotEmpty = checkLotEmpty($_POST['name'], $_POST['lot'], $_POST['zone'], $_POST['floor']);
		if($lotEmpty):
			$db = initdb();
			$sql = 'UPDATE tenant 
					SET name = ?, lot = ?, zone = ?, floor = ?, category = ?
					WHERE id = ?';
			if($stmt = $db->prepare($sql)):
				extract($_POST);
				if($stmt->bind_param('sssssi', $name, $lot, $zone, $floor, $category, $id)):
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
		
	elseif($_GET['id']):
		$db = initdb();
		$sql = 'SELECT *
				FROM tenant
				WHERE id=?';
		if($stmt = $db->prepare($sql)):
			$id = $_GET['id'];
			if($stmt->bind_param('i', $id)):
				if($stmt->bind_result($id, $name, $lot, $zone, $floor, $category)):
					if($stmt->execute()):
						while($stmt->fetch()):
							$_POST['id']=$id;
							$_POST['name']=$name;
							$_POST['lot']=$lot;
							$_POST['zone']=$zone;
							$_POST['floor']=$floor;
							$_POST['category']=$category;
							include('_form.php');
						endwhile;
					else:
						die('execute() failed: ' . htmlspecialchars($stmt->error));
					endif;
				else:
					die('bind_result() failed: ' . htmlspecialchars($stmt->error));
				endif;
			else:
				die('bind_param() failed: ' . htmlspecialchars($stmt->error));
			endif;
		else:
			die("prepare() failed: " . htmlspecialchars($db->error) );
		endif;
	endif;
?>
