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
    var ids = ['title', 'street', 'streetName', 'city','province', 'postal_code', 'category','image', 'description'];
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
    var numreg = /^(0|[1-9][1-9]*)$/;
    if(!numreg.test($("#street").val())){ 
        $(".street .err").html('Numerics Only').css({'color':'#f00','font-size':'15px'});
        return false;
    }
    var regex = /^[A-Za-z]\d[A-Za-z][ -]?\d[A-Za-z]\d$/;
    if(!regex.test($("#postal_code").val())){ 
        $(".postal_code .err").html('Invalid Postal Code').css({'color':'#f00','font-size':'15px'});
        return false;
    }
    
}

String.prototype.capitalize = function(){
    return this.charAt(0).toUpperCase() + this.slice(1);
}
