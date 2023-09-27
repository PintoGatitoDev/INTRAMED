var botones = document.querySelectorAll("#opcion a");


botones.forEach(function (boton) {
  boton.addEventListener("click", function CambiarSeccion(evento) {
    evento.preventDefault();
    var caja = evento.target;
    document.querySelector("#contenedor1").setAttribute("style","display: none;");
    document.querySelector("#contenedor2").setAttribute("style","display: none;");
    document.querySelector("#contenedor3").setAttribute("style","display: none;");
    document.querySelector("#contenedor4").setAttribute("style","display: none;");
    var direccion = caja.getAttribute("href");
    console.log(direccion);
    document.querySelector("#" + direccion + "").setAttribute("style","display: block;");

  });
});

if(document.querySelector('#carrusel')){
  setInterval('funcionEjecutar("siguiente")',5000);
}


function funcionEjecutar(side){
  console.log("aqui");
  let parentTarget = document.getElementById('carrusel');
  let elements = parentTarget.getElementsByTagName('img');
  let curElement, siguienteElement;
  console.log(elements.length);
  for(var i=0; i<elements.length;i++){

      if(elements[i].style.display== "block"){
          curElement = i;
          break;
      }
  }
  if(side == 'anterior' || side == 'siguiente'){

      if(side=="anterior"){
          siguienteElement = (curElement == 0)?elements.length -1:curElement -1;
      }else{
          siguienteElement = (curElement == elements.length -1)?0:curElement +1;
      }
  }else{
      siguienteElement = side;
      side = (curElement > siguienteElement)?'anterior':'siguiente';

  }
  
  //PUNTOS INFERIORES
  elements[curElement].style.display="none";
    elements[siguienteElement].style.display="block";
}