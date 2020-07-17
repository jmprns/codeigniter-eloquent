

$("#qr-div").qrcode({
    size: 200,
    fill: '#333',
    text: $('#did2').val() + $('#did').val(),
    mode: 2,
    label: $('#did2').val() + $('#did').val(),
    fontcolor: '#e41b17',
    minVersion: 10,
    maxVersion: 40,
    ecLevel: 'H',
});



$("#form-submit").click( function() {

    if($('input[name=name]').val() == '' || $('input[name=file]').val() == ''){
        return;
    }

    $("#modal-at").addClass("whirl traditional");

    $("form").submit();

});