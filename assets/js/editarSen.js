$('#senhaN').blur(function(){
    if($('#senhaN').val() == ''){
        toastr.error('Senha em branco!');
        $('#senhaN').addClass('is-invalid');
        return;
    }
});

$('#fechar').on('click', function(){
    window.location.reload();
})

function consultarItemSenha(idsen, idcat){
    $.ajax({
        url: '/easy-password/public/painel/consultar-senha/'+idsen+'/'+idcat,
        type: 'POST',
        dataType: 'json',
        success:function(json){
            $("input[value="+ json.categoria_id +"]").prop("checked", true);
            
            $('#senhaN').val( decodeHtml(json.senha_usu) );
            $('#senid').val(idsen);
            $('#catid').val(idcat);
            $('#senha').modal({backdrop: 'static', keyboard: false},'show');    
        }
    });
}

function decodeHtml(str){
    var map =
    {
        '&amp;': '&',
        '&lt;': '<',
        '&gt;': '>',
        '&quot;': '"',
        '&#039;': "'"
    };
    return str.replace(/&amp;|&lt;|&gt;|&quot;|&#039;/g, function(m) {return map[m];});
}