$(function(){
    $('#form').on('submit', function(e){
        e.preventDefault();

        if(verQtdCaracter()){
            return;
        }

        if($('#carac_espe').is(':checked')){
            var carac_espec = 1;
        }

        if($('#maius').is(':checked')){
            var letra_mai = 1;
        }
        if($('#minus').is(':checked')){
            var letra_min = 1;
        }
        if($('#numero').is(':checked')){
            var numero = 1;
        }       
        if($('#salvar').is(':checked')){
            var salvar = 1;
        }

        $.ajax({
            url:'/easy-password/public/gerar-senha',
            type:'post',
            data:{
                qtd_carac: $('#carac').val(),
                carac_espec,
                letra_mai,
                letra_min,
                numero,
                salvar
                },
            dataType:'json',
            success:function(json){
                $('#senha').html(json.senha);
            }
        });
    });
});


function verQtdCaracter(){
    var valor = $('#carac').val();

    if(valor < 1 || valor > 30 || valor == ''){
        $("#carac").addClass('is-invalid');
        $('#carac').removeClass('is-valid')
        return true;
    }else{
        $('#carac').removeClass('is-invalid')
        $("#carac").addClass('is-valid');
    }
}

function verNomeRef(){
    $('#nm_refe').addClass('is-valid');
}