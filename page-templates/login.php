<?php
/**
 * Template Name: Login Page

 */

if(is_user_logged_in()) {
	wp_redirect( get_permalink(wc_get_page_id( 'shop' )) );
}

// Exit if accessed directly.
defined( 'ABSPATH' ) || exit;

get_header();

$container = get_theme_mod( 'understrap_container_type' );

if(isset($_GET['register'])) {
	$register = $_GET['register'];
}

if(isset($_GET['login'])) {
    $login = $_GET['login'];
} else {
    $login = 'no';
}

if(isset($_GET['logout'])) {
    $logout = $_GET['logout'];
} else {
    $logout = 'no';
}

$login_args = array(
	'label_username' => 'Email'
);
?>

<div class="wrapper login-page" id="page-wrapper">

	<div class="<?php echo esc_attr( $container ); ?> h-100" id="content" tabindex="-1">


		<div class="row h-100 justify-content-center align-items-center">

			<div class="col-lg-5">

				<?php 
				// If login failed, display this message.
				if($login == 'failed'): ?>
					<div class="mb-5 alert alert-danger">
						<h5 class="mb-0 text-center">Log in failed, invalid credentials. Please try again.</h5>
					</div>			
				<?php endif; ?>
		
				<?php 
				// If logout successful, display this message.
				if($logout == 'success'): ?>
					<div class="mb-5 alert alert-success">
						<h5 class="text-center">You have successfully logged out.</h5>
					</div>
				<?php endif; ?>

				<div class="mb-5 text-center">
					<a href="/"><img src="/wp-content/themes/vanderlinden/images/vanderlinden-logo.png" alt="Vanderlinden Luxury"></a>
				</div>
				<div class="login-box text-light p-4">
					<h2 class="text-center mb-5">Log In</h2>
					<div class="shadowbox login-form">
						<?php wp_login_form($login_args); ?>
						<p><a href="/wp-login.php?action=lostpassword">Forgot Password?</a></p>
					</div>
				</div>
			</div>

		</div><!-- .row -->

	</div><!-- #content -->

</div><!-- #index-wrapper -->

<?php
wp_footer();
