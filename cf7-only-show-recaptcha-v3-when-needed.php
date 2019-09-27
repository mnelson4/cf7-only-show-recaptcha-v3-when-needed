<?php
/**
 * @package Hello_Dolly
 * @version 1.7
 */
/*
Plugin Name: Contact Form 7 - Only Show Recaptcha v3 When Needed
Plugin URI: http://wordpress.org/plugins/hello-dolly/
Description: Fixes Contact Form 7's Recaptcha v3 so it only appears on pages with forms, not on every single page 😖! No configuration or coding required- just activate it and you're done!
Author: Mike Nelson
Version: 0.1
Author URI: https://cmljnelson.blog
*/
function cf7osrv3wn_decide()
{
    $post = get_post();
    if($post instanceof WP_Post && strpos($post->post_content, '[contact-form-7') === false){
        remove_action( 'wp_enqueue_scripts', 'wpcf7_recaptcha_enqueue_scripts', 10, 0 );
    }
}

add_action( 'wp_enqueue_scripts', 'cf7osrv3wn_decide', 9, 0 );

