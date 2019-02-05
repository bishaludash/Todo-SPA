$(function(){

	// Modal Load
  	$(document).on('click', '.ajax-modal', function(){
  		var url = $(this).attr('data-url');
  		var title = $(this).attr('data-title');
  		$('.ajax-form-model').modal();
  		$('.ajax-form-model .modal-title').text(title);
  		$('.ajax-form-model .modal-body').load(url);
  	});


    // POST form
  	$(document).on('submit', '.ajax-form-post', function(e){
  		e.preventDefault();
  		var url = $(this).attr('action');
        var current_form = $(this);
        var request_data = {};

  		current_form.find('[name]').each(function(){
  			request_data[$(this).attr('name')] = $(this).val();
  		});

  		$.post(url, request_data, function(response){
  			console.log(response);
  			  if (response.status =='success') {
                	// window.location.href = response.return_url;
                  $('#todo-list').load(location.href + ' #todo-list tr');
                  $('.ajax-form-model').modal('toggle');

                  // message
                  $('.ajax-success-text').text(response.message);
                  $('.ajax-success').show().delay(3000).hide(0);
                }
                if (response.status == "fail") {
                	 for(var key in response.errors){
                        var error_message = response.errors[key];

                        var error_form_field = current_form.find("[name="+key+"]");
                        error_form_field.addClass('errors');
                        error_form_field.parent().find('.error-message').removeClass('invisible').addClass('text-danger').html(error_message);
                    }
                }
  		});
  	});


    // DELETE POST
  	$(document).on('click', '.ajax-form-delete', function(e){
  		e.preventDefault();
      var url = $(this).attr('action');
      var current_form = $(this);
      var request_data = {};

      current_form.find('[name]').each(function(){
        request_data[$(this).attr('name')] = $(this).val();
      });
      

      $.ajax({
        url: url,
        type:'DELETE',
        data: request_data,

        success : function(data){
          console.log(data);
          $('#todo-list').load(location.href + ' #todo-list tr');
          $('.ajax-form-model').modal('toggle');

         // message
          $('.ajax-success-text').text(data.message);
          $('.ajax-success').show().delay(3000).hide(0);
        }

      });
  	});


  	
});