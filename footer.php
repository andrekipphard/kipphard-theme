<?php
/**
 * The template for displaying the footer
 *
 * Contains the closing of the #content div and all content after.
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package kipphard
 */

?>

	<footer id="colophon" class="site-footer ">
		<div class="container">
			<div class="site-info border-top border-dark pt-5 mt-5 text-white-50">
				<div class="row">
					<div class="col text-sm-center text-md-start pb-sm-4">
						© <?= date("Y");?> André Kipphard.
					</div>
					<div class="col justify-content-md-center">
						<nav class="navbar-footer navbar-expand-lg navbar-light bg-light justify-content-end">
							<div class="navbar-nav text-end">
									<?php
										wp_nav_menu(
											array(
												'theme_location' => 'footer-menu',
												'menu_id'        => 'primary-menu',
											)
										);
									?>
							</div>
						</nav>
					</div>
				</div>
				
			</div><!-- .site-info -->
		</div>
	</footer><!-- #colophon -->
</div><!-- #page -->

<?php wp_footer(); ?>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-A3rJD856KowSb7dwlZdYEkO39Gagi7vIsF0jrRAoQmDKKtQBHUuLZ9AsSv4jD4Xa" crossorigin="anonymous"></script>
   
</body>
</html>