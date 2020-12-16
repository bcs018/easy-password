$('#enviar').on('click', function(){
    if($('#nomeCate').val() == ''){
        toastr.error('Nome da categoria em branco!');
        return;
    }

    $.ajax({
        url: '/easy-password/public/editar-categoria/'+$('#catid').val(),
        type: 'POST',
        data: {nome : $('#nomeCate').val()},
        dataType: 'json',
        success:function(json){
            $('#nomeCate').val($('#nomeCate').val());
            toastr.success('Alteração feita com sucesso!');
            return;
        }
    });
});

$('#fechar').on('click', function(){
    window.location.reload();
})

$('#pop').on('click', function(){
})


function consultarItem(id){
    $.ajax({
        url: '/easy-password/public/consultar-categoria/'+id,
        type: 'POST',
        dataType: 'json',
        success:function(json){
            $('#nomeCate').val( json.nomeCategoria);
            $('#catid').val(json.id);
            $('#categoria').modal({backdrop: 'static', keyboard: false},'show');    
        }
    });
}

