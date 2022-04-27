<?php
/**
 * The template for displaying the footer
 *
 * Contains the closing of the #content div and all content after
 *
 * @package UnderStrap
 */

// Exit if accessed directly.
defined( 'ABSPATH' ) || exit;

$container = get_theme_mod( 'understrap_container_type' );
?>

<!-- Modal -->
<div class="modal fade" id="contactForm" tabindex="-1" role="dialog" aria-labelledby="contactUsTitle" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered" role="document">
    <div class="modal-content">
      <div class="modal-body">
      	<h3>Contact Vanderlinden</h3>
        <?php echo do_shortcode('[gravityform id="1" title="false"]'); ?>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
      </div>
    </div>
  </div>
</div>

<?php get_template_part( 'sidebar-templates/sidebar', 'footerfull' ); ?>

<footer class="site-footer" id="colophon">

	<div class="wrapper" id="wrapper-footer">
	
		<div class="<?php echo esc_attr( $container ); ?>">
	
			<div class="row">
	
				<div class="col-md-12">
	
						<div class="site-info">
	
							<img src="/wp-content/themes/vanderlinden/images/vanderlinden-logo.svg" width="500">
								<p><strong>Contact Info</strong></p>
								<p><a href="mailto:<?php the_field('email', 'option'); ?>"><?php the_field('email', 'option'); ?></a><br><a href="tel:<?php the_field('phone_number', 'option'); ?>"><?php the_field('phone_number', 'option'); ?></a></p>
								<p><?php the_field('address', 'option'); ?></p>
								<button type="button" class="btn btn-large btn-light" data-toggle="modal" data-target="#contactForm">Contact Us</button>
						</div><!-- .site-info -->

						
	
				</div><!--col end -->
	
			</div><!-- row end -->
	
		</div><!-- container end -->
	
	</div><!-- wrapper end -->

</footer><!-- #colophon -->

</div><!-- #page we need this extra closing tag here -->

<?php wp_footer(); ?>

</body>

</html>

