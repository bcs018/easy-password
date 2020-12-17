$('#altNick').on('click', function(){
    $.ajax({
        url: '/easy-password/public/painel/alterar-nick/' + $('#nickId').val(),
        type: 'POST',
        data: { nick: $('#nickCad').val() },
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
            senhaRep: $('#senhaCadRep').val()
         },
        dataType: 'json',
        success:function(json){
            if(json.error == '001'){
                toastr.error("Senha menor que seis caracteres!");
                return;
            }
            if(json.error == '002'){
                toastr.error('Senhas não batem, informe a mesma senha nos campos "Nova senha" e "Repita a nova senha"!');
                return;
            }
            toastr.success("Alteração feita com sucesso!");
            setTimeout(function(){ window.location.reload() }, 1500);

            return;
        }
    })
})