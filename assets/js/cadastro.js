$(function(){
    $('#form2').on('submit', function(e){
        e.preventDefault();

        if(verSenha()){
            $('#errSenha').html('<div class="alert alert-danger" role="alert">Senhas diferentes ou menor que seis caracteres, verifique o campo "Senha" e "Confirmar senha"</div>');
            $('#pass').addClass('is-invalid');
            $('#con_pass').addClass('is-invalid');
            return
        }

        $('#pass').removeClass('is-invalid');
        $('#con_pass').removeClass('is-invalid');
        $('#pass').addClass('is-valid');
        $('#con_pass').addClass('is-valid');
        $('#errSenha').html('');
        
        $.ajax({
            url:'/easy-password/home/cadastre-se/cadastrar',
            type:'post',
            data:{
                login: $('#login').val(),
                nick: $('#nick').val(),
                senha: $('#pass').val(),
                hash: $('#hash').val()
            },
            dataType:'json',
            success:function(json){
                if(json.erro == '001'){
                    $('#errSenha').html('<div class="alert alert-danger" role="alert">Por algum motivo seus dados não foram enviados no formulário, por favor verifique os campos "Login", "Senha" e "Confirmar senha"</div>');
                    $('#login').addClass('is-invalid');
                    return;
                }

                if(json.erro == '002'){
                    $('#login').addClass('is-invalid');
                    toastr.error ('Já existe esse login cadastrado, coloque outro!');
                    return;
                }else{
                    $('#login').removeClass('is-invalid');
                    $('#login').addClass('is-valid');
                }

                if(json.erro == '003'){
                    toastr.error ('Houve um erro no envio, informe o erro 002 para o admin do sistema ou tente novamente recarregando a pagina!');
                    return;
                }

                if(json.success == '100'){
                    $('#errSenha').html('<div class="alert alert-success" role="alert">Cadastro efetuado com sucesso! <a href="/easy-password/home/login"><b>Faça Login</b></a></div>');
                    $('#form2 input').val(""); //coloca todos valores de todos inputs do form como vazio
                    $('#form2 input[type = submit]').val("Cadastrar"); //recoloca o texto no botão
                    $('#form2 input').removeClass('is-valid');
                }
            }
        });
    });
});


$('#login').blur(function(){
    var login = $('#login').val();

    if(login == ''){
        $('#login').addClass('is-invalid');
        toastr.error ('Campo "Login" em branco!');
        return;
    }

    $.ajax({
        url:'/easy-password/home/cadastre-se/valida-login',
        type:'post',
        data:{login: login},
        dataType:'json',
        success:function(json){
            if(json.exists == 1){
                $('#login').addClass('is-invalid');
                toastr.error ('Já existe esse login cadastrado, coloque outro!');
                return;
            }else{
                $('#login').removeClass('is-invalid');
                $('#login').addClass('is-valid');
            }
        }
    });
});

function verSenha(){
    var senha    = $('#pass').val();
    var conSenha = $('#con_pass').val();

    if ((senha == '' || conSenha == '') || (senha != conSenha) || (senha.length < 6)){
        return true;
    }
}