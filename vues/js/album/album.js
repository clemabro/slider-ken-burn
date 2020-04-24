function viewSlider(e, idSlider)
{
    e.preventDefault();
    // Envoie en post l'id du slider a constulter.
    $('#viewSliderForm').find('#idSlider').val(idSlider);
    $('#viewSliderForm').submit();
}

function deleteSlider(e, idSlider, nom)
{
    e.preventDefault();

    Notiflix.Confirm.Init({
        okButtonBackground:"#ff0000",titleColor:"#ff0000",
    });

    if(nom != "") {
        text = 'Etes vous sûr de vouloir supprimer le diaporama ' + nom + ' ?';
    } else {
        text = 'Etes vous sûr de vouloir supprimer ce diaporama ?'
    }

    Notiflix.Confirm.Show(
        'Suppression',
        text,
        'Oui',
        'Non',
        function(){
            $.ajax({
                url: "supprimerDiapo",
                data: {
                    "idSlider" : idSlider,
                },
                type: 'POST',
                dataType: 'json',
                timeout: 3000,
                success: function (data) {
                    console.log(data);
                    if(data.deleted) {
                        $('#diapo-' + idSlider).fadeOut(500, function(){
                            $('#diapo' + idSlider).remove();
                            /*
                            if($('#event').find('p').length < 1) {
                                $('#event').append("<p>Vous n'avez pas d'événement(s)</p>");
                            }


                            <div class="container text-center">
                            <p class="lead text-muted">Vous n\'avez aucun diaporama</p>
                            </div>
                            */
                        })
                    }
                },
                error: function (e) {
                    console.log(e);
                    Notiflix.Notify.Failure('Une erreur est survenue');
                }
            });
        }
    );
}