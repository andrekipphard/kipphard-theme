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
		
		<?php if (have_rows('content')):?>
			<div class="container">
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
					</div>
				<?php 
			else:?>
			<div class="container pt-5 pb-5">
				<?php
			while ( have_posts() ) :
				the_post();
	
				get_template_part( 'template-parts/content', 'page' );
	
				// If comments are open or we have at least one comment, load up the comment template.
				if ( comments_open() || get_comments_number() ) :
					comments_template();
				endif;
	
			endwhile; // End of the loop.
			endif; ?>
		</div>

	</main><!-- #main -->

<?php
get_footer();
