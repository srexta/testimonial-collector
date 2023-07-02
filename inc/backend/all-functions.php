<?php 

/**
 * shortcode creation
 */ 
add_shortcode( 'testimonial_collector','testimonial_collector_contact_form_shortcode' );

/** 
 * Fires rest API Route 
 * 
 * @link https://developer.wordpress.org/reference/hooks/rest_api_init/
 */
add_action( 'rest_api_init','testimonial_collector_rest_api_route' );

function testimonial_collector_contact_form_shortcode(){

    ob_start();

    //make a contact form 
    include_once TESTIMONIAL_COLLECTOR_PATH . 'inc/backend/contact-form.php';

    $output = ob_get_contents();
    ob_end_clean();
    return $output;
}

/**
 * Undocumented function
 * 
 * @link https://developer.wordpress.org/reference/functions/register_rest_route/
 *
 * @return void
 */
function testimonial_collector_rest_api_route(){
    register_rest_route( 
        'v1/tc',
        'getvalue', 
        array(
            'methods' => 'POST',
            'callback' => 'testimonial_collector_get_form_data',
        )
    );
}
function testimonial_collector_get_form_data(){
    echo "Here";
}