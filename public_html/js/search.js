// JavaScript source code
//author : rohit kumar

$(document).ready(function(){
    $("#flip").click(function(){
        $("#asearch").slideDown("slow");
    });
});
$(document).ready(function () {
    $("#cancel").click(function () {
        $("#asearch").slideUp("slow");
    });
});

