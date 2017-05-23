<?php
session_start();

include('../includes/header_admin.php');
include('../includes/db.php');

if(!isset($_SESSION['login_user'])):
	header('Location: login.php');
endif;
?>

<!DOCTYPE html>
<html>
<head>
<title>mall directory | admin</title>
<link rel="stylesheet" type="text/css" href="../includes/style.css">
<script type="text/javascript" src="../includes/functions_js.js"></script>
</head>

<body>
<div class="container">
<h1>Tenant Management</h1>
<input type="text" id="searchInput" onkeyup="searchBy()" placeholder="Search by name..">
<button id="addTenant" onclick="document.location.href='create.php'">Add Tenant</button><dl>


<table id="tenantTable">
	<thead>
	<tr>
	<th>Id</th>
	<th>Name</th>
	<th>Lot</th>
	<th>Zone</th>
	<th>Floor</th>
	<th>Category</th>
	<th>Action</th>
	</tr>
	</thead>
	<tbody>
	<?php
		$db = initdb();
		$sql = "SELECT * FROM tenant";
		if($stmt = $db->prepare($sql)):
			if($stmt->bind_result($id, $name, $lot, $zone, $floor, $category)):
				if($stmt->execute()):
					while($stmt->fetch()):
	?>
					<tr>
					<td><?=$id?></td>
					<td><?=$name?></td>
					<td><?=$lot?></td>
					<td><?=$zone?></td>
					<td><?=$floor?></td>
					<td><?=$category?></td>
					<td>
					<a href="update.php?id=<?=$id?>">Edit</a>
					/<a href='#' onclick="confirmDelete(<?=$id?>);">Delete</a>
					
					</td>
					</tr>
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
	</tbody>
</table>
</div>

<script>

</script>
</body>
</html>
<?php
?>