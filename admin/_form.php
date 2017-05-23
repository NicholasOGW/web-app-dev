<?php
session_start();
include('../includes/header_admin.php');
include('../includes/functions_php.php');
include('../includes/datadef.php');
?>

<!DOCTYPE html>
<html>
<head>
<link rel="stylesheet" type="text/css" href="../includes/style.css">
<script type="text/javascript" src="../includes/functions_js.js"></script>
</head>

<body>
<div class="container">
<h1>Tenant details</h1>
<form name="inputForm" method="post" action="<?=$_SERVER['PHP_SELF']?>" onsubmit="return completeInput()">
<table>
	<thead>
	<tr>
		<th>Name</th>
		<th>Lot</th>
		<th>Zone</th>
		<th>Floor</th>
		<th>Category</th>
	</tr>
	</thead>
	<tbody>
	<tr>	
		<td>
		<?= formInput('name', 'name', 'Name ', isset($_POST['name']) ? $_POST['name'] : '') ?>
		</td>
		<td>
		<?= formDropdown('lot', 'lot', ' Lot ', $mallLot, isset($_POST['lot']) ? $_POST['lot'] : null, '- lot -') ?>
		</td>
		<td>
		<?= formDropdown('zone', 'zone', 'Zone', $mallZone, isset($_POST['zone']) ? $_POST['zone'] : null, '- zone -') ?>
		</td>
		<td>
		<?= formDropdown('floor', 'floor', 'Floor', $mallFloor, isset($_POST['floor']) ? $_POST['floor'] : null, '- floor - ') ?>
		</td>
		<td>
		<?= formDropdown('category', 'category', 'Category', $mallCategory, isset($_POST['category']) ? $_POST['category'] : null, '- select category - ') ?>
		</td>
	</tr>
	</tbody>
</table><dl>
<button type="submit" name="submit">submit</button>
<button type="button" name="back" onclick="document.location.href='index.php'">back</button>
<input type="hidden" name="id" value=<?=isset($_POST['id'])?$_POST['id']:''?>>
</form>
</div>
</body>
</html>

