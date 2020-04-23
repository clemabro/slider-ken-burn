$("#inputPicture").on('change', function(){
    var formdataToSend = new FormData($('#image')[0]);
        formdataToSend.append("idSlider", $('#identifiantSlider').val());

        console.log($('#identifiantSlider'))
    
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

