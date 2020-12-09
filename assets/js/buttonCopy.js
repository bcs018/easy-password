$('#bCopy').on('click', function(){
   $('input').select();

   document.execCommand('copy');
   
   toastr.info('Copiado para a área de transferência!')
});
