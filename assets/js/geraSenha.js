$(function(){
    $('#form').on('submit', function(e){
        e.preventDefault();

        if(verQtdCaracter()){
            return;
        }

        if($('#carac_espe').is(':checked')){
            var carac_espec = 1;
        }

        if($('#mai_min').is(':checked')){
            var letra_mai_min = 1;
        }
        
        if($('#salvar').is(':checked')){
            var salvar = 1;
        }

        $.ajax({
            url:'/easy-password/public/gerar-senha',
            type:'post',
            data:{
                nome_ref:     $("#nm_refe").val(),
                qtd_carac:    $('#carac').val(),
                carac_espec,
                letra_mai_min,
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