

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
$(document).ready(function () {
 $("#openDir").click(function(){
        $("#loadAddress").slideDown("slow");
    });
});
$(document).ready(function () {
    $("#cancelAddress").click(function () {
        $("#loadAddress").slideUp("slow");
    });
});