<?php
/**
 * Template Name: Resources
 */

// Exit if accessed directly.
defined( 'ABSPATH' ) || exit;

get_header();

$container = get_theme_mod( 'understrap_container_type' );

?>

<div class="wrapper" id="page-wrapper">

	<div class="<?php echo esc_attr( $container ); ?>" id="content" tabindex="-1">

			<main class="site-main" id="main">

				<?php if(is_user_logged_in()): ?>

				<?php
				while ( have_posts() ) {
					the_post();
					get_template_part( 'loop-templates/content', 'page' );
				}
				?>

				<?php if(have_rows('resource_files', 'option')): ?>
					<div class="row my-5">
						<?php while(have_rows('resource_files', 'option')): the_row(); ?>
							<div class="col-md-3 text-center mb-4">
								<?php $image = get_sub_field('preview_image'); ?>
								<?php echo wp_get_attachment_image($image, 'full', '', array('class' => 'mb-2 resource-thumb')); ?>
								<a href="<?php echo the_sub_field('download_link'); ?>" class="btn btn-sm btn-light border" target="_blank"><i class="fa fa-download"></i> Download</a>
							</div>
						<?php endwhile; ?>
					</div>
				<?php endif; ?>
				
				<?php else: ?>
					<p>You must be <a href="/log-in/"><strong>logged in</strong></a> to view this page.</p>
				<?php endif; ?>

			</main><!-- #main -->

	</div><!-- #content -->

</div><!-- #page-wrapper -->

<?php
get_footer();
