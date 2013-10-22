$(document).ready(function(){
  setTimeout(function(){
      timer(1);
  }, 5000);
});


function cambiarCuadro(a_mostrar){
  $('.primerCuadro section').hide('fade');
  $('.primerCuadro-' + a_mostrar).show('fade');
}

function cambiarCuadroPimienta(a_mostrar){
  $('.todoPimientaTV').hide('fade');
  $('.pimientaTV-' + a_mostrar).show('fade');
}

function timer(id){
  cambiarCuadro(id);
  if(id == 3){
    id = 0;
  } else {
    id = parseInt(id) + 1;
  }
  setTimeout(function(){
      timer(id);
  }, 5000);
}