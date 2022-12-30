$(document).ready(function(){
	$('#data_table').Tabledit({

		url: 'live_edit.php',
		
		deleteButton: false,
		editButton: false,

		columns: {
		  identifier: [0, 'id'],
		  editable: [[1, 'productId'], [2, 'productName'], [3, 'Company'], [4, 'entryDate'], [5, 'details'], [6, 'productPrice'], [7, 'productQuantity']]
		},
		hideIdentifier: true

	});
});
