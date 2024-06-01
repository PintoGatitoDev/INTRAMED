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
      boton.setAttribute("class","bvisible w3-button w3-blue");
    });
  
    invisibles.forEach(function (boton){
      boton.setAttribute("class","visible");
    });
  
    visibles.forEach(function (boton){
      boton.setAttribute("class","invisible");
    });
  
  }

//editpersonales
var botoneditarP = document.querySelector("#editpersonales");
var CancelarP = document.querySelector("#cancelarP");


botoneditarP.addEventListener("click", EditarPersonales);
CancelarP.addEventListener("click", EditarPersonales);




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
      boton.setAttribute("class","bvisible w3-button w3-blue");
    });
  }


  //editContacto
var botoneditarC = document.querySelector("#editcontacto");
var CancelarC = document.querySelector("#cancelarC");

botoneditarC.addEventListener("click", EditarContacto);
CancelarC.addEventListener("click", EditarContacto);