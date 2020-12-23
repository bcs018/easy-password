$('#fechar').on('click', function(){
    window.location.reload();
})

function consultarItemSenha(idsen, idcat){
    $.ajax({
        url: '/easy-password/public/consultar-senha/'+idsen+'/'+idcat,
        type: 'POST',
        dataType: 'json',
        success:function(json){
            $('#nomeCate').val(json.nome_categoria);
            $('#senha').modal({backdrop: 'static', keyboard: false},'show');    
        }
    });
}