<?php
/**
 * The template for displaying all pages
 *
 * This is the template that displays all pages by default.
 * Please note that this is the WordPress construct of pages
 * and that other 'pages' on your WordPress site may use a
 * different template.
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package kipphard
 */

get_header();
?>

		<main id="primary" class="site-main">
			<div class="container">
				<?php if (have_rows('content')):?>
					<?php while( have_rows('content')): the_row(); 

						if( get_row_layout() == 'hero' ):
							
							get_template_part( 'template-parts/layouts/'. get_row_layout() );

						elseif( get_row_layout() == 'text' ): 

							get_template_part( 'template-parts/layouts/'. get_row_layout() );
						
						elseif( get_row_layout() == 'features'):

							get_template_part('template-parts/layouts/'. get_row_layout() );

						elseif( get_row_layout() == 'portfolio'):
								
							get_template_part('template-parts/layouts/'. get_row_layout() );

						elseif( get_row_layout() == 'resume'):
							
							get_template_part('template-parts/layouts/'. get_row_layout() );

						elseif( get_row_layout() == 'testimonial'):
						
							get_template_part('template-parts/layouts/'. get_row_layout() );

						elseif( get_row_layout() == 'contact'):
					
							get_template_part('template-parts/layouts/'. get_row_layout() );
	
						endif; 

					endwhile; ?>
				<?php endif; ?>
			</div>	
		</main>

<?php
get_footer();
