$(document).ready(function(){
		$("#btnLogin").click(function(){
			
			var action = $("#logsiform").attr('action');
			var form_data = {
				username: $("#uname").val(),
				password: $("#passwd").val(),
				lemparpostnya: 1
			};
			var url_auth = 'http://dam.the-lounge.club/main/index.php';
			
			$.ajax({
				type: "POST",
				url: action,
				data: form_data,
				success: function(response)
				{
					if(response == "success")
						$("#logsiform").show(function(){
							$.blockUI({ 
								theme:     true, 
								title:    'MESSAGE:', 
								message:  '<p>Login Sukses, Redirecting... </p>',
							});
 							window.setTimeout(function() {
								window.location.href = url_auth;
							}, 3000);
						});
					else
						$.blockUI({ 
						theme:     true, 
						title:    'MESSAGE:', 
						message:  '<p>Error, Username / Password anda Invalid. </p>', 
						timeout:   2500 
					});
				}	
			});
			return false;
		});
	});
