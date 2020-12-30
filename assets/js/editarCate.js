$('#enviar').on('click', function(){
    if($('#nomeCate').val() == ''){
        toastr.error('Nome da categoria em branco!');
        return;
    }

    $.ajax({
        url: '/home/painel/editar-categoria/'+$('#catid').val(),
        type: 'POST',
        data: {
            nome: $('#nomeCate').val(),
            hash: $('[name=hash2]').val()
        },
        dataType: 'json',
        success:function(json){
            if(json.error == '001'){
                toastr.error('Houve um erro no envio, informe o erro 001 para o admin do sistema ou tente novamente recarregando a pagina!');
                return;
            }

            if(json.error == '002'){
                toastr.error('Houve um erro no envio, informe o erro 002 para o admin do sistema ou tente novamente recarregando a pagina!');
                return;
            }
            $('#nomeCate').val($('#nomeCate').val());
            toastr.success('Alteração feita com sucesso!');
            return;
        }
    });
});

$('#fechar').on('click', function(){
    window.location.reload();
})

function consultarItem(id){
    $.ajax({
        url: '/home/painel/consultar-categoria/'+id,
        type: 'POST',
        dataType: 'json',
        success:function(json){
            if(json.error == '001'){
                toastr.error('Não pode editar essa categoria!');
                return;
            }
            $('#nomeCate').val( json.nomeCategoria);
            $('#catid').val(json.id);
            $('#categoria').modal({backdrop: 'static', keyboard: false},'show');    
        }
    });
}

