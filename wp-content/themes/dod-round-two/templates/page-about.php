<?php
/**
 * Template Name: About
 *
 * @package DOD
 */

$imagedir = get_stylesheet_directory_uri() . "/assets/img";

get_header();

?>


<div class="about">
    <section class="bio">
        <div class="container">
			<h2>About Do Over Dogs</h2>
            <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Excepturi quod quibusdam in, dolores earum aliquid eos, veniam expedita fuga dolorem obcaecati, nemo quis deleniti! Necessitatibus aperiam illum ullam at asperiores?</p>
        </div>
	</section>
	
	
    <section class="about_sponsors">
		<div class="container">
			<h2>Our Sponsors</h2>
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





	<section class="about_sponsors">
		<div class="container">
			<h2>Meet the Team</h2>
			<div class="all-sponsors">
				<?php 

					$args = array( 'post_type' => 'volunteers', 'posts_per_page' => -1 );
					$loop = new WP_Query( $args );
					while ( $loop->have_posts() ) : $loop->the_post();

					?>

		 				<a href="<?php the_permalink(); ?>" class="single-sponsor">
							<div class="wrapper">

								<div class="photo-container"> 
									<div class="photo" style="background: url(<?php echo get_the_post_thumbnail_url() ?>) no-repeat center center; background-size: contain;">
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
