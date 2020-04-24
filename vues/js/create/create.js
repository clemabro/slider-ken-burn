$("#inputPicture").on('change', function(){
    var formdataToSend = new FormData($('#image')[0]);
        formdataToSend.append("idSlider", $('#identifiantSlider').val());

        console.log($('#identifiantSlider'));

        $.ajax({
            url: 'ajoutImage',
            data: formdataToSend,
            type: 'POST',
            dataType: 'json',
            contentType : false,
            processData : false,
            cache : false,
            timeout: 4000,
            success: function (data) {
                console.log(data);
                document.getElementById("identifiantSlider").value = data.idSlider;
                if(data.etat == true){
                    Notiflix.Notify.Success('Image ' + data.nomImage + ' Uploadée');
                }else{
                    Notiflix.Notify.Failure('Impossible d\'ajouter l\'image, Fichier trop lourd');
                }
            },
            error: function (e) {
            console.log(e);
        }
    });
});

$("#changePicture").on("click", function(event) {
    event.preventDefault();
    $("#inputPicture").trigger("click");
});

function pageEdition(e){

    e.preventDefault();
    var formdataToSend = new FormData();
    formdataToSend.append("idSliderModif", $('#identifiantSlider').val());
    formdataToSend.append("nomSlider", $('#username').val());
    

    $.ajax({
        url: 'modifierSlider',
        data: formdataToSend,
        type: 'POST',
        dataType: 'json',
        contentType : false,
        processData : false,
        cache : false,
        timeout: 4000,
        success: function (data) {
            console.log(data);
            console.log('ok');
            document.location.href = "editionDiapo";
        },
        error: function (e) {
            console.log(e);
            console.log('pas ok');
        }
});
}

function editSlider(e, idSlider)
{
    e.preventDefault();
    // Envoie en post l'id du slider a constulter.
    $('#viewSliderForm').find('#idSlider').val(idSlider);
    $('#viewSliderForm').submit();
}

