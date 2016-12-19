jQuery(document).ready(function($){

    $('#employee-table').DataTable( {
        paging: true,
        "order": []
        //scrollY: 600
    } );

    $('#users-table').DataTable( {
        paging: true,
        "order": []
        //scrollY: 600
    } );


    $("button").click(function(){
        $.ajax({url: "demo_test.txt", success: function(result){
            $("#div1").html(result);
        }});
    });


});
$(document).foundation();