// JavaScript source code
//author : gagandeep singh

    $(document).ready(function () {
        $('#date').datepicker({
            format: "mm/dd/yyyy"
        }); 
        $('#time').timepicker({
            template: false,
            showInputs: false,
            minuteStep: 5,
        }); 
    });
function validateEventAdd(){
    var ids = ['title', 'address', 'city', 'postal_code', 'category', 'date', 'time', 'image', 'description'];
    var status = true;
    for(i=0;i<ids.length;i++){
        var idVal = $("#"+ids[i]).val();
        if(idVal==""){
            $("."+ids[i]+" .err").html('This field is Required').css({'color':'#f00','font-size':'15px'});
            status = false;
        } else {
            $("."+ids[i]+" .err").html('');
            status = true;
        }
    }
    return (status == false) ? false : true;
    
}