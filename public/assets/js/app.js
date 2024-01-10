const botones = document.querySelectorAll('#opcion a');

botones.forEach(button => {
  button.addEventListener('click', handleButtonClick);
});

function handleButtonClick(event) {
  event.preventDefault();
  const sectionId = event.target.getAttribute('href');
  hideAllSections();
  document.querySelector(`#${sectionId}`).style.display = 'block';
}

function hideAllSections() {
  const contenedores = [
    document.querySelector('#contenedor1'),
    document.querySelector('#contenedor2'),
    document.querySelector('#contenedor3'),
    document.querySelector('#contenedor4'),
  ];
  contenedores.forEach(contenedor => contenedor.style.display = 'none');
}

document.addEventListener('DOMContentLoaded', function() {
  const carrusel = document.getElementById('carrusel');
  if (carrusel) {
    setInterval(() => handleCarouselTransition('siguiente'), 5000);
  }
});

function handleCarouselTransition(side) {
  const carrusel = document.getElementById('carrusel');
  const images = carrusel.getElementsByTagName('img');
  let currentImageIndex;

  for (let i = 0; i < images.length; i++) {
    if (images[i].style.display === 'block') {
      currentImageIndex = i;
      break;
    }
  }

  let nextImageIndex;

  if (side === 'anterior' || side === 'siguiente') {
    if (side === 'anterior') {
      nextImageIndex = (currentImageIndex === 0) ? images.length - 1 : currentImageIndex - 1;
    } else {
      nextImageIndex = (currentImageIndex === images.length - 1) ? 0 : currentImageIndex + 1;
    }
  } else {
    nextImageIndex = side;
    side = (currentImageIndex > nextImageIndex) ? 'anterior' : 'siguiente';
  }

  hideAllImages();
  images[nextImageIndex].style.display = 'block';
}

function hideAllImages() {
  const images = document.querySelectorAll('#carrusel img');
  images.forEach(image => image.style.display = 'none');
}

const editPersonalesButton = document.querySelector('#editpersonales');
const cancelPersonalesButton = document.querySelector('#cancelarP');

const editContactoButton = document.querySelector('#editcontacto');
const cancelContactoButton = document.querySelector('#cancelarC');

const editables = document.querySelectorAll('.editP, .editC');

const visibleButtons = document.querySelectorAll('.bvisible');
const invisibleButtons = document.querySelectorAll('.binvisible');

const visibleElements = document.querySelectorAll('.visible');
const invisibleElements = document.querySelectorAll('.invisible');

const errorButton = document.querySelector('.btn_error');
errorButton.addEventListener("click", hideErrorButton);

editPersonalesButton.addEventListener('click', toggleEditableInputs);
cancelPersonalesButton.addEventListener('click', toggleEditableInputs);

editContactoButton.addEventListener('click', toggleEditableInputs);
cancelContactoButton.addEventListener('click', toggleEditableInputs);

function toggleEditableInputs(event) {
  event.preventDefault();

  editables.forEach(editable => editable.disabled = !editable.disabled);

  visibleButtons.forEach(button => button.classList.toggle('bvisible'));
  invisibleButtons.forEach(button => button.classList.toggle('binvisible'));

  visibleElements.forEach(element => element.classList.toggle('visible'));
  invisibleElements.forEach(element => element.classList.toggle('invisible'));
}


