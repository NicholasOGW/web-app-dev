function searchBy() {
  var input, filter, table, tr, td, i;
  input = document.getElementById("searchInput");
  filter = input.value.toUpperCase();
  table = document.getElementById("tenantTable");
  tr = table.getElementsByTagName("tr");

  for (i = 0; i < tr.length; i++) {
    td = tr[i].getElementsByTagName("td")[1];
	
    if (td) {
      if (td.innerHTML.toUpperCase().indexOf(filter) > -1) {
        tr[i].style.display = "";
      } else {
        tr[i].style.display = "none";
      }
    } 
  }
}

function informLotOccupied(){
	alert('Lot is occupied! Result will not be saved.')
	window.location ='../admin/index.php';
}

function confirmDelete(id) {
	if (confirm("Are you sure?")) {
		window.location = '../admin/delete.php?id=' + id;
	}
}

function showDropdown() {
    document.getElementById("myDropdown").classList.toggle("show");
}

function completeInput(){
	var complete = true;
	if(name.value == ""){
		alert('Please fill in name');
		inputForm.name.focus();
		complete = false;
	}
	
	else if(lot.value == ""){
		alert('Please fill in lot');
		inputForm.lot.focus();
		complete = false;
	}
	
	else if(zone.value == ""){
		alert('Please fill in zone');
		inputForm.zone.focus();
		complete = false;
	}
	
	else if(floor.value == ""){
		alert('Please fill in floor');
		inputForm.floor.focus();
		complete = false;
	}
	
	else if(category.value == ""){
		alert('Please fill in category');
		inputForm.category.focus();
		complete = false;
	}
	
	return complete;
}

