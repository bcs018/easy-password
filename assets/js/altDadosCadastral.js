$('#altNick').on('click', function(){
    $.ajax({
        url: '/easy-password/public/painel/alterar-nick/' + $('#nickId').val(),
        type: 'POST',
        data: {
                nick: $('#nickCad').val(),
                id: $('#nickId').val()
              },
        dataType: 'json',
        success:function(json){
            toastr.success("Alteração feita com sucesso!");
            setTimeout(function(){ window.location.reload() }, 1500);

            return;
        }
    })
})

/* Colocar regra: Senha deve conter mais que 6 carac */
$('#altSen').on('click', function(){
    $.ajax({
        url: '/easy-password/public/painel/alterar-senha/' + $('#senhaId').val(),
        type: 'POST',
        data: {
                senha: $('#senhaCad').val(),
                id: $('#senhaId').val()
              },
        dataType: 'json',
        success:function(json){
            toastr.success("Alteração feita com sucesso!");
            setTimeout(function(){ window.location.reload() }, 1500);

            return;
        }
    })
})