function addDialog(o)
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
	other_dajle = myGrid.jqGrid ('getCell', selRowId, 'other_dalje');
  	comment = myGrid.jqGrid ('getCell', selRowId, 'comment');

  lista_hyrje1 = lista_hyrje.split(",");
	$.each(lista_hyrje1, function(i,e)
	{
		switch(e)
		{
			case 'Cekic/Hummer':						document.getElementById("lista_hyrje11").checked = true; break;
			case 'Dana/Pincers':						document.getElementById("lista_hyrje12").checked = true; break;
			case 'Kacavide/Screwdriver':					document.getElementById("lista_hyrje13").checked = true; break;
			case 'Gershere/Scissors':					document.getElementById("lista_hyrje14").checked = true; break;
			case 'Thike/Knife':						document.getElementById("lista_hyrje15").checked = true; break;
			case 'Skallper/Scalpel':					document.getElementById("lista_hyrje16").checked = true; break;
            case 'Sharre/Saw':						document.getElementById("lista_hyrje17").checked = true; break;
      		case 'Qeles/Bolt Driver':					document.getElementById("lista_hyrje18").checked = true; break;
     		case 'Brusalic/Grinder':					document.getElementById("lista_hyrje19").checked = true; break;
     		case 'Hillt/Electro-Pneumatic Drill':				document.getElementById("lista_hyrje111").checked = true; break;
      		case 'Burmashine/Drill':					document.getElementById("lista_hyrje112").checked = true; break;
      		case 'Dalte/Chisel':						document.getElementById("lista_hyrje113").checked = true; break;

		}
	});

	lista_dalje1 = lista_dalje.split(",");
	$.each(lista_dalje1, function(i,e)
	{
		switch(e)
		{
			case 'Cekic/Hummer':									document.getElementById("lista_dalje11").checked = true; break;
			case 'Dana/Pincers':									document.getElementById("lista_dalje12").checked = true; break;
			case 'Kacavide/Screwdriver':								document.getElementById("lista_dalje13").checked = true; break;
			case 'Gershere/Scissors':								document.getElementById("lista_dalje14").checked = true; break;
			case 'Thike/Knife':									document.getElementById("lista_dalje15").checked = true; break;
			case 'Skallper/Scalpel':								document.getElementById("lista_dalje16").checked = true; break;
			case 'Sharre/Saw':									document.getElementById("lista_dalje17").checked = true; break;
			case 'Qeles/Bolt Driver':								document.getElementById("lista_dalje18").checked = true; break;
			case 'Brusalic/Grinder':								document.getElementById("lista_dalje19").checked = true; break;
			case 'Hillt/Electro-Pneumatic Drill':							document.getElementById("lista_dalje111").checked = true; break;
			case 'Burmashine/Drill':								document.getElementById("lista_dalje112").checked = true; break;
			case 'Dalte/Chisel':									document.getElementById("lista_dalje113").checked = true; break;

		}
	});

	document.getElementById("id").value = id;
	document.getElementById("status").value = status;
	document.getElementById("company").value = company;
	document.getElementById("checkpoint").value = checkpoint;
	document.getElementById("handed_by").value = handed_by;
	document.getElementById("handed_by_exit").value = handed_by_exit;
	document.getElementById("verified_by").value = verified_by;
	document.getElementById("verified_by_exit").value = verified_by_exit;
	document.getElementById("lista_hyrje").value = lista_hyrje;
	document.getElementById("lista_dalje").value = lista_dalje;
  	document.getElementById("other").value = other;
	document.getElementById("other_dalje").value = other_dalje;
 	document.getElementById("comment").value = comment;


	  document.getElementById("status1").value = status;
	  document.getElementById("company1").value = company;
	  document.getElementById("checkpoint1").value = checkpoint;
	  document.getElementById("handed_by1").value = handed_by;
	  document.getElementById("handed_by_exit1").value = handed_by_exit;
	  document.getElementById("verified_by1").value = verified_by;
	  document.getElementById("verified_by_exit1").value = verified_by_exit;
	  document.getElementById("lista_hyrje1").value = lista_hyrje;
	  document.getElementById("lista_dalje1").value = lista_dalje;
	  document.getElementById("other1").value = other;
	  document.getElementById("other_dalje1").value = other_dalje;
 	  document.getElementById("comment1").value = comment;

	$( "#addDialog" ).dialog({
		  title: "Add Record",
		  width: 550,
		  height: 760,
		  modal:true,
			buttons: [
			{
			  text: "Submit",
			  click: function() {$( "#addForm" ).submit();
			  }
			},
			{
			  text: "Cancel",
			  click: function() {$( this ).dialog( "close" );}
			}]
		}
	);
}
