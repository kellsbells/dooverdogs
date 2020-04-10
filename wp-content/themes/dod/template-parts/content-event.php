<?php
/**
 * The template used for displaying page content in page.php
 *
 * @package _
 */



?>

<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>

	<section class="default-section default-template single-event-page">
		<div class="default-content container">
			<h2 class="uppercase"><?php the_title(); ?></h2>
			<div class="entry-content">
				<?php the_content(); ?>
			</div><!-- .entry-content -->
		</div>	
	</section>


</article><!-- #post-## -->

