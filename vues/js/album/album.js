function viewSlider(e, idSlider)
{
    e.preventDefault();
    // Envoie en post l'id du slider a constulter.
    $('#viewSliderForm').find('#idSlider').val(idSlider);
    $('#viewSliderForm').submit();
}