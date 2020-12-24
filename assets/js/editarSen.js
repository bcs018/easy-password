$('#senhaN').blur(function(){

    if($('#senhaN').val() == ''){
        toastr.error('Senha em branco!');
        $('#senhaN').addClass('is-invalid');
        return;
    }

    //console.log($('[name=categoria]').val());

    /*$.ajax({
        url: '/easy-password/public/painel/editar-senha',
        type: 'POST',
        data: {
            categoria: $('[name=categoria]').val()
        }
    });*/

});

$('#fechar').on('click', function(){
    window.location.reload();
})

function consultarItemSenha(idsen, idcat){
    $.ajax({
        url: '/easy-password/public/painel/consultar-senha/'+idsen+'/'+idcat,
        type: 'POST',
        dataType: 'json',
        success:function(json){
            var valores = $("input[value="+ json.categoria_id +"]").prop("checked", true);
            
            console.log(valores);
            $('#senhaN').val(json.senha_usu);
            $('#senha').modal({backdrop: 'static', keyboard: false},'show');    
        }
    });
}