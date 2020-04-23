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

function initNotiflix()
{
	Notiflix.Notify.Init({
		position:"left-bottom",
		distance:"36%",
		width: '553px',
		timeout:3000
	});
}

// Vérifie l'inscription
function verifyRegister(e)
{
	e.preventDefault();

	// Si le username est vide on affiche l'erreur
	if($('#register-form').find('#username').val() == "") {
		$('#register-form').get(0).reportValidity();
		return;
	}

	// Init notiflix
	initNotiflix();

	// Appel ajax pour savoir si le username est deja utilise
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
			
			// Affiche une erreur si deja utilise sinon verifie le mdp
			if(data.isExistUser) {
				Notiflix.Notify.Failure('Ce nom d\'utilisateur est déjà utilisé');
			} else {
				verifyPassword();
			}

        },
        error: function (e) {
			console.log(e);
			Notiflix.Notify.Failure('Une erreur est survenue');
        }
    });
}

// Verifie le mdp
function verifyPassword()
{
	// Recuperation des valeurs
	password = $('#register-form').find('#password').val();
	password_confirm = $('#register-form').find('#confirm-password').val();

	// test si les mdp ne sont pas vides
	if(password == "" || password_confirm == "") {
		$('#register-form').get(0).reportValidity();
		return;
	}

	// verifie si ils sont pareil, si oui on envoie le form
	if(password != password_confirm) {
		Notiflix.Notify.Failure('Les mots de passe sont différents');
	} else {
		$('#register-form').submit();
	}
}

function connexion(e)
{
	e.preventDefault();

	// Si le username est vide on affiche l'erreur
	if($('#login-form').find('#username').val() == "" || $('#login-form').find('#password').val() == "") {
		$('#login-form').get(0).reportValidity();
		return;
	}

	// Init notiflix
	initNotiflix();

	// Appel ajax pour savoir si le username est deja utilise
	$.ajax({
        url: "connexionUser",
        data: $('#login-form').serialize(),
        type: 'POST',
        dataType: 'json',
        timeout: 3000,
        success: function (data) {
			console.log(data);
			
			// Affiche une erreur si deja utilise sinon verifie le mdp
			if (data) {
                document.location.href = "albums";
            } else {
				Notiflix.Notify.Failure('Nom d\'utilisateur ou Mot de passe invalide');
			}

        },
        error: function (e) {
			console.log(e);
			Notiflix.Notify.Failure('Une erreur est survenue');
		}
	})
}