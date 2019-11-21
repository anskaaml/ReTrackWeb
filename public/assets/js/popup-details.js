var modal = document.getElementById("myModal-details");
var btn = document.getElementById("myBtn-details");
var cancel = document.getElementById("btn-cancel");

btn.onclick = function() {
  modal.style.display = "block";
}

window.onclick = function(event) {
  if (event.target == modal) {
    modal.style.display = "none";
  }
}

cancel.onclick = function() {
  modal.style.display = "none";
}