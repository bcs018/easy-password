$('#nickCad').on('click', function(){
    $.ajax({
        url: '/easy-password/public/painel/alterar-nick'+$('#nickId').val(),
        type: 'POST',
        data: {
                nick: $('#nickCad').val(),
                id: $('#nickId').val()
              },
        dataType: 'json',
        success:function(json){

        }
    })
})

$('#senhaCad').on('click', function(){
    
})