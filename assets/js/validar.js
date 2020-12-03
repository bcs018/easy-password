function verQtdCaracter(){
    var valor = $('#carac').val();

    if(valor < 1 || valor > 30){
        $("#carac").addClass('is-invalid');
        $('#carac').removeClass('is-valid')
    }else{
        $('#carac').removeClass('is-invalid')
        $("#carac").addClass('is-valid');

    }
}

function verNomeRef(){
    $('#nm_refe').addClass('is-valid');
}