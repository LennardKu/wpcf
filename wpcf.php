<?php
/**
 * Plugin Name: WPCF
 * Plugin URI: http://learn24bd.com/portfolio/wpcf
 * Description: WPCF (Wordpress Contact Form) is simple contact form. You can add this in any where whare you need it. It support sortcode.
 * Version: 1.0
 * Author: Harun
 * Author URI: http://learn24bd.com
 * License:GPL2
 */

/// Register Script
function wpcf_load_scripts() {
	wp_enqueue_script('jquery');
	wp_register_style('wpcf_style',plugins_url('css/style.css', __FILE__ ));
	
	wp_register_script( 'wpcf_functions',plugins_url('js/function.js', __FILE__ ));
	wp_register_script( 'wpcf_valitations',plugins_url('js/validate.min.js', __FILE__ ));

	wp_enqueue_style('wpcf_style');
	
	wp_enqueue_script( 'wpcf_functions' );
	wp_enqueue_script( 'wpcf_valitations');
}
// Hook into the 'wp_enqueue_scripts' action
add_action( 'wp_enqueue_scripts', 'wpcf_load_scripts' );

add_shortcode('wpcf','wpcf_make_sortcode');
function wpcf_make_sortcode( $atts ) {
    $a = shortcode_atts( array(
        'to'=>'',
    ), $atts );
    ?>	
	<div id="statusMsg">
		
	</div>

    <form id="wpcf" action="<?php echo admin_url('admin-ajax.php'); ?>" method="POST">
    	<input type="hidden" name="action" value="wpcf_ajax">
	    <label for="txtName">Your Name</label>
		<input type="text" name="txtName" required>
		<br>
		<label for="txtEmail">Your E-mail</label>
		<input type="email" name="txtEmail" required>
		<br>
		<label for="txtSubject">Subject</label>
		<input type="text" name="txtSubject" required>
		<br>
		<label for="txtMsg">Message</label>
		<textarea name="txtMsg" id="" cols="30" rows="4" required></textarea>
		
		<input type="submit" value="Send">
		<input type="reset" value="Reset">
	</form>
    <?php
}

include 'inc/ajaxWork.php';


