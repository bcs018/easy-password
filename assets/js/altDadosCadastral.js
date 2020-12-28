$('#altNick').on('click', function(){
    $.ajax({
        url: '/easy-password/public/painel/alterar-nick',
        type: 'POST',
        data: { 
            nick: $('#nickCad').val(),
            hash:  $('[name=hash]').val()
        },
        dataType: 'json',
        success:function(json){
            if(json.error != '001'){
                toastr.success("Alteração feita com sucesso!");
                setTimeout(function(){ window.location.reload() }, 1500);
                return;
            }
            window.location.reload();
            return
           
        }
    })
})

$('#altSen').on('click', function(){
    $.ajax({
        url: '/easy-password/public/painel/alterar-senha',
        type: 'POST',
        data: { 
            senha: $('#senhaCad').val(),
            senhaRep: $('#senhaCadRep').val(),
            hash: $('[name=hash]').val()
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
            if(json.error == '003'){
                window.location.reload();
                return;
            }
            toastr.success("Alteração feita com sucesso!");
            setTimeout(function(){ window.location.reload() }, 1500);

            return;
        }
    })
})