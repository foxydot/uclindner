<?php
/*
 * Add styles and scripts
*/
add_action('wp_enqueue_scripts', 'msdlab_add_styles');
add_action('wp_enqueue_scripts', 'msdlab_add_scripts');

function msdlab_add_styles() {
    global $is_IE;
    if(!is_admin()){
        //use cdn        
            //wp_enqueue_style('bootstrap-style','//netdna.bootstrapcdn.com/bootstrap/3.0.0/css/bootstrap.no-icons.min.css');
            //wp_enqueue_style('font-awesome-style','//netdna.bootstrapcdn.com/font-awesome/3.2.1/css/font-awesome.css',array('bootstrap-style'));
        //use local
            //wp_enqueue_style('bootstrap-style',get_stylesheet_directory_uri().'/lib/bootstrap/css/bootstrap.css');
            //wp_enqueue_style('font-awesome-style',get_stylesheet_directory_uri().'/lib/font-awesome/css/font-awesome.css',array('bootstrap-style'));
        wp_enqueue_style('msd-style',get_stylesheet_directory_uri().'/lib/css/style.css');
        wp_enqueue_style('flex-slider-style',get_stylesheet_directory_uri().'/lib/css/flexslider.css',array('msd-style'));
        if($is_IE){
            wp_enqueue_script('ie-style',get_stylesheet_directory_uri().'/lib/css/ie.css');
        }
        if(is_front_page()){
            wp_enqueue_style('msd-homepage-style',get_stylesheet_directory_uri().'/lib/css/homepage.css');
        }
    }
}

function msdlab_add_scripts() {
    global $is_IE;
    if(!is_admin()){
        //use cdn
            //wp_enqueue_script('bootstrap-jquery','//netdna.bootstrapcdn.com/bootstrap/3.0.0/js/bootstrap.min.js',array('jquery'));
        //use local
            //wp_enqueue_script('bootstrap-jquery',get_stylesheet_directory_uri().'/lib/bootstrap/js/bootstrap.min.js',array('jquery'));
        wp_enqueue_script('ticker',get_stylesheet_directory_uri().'/lib/js/jquery.ticker.js',array('jquery'),NULL,TRUE);
        wp_enqueue_script('flexslider',get_stylesheet_directory_uri().'/lib/js/jquery.flexslider.js',array('jquery'),NULL,TRUE);
        wp_enqueue_script('site-jquery',get_stylesheet_directory_uri().'/lib/js/site.js',array('jquery'),NULL,TRUE);
        wp_enqueue_script('function',get_stylesheet_directory_uri().'/lib/js/function.js',array('jquery'),NULL,TRUE);
        if($is_IE){
            wp_enqueue_script('columnizr',get_stylesheet_directory_uri().'/lib/js/jquery.columnizer.js',array('jquery'));
            wp_enqueue_script('ie-fixes',get_stylesheet_directory_uri().'/lib/js/ie-jquery.js',array('jquery'));
        }
        if(is_front_page()){
            wp_enqueue_script('msd-homepage-jquery',get_stylesheet_directory_uri().'/lib/js/homepage-jquery.js',array('jquery'));
        }
    }
}