<?php
	include('../includes/db.php');
	if($_GET['id']):
		$db = initdb();
		$sql = 'DELETE FROM tenant WHERE id = ?';
		if($stmt = $db->prepare($sql)):
			$id = $_GET['id'];
			if($stmt->bind_param('i', $id)):
				if($stmt->execute()):
					header('Location:index.php');
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
		die("No Id get.");
	endif;
	
?>