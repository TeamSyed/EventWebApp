id="<?php echo $_GET['id'];?>";
$.fn.raty.defaults.path = 'images';
$.fn.raty.defaults.readOnly = "<?php echo check_cookie($_GET['id']);?>";//check true or false
$('#star').raty({score:"<?php echo rate($_GET['id']);?>",
    click: function(score, evt) {
        $.post('rating.php',{'rate':score,'pid':id},function(data)
        {
            $('#star').raty({score:score,readOnly:true});
        }
       )
    }
});