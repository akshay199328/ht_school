jQuery(document).ready(function($){
	$('.selectusers').each(function(){
	    var $this = $(this);
	    $this.select2({
	        minimumInputLength: 4,
	        placeholder: $(this).attr('data-placeholder'),
	        closeOnSelect: true,
	        language: {
				inputTooShort: function() {
					return parent_user_strings.enter_more_characters;
				}
	        },
	        ajax: {
	            url: parent_user_strings.ajax_url, 
	            type: "POST",
	            dataType: 'json',
	            delay: 250,
	            data: function(term){ 
	                    return  {   action: 'select_users_child', 
	                                security: parent_user_strings.security,
	                                parent_id: parent_user_strings.parent_id,
	                                q: term,
	                            }
	            },
	            processResults: function (data) {
	                return {
	                    results: data
	                };

	            },       
	            cache:true  
	        },
	        templateResult: function(data){
	            return '<img width="32" src="'+data.image+'">'+data.text;
	        },
	        templateSelection: function(data){
	            return '<img width="32" src="'+data.image+'">'+data.text;
	        },
	        escapeMarkup: function (m) {
	            return m;
	        }
	    }).on('select2:open',function(){
			if($('.select2-container .select2-dropdown').hasClass('select2-dropdown--below')){
				var topmargin = 45;
				$('.select2-container:not(.select2)').css('top', '+='+ topmargin +'px');
			}
	    });
    });		

//Adding users to child list :
    $( 'body' ).delegate( '#add_student_to_parent', 'click', function(event){
	  event.preventDefault();
	  var $this = $(this);
	  var defaultxt=$this.html();
	  var students = $('#student_usernames').val();

	  if(students.length <= 0){ 
	    $('#add_student_to_parent').html(parent_user_strings.unable_add_students);
	    setTimeout(function(){$this.html(defaultxt);}, 2000);
	    return;
	  }

	  $this.html('<i class="fa fa-spinner animated spin"></i>'+ parent_user_strings.adding_students);
	  var i=0;
	  $.ajax({ 
	        type: "POST",
	        url: ajaxurl,
	        data: { action: 'add_bulk_children', 
	                security: parent_user_strings.security,
	                parent_id: parent_user_strings.parent_id,
	                members: students,
	              },
	        cache: false,
	        success: function (html) {
	          if(html.length && html !== '0'){
	            $('#add_student_to_parent').html(parent_user_strings.successfuly_added_students);
	            $('ul.children').prepend(html);
	          }else{
	            $('#add_student_to_parent').html(parent_user_strings.unable_add_students);
	          }
	            $('.selectusers').select2('val', '');
	            $('.remove_user_child').click(function() {
					parent_id = $(this).attr("data-parent");
					child_id = $(this).attr("data-user");
					$(this).html('<i class="fa fa-spinner animated spin"></i>');
					$.ajax({
				        type: "POST",
				        url: ajaxurl,
				        data: { 'action': 'remove_child_users', 
				                'security': parent_user_strings.security,
				                'parent_id': parent_id,
				                'child_id': child_id,
				              },
				        cache: false,
				        success: function (html) {
				        	$('#s'+child_id).remove();
				        }
				    });

				});
	            setTimeout(function(){$this.html(defaultxt);}, 3000);
	        }
	    });    
	});	


    $('.remove_user_child').click(function() {
		parent_id = $(this).attr("data-parent");
		child_id = $(this).attr("data-user");
		$(this).html('<i class="fa fa-spinner animated spin"></i>');
		$.ajax({
	        type: "POST",
	        url: ajaxurl,
	        data: { 'action': 'remove_child_users', 
	                'security': parent_user_strings.security,
	                'parent_id': parent_id,
	                'child_id': child_id,
	              },
	        cache: false,
	        success: function (html) {
	        	$('#s'+child_id).remove();
	        }
	    });

	});
});