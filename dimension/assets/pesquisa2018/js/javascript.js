function form3() {
    if(document.all['publicacoes1'].value == "") {
      //alert('Por favor, coloque o nome para continuar!');
      document.all['publicacoes1'].focus();
      return false;
    }
    if(document.all['publicacoes2'].value == "") {
     //alert('Por favor, coloque o telefone para continuar!');
     document.all['publicacoes2'].focus();
     return false;
    } 
}