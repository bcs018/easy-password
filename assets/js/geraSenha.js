$(function(){
    $('#form').on('submit', function(e){
        e.preventDefault();

        if(verQtdCaracter()){
            return;
        }

        if($('#carac_espe').is(':checked')){
            var carac_espec = 1;
        }

        if($('#maius').is(':checked')){
            var letra_mai = 1;
        }
        if($('#minus').is(':checked')){
            var letra_min = 1;
        }
        if($('#numero').is(':checked')){
            var numero = 1;
        }       
        if($('#salvar').is(':checked')){
            var salvar = 1;
        }

        $.ajax({
            url:'/home/gerar-senha',
            type:'post',
            data:{
                qtd_carac: $('#carac').val(),
                carac_espec,
                letra_mai,
                letra_min,
                numero,
                salvar
                },
            dataType:'json',
            success:function(json){
                if(json.erro == '001'){
                    $('#erro').html('<br><div class="alert alert-danger" role="alert">Quantidade de caracteres zerado!</div>');
                    return;
                }

                if(json.erro == '002'){
                    $('#erro').html('<br><div class="alert alert-danger" role="alert">Pelo menos uma opção deve ser selecionada!</div>');
                    $('#carac_espe').addClass('is-invalid');
                    $('#maius').addClass('is-invalid');
                    $('#minus').addClass('is-invalid');
                    $('#numero').addClass('is-invalid');
                    toastr.error ('Selecione pelo menos uma opção') ;
                    return;
                }
                $('#carac_espe').removeClass('is-invalid');
                $('#maius').removeClass('is-invalid');
                $('#minus').removeClass('is-invalid');
                $('#numero').removeClass('is-invalid');
                $('#erro').html('');

                document.querySelector("[name=senha]").value = json.senha;
            }
        });
    });
});


function verQtdCaracter(){
    var valor = $('#carac').val();

    if(valor < 1 || valor > 30 || valor == ''){
        $("#carac").addClass('is-invalid');
        $('#carac').removeClass('is-valid')
        return true;
    }else{
        $('#carac').removeClass('is-invalid')
        $("#carac").addClass('is-valid');
    }
}
