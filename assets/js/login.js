$('#form3').on('submit', function(e){
    e.preventDefault();

    var login = $('[name=login]').val();
    var senha = $('[name=pass]').val();

    if(login == '' || senha == ''){
        toastr.error ('Campos "Login" ou "Senha" em branco!');
        return;
    }

    $.ajax({
        url: '/logar',
        type: 'post',
        data:{
            login:login,
            senha:senha,
            hash:$('[name=hash]').val()
        },
        dataType:'json',
        success:function(json){
            if(json.erro == '001'){
                toastr.error ('Campos "Login" ou "Senha" em branco!');
                return;
            }

            if(json.erro == '002'){
                toastr.error ('Houve um erro no envio, informe o erro 002 para o admin do sistema ou tente novamente recarregando a pagina!');
                return;
            }

            if(json.success == '100'){
                window.location.href = 'http://easypassword.ml/home/painel';
                return;
            }
                
            toastr.error ('"Login" ou "Senha" incorreto!');
            return;
            
        }
    });
});