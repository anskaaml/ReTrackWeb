var modalForm = document.getElementById("myModal-form");
var btnForm = document.getElementById("myBtn-form");

btnForm.onclick = function() {
  modalForm.style.display = "block";
}

window.onclick = function(event) {
  if (event.target == modalForm) {
    modalForm.style.display = "none";
  }
}