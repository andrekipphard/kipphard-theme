<?php
/**
 * The header for our theme
 *
 * This is the template that displays all of the <head> section and everything up until <div id="content">
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package kipphard
 */

?>
<!doctype html>
<html <?php language_attributes(); ?>>
<head>
	<meta charset="<?php bloginfo( 'charset' ); ?>">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="profile" href="https://gmpg.org/xfn/11">

	<?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>
<?php wp_body_open(); ?>
<div id="page" class="site">
	<a class="skip-link screen-reader-text" href="#primary"><?php esc_html_e( 'Skip to content', 'kipphard' ); ?></a>

	<div class="top-bar pt-3 pb-3">
		<div class="container">
			<div class="row">
				<div class="col-md-4">

					<ul class="top-bar_list">

						<li>
						<i class="bi bi-envelope rounded-circle"></i><a href="mailto: info@kipphard.com" class="link-light">info@kipphard.com</a>
						</li>

					</ul>
				</div>
				<div class="col-md-8 d-flex justify-content-end">

					<?php if( have_rows('header_usp', 'options') ): ?>
						<ul class="top-bar_list">
						<?php while( have_rows('header_usp', 'options') ): the_row();
							$type = get_sub_field('type');
							$image = get_sub_field('image');
							$icon = get_sub_field('icon');
							?>

							<li class="text-white">
								<?php if ($type == 'icon') : ?>
									<i class="bi bi-<?= $icon; ?> rounded-circle"></i> <?php the_sub_field('text'); ?>
								<?php else : ?>
									<?= wp_get_attachment_image( $image, 'thumbnail' ); ?> <?php the_sub_field('text'); ?>
								<?php endif; ?>
							</li>
						<?php endwhile; ?>
						</ul>
					<?php endif; ?>

				</div>
			</div>
		</div>
	</div>

	<header id="masthead" class="site-header">

		<div class="container" pt-2 pb-2>
			
			<div class="row align-items-center">

				<div class="col-6 col-md-2 col-lg-3 site-header__logo pt-3 pb-3">

				<?php the_custom_logo(); ?>

				</div>

				<div class="col-6 col-md-10 col-lg-9 d-flex align-items-center justify-content-end justify-content-lg-end">
					<nav class="navbar navbar-expand-lg navbar-light bg-light">
						<button class="navbar-toggler" type="button" data-bs-toggle="offcanvas" data-bs-target="#offcanvasExample" aria-controls="offcanvasExample" aria-expanded="false" aria-label="Toggle navigation">
							<span class="navbar-toggler-custom-icon"><i class="bi bi-list"></i></span>
						</button>
						<!-- *** Offcanvas *** -->
						<div class="offcanvas offcanvas-start d-flex d-lg-none bg-black" tabindex="-1" id="offcanvasExample" aria-labelledby="offcanvasExampleLabel">
							<div class="row offcanvas-header mt-3 py-3">
								<div class="col-6">
									<?php
										the_custom_logo();
									?>
								</div>
								<div class="col-6 d-flex justify-content-end align-self-center">
									<button type="button" class="offcanvas-close" data-bs-dismiss="offcanvas" aria-label="Close">
										<i class="bi bi-x-lg"></i>
									</button>
								</div>	
							</div>
							<div class="row offcanvas-body">
								<div class="col-12 d-flex justify-content-center align-self- ps-0">
									<nav class="navbar-header text-white d-flex flex-column align-items-center">
										<div class="navbar-nav text-white text-center mb-5">
											<?php
													wp_nav_menu(
														array(
															'theme_location' => 'menu-1',
															'menu_id'        => 'primary-menu',
														)
													);
												?>
										</div>
									</nav>
									
								</div>
							</div>
						</div>
						<!-- *** Offcanvas End -->
						<div class="collapse navbar-collapse" id="navbarNavAltMarkup">
							<div class="navbar-nav">
								<?php
									wp_nav_menu(
										array(
											'theme_location' => 'menu-1',
											'menu_id'        => 'primary-menu',
										)
									);
								?>
							</div>
						</div>
					</nav>
				</div>

			</div>

		</div>

		
	</header><!-- #masthead -->