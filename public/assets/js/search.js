function inputSearch() {
  // var input, filter, table, tr, td, i, txtValue;
  // input = document.getElementById("input-search");
  // filter = input.value.toUpperCase();
  // table = document.getElementById("table");
  // tr = table.getElementsByTagName("tr");

  // for (i = 0; i < tr.length; i++) {
  //   td = tr[i].getElementsByTagName("td")[1];
  //     if (td) {
  //       txtValue = td.textContent || td.innerText;
  //         if (txtValue.toUpperCase().indexOf(filter) > -1) {
  //           tr[i].style.display = "";
  //           } else {
  //             tr[i].style.display = "none";
  //           }
  //         }       
        
  //     }

  $(document).ready(function(){
  $("#input-search").on("keyup", function() {
    var value = $(this).val().toLowerCase();
    $("#myTable tr").filter(function() {
      $(this).toggle($(this).text().toLowerCase().indexOf(value) > -1)
    });
  });
});
}