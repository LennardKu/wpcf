jQuery(document).ready(function() {
    //validattion
    jQuery(function() {
            jQuery("#wpcf").validate();
        })
        //end validation

    jQuery('#wpcf').submit(function(e) {
        var url = jQuery(this).attr('action');
        var data = jQuery(this).serialize();

        jQuery.ajax({
            type: "POST",
            url: url,
            data: data,
            success: function(data) {
                if (data == 'success') {
                    jQuery('#wpcf').slideUp('slow');
                    jQuery('#statusMsg').html('Your message successfully send!');
                    jQuery('#statusMsg').css({
                        display: 'block',
                        color: 'green'
                    });
                }

            },
            error: function(errorThrown) {
                alert(errorThrown);
            }

        });
        return false;

    });
});
