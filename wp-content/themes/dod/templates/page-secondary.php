<?php
/**
 *
 * Template Name: Secondary
 *
 * @package DOD
 */

global $post;

$imagedir = get_stylesheet_directory_uri() . "/assets/img";
$backgroundImg = wp_get_attachment_image_src( get_post_thumbnail_id($post->ID), 'full' );
$calendarShortcode = get_post_meta( get_the_ID(), '_dod-form_calendar', true );
$formShortcode = get_post_meta( get_the_ID(), '_dod-form_form', true );

get_header();

?>

<div class="secondary" >
	<section class="hero">
		<div class="container">
			<div class="wrapper">

				<?php if (!empty($backgroundImg[0])) { ?>
					<div class="background-image" style="background: url(<?php echo $backgroundImg[0]?>) no-repeat center center; background-size: 100%;">
					</div>
				<?php } else { ?>
					<div class="background-image" style="background: url(<?php echo $imagedir ?>/dod-2.jpg) no-repeat center center; background-size: 100%;">
					</div>
				<?php } ?>



				<div class="title">
					<h1><?php the_title(); ?></h1>
				</div>
			</div>
		</div>
	</section>

	<section class="content">
		<div class="container">
			<?php echo $post->post_content; ?>

			<?php if (!empty($calendarShortcode)) { ?>
				<div class="event-calendar">
					<?php echo do_shortcode( $calendarShortcode ); ?>
				</div>
			<?php } ?>
		</div>	
	</section>

	<?php if (!empty($formShortcode)) { ?>
	    <div class="contact">
			<div class="container">
				<div class="wrapper">
					<h2>Apply to <?php the_title();?> today!</h2>
					<div class="contact-form">
						<?php echo do_shortcode( $formShortcode ); ?>
					</div>
				</div>
			</div>
		</div>
	<?php } ?>

	
</div>	

<?php get_footer();
