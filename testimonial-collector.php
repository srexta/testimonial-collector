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


// define( 'TESTIMONIAL_COLLECTOR_PATH', plugin_dir_path( __FILE__ ) );
class Testimonial_Collector{

    public function __construct(){
        $this->init();
    }
    public function init(){

        //make a contact form 


        // enqueue the scripts
        add_action( 'wp_enqueue_scripts',array( $this, 'enqueue_scripts' ) );

        //shortcode creation
        add_shortcode( 'test',array( $this,'contact_form_shortcode' ) );
        //form creation


    }

    public function contact_form_shortcode(){
        ob_start();
        ?>
        <div class="container">
            <div class="text-center">
                Contact Form
            </div>
            <form>
            <div class="form-group">
                <label for="exampleInputEmail1">Email address</label>
                <input type="email" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp">
                <small id="emailHelp" class="form-text text-muted">We'll never share your email with anyone else.</small>
            </div>
            <div class="form-group">
                <label for="exampleInputPassword1">Password</label>
                <input type="password" class="form-control" id="exampleInputPassword1">
            </div>
            <div class="form-group form-check">
                <input type="checkbox" class="form-check-input" id="exampleCheck1">
                <label class="form-check-label" for="exampleCheck1">Check me out</label>
            </div>
            <div class="form-group form-check">
                <input type="range" min="1" max="5" value="1" class="slider" id="myRange">
                <label class="form-check-label" for="exampleCheck1">Rate me</label>
            </div>
            <button type="submit" class="btn btn-primary">Submit</button>
            </form>
        </div>
        <?php
        $output = ob_get_contents();
        ob_end_clean();
        return $output;
    }

    function enqueue_scripts(){
        wp_enqueue_style( 'bootstrap', 'https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/css/bootstrap.min.css' );
        wp_enqueue_script( 'bootstrap','https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/js/bootstrap.min.js','','1.0.0',true );
    }

}

$testimonialcollector = new Testimonial_Collector();

$testimonialcollector->init();