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
                console.log('ok');
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
    formdataToSend.append("idSlider", $('#identifiantSlider').val());
    formdataToSend.append("nomSlider", $('#identifiantSlider').val());


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
            console.log(data)
        },
        error: function (e) {
            console.log(e);
            console.log('ok');
        }
    })
}

