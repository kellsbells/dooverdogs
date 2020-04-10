<?php
/**
 * Template Name: Sponsors
 *
 * @package DOD
 */

global $post;

$backgroundImg = wp_get_attachment_image_src( get_post_thumbnail_id($post->ID), 'full' );

get_header();

?>

<div class="sponsors" >
	<section class="hero">
		<div class="container">
			<div class="wrapper">
				<div class="background-image" style="background: url(<?php echo $backgroundImg[0]?>) no-repeat center center; background-size: 100%;">
				</div>
				<div class="title">
					<h1><?php the_title(); ?></h1>
				</div>
			</div>
		</div>
	</section>

	<section class="about" id="about">
		<div class="container">
			<?php echo $post->post_content; ?>
		</div>	
	</section>

	<section class="list">
		<div class="container">
			<div class="all-sponsors">
				<?php 

					$args = array( 'post_type' => 'sponsors', 'posts_per_page' => -1 );
					$loop = new WP_Query( $args );
					while ( $loop->have_posts() ) : $loop->the_post();
						$logo = get_post_meta( $post->ID, '_dod-sponsors_logo', true );
					?>

		 				<a href="<?php the_permalink(); ?>" class="single-sponsor">
							<div class="wrapper">

								<div class="photo-container"> 
									<div class="photo" style="background: url(<?php echo $logo ?>) no-repeat center center; background-size: contain;">
									</div>
								</div>
								

								<div class="description">

									<div class="title">
										<h3><?php the_title(); ?></h3>
									</div>
								
								</div>
							</div>
						</a>



					<?php endwhile;
				?>
			</div>
		</div>
	</section>
</div>	

<?php get_footer();
