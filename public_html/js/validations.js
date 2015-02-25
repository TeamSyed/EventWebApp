// JavaScript source code
//author : gagandeep singh

    $(document).ready(function () {
        $('.dateWidget').datepicker({
            format: "mm/dd/yyyy"
        }); 
        $('.timeWidget').timepicker({
            template: false,
            showInputs: false,
            minuteStep: 5,
        }); 
    });
function validateEventAdd(){
    var ids = ['title', 'address', 'city','province', 'postal_code', 'category','image', 'description'];
    var status = true;
    for(i=0;i<ids.length;i++){
        var idVal = $("#"+ids[i]).val();
        if(idVal==""){
            $("."+ids[i]+" .err").html('This field is Required').css({'color':'#f00','font-size':'15px'});
            return false;
        } else {
            $("."+ids[i]+" .err").html('');
        }
    }
    
    var regex = /^[A-Za-z]\d[A-Za-z][ -]?\d[A-Za-z]\d$/;
    if(!regex.test($("#postal_code").val())){ 
        $(".postal_code .err").html('Invalid Postal Code').css({'color':'#f00','font-size':'15px'});
        return false;
    }
    
}
