

function consultarItemSenha(idsen, idcat){
    $.ajax({
        url: '/easy-password/public/consultar-senha/'+idsen+'/'+idcat,
        type: 'POST',
        dataType: 'json',
        success:function(json){
            console.log(json.nome_categoria);
            //$('#nomeCate').val(json.nome_categoria);
            $('#senha').modal({backdrop: 'static', keyboard: false},'show');    
        }
    });
}