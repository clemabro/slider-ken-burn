$(function() {

    $('#login-form-link').click(function(e) {
    	$("#login-form").delay(100).fadeIn(100);
 		$("#register-form").fadeOut(100);
		$('#register-form-link').removeClass('active');
		$(this).addClass('active');
		e.preventDefault();
	});
	$('#register-form-link').click(function(e) {
		$("#register-form").delay(100).fadeIn(100);
 		$("#login-form").fadeOut(100);
		$('#login-form-link').removeClass('active');
		$(this).addClass('active');
		e.preventDefault();
	});

});

function verifyRegister(e)
{
	e.preventDefault();

	Notiflix.Notify.Init({
		position:"left-bottom",
		distance:"36%",
		width: '553px',
		timeout:3000
	});

	$.ajax({
        url: "isExistUser",
        data: {
            "login" : $('#register-form').find('#username').val(),
        },
        type: 'POST',
        dataType: 'json',
        timeout: 3000,
        success: function (data) {
			console.log(data);
			
			if(data.isExistUser) {
				Notiflix.Notify.Failure('Ce nom d\'utilisateur est déjà utilisé');
			} else {

			}

        },
        error: function (e) {
			console.log(e);
			Notiflix.Notify.Failure('Une erreur est survenue');
        }
    });
	//$('#register-form').submit();
}

function verifyPassword()