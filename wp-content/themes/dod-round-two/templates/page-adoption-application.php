<?php
/**
 * Template Name: Adoption Application
 *
 * @package DOD
 */

$imagedir = get_stylesheet_directory_uri() . "/assets/img";

get_header();

?>


<div class="adoption-application">
	<section class="hero">
		<div class="container">
			<div class="wrapper">
				<div class="background-image" style="background: url(<?php echo $imagedir ?>/dod-2.jpg) no-repeat center center; background-size: cover;">
				</div>
				<div class="title">
					<h1>Adoption Application</h1>
				</div>
			</div>
		</div>	
	</section>

	<section class="progress-bar">
		<div class="container">
			<div class="bar">
				<div class="fill"></div>
			</div>
		</div>
	</section>

	<section class="content">
		<div class="container">
			<?php
			// TO SHOW THE PAGE CONTENTS
			while ( have_posts() ) : the_post(); ?> <!--Because the_content() works only inside a WP Loop -->
				<div class="entry-content-page">
					<?php the_content(); ?> <!-- Page Content -->
				</div><!-- .entry-content-page -->

			<?php
			endwhile; //resetting the page loop
			wp_reset_query(); //resetting the page query
			?>
		</div>
	</section>

</div>	

<?php get_footer();

