<?php
// WordPress Ajax Call
add_action('wp_ajax_nopriv_wpcf_ajax', 'wpcf_ajax_callback');
add_action('wp_ajax_wpcf_ajax', 'wpcf_ajax_callback');

function wpcf_ajax_callback() {
    $name=sanitize_text_field($_POST['txtName']);
    $email=sanitize_text_field($_POST['txtEmail']);
    $subject=sanitize_text_field($_POST['txtSubject']);
    $message=sanitize_text_field($_POST['txtMsg']);

    // Send mail to 
    $mail_to=$a['to'];
    if($mail_to==null)
    {
        $mail_to=get_settings('admin_email');
    }
    
    $site_name= get_bloginfo('name');

    if(!empty($name) && !empty($email) && !empty($subject) && !empty($message))
    {
        $headers = "From: ".$site_name."<".$email.">\n";
        $headers .= "Return-Path: <".$email.">\n";
        $headers .= "Reply-To: <".$email.">\n";
        $body ="Sender : " .$name."\n";
        $body .="Message :" .$message."\n";
        //mail($mail_to,$subject,$message,$headers);
        wp_mail($mail_to, $subject, $body, $headers);
        echo "success";
       
    }

    else
    {
        echo "All field required";
    }
    
    die("");

}