<?php
/**
 * The template for displaying the footer.
 *
 * Contains the closing of the #content div and all content after
 *
 * @package _s
 */


$imagedir = get_stylesheet_directory_uri() . "/assets/img";
?>

	</div><!-- #content -->

	<footer id="colophon" class="site-footer" role="contentinfo">
		<div class="site-info container">
			<!-- <div class="addtl-footer-links uppercase">
				<a href="/privacy-policy">Privacy Policy</a>
				<a href="/cookie-policy">Cookie Policy</a>
				<a href="/terms-of-service">Terms of Service</a>
			</div>	 -->
			<div class="copyright uppercase">
				<a href="#">Back to Top</a>
				<p>	&copy; <?php echo date("Y"); ?> Do Over Dogs</p>
			</div>

		</div><!-- .site-info -->
	</footer><!-- #colophon -->
</div><!-- #page -->

<?php wp_footer(); ?>

</body>
</html>
