$('#salvar').on('click', function(){
    if($('#salvar').is(':checked')){
        if($('#senha').val() == ''){
            toastr.info('Gere uma senha antes de salva-la!');
            $("#salvar").prop("checked", false);
            return;
        }
        $('#senhaSalvar').val($('#senha').val());
        $('[name=senhaComparar]').val($('#senha').val());

        $('#save').modal('show');
    }
});

/* ------- */

$('#save').on('hide.bs.modal', function (event) {
    $("#salvar").prop("checked", false);
});

/* ------- */

/*$('#form4').on('submit', function(e){
       
    e.preventDefault();

    console.log($('[name=categoria[0]]')).val();

    var alterou = 0;

    if($('#senhaSalvar').val() == ''){
        toastr.error("Senha em branco!");
        $('#senhaSalvar').addClass('is-invalid');
        return;
    }

    if($('#senhaSalvar').val() != $('#senha').val()){
        alterou = 1;
    }

    $('#senhaSalvar').removeClass('is-invalid');
    
    var categoria = $('[name=categoria[]]').val();

    console.log(categoria);return;

    $.ajax({
        url: 'easy-password/public/salvar-senha',
        type: 'POST',
        dataType: 'json',
        data: {
            senha: $('#senhaSalvar').val(), 
            alterou: alterou,
            categoria: categoria
        },
        success:function(json){
            if(json.error == '001'){
                toastr.error("Senha em branco!");
                return;
            }
            if(json.error == '002'){

            }
            toastr.success("Senha salva com sucesso!");
        }

    });
});*/

