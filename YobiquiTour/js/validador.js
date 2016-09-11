
function ValidaNumeroItemsVisitados(){

  alert('Debe visitar como mínimo 10 items');
  return false;
  
}


function ValidaEvaluaciones( formulario ) {
  
  with(formulario){
    var siga = "n";
    for(var i = 0; i < elemento0.length; i++){
      
      if ( elemento0[i].checked ) {
        siga = "s";
        break;
      }
    }

    if(siga == "n"){
      alert('No ha seleccionado todos los items');
      return false;
    }


    siga = "n";
    for(var i = 0; i < elemento1.length; i++){
      var siga = "n";
      if ( elemento1[i].checked ) {
        siga = "s";
        break;
      }
    }

    if(siga == "n"){
      alert('No ha seleccionado todos los items');
      return false;
    }

    siga = "n";
    for(var i = 0; i < elemento2.length; i++){
      var siga = "n";
      if ( elemento2[i].checked ) {
        siga = "s";
        break;
      }
    }

    if(siga == "n"){
      alert('No ha seleccionado todos los items');
      return false;

    }

    siga = "n";
    for(var i = 0; i < elemento3.length; i++){
      var siga = "n";
      if ( elemento3[i].checked ) {
        siga = "s";
        break;
      }
    }

    if(siga == "n"){
      alert('No ha seleccionado todos los items');
      return false;
    }


    siga = "n";
    for(var i = 0; i < elemento4.length; i++){
      var siga = "n";
      if ( elemento4[i].checked ) {
        siga = "s";
        break;
      }
    }

    if(siga == "n"){
      alert('No ha seleccionado todos los items');
      return false;
    }


    siga = "n";
    for(var i = 0; i < elemento5.length; i++){
      var siga = "n";
      if ( elemento5[i].checked ) {
        siga = "s";
        break;
      }
    }

    if(siga == "n"){
      alert('No ha seleccionado todos los items');
      return false;
    }



    siga = "n";
    for(var i = 0; i < elemento6.length; i++){
      var siga = "n";
      if ( elemento6[i].checked ) {
        siga = "s";
        break;
      }
    }

    if(siga == "n"){
      alert('No ha seleccionado todos los items');
      return false;
    }



    siga = "n";
    for(var i = 0; i < elemento7.length; i++){
      var siga = "n";
      if ( elemento7[i].checked ) {
        siga = "s";
        break;
      }
    }

    if(siga == "n"){
      alert('No ha seleccionado todos los items');
      return false;
    }



    siga = "n";
    for(var i = 0; i < elemento8.length; i++){
      var siga = "n";
      if ( elemento8[i].checked ) {
        siga = "s";
        break;
      }
    }

    if(siga == "n"){
      alert('No ha seleccionado todos los items');
      return false;
    }


    siga = "n";
    for(var i = 0; i < elemento9.length; i++){
      var siga = "n";
      if ( elemento9[i].checked ) {
        siga = "s";
        break;
      }
    }

    if(siga == "n"){
      alert('No ha seleccionado todos los items');
      return false;
    }
    

    if(siga == "s"){
      return true;
    }

  }
}


/*

function Valida( formulario ) {
  if (formulario.campo1.value == 'OK') {
    return true
  } else {
    return false
  }
}


function validarBotonRadio() {

  var s = "no";

  with (document.formulario){

    for ( var i = 0; i < sexo.length; i++ ) {

      if ( ) {

      s= "si";

      window.alert("Ha seleccionado: \n" + sexo.value);

      break;

      }

    }

    if ( s == "no" ){

      window.alert("Debe seleccionar hombre o mujer" ) ;

    }

  }

}







*/



















