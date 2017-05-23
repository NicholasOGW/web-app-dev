<?php
function checkLotEmpty($inputName, $inputLot, $inputZone, $inputFloor){
	$empty = true;
	
	$db = initdb();
	$sql = "SELECT * FROM tenant";
	if($stmt = $db->prepare($sql)):
		if($stmt->bind_result($id, $name, $lot, $zone, $floor, $category)):
			if($stmt->execute()):
				while($stmt->fetch()):
					if($inputLot==$lot && $inputZone==$zone && $inputFloor==$floor):
						//condition where edit Tenant is unchange
						if($inputName != $name):
							$empty = false;
						endif;
					endif;
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
	
	return $empty;
}

function formInput($id, $name, $label, $value) {
	return <<<HTML
<label for="$id">$label</label>
<input type="text" id="$id" name="$name" value="$value">
<span id="error<?=$id?>" style="color:#FF0000"></span>
HTML;
}

function formDropdown($id, $name, $label, $values, $value = null, $prompt = null) {
	$options = [];
	
	if($prompt != null) {
		array_push($options, "<option value=\"\">$prompt</option>");
	}
	
	foreach($values as $val) {
		if($value == $val) {
			$selected = 'selected';
		}
		else {
			$selected = '';
		}
		array_push($options, "<option value=\"$val\" $selected>$val</option>");
	}
	$htmlOptions = implode('', $options);
	
	return <<<HTML
<label>$label</label>
<select id="$id" name="$name">$htmlOptions</select>
HTML;
}
