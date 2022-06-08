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


// Redirect after password reset
function wpse_lost_password_redirect() {

    // Check if have submitted
    $confirm = ( isset($_GET['action'] ) && $_GET['action'] == resetpass );

    if( $confirm ) {
        wp_redirect( '/log-in/?pass=set' );
        exit;
    }
}
add_action('login_headerurl', 'wpse_lost_password_redirect');


// Customize login screen

function my_login_logo() { ?>
    <style type="text/css">
    	.login {
    		background: url('/wp-content/themes/vanderlinden/images/login-bg.jpg');
    	}
    	.login #backtoblog a, .login #nav a {
    		color: #fff !important;
    	}
        #login h1 a, .login h1 a {
            background-image: url('/wp-content/themes/vanderlinden/images/vanderlinden-logo.png');
			background-size: contain;
			background-repeat: no-repeat;
			width: 100%;
        	padding-bottom: 30px;
        }
        #nav, #backtoblog {
        	display: none;
        }
    </style>
<?php }
add_action( 'login_enqueue_scripts', 'my_login_logo' );