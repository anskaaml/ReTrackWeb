// var i = 0;

// $("#addmore").click(function(){
//     ++i;
//     $("#dynamicTable").append('<tr><td><input class="form-agenda-dynamic" type="date" name="addmore['+i+'][date]" placeholder="Date" /></td><td><input class="form-agenda-dynamic2" type="time" name="addmore['+i+'][time]" placeholder="Time" /></td><td><div id="latclicked"></div></td><td><div id="longclicked"></div></td><td><button class="btn btn-success add-member" style="border-radius:15px;background-color:#3c78d8" type="button" name="addmember">Add Member</button></td><td><button type="button" class="btn btn-danger remove-tr" style="border-radius:15px;">Remove</button></td></tr>');
// });

// $(document).on('click', '.remove-tr', function(){  
//     $(this).parents('tr').remove();
// });  

// $(document).on('click', 'add-member', function(){
//     return view('agenda.add-member');
// });
var iterate = 0;
$("#addmore").click(function(){
    ++iterate;
    $("#dynamicTable")
        .append(
        '<tr>' +
            '<td>' +
            '<input class="form-agenda-dynamic" type="date" name="checkpoint_date[]" placeholder="Date"/>' +
            '</td>' +
            '<td>' +
            '<input class="form-agenda-dynamic2" type="time" name="checkpoint_time[]" placeholder="Time"/>' +
            '</td>' +
            '<td>'+
            '<input id="checkpoint_longitude-' + iterate + '" placeholder="Longitude" readonly name="checkpoint_longitude[]" type="text" class="input-form">' +
            '</td>' +
            '<td>'+
            '<input id="checkpoint_latitude-' + iterate + '" placeholder="Latitude" readonly name="checkpoint_latitude[]" type="text" class="input-form">' +
            '</td>' +
            '<td>' +
            '<button type="button" class="btn btn-danger remove-tr" style="border-radius:15px;">Remove</button>' +
            '</td>' +
        '</tr>');
});

$(document).on('click', '.remove-tr', function(){  
    $(this).parents('tr').remove();
});  