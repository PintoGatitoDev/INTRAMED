const botones = document.querySelectorAll('#opcion a');

botones.forEach(button => {
    button.addEventListener('click', handleButtonClick);
  });
  
  function handleButtonClick(event) {
    event.preventDefault();
    const sectionId = event.target.getAttribute('href');
    hideAllSections(sectionId);
    document.querySelector(`#${sectionId}`).style.display = 'block';
  }
  
  function hideAllSections() {
    const contenedores = [
      document.querySelector('#contenedor1'),
      document.querySelector('#contenedor2'),
      document.querySelector('#contenedor3'),
      document.querySelector('#contenedor4'),
    ];
    contenedores.forEach(contenedor => {if(contenedor){contenedor.style.display = 'none'}});
  }