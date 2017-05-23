<?php
include('../includes/db.php');
include('../includes/datadef.php');
include('../includes/header_directory.php');
?>

<!DOCTYPE html>
<html>
<head>
<title>Directory</title>
<link rel="stylesheet" type="text/css" href="../includes/style.css">
<script type="text/javascript" src="../includes/functions_js.js"></script>
</head>
<body>


<div class="container">
<table id="tenantTable">
	<thead>
	<tr>
	<th>Shop name</th>
	</tr>
	</thead>
	<tbody>
<?php
		$db = initdb();
		$sql = "SELECT * FROM tenant";
		if($stmt = $db->prepare($sql)):
			if($stmt->bind_result($id, $name, $lot, $zone, $floor, $category)):
				if($stmt->execute()):
?>
<?php			
					while($stmt->fetch()):
?>
					<tr onclick="document.location='view.php?name=<?=$name?>'">
					<td style="display:none;"><?=$id?></td>
					<td class="hoverabletd"><?=$name?></td>
					</tr>
	</tbody>
<?php
					endwhile;
				else:
					die('execute() failed: ' . htmlspecialchars($stmt->error));
				endif;
			else:
				die('bind_result() failed: ' . htmlspecialchars($stmt->error));
			endif;
		else:
			die("prepare() failed: " . htmlspecialchars($db->error) );
		endif;
?>
</table>
</form>
</div>
</body>
</html>