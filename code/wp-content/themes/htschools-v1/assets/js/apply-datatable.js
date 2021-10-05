jQuery(document).ready(function(){

	jQuery('#datatable thead tr').clone(true).appendTo( '#datatable thead' );
	jQuery('#datatable thead tr:eq(1) th').each( function (i) {
		var title = jQuery(this).text();
		jQuery(this).html( '<input type="text" class="table-search" placeholder="Search '+title+'" />' );
		jQuery( 'input', this ).on( 'keyup change', function () {
			if ( table.column(i).search() !== this.value ) {
				table
				.column(i)
				.search( this.value )
				.draw();
			}
		});
	});

	var table = jQuery('#datatable').DataTable({
		"scrollX"		: true,
		"paging"		: true,
		"pageLength"	: 10,
		"lengthChange"	: true,
		"ordering"		: false,
		"autoWidth"		: true,
	});

	jQuery('#datatable_filter').remove();
});