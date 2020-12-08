$('#bCopy').on('click', function(){
   $('input').select();

   var copiar = document.execCommand('copy');
   
   toastr.info('Copiado para a área de transferência!')
});
