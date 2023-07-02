<?php
/*
 * Plugin Name: Testimonial Collector
 * Plugin URI:        https://example.com/plugins/the-basics/
 * Description:       Handle the basics with this plugin.
 * Version:           1.0.0
 * Requires at least: 5.2
 * Requires PHP:      7.2
 * Author:            John Smith
 * Author URI:        https://author.example.com/
 * License:           GPL v2 or later
 * License URI:       https://www.gnu.org/licenses/gpl-2.0.html
 * Update URI:        https://example.com/my-plugin/
 * Text Domain:       testimonial-collector
 * Domain Path:       /languages
 */

class Testimonial_Collector{
    public function __construct(){

        define('TESTIMONIAL_COLLECTOR_PATH', plugin_dir_path( __FILE__ ) );
        define('TESTIMONIAL_COLLECTOR_URL', plugin_dir_url( __FILE__ ) );

        $this->init();
    }
    public function init(){

        //make a contact form 
        include_once TESTIMONIAL_COLLECTOR_PATH . 'inc/backend/all-functions.php';

        // enqueue the scripts
        add_action( 'wp_enqueue_scripts',array( $this, 'enqueue_scripts' ) );

    }

    function enqueue_scripts(){

        //creating this for enqueue of contact form 
        wp_enqueue_style( 'bootstrap', 'https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/css/bootstrap.min.css' );
        wp_enqueue_script( 'bootstrap','https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/js/bootstrap.min.js','','1.0.0',true );

        wp_enqueue_script(
            'init',
            TESTIMONIAL_COLLECTOR_URL . 'inc/assets/js/init.js',
            array('jquery'),
            "1.0.0",
            true
        );

        wp_localize_script(
            'init',
            'rest_array',
            array(
                'rest_url' => get_rest_url( null,'v1/tc/getvalue' ) 
            )   
        );
    }

}

$testimonialcollector = new Testimonial_Collector();

$testimonialcollector->init();