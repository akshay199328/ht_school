jQuery(document).ready(function() {

	var table = jQuery('#datatable').DataTable({

		"scrollX": false,
		"paging": true,
		"pageLength": 10,
		"lengthChange": true,
		"bInfo": false,
		"ordering": false,
		"autoWidth": false,

		"pagingType": "full_numbers",
		language: {
			paginate: {
				first: "<<",
				previous: "<",
				next: ">",
				last: ">>"
			},
		},
		orderCellsTop: true,
		dom: 'Bfrtip',
		buttons: [{
				extend: 'csv',
				text: 'DownloadXL/CSV',
				className: 'btn btn-primary glyphicon glyphicon-download-alt'
			}

		],
	});


	$('#maxTemp27').on('change', function() {
		if ($(this).is(':checked')) {
			jQuery.fn.dataTable.ext.search.push(
				function(settings, data, dataIndex) {
					return parseInt(data[6]) < 100
				}
			)
		} else {
			jQuery.fn.dataTable.ext.search.pop()
		}
		table.draw()
	})

	$('#dropdown1').on('change', function() {
		table.columns(2).search(this.value).draw();
	});
	$('#dropdown2').on('change', function() {
		table.columns(5).search(this.value).draw();
	});
	$('#myInputTextField').keyup(function() {
		table.search($(this).val()).draw();
	})

	jQuery('#datatable_filter').remove();
});