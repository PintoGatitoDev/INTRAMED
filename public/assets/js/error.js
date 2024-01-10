function hideErrorButton() {
  var modal = document.querySelector('.modal');
  modal.style.display = 'none';
}

document.querySelector(".btn_error").addEventListener("click",hideErrorButton);