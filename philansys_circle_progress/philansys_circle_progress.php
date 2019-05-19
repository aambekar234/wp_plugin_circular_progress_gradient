<?php

/*
Plugin Name: Gradient Circle Progress Bar by Philansys
Plugin URI:  https://github.com/simonrcodrington/Introduction-to-WordPress-Plugins---Location-Plugin
Description: Customize the circular progress bar with gradients, size, thickness, font-size and progress meter 
Version:     1.0.0
Author:      Abhijeet Ambekar
Author URI:  https://www.aambekar.com
License:     GPL2
License URI: https://www.gnu.org/licenses/gpl-2.0.html
*/

defined( 'ABSPATH' ) or die( 'Why not invest time in something good?');

$plugin_id = "philansys_gcp";

add_shortcode( $plugin_id, $plugin_id );

//shortcode function
function philansys_gcp($atts) {

    $progress = "";
    $thickness = "";
    $height = "";
    $color1 = "";
    $color2 = "";
    $font = "";

    if(empty($atts) || is_null($atts)){
        //load defaults
        $progress = 0.95;
        $thickness = 15;
        $height = 150;
        $color1 = "#b721ff";
        $color2 = "#21d4fd";
        $font = "25";
    }
    else{
        $progress = $atts['progress'];
        $thickness = $atts['thickness'];
        $height = $atts['height'];
        $color1 = $atts['color1'];
        $color2 = $atts['color2'];
        $font = $atts['font-size'];

    }

    if(is_null($progress) || empty($progress)){
        $progress = 0.95;
    }

    if(is_null($thickness) || empty($thickness)){
        $thickness = 15;
    }

    if(is_null($height) || empty($height)){
        $height = 150;
    }

    if(is_null($color1) || empty($color1)){
        $color1 = "#b721ff";
    }

    if(is_null($color2) || empty($color2)){
        $color2 = "#21d4fd";
    }
    if(is_null($font) || empty($font)){
        $font = "25";
    }


    return '<div class ="philansys-gcp" data-id="2" data-size="'.$height.'" data-value="'.$progress.'" data-thickness="'.$thickness.'" data-color1="'.$color1.'" data-color2="'.$color2.'" ><p class="philansys-gcp-progress" style="line-height:'.$height.'px;font-size:'.$font.'px"></p></div>';
}


function callback_for_setting_up_scripts() {
    wp_register_style('philansys_circle_progress', plugins_url('includes/css/philansys_gcp.css', __FILE__));
    wp_enqueue_style('philansys_circle_progress');
    wp_enqueue_script( 'circle_progress_main', plugins_url('includes/js/philansys_gcp.js', __FILE__), array( 'jquery' ) );
}


add_action('wp_enqueue_scripts', 'callback_for_setting_up_scripts');


?>