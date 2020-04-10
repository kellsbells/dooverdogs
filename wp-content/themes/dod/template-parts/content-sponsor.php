<?php
/**
 * The template used for displaying page content in page.php
 *
 * @package _
 */

$description = get_post_meta( get_the_ID(), '_dod-sponsors_description', true );
$link = get_post_meta( get_the_ID(), '_dod-sponsors_link', true );

?>

<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
	<section class="default-section default-template sponsor single-sponsor-page">

		<div class="default-content container">
			<h2 class="sponsor-name"><?php the_title(); ?></h2>

			<div class="sponsor-description entry-content">
				<?php echo $description ?>
			</div><!-- .entry-content -->
		
			<?php if (!empty($link)) { ?>
				<div class="sponsor-cta">	
					<a class="button" href="<?php echo $link ?>" target="_blank">Learn More</a>
				</div>
			<?php } ?>

		</div>	
	</section>
</article><!-- #post-## -->

