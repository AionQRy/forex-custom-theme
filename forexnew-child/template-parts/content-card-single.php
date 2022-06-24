<?php
/**
 * Loop Name: Content Card
 */
?>
<?php
/**
 * Template part for displaying posts.
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package plant
 */
?>
<article id="post-<?php the_ID(); ?>">
	<div class="content-item">
		<div class="row">
      <!--end row 1-->
			<div class="col-md-3 col-broker col-first">
         <a href="<?php the_permalink(); ?>" title="Permalink to <?php the_title_attribute(); ?>" rel="bookmark">
        <?php $thumb = get_the_post_thumbnail_url(); ?>
  				<div class="pic image-single-class" style="background-image: url('<?php echo $thumb;?>')">
  				</div><!--pic-->
        </a>
			</div>
				<div class="col-md-6 col-broker info-single">
					<div class="info">
						<header class="entry-header">
                <h3 class="head-single"><?php the_title(); ?></h3>
						</header><!-- .entry-header -->
						<div class="des-info">
              <p class="text-excerpt-broker"><?php echo excerpt(5); ?></p>
						</div>
					</div><!--info-->
				</div>
				<div class="col-md-3 col-center col-broker">
          <div class="box-btn-broker">
			      <a href="<?php the_permalink(); ?>" class="btn btn-primary">อ่านเพิ่มเติม</a>
          </div>
				</div>
			</div>
	</div>
</article><!-- #post-## -->
