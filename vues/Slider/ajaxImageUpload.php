$("#inputChangePicture").on('change', function(){
    var formdataToSend = new FormData($('#formImgProfil')[0]);
        formdataToSend.append("mailCesi", $('#mail').val());
        formdataToSend.append("fonctionValeur", "uploadImgProfil");

        console.log($('#formImgProfil'))

        $.ajax({
            url: 'creationDiapo',
            data: formdataToSend,
            type: 'POST',
            dataType: 'json',
            contentType : false,
            processData : false,
            cache : false,
            timeout: 3000,
            success: function (data) {
            console.log(data);
            $('#avatarEleve').attr("src", "data:image/" + data.imgType +";base64, " + data.imgProfil);
            },
            error: function (e) {
            console.log(e);
        }
    });
});

$("#changePicture").on("click", function(event) {
    event.preventDefault();
    $("#inputChangePicture").trigger("click");
});