<?php
include('datadef.php');
?>

<script type="text/javascript" src="../includes/functions_js.js"></script>
<header id="directoryHeader">Mall Directory</header>
<div class="topnav" id="myTopnav">
	<input type="text" id="searchInput" onkeyup="searchBy()" placeholder="Search by name..">
	<a href='../directory/index.php' id="homebtn">Home</a>
	
	<div class="dropdown-cat">
	<a href="#" class="catbtn">Category</a>
		<div class="dropdown-content">
		<?php
			foreach($mallCategory as $cat => $value):
		?>
				<a href="view.php?category=<?=$value?>"><?=$value?></a>
		<?php	
			endforeach;
		?>
		</div>
	</div>
	
	<div class="dropdown-floor">
	<a href="#" class="floorbtn">Floor</a>
		<div class="dropdown-content">
		<?php
			foreach($mallFloor as $floor => $value):
		?>
				<a href="view.php?floor=<?=$value?>"><?=$value?></a>
		<?php	
			endforeach;
		?>
		</div>
	</div>
	
	<div class="dropdown-zone">
	<a href="#" class="zonebtn">Zone</a>
		<div class="dropdown-content">
		<?php
			foreach($mallZone as $zone => $value):
		?>
				<a href="view.php?zone=<?=$value?>"><?= $value ?></a>
		<?php	
			endforeach;
		?>
		</div>
	</div>
</div>