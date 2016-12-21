jQuery(document).ready(function($){


    $('#users-table').DataTable( {
        paging: true,
        "order": []
        //scrollY: 600
    } );

    var table = $('#employee-table').DataTable({
        paging: true,
        buttons: [ 'copy', 'excel', 'pdf' ],
        "order": [[ 1, "asc" ]]
    });
    table.buttons( 0, null ).containers().appendTo('.table-buttons');


    $("button").click(function(){
        $.ajax({url: "demo_test.txt", success: function(result){
            $("#div1").html(result);
        }});
    });


});
$(document).foundation();