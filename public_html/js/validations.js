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
    var numreg = /^[1-9][0-9]*$/;
    
    var regex = /^[A-Za-z]\d[A-Za-z][ -]?\d[A-Za-z]\d$/;
    
    var ids = ['title', 'street', 'streetName', 'city','province', 'time', 'postal_code', 'category', 'description'];
    for(i=0;i<ids.length;i++){
        var idVal = $("#"+ids[i]).val();
        if(idVal===""){
            $("."+ids[i]+" .err").html('This field is Required').css({'color':'#f00','font-size':'15px'});
            return false;
        } else {
            $("."+ids[i]+" .err").html('');
             //status = true;
        }
        if(ids[i] == "street"){
            if(!numreg.test($("#street").val())){ 
                $(".street .err").html('Numerics Only & not starting with 0').css({'color':'#f00','font-size':'15px'});
               return false;
            } else {
                $(".street .err").html('');
               //  status = true;
            }
        }
        if(ids[i] == "postal_code"){
             if(!regex.test($("#postal_code").val())){ 
                $(".postal_code .err").html('Invalid Postal Code').css({'color':'#f00','font-size':'15px'});
                return false;
            } else{
                $(".postal_code .err").html('');
                 //status = true;
            }
        }
        
    }
 }

String.prototype.capitalize = function(){
    return this.charAt(0).toUpperCase() + this.slice(1);
}
