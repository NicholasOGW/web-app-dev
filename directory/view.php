<?php
include('../includes/db.php');
include('../includes/datadef.php');
include('../includes/header_directory.php');
?>

<!DOCTYPE html>
<html>
<head>
<title>Directory | view</title>
<link rel="stylesheet" type="text/css" href="../includes/style.css">
<script type="text/javascript" src="../includes/functions_js.js"></script>
</head>
<body>

<div class="container">
<button id="backbtn" onclick="document.location='index.php'">back</button><dl>
<table id="tenantTable">
	<thead>
	<tr>
	<th>Shop name</th>
	<th>Lot</th>
	<th>Zone</th>
	<th>Floor</th>
	<th>Category</th>
	</tr>
	</thead>
	<tbody>
<?php
	if(isset($_GET['name'])):
		$column = 'name';
		$getInput= $_GET['name'];
	
	elseif(isset($_GET['category'])):
		$column = 'category';
		$getInput = $_GET['category'];
		
	elseif(isset($_GET['floor'])):
		$column = 'floor';
		$getInput = $_GET['floor'];
		
	elseif(isset($_GET['zone'])):
		$column = 'zone';
		$getInput = $_GET['zone'];
	endif;
	
	
?>
<?php
	if($getInput != ""):
		$db = initdb();
		$sql = "SELECT * FROM tenant WHERE $column = '$getInput'";
		if($stmt = $db->prepare($sql)):
			if($stmt->bind_result($id, $name, $lot, $zone, $floor, $category)):
				if($stmt->execute()):
?>
<?php			
					while($stmt->fetch()):
?>
					<tr>
					<td style="display:none;"><?=$id?></td>
					<td><?=$name?></td>
					<td><?=$lot?></td>
					<td><?=$zone?></td>
					<td><?=$floor?></td>
					<td><?=$category?></td>
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
	else:
		die("no id");
	endif;
?>
</table>
<dl>
</div>
</body>
</html>