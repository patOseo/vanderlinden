<?php

add_action( 'after_setup_theme', 'register_user_menu' );
 
function register_user_menu() {
    register_nav_menu( 'user-menu', __( 'User Menu', 'vanderlinden' ) );
}