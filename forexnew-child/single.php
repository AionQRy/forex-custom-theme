<?php
/**
 * The template for displaying all single posts.
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/#single-post
 *
 * @package plant
 */

get_header(); ?>
<div class="container box-all-broker">
		<div class="row">
		  <div class="col-md-3 cols-general cols-general-left">
				<?php dynamic_sidebar( 'broker-left' ); ?>
		  </div>
			<div class="col-md-6">
				<div class="main-header">
						<h2><?php the_title(); ?></h2>
				</div>
				<div id="primary" class="content-area">
					<main id="main" class="site-main">

						<?php if ( have_posts() ) : ?>
							<?php
								while ( have_posts() ) : the_post();
								get_template_part( 'template-parts/content-single', get_post_type() );
								endwhile;
							?>

							<?php seed_posts_navigation(); ?>

						<?php else : ?>

							<?php get_template_part( 'template-parts/content', 'none' ); ?>

						<?php endif; ?>

					</main><!-- #main -->
				</div><!-- #primary -->
		  </div>
			<div class="col-md-3 cols-general cols-general-right">
				<?php dynamic_sidebar( 'general-right' ); ?>
		  </div>
		</div>
</div><!--container-->
<?php get_footer(); ?>
