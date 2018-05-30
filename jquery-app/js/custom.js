$('#send-append').click(function(){
	var email  = $('input[name=email]').val();
	var name   = $('input[name=name]').val();
	var number = $('input[name=number]').val();

	$('#result').append(email);

		console.log('email: '+email+'name: '+name+'number: '+number);
	
	});

	$('#send-html').click(function(){
		var email  = $('input[name=email]').val();
		var name   = $('input[name=name]').val();
		var number = $('input[name=number]').val();

		$('#result').html(email);

		console.log('email: '+email+'name: '+name+'number: '+number);
	});

	$('#add').click(function(){
		var tr = `<tr>
					<td>
						<input type="text" name="name">
					</td>
				</tr>`;
		$('#name-list').append(tr);

		if( $('#name-list tr').length > 1 ){
			$('#del').prop('disabled', false);
		}
		
	});

	$('#send-name-list').click(function(){
		var name = $('#name-list input');
		console.log('name: ',name.serializeArray());

	});

	$('#del').click(function(){
		if( $('#name-list tr').length > 1 ){

			$('#name-list tr:last-child').remove();

		}else{
			
			$('#del').addClass('disable').prop('disabled', true).attr('name','uuuu');

		}
	})