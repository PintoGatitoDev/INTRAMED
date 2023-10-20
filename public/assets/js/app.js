var botones = document.querySelectorAll("#opcion a");


botones.forEach(function (boton) {
  boton.addEventListener("click", function CambiarSeccion(evento) {
    evento.preventDefault();
    var caja = evento.target;
    document.querySelector("#contenedor1").setAttribute("style", "display: none;");
    document.querySelector("#contenedor2").setAttribute("style", "display: none;");
    var contenedor3 = document.querySelector("#contenedor3");
    if(contenedor3 != null)
    {
      contenedor3.setAttribute("style", "display: none;");
    }
    var contenedor4 = document.querySelector("#contenedor4");
    if(contenedor4 != null)
    {
      contenedor4.setAttribute("style", "display: none;");
    }
    var direccion = caja.getAttribute("href");
    console.log(direccion);
    document.querySelector("#" + direccion + "").setAttribute("style", "display: block;");

  });
});





if (document.querySelector('#carrusel')) {
  setInterval('funcionEjecutar("siguiente")', 5000);
}


function funcionEjecutar(side) {
  console.log("aqui");
  let parentTarget = document.getElementById('carrusel');
  let elements = parentTarget.getElementsByTagName('img');
  let curElement, siguienteElement;
  console.log(elements.length);
  for (var i = 0; i < elements.length; i++) {

    if (elements[i].style.display == "block") {
      curElement = i;
      break;
    }
  }
  if (side == 'anterior' || side == 'siguiente') {

    if (side == "anterior") {
      siguienteElement = (curElement == 0) ? elements.length - 1 : curElement - 1;
    } else {
      siguienteElement = (curElement == elements.length - 1) ? 0 : curElement + 1;
    }
  } else {
    siguienteElement = side;
    side = (curElement > siguienteElement) ? 'anterior' : 'siguiente';

  }

  //PUNTOS INFERIORES
  elements[curElement].style.display = "none";
  elements[siguienteElement].style.display = "block";
}

function EditarPersonales(evento) {
  var inputEditables = document.querySelectorAll(".editP");
  evento.preventDefault();
  console.log("a");
  var botonEditar = evento.target;
  inputEditables.forEach(function (input) {
    input.disabled = !input.disabled;

  });
  var e = evento.target;
  var botonesinv = document.querySelectorAll(".binvisible");
  var invisibles = document.querySelectorAll(".invisible");
  
  var botonesvis = document.querySelectorAll(".bvisible");
  var visibles = document.querySelectorAll(".visible");

  botonesvis.forEach(function (boton){
    boton.setAttribute("class","binvisible");
  });

  botonesinv.forEach(function (boton){
    boton.setAttribute("class","bvisible");
  });

  invisibles.forEach(function (boton){
    boton.setAttribute("class","visible");
  });

  visibles.forEach(function (boton){
    boton.setAttribute("class","invisible");
  });

}


function EditarContacto(evento) {
  var inputEditables = document.querySelectorAll(".editC");
  evento.preventDefault();
  console.log("a");
  var botonEditar = evento.target;
  inputEditables.forEach(function (input) {
    input.disabled = !input.disabled;

  });

  var e = evento.target;
  var botonesinv = document.querySelectorAll(".binvisible");
  var botonesvis = document.querySelectorAll(".bvisible");

  botonesvis.forEach(function (boton){
    boton.setAttribute("class","binvisible");
  });
  botonesinv.forEach(function (boton){
    boton.setAttribute("class","bvisible");
  });
}

//editpersonales
var botoneditarP = document.querySelector("#editpersonales");
var CancelarP = document.querySelector("#cancelarP");

botoneditarP.addEventListener("click", EditarPersonales);
CancelarP.addEventListener("click", EditarPersonales);

//editContacto
var botoneditarC = document.querySelector("#editcontacto");
var CancelarC = document.querySelector("#cancelarC");

botoneditarC.addEventListener("click", EditarContacto);
CancelarC.addEventListener("click", EditarContacto);


// Agrega un oyente de eventos al elemento `button`
document.querySelector(".btn_error").addEventListener("click", function hideButton() {
  // Obtén el elemento `button`
  var button = document.querySelector(".modal");
  // Establece la propiedad `display` del elemento `button` en `none` para ocultarlo
  button.style.display = "none";
});





