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
 $withdraw_money = get_field('withdraw_money');
 $take_time_broker = get_field('take_time_broker');
 $withdraw_monesy = get_field('withdraw_money');
 $url_website_broker = get_field('url_website_broker');
 $text_ads_broker = get_field('text_ads_broker');
 $url_ads_broker = get_field('url_ads_broker');
 $point_broker = get_field('point_broker');
?>
<article id="post-<?php the_ID(); ?>">
	<div class="content-item">
		<div class="row">
      <!--end row 1-->
			<div class="col-md-3 col-broker col-first">
				<div class="pic">
				  <a href="<?php the_permalink(); ?>" title="Permalink to <?php the_title_attribute(); ?>" rel="bookmark">
					<?php if(has_post_thumbnail()) { the_post_thumbnail();} else { echo '<img src="' . esc_url( get_template_directory_uri()) .'/img/thumb.jpg" alt="'. get_the_title() .'" />'; }?>
				  </a>
				</div><!--pic-->
        <h4><?php the_title(); ?></h4>
        <span class="chart" data-percent="86">
		      <span class="percent"><?php echo $point_broker; ?>
            <p class="percenttext">%</p>
          </span>
	     </span>
			</div>
				<div class="col-md-6 col-broker">
					<div class="info">
						<header class="entry-header">
              <p class="text-excerpt-broker"><?php echo excerpt(9); ?></p>
						</header><!-- .entry-header -->
						<div class="des-info">
							<ul class="list-des-info">
                <?php if( have_rows('repeat_register') ):  ?>
                  <li>จดทะเบียน :
                  <?php while( have_rows('repeat_register') ): the_row();
                  // vars
                  $register_brokers = get_sub_field('register_brokers');
                  $url_register_brokers = get_sub_field('url_register_brokers');
                    if( $url_register_brokers ): ?>
                      <a href="<?php echo $url_register_brokers; ?>" class="link-regisbroker"><?php echo $register_brokers; ?></a>
                    <?php endif; ?>
                  <?php endwhile; ?>
                  </li>
               <?php endif; ?>

								<?php if( have_rows('repeat_promotion') ): ?>
									<?php while( have_rows('repeat_promotion') ): the_row();
										// vars
										$promotion_broker = get_sub_field('promotion_broker');
										$url_promotion_broker = get_sub_field('url_promotion_broker');
										?>
                    <?php if( $url_promotion_broker ): ?>
										<li>
											<a href="<?php echo $url_promotion_broker; ?>">โปรโมชั่น : <span class="word-promote"><?php echo $promotion_broker; ?></span></a>
										</li>
                    <?php endif; ?>

									<?php endwhile; ?>
								<?php endif; ?>
								<?php if ($withdraw_money): ?>
									<li>ฝาก/ถอน : <?php echo $withdraw_money; ?></li>
								<?php endif; ?>
								<?php if ($take_time_broker): ?>
									<li>ถอนใช้เวลา : <?php echo $take_time_broker; ?></li>
								<?php endif; ?>
							</ul>
						</div>
					</div><!--info-->
				</div>
				<div class="col-md-3 col-center col-broker">
          <div class="box-btn-broker">
			<a href="<?php echo $url_website_broker; ?>" class="btn btn-primary">เข้าสู่เว็บไซต์</a>
            <a href="<?php the_permalink(); ?>" class="link-in-broker">รีวิวแบบละเอียด</a>
            <a href="<?php echo $url_ads_broker; ?>" class="btn btn-primary"></i> <?php echo $text_ads_broker; ?></a>
          </div>
				</div>
			</div>
	</div>
</article><!-- #post-## -->
