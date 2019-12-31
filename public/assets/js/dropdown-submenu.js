$(document).ready(function(){
  $('.dropdown-submenu p.data').on("click", function(e){
    $(this).next('ul').toggle();
    e.stopPropagation();
    e.preventDefault();
  });
});