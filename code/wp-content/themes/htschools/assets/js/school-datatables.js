jQuery(document).ready(function(){

	

	var table = jQuery('#datatable').DataTable({
		"scrollX"		: true,
		"paging"		: true,
		"pageLength"	: 10,
		"lengthChange"	: true,
		"ordering"		: false,
		"autoWidth"		: true,

		"pagingType": "full_numbers",
		language : {
			paginate : {
				first : "<<",
				previous : "<",
				next : ">",
				last : ">>"
			},
		},
		orderCellsTop: true,
        dom: 'Bfrtip',
        buttons: [
          { extend: 'csv', text: 'DownloadXL/CSV' }
             
        ],

        


	});
	 $('#dropdown1').on('change', function () {
                    table.columns(2).search( this.value ).draw();
                } );
	 $('#dropdown2').on('change', function () {
                    table.columns(5).search( this.value ).draw();
                } );
	$('#myInputTextField').keyup(function(){
      table.search($(this).val()).draw() ;
})

$('#maxTemp27').on('change', function() {
  if ($(this).is(':checked')) {
    $.fn.dataTable.ext.search.push(
      function(settings, data, dataIndex) {  
         return data[5] > 27
      }
    )
  } else {
    $.fn.dataTable.ext.search.pop()
  }
  table.draw()
})




	jQuery('#datatable_filter').remove();
});



        

