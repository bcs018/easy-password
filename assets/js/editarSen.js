function consultarItemSenha(id){
    $.ajax({
        url: '/easy-password/public/consultar-senha/'+id,
        type: 'POST',
        dataType: 'json',
        success:function(json){
            $('#nomeCate').val( json.nomeCategoria);
            $('#catid').val(json.id);
            $('#senha').modal({backdrop: 'static', keyboard: false},'show');    
        }
    });
}