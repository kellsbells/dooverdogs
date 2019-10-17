<?php
/**
 * The template for displaying 404 pages (not found).
 *
 * @package _s
 */

$imagedir = get_stylesheet_directory_uri() . "/assets/img";

define('AWAL_SECONDARY_TEMPLATE', 'violet-nav');

get_header(); ?>

	<div id="primary" class="content-area js-show-logo">
		<main id="main" class="site-main" role="main">

			<section class="error-404 not-found">

				<div class="diagonal"></div>

				<div class="page-content">

					<div class="error-image">
						<img src="<?php echo $imagedir ?>/404.png">
					</div>

					<div class="error-text">
						<p>Sorry, the page you are looking for cannot be found.</p>
					</div>

				</div>	
				
			</section><!-- .error-404 -->

		</main><!-- #main -->
	</div><!-- #primary -->

<?php get_footer(); ?>
