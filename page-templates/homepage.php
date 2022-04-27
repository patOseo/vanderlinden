<?php
/**
 * Template Name: Homepage
 *
 * Template with custom elements for displaying the home page.
 *
 * @package UnderStrap
 */

// Exit if accessed directly.
defined( 'ABSPATH' ) || exit;

get_header();
$container = get_theme_mod( 'understrap_container_type' );

if ( is_front_page() ) {
	get_template_part( 'global-templates/hero' );
}
?>

<section class="front-hero">
	<div class="hero-logo">
		<img src="/wp-content/themes/vanderlinden/images/vanderlinden-logo.png" alt="Vanderlinden Logo">
		<h1>Affordable Luxury for Food Lovers</h1>
		<div class="hero-dealers">
			<?php if(have_rows('dealers')): ?>
				<div class="row">
					<?php while(have_rows('dealers')): the_row(); $logoimg = get_sub_field('logo'); ?>
						<div class="col">
							<div class="hero-dealer">
								<?php echo wp_get_attachment_image($logoimg, 'full'); ?>
							</div>
						</div>
					<?php endwhile; ?>
				</div>
			<?php endif; ?>
		</div>
	</div>
</section>

<section class="front-main" id="who">
	<div class="<?php echo esc_attr( $container ); ?>" id="content">
		<div class="row">
			<div class="col-md-12 content-area" id="primary">
				<main class="site-main" id="main" role="main">
					<?php the_content(); ?>
				</main><!-- #main -->
			</div><!-- #primary -->
		</div><!-- .row end -->
	</div><!-- #content -->
</section>

<section class="front-awards" id="awards">
	<div class="container">
		<div class="section-content">
			<img src="/wp-content/themes/vanderlinden/images/red-dot-award.png" alt="Red Dot Award">
			<h2>Katai Knife is the proud winner<br>of the Red Dot Award 2020!</h2>
		</div>
	</div>
</section>

<section class="front-promise" id="promise">
	<div class="container">
		<div class="row">
			<div class="col-12"><h2><?php the_field('promise_heading'); ?></h2></div>
			<?php if(have_rows('promise')): ?>
				<?php while(have_rows('promise')): the_row(); $promiseimg = get_sub_field('icon'); ?>
					<div class="col-sm-4">
						<div class="promise-block">
							<?php echo wp_get_attachment_image($promiseimg, 'thumbnail'); ?>
							<h3><?php the_sub_field('heading'); ?> </h3>
							<p><?php the_sub_field('text'); ?></p>
						</div>
					</div>
				<?php endwhile; ?>
			<?php endif; ?>
		</div>
	</div>
</section>

<section class="front-dealer-info" id="brands">
	<div class="container">
		<div class="row">
			<div class="col-sm-1"><span></span></div>
			<div class="col-sm-10">
				<h2>High End Content For Our Dealers</h2>
				<p>Good photos contribute to the atmosphere and experience that you want to create around a product, which is why they are made with great care and attention. In addition to photographing the new collection, the existing collection is also regularly re-photographed. This results in an extensive imagebank of beautiful product and atmospheric photos that you as a customer can use free of charge. Think of online sales, advertisements, social media etc.</p>
				<p><strong>We have all our products at your disposal:</strong></p>
				<p>
					<ul>
						<li>freestanding images</li>
						<li>a wide range of atmospheric photos</li>
						<li>product information</li>
					</ul>
				</p>
				<p>Request your login details for the image bank directly from us via info@vanderlindenluxury.com or via +1 519 591 0247.</p>
			</div>
			<div class="col-sm-1"><span></span></div>
		</div>
	</div>
</section>

<section class="banner-divider">
	<p>Click on one of the images to view our full assortment:</p>
</section>

<section class="front-dealers">
	<div class="row no-gutters">
		<?php if(have_rows('dealers')): ?>f
			<?php while(have_rows('dealers')): the_row(); $bgimg = get_sub_field('background_image'); $logo = get_sub_field('logo'); ?>
				<div class="col-sm">
					<a href="<?php the_sub_field('pdf'); ?>" target="_blank" rel="noopener,noreferrer">
						<div class="dealer-block">
								<?php echo wp_get_attachment_image($bgimg, 'full', "", array("class" => "dealer-bg"));  ?>
								<?php echo wp_get_attachment_image($logo, 'full', "", array("class" => "dealer-logo")); ?>
						</div>
					</a>
				</div>
			<?php endwhile; ?>
		<?php endif; ?>
	</div>
</section>

<section id="contact">
</section>

<?php
get_footer();
