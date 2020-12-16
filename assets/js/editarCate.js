function consultarItem(id){
    $.ajax({
        url: '/easy-password/public/consultar-categoria/'+id,
        type: 'POST',
        dataType: 'json',
        success:function(json){
            $('#nomeCate').val( json.nomeCategoria);
            $('#categoria').modal('show');    
        }
    });
}