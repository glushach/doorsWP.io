<?php
add_action('wp_footer', 'addScripts');
add_action('wp_enqueue_scripts', 'addStyles');
add_theme_support('custom-logo');

function addScripts(){
  wp_deregister_script('jquery-core');
  wp_register_script('jquery-core', get_template_directory_uri() .
  '/assets/js/jquery-3.5.1.min.js');
  wp_enqueue_script('jquery');

  wp_enqueue_script('bootstrap-js', get_template_directory_uri() .
  '/assets/js/bootstrap.min.js');
}

function addStyles(){
  wp_enqueue_style('style?1', get_stylesheet_uri());
}
?>