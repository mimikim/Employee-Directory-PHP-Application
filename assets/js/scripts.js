jQuery(document).ready(function($){
    $("button").click(function(){
        $.ajax({url: "demo_test.txt", success: function(result){
            $("#div1").html(result);
        }});
    });
});
$(document).foundation();