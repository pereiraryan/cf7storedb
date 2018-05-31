<?php
/*
Plugin Name: cf7storedb
Plugin URI: 
Description: Just another contact form plugin. Simple but flexible.
Author: Ryan Pereira
Author URI: https://github.com/pereiraryan/
Text Domain: cf7storedb
Domain Path: /languages/
Version: 0.0.1
*/
add_action('wpcf7_before_send_mail', 'save_form' );
 
function save_form( $wpcf7 ) {
   global $wpdb;
 
   /*
    Note: since version 3.9 Contact Form 7 has removed $wpcf7->posted_data
    and now we use an API to get the posted data.
   */
 
   $submission = WPCF7_Submission::get_instance();
 
   if ( $submission ) {
 
       $submited = array();
       $submited['title'] = $wpcf7->title();
       $submited['posted_data'] = $submission->get_posted_data();
 
    }
 
     $data = array(
   		'name'  => $submited['posted_data']['name'],
   		'email' => $submited['posted_data']['email']
   	     );
 
     $wpdb->insert( $wpdb->prefix . 'lb_forms', 
		    array( 
                          'form'  => $submited['title'], 
			   'data' => serialize( $data ),
			   'date' => date('Y-m-d H:i:s')
			)
		);
}
?>
