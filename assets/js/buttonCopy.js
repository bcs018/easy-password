$('#bCopy').on('click', function(){
   $('input').select();

   var copiar = document.execCommand('copy');

   if(copiar){
       console.log("Copiou");
   }else{
       console.log("Não copiou");
   }
    
    //document.execCommand('copy');

    console.log("chamou");

});
   /* const content = document.querySelector('#senha');
    content.select();

    document.execCommand('copy');
}*/
