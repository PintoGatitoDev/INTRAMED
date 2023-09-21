document.addEventListener("DOMContentLoaded", function () {
  function cambiarSeccion(seccion) {
    // Oculta todas las secciones
    document.getElementById("contenedor1").style.visibility = "hidden";
    document.getElementById("contenedor2").style.visibility = "hidden";
    document.getElementById("contenedor3").style.visibility = "hidden";

    // Muestra la sección seleccionada
    document.getElementById(seccion).style.visibility = "visible";
  }

  // Asigna el evento onclick al menú lateral
  document.getElementById("menu").addEventListener("click", function (event) {
    // Obtiene el enlace que se hizo clic
    var enlace = event.target;

    // Obtiene la sección asociada al enlace
    var seccion = enlace.innerHTML;

    // Llama a la función para cambiar la sección
    cambiarSeccion(seccion);
  });
});


var botones = document.querySelectorAll("#opcion a");


botones.forEach(function (boton) {
  boton.addEventListener("click", function CambiarSeccion(evento) {
    evento.preventDefault();
    var caja = evento.target;
    document.querySelector("#contenedor1").setAttribute("style","display: none;");
    document.querySelector("#contenedor2").setAttribute("style","display: none;");
    document.querySelector("#contenedor3").setAttribute("style","display: none;");
    var direccion = caja.getAttribute("href");
    console.log(direccion);
    document.querySelector("#" + direccion + "").setAttribute("style","display: block;");

  });
});