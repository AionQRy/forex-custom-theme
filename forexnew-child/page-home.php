<?php
/**
* Template Name: Home Page
 *
 * This is the template that displays all pages by default.
 * Please note that this is the WordPress construct of pages
 * and that other 'pages' on your WordPress site may use a
 * different template.
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package plant
 */

get_header();?>

<div class="container">
	<div class="row">
	  <div class="col-md-3 cols-general cols-general-left">
			<?php dynamic_sidebar( 'general-left' ); ?>
	  </div>
		<div class="col-md-6">
			<div id="primary" class="content-area">
				<main id="main" class="site-main -hide-title">

					<?php while ( have_posts() ) : the_post(); ?>

						<?php get_template_part( 'template-parts/content', 'page' ); ?>

						<?php
							// If comments are open or we have at least one comment, load up the comment template.
							if ( comments_open() || get_comments_number() ) :
								comments_template();
							endif;
						?>

					<?php endwhile; // End of the loop. ?>

				</main><!-- #main -->
			</div><!-- #primary -->
	  </div>
		<div class="col-md-3 cols-general cols-general-right">
			<?php dynamic_sidebar( 'general-right' ); ?>
	  </div>
	</div>
</div><!--container-->
<?php get_footer(); ?>
