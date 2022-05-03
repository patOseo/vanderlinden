<?php

// Failed Login
add_action( 'wp_login_failed', 'my_front_end_login_fail' );  // hook failed login
function my_front_end_login_fail( $username ) {
   $baseurl = get_site_url();
   $referrer = $_SERVER['HTTP_REFERER'];  // where did the post submission come from?
   // if there's a valid referrer, and it's not the default log-in screen
   if ( !empty($referrer) && !strstr($referrer,'wp-login') && !strstr($referrer,'wp-admin') ) {
      wp_redirect( $baseurl . '/log-in/?login=failed' );  // let's append some information (login=failed) to the URL for the theme to use
      exit;
   }
}

// Redirect to login page after logout
add_filter( 'logout_redirect', function( $url, $query, $user ) {
	$baseurl = get_site_url();
    return $baseurl . '/log-in/?logout=success';
}, 10, 3 );