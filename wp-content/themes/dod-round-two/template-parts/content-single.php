<?php
/**
 * Template part for displaying single posts.
 *
 * @package _s
 */

// Grab the metadata from the database
$breed = get_post_meta( get_the_ID(), '_dod_breed', true );
$size = get_post_meta( get_the_ID(), '_dod_size', true );
$age = get_post_meta( get_the_ID(), '_dod_age', true );
$about = get_post_meta( get_the_ID(), '_dod_about', true );


?>


<article id="post-<?php the_ID(); ?>">
	<div class="dog">
		<div class="container">

			<div class="dog__photos">
				<div class="active-image"></div>

				<?php cmb2_output_file_list( '_dod_photos', 'square' ); ?>
			</div>
			
			<div class="dog__wrapper">
				<div class="dog__title">
					<?php the_title( '<h1 class="entry-title">', '</h1>' ); ?>
				</div>

				<div class="dog__content">

					<div class="dog__text">
						<div>Breed: <?php echo $breed; ?></div>
						<div>Size: <?php echo $size; ?></div>
						<div>Age: <?php echo $age; ?></div>
					</div>
					
					<div class="about">
					<p><?php echo $about; ?></p>
					<a class="button" href="/adoption-application-1">Fill Out An Adoption Application</a>
					</div>
				</div>
			</div>
		</div>

	</div>

</article><!-- #post-## -->

