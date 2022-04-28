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

<div class="wrapper" id="page-wrapper">

	<div class="<?php echo esc_attr( $container ); ?>" id="content" tabindex="-1">


		<?php 
		// If redirected from Register page, display this message.
		if(isset($register) && $register == 'success'): ?>
		<div class="row">
			<div class="col-12">
				<div class="alert alert-success">
					<h5 class="text-center">Your account has been created! You can now log in with the form below using your email and password.</h5>
				</div>
			</div>
		</div>
		<?php endif; ?>

		<?php 
		// If login failed, display this message.
		if($login == 'failed'): ?>
		<div class="row">
			<div class="col-12">
				<div class="alert alert-danger">
					<h5 class="mb-0 text-center">Log in failed, invalid credentials. Please try again.</h5>
				</div>			
			</div>
		</div>
		<?php endif; ?>

		<?php 
		// If logout successful, display this message.
		if($logout == 'success'): ?>
		<div class="row">
			<div class="col-12">
				<div class="alert alert-success">
					<h5 class="text-center">You have successfully logged out.</h5>
				</div>
			</div>
		</div>
		<?php endif; ?>



		<div class="row justify-content-center">

					<div class="col-lg-5">
						<h2 class="text-center mb-5">Log In</h2>
						<div class="shadowbox login-form">
							<?php wp_login_form($login_args); ?>
							<p><a href="/wp-login.php?action=lostpassword">Forgot Password?</a></p>
						</div>
					</div>

		</div><!-- .row -->

	</div><!-- #content -->

</div><!-- #index-wrapper -->

<?php
get_footer();
