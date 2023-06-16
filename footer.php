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
			<div class="site-info border-top border-dark pt-5 pb-3 mt-lg-5 text-white-50">
				<div class="row">
					<div class="col-12 col-lg-6 text-sm-center text-center text-lg-start copyright-col pt-3 pt-lg-0">
						© <?= date("Y");?> André Kipphard.
					</div>
					<div class="col-12 col-lg-6 justify-content-md-center pb-3 pb-lg-0">
						<nav class="navbar-footer navbar-expand-lg navbar-light bg-light justify-content-lg-end menu-col">
							<div class="navbar-nav text-lg-end">
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
