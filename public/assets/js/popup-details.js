var modalDetails = document.getElementById("myModal-details");
var btnDetails = document.getElementById("myBtn-details");
var cancelDetails = document.getElementById("btn-cancel");

btnDetails.onclick = function() {
  modalDetails.style.display = "block";
}

window.onclick = function(event) {
  if (event.target == modalDetails) {
    modalDetails.style.display = "none";
  }
}

cancelDetails.onclick = function() {
  modalDetails.style.display = "none";
}