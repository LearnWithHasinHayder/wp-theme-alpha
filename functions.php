<?php

function alpha_bootstrapping(){
    load_theme_textdomain("alpha");
    add_theme_support("post-thumbnails");
    add_theme_support("title-tag");
    register_nav_menu("primary","Top Menu");
}
add_action("after_setup_theme","alpha_bootstrapping");

function alpha_assets(){
    wp_enqueue_style("alpha",get_stylesheet_uri());
    wp_enqueue_style("bootstrap","//maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css");
}
add_action("wp_enqueue_scripts","alpha_assets");
