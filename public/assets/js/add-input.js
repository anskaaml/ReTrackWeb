 var i = 0;
       
    $("#addmore").click(function(){
   
        ++i;
   
        $("#dynamicTable").append('<tr><td><input class="form-agenda-dynamic" type="date" name="addmore['+i+'][date]" placeholder="Date" /></td><td><input class="form-agenda-dynamic2" type="time" name="addmore['+i+'][time]" placeholder="Time" /></td><td><div id="latclicked"></div></td><td><div id="longclicked"></div></td><td><button type="button" class="btn btn-danger remove-tr" style="border-radius:15px;">Remove</button></td></tr>');
    });
   
    $(document).on('click', '.remove-tr', function(){  
         $(this).parents('tr').remove();
    });  