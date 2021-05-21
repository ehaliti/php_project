function editDialog(o)
{
	var myGrid = $('#list1');

	var rowid = jQuery(o).closest('tr').attr('id');
	jQuery("#list1").jqGrid().setSelection(rowid);

	var selRowId = myGrid.jqGrid('getGridParam', 'selrow');

	id = myGrid.jqGrid ('getCell', selRowId, 'id');
	status = myGrid.jqGrid ('getCell', selRowId, 'status');
	company = myGrid.jqGrid ('getCell', selRowId, 'company');
	checkpoint = myGrid.jqGrid ('getCell', selRowId, 'checkpoint');
	handed_by = myGrid.jqGrid ('getCell', selRowId, 'handed_by');
	handed_by_exit = myGrid.jqGrid ('getCell', selRowId, 'handed_by_exit');
	verified_by = myGrid.jqGrid ('getCell', selRowId, 'verified_by');
	verified_by_exit = myGrid.jqGrid ('getCell', selRowId, 'verified_by_exit');
	lista_hyrje = myGrid.jqGrid ('getCell', selRowId, 'lista');
	lista_dalje = myGrid.jqGrid ('getCell', selRowId, 'lista_dalje');
  	other = myGrid.jqGrid ('getCell', selRowId, 'other');
	other_dalje = myGrid.jqGrid ('getCell', selRowId, 'other_dalje');
	comment = myGrid.jqGrid ('getCell', selRowId, 'comment');
	archive = myGrid.jqGrid ('getCell', selRowId, 'archive');

	lista_hyrje3 = lista_hyrje.split(",");
	$.each(lista_hyrje3, function(i,e)
	{
		switch(e)
		{
			case 'Cekic/Hummer':										document.getElementById("lista_hyrje31").checked = true; break;
			case 'Dana/Pincers':		                						document.getElementById("lista_hyrje32").checked = true; break;
			case 'Kacavide/Screwdriver':									document.getElementById("lista_hyrje33").checked = true; break;
			case 'Gershere/Scissors':									document.getElementById("lista_hyrje34").checked = true; break;
			case 'Thike/Knife':									  	document.getElementById("lista_hyrje35").checked = true; break;
			case 'Skallper/Scalpel':									document.getElementById("lista_hyrje36").checked = true; break;
			case 'Sharre/Saw':										document.getElementById("lista_hyrje37").checked = true; break;
			case 'Qeles/Bolt Driver':									document.getElementById("lista_hyrje38").checked = true; break;
			case 'Brusalic/Grinder':									document.getElementById("lista_hyrje39").checked = true; break;
			case 'Hillt/Electro-Pneumatic Drill':								document.getElementById("lista_hyrje311").checked = true; break;
			case 'Burmashine/Drill':									document.getElementById("lista_hyrje312").checked = true; break;
			case 'Dalte/Chisel':										document.getElementById("lista_hyrje313").checked = true; break;
		}
	});

	lista_dalje3 = lista_dalje.split(",");
	$.each(lista_dalje3, function(i,e)
	{
		switch(e)
		{
			case 'Cekic/Hummer':										document.getElementById("lista_dalje31").checked = true; break;
			case 'Dana/Pincers':										document.getElementById("lista_dalje32").checked = true; break;
			case 'Kacavide/Screwdriver':									document.getElementById("lista_dalje33").checked = true; break;
			case 'Gershere/Scissors':									document.getElementById("lista_dalje34").checked = true; break;
			case 'Thike/Knife':										document.getElementById("lista_dalje35").checked = true; break;
			case 'Skallper/Scalpel':									document.getElementById("lista_dalje36").checked = true; break;
			case 'Sharre/Saw':									  	document.getElementById("lista_dalje37").checked = true; break;
			case 'Qeles/Bolt Driver':									document.getElementById("lista_dalje38").checked = true; break;
			case 'Brusalic/Grinder':									document.getElementById("lista_dalje39").checked = true; break;
			case 'Hillt/Electro-Pneumatic Drill':								document.getElementById("lista_dalje311").checked = true; break;
			case 'Burmashine/Drill':									document.getElementById("lista_dalje312").checked = true; break;
			case 'Dalte/Chiselspl':										document.getElementById("lista_dalje313").checked = true; break;
		}
	});

	document.getElementById("id2").value = id;
	document.getElementById("status2").value = status;
	document.getElementById("company2").value = company;
	document.getElementById("checkpoint2").value = checkpoint;
	document.getElementById("handed_by2").value = handed_by;
	document.getElementById("handed_by_exit2").value = handed_by_exit;
	document.getElementById("verified_by2").value = verified_by;
	document.getElementById("verified_by_exit2").value = verified_by_exit;
	document.getElementById("lista_hyrje2").value = lista_hyrje;
	document.getElementById("lista_dalje2").value = lista_dalje;
  	document.getElementById("other2").value = other;
	document.getElementById("other_dalje2").value = other_dalje;
	document.getElementById("comment2").value = comment;
	document.getElementById("archive2").value = archive;


	document.getElementById("status3").value = status;
  	document.getElementById("company3").value = company;
  	document.getElementById("checkpoint3").value = checkpoint;
 	document.getElementById("handed_by3").value = handed_by;
	document.getElementById("handed_by_exit3").value = handed_by_exit;
  	document.getElementById("verified_by3").value = verified_by;
  	document.getElementById("verified_by_exit3").value = verified_by_exit;
	document.getElementById("lista_hyrje3").value = lista_hyrje;
 	document.getElementById("lista_dalje3").value = lista_dalje;
 	document.getElementById("other3").value = other;
	document.getElementById("other_dalje3").value = other_dalje;
	document.getElementById("comment3").value = comment;
	document.getElementById("archive3").value = archive;


	$( "#editDialog" ).dialog({
		  title: "Edit Record",
		  width: 665,
		  height: 800,
		  modal:true,
			buttons: [
			{
			  text: "Submit",
			  click: function() {$( "#editForm" ).submit();
			  }
			},
			{
			  text: "Cancel",
			  click: function() {$( this ).dialog( "close" );}
			}]
		}
	);
}
