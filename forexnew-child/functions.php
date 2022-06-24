<?php
/**
 * Override seed_setup()
 */
/*
function fruit_setup() {
	add_theme_support( 'custom-logo', array(
		'width'       => 200,
		'height'      => 200,
		'flex-width' => true,
		) );
}
add_action( 'after_setup_theme', 'fruit_setup', 11);
*/

/**
 * Enqueue scripts and styles.
 */











  // Register and load the widget
  function wpb_load_widget_full() {
      register_widget( 'wpb_widget_full' );
  }
  add_action( 'widgets_init', 'wpb_load_widget_full' );

  // Creating the widget
  class wpb_widget_full extends WP_Widget {

  function __construct() {
  parent::__construct(

  // Base ID of your widget
  'wpb_widget_full',

  // Widget name will appear in UI
  __('Broker Ranking Full', 'wpb_widget_full_domain'),

  // Widget description
  array( 'description' => __( 'Show Broker Ranking', 'wpb_widget_domain' ), )
  );
  }

  // Creating widget front-end

  public function widget( $args, $instance ) {
  $title = apply_filters( 'widget_title', $instance['title'] );

  // before and after widget arguments are defined by themes
  echo $args['before_widget'];
  if ( ! empty( $title ) )
  echo $args['before_title'] . $title . $args['after_title'];

  // This is where you run the code and display the output
 ?>
 <?php
       $args = array(
       'post_type' => array( 'broker'),
       'showposts'  => 5,
       'orderby'    => 'DESC'
       );
       query_posts( $args );
 			$i = 0;
 ?>

 <?php if ( have_posts()) : ?>
     <?php while ( have_posts() ) : the_post();
 			$i++;
 		?>

    <?php
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

 <?php endwhile; else : ?>

 <?php endif; ?>
 <?php wp_reset_query(); ?>

 <?php
  echo $args['after_widget'];
  }

  // Widget Backend
  public function form( $instance ) {
  if ( isset( $instance[ 'title' ] ) ) {
  $title = $instance[ 'title' ];
  }
  else {
  $title = __( ' ', 'wpb_widget_full_domain' );
  }
  // Widget admin form
  ?>
  <p>
  <label for="<?php echo $this->get_field_id( 'title' ); ?>"><?php _e( 'Title:' ); ?></label>
  <input class="widefat" id="<?php echo $this->get_field_id( 'title' ); ?>" name="<?php echo $this->get_field_name( 'title' ); ?>" type="text" value="<?php echo esc_attr( $title ); ?>" />
  </p>
  <?php
  }

  // Updating widget replacing old instances with new
  public function update( $new_instance, $old_instance ) {
  $instance = array();
  $instance['title'] = ( ! empty( $new_instance['title'] ) ) ? strip_tags( $new_instance['title'] ) : '';
  return $instance;
  }
  } // Class wpb_widget ends here









 // Register and load the widget
 function wpb_load_widget() {
     register_widget( 'wpb_widget' );
 }
 add_action( 'widgets_init', 'wpb_load_widget' );

 // Creating the widget
 class wpb_widget extends WP_Widget {

 function __construct() {
 parent::__construct(

 // Base ID of your widget
 'wpb_widget',

 // Widget name will appear in UI
 __('Broker Ranking', 'wpb_widget_domain'),

 // Widget description
 array( 'description' => __( 'Show Broker Ranking', 'wpb_widget_domain' ), )
 );
 }

 // Creating widget front-end

 public function widget( $args, $instance ) {
 $title = apply_filters( 'widget_title', $instance['title'] );

 // before and after widget arguments are defined by themes
 echo $args['before_widget'];
 if ( ! empty( $title ) )
 echo $args['before_title'] . $title . $args['after_title'];

 // This is where you run the code and display the output
?>
<table class="table broker-ranking">
<thead>
<tr>
<th style="text-align: center;"><span>#</span></th>
<th style="text-align: center;"><span>โบรกเกอร์</span></th>
<th style="text-align: center;"><span></span></th>
<th style="text-align: center;"><span style="color: #1975d1;"><span style="font-size: 19px;"><i class="far fa-star" aria-hidden="true"></i>&nbsp;</span></span></th>
</tr>
</thead>
<tbody>



<?php
      $args = array(
      'post_type' => array( 'broker'),
      'showposts'  => 5,
      'orderby'    => 'DESC'
      );
      query_posts( $args );
			$i = 0;
?>

<?php if ( have_posts()) : ?>
    <?php while ( have_posts() ) : the_post();
			$i++;
		?>
		<?php  $point_broker = get_field('point_broker'); ?>
<tr>
<td style="text-align: center;"><span class="badge badge-default badge-pill"><?php echo $i; ?></span></td>
<td class="right-0">
	<a href="<?php the_permalink(); ?>" target="_blank" rel="nofollow noopener noreferrer">
<!-- <img src="https://forexnew.org/wp-content/uploads/2018/02/โบรกเกอร์-XM-Broker.png" title="เข้าสู่เว็บไซต์ XM" alt="โบรกเกอร์ FOREX XM" width="100" height="33"> -->
<?php if(has_post_thumbnail()) { the_post_thumbnail();}  ?>

</a></td>
<td style="text-align: left;" class="left-0">
	<a href="<?php the_permalink(); ?>" target="_blank" rel="noopener"><?php the_title(); ?></a></td>
<td style="text-align: center;"><span style="color: #29a329;"><b><span class="icon_green"><?php echo $point_broker; ?>%</span></b></span></td>
</tr>
<?php endwhile; else : ?>
<tr>
	<td colspan="4">ไม่พบข้อมูล</td>
</tr>
<?php endif; ?>
<?php wp_reset_query(); ?>
</tbody>
</table>
<?php
 echo $args['after_widget'];
 }

 // Widget Backend
 public function form( $instance ) {
 if ( isset( $instance[ 'title' ] ) ) {
 $title = $instance[ 'title' ];
 }
 else {
 $title = __( ' ', 'wpb_widget_domain' );
 }
 // Widget admin form
 ?>
 <p>
 <label for="<?php echo $this->get_field_id( 'title' ); ?>"><?php _e( 'Title:' ); ?></label>
 <input class="widefat" id="<?php echo $this->get_field_id( 'title' ); ?>" name="<?php echo $this->get_field_name( 'title' ); ?>" type="text" value="<?php echo esc_attr( $title ); ?>" />
 </p>
 <?php
 }

 // Updating widget replacing old instances with new
 public function update( $new_instance, $old_instance ) {
 $instance = array();
 $instance['title'] = ( ! empty( $new_instance['title'] ) ) ? strip_tags( $new_instance['title'] ) : '';
 return $instance;
 }
 } // Class wpb_widget ends here




function forexnew_scripts() {

	wp_dequeue_style( 'seed-style');

	wp_enqueue_style( 'forexnew-css', get_stylesheet_uri() );
	wp_enqueue_script( 'forexnew-js', get_stylesheet_directory_uri() . '/js/main.js', array(), '2017-1', true );

}
add_action( 'wp_enqueue_scripts', 'forexnew_scripts' , 20 );
add_action( 'widgets_init', 'theme_slug_widgets_init' );

function wpdocs_theme_slug_scripts() {
    // Custom scripts require a unique slug (Theme Name).
    wp_enqueue_script( 'forexnewjs', get_stylesheet_directory_uri() . '/dist/jquery.easypiechart.min.js', array(), true );
}
add_action( 'wp_footer', 'wpdocs_theme_slug_scripts' );


function theme_slug_widgets_init() {
    register_sidebar( array(
        'name' => __( 'footer-1', 'footer-1' ),
        'id' => 'footer-1',
        'description' => __( 'Widgets in this area will be shown on all posts and pages.', 'theme-slug' ),
        'before_widget' => '<li id="%1$s" class="widget %2$s">',
				'after_widget'  => '</li>',
				'before_title'  => '<h2 class="widgettitle">',
				'after_title'   => '</h2>',
    ) );
		register_sidebar( array(
				'name' => __( 'footer-2', 'footer-2' ),
				'id' => 'footer-2',
				'description' => __( 'Widgets in this area will be shown on all posts and pages.', 'theme-slug' ),
				'before_widget' => '<li id="%1$s" class="widget %2$s">',
				'after_widget'  => '</li>',
				'before_title'  => '<h2 class="widgettitle">',
				'after_title'   => '</h2>',
		) );
		register_sidebar( array(
				'name' => __( 'footer-3', 'footer-3' ),
				'id' => 'footer-3',
				'description' => __( 'Widgets in this area will be shown on all posts and pages.', 'theme-slug' ),
				'before_widget' => '<li id="%1$s" class="widget %2$s">',
				'after_widget'  => '</li>',
				'before_title'  => '<h2 class="widgettitle">',
				'after_title'   => '</h2>',
		) );
		register_sidebar( array(
				'name' => __( 'top-footer', 'top-footer' ),
				'id' => 'top-footer',
				'description' => __( 'Widgets in this area will be shown on all posts and pages.', 'theme-slug' ),
				'before_widget' => '<li id="%1$s" class="widget %2$s">',
				'after_widget'  => '</li>',
				'before_title'  => '<h2 class="widgettitle">',
				'after_title'   => '</h2>',
		) );
		register_sidebar( array(
				'name' => __( 'aside-header', 'aside-header' ),
				'id' => 'aside-header',
				'description' => __( 'Widgets in this area will be shown on all posts and pages.', 'theme-slug' ),
				'before_widget' => '<li id="%1$s" class="widget %2$s">',
				'after_widget'  => '</li>',
				'before_title'  => '<h2 class="widgettitle">',
				'after_title'   => '</h2>',
		) );
		register_sidebar( array(
				'name' => __( 'general-left', 'general-left' ),
				'id' => 'general-left',
				'description' => __( 'Widgets in this area will be shown on all posts and pages.', 'theme-slug' ),
				'before_widget' => '<li id="%1$s" class="widget %2$s">',
				'after_widget'  => '</li>',
				'before_title'  => '<h2 class="widgettitle">',
				'after_title'   => '</h2>',
		) );
		register_sidebar( array(
				'name' => __( 'general-right', 'general-right' ),
				'id' => 'general-right',
				'description' => __( 'Widgets in this area will be shown on all posts and pages.', 'theme-slug' ),
				'before_widget' => '<li id="%1$s" class="widget %2$s">',
				'after_widget'  => '</li>',
				'before_title'  => '<h2 class="widgettitle">',
				'after_title'   => '</h2>',
		) );
		register_sidebar( array(
				'name' => __( 'broker-left', 'broker-left' ),
				'id' => 'broker-left',
				'description' => __( 'Widgets in this area will be shown on all posts and pages.', 'theme-slug' ),
				'before_widget' => '<li id="%1$s" class="widget %2$s">',
				'after_widget'  => '</li>',
				'before_title'  => '<h2 class="widgettitle">',
				'after_title'   => '</h2>',
		) );
}
// tn Limit Excerpt Length by number of Words
function excerpt( $limit ) {
$excerpt = explode(' ', get_the_excerpt(), $limit);
if (count($excerpt)>=$limit) {
array_pop($excerpt);
$excerpt = implode(" ",$excerpt).'...';
} else {
$excerpt = implode(" ",$excerpt);
}
$excerpt = preg_replace('`[[^]]*]`','',$excerpt);
return $excerpt;
}

function content($limit) {
$content = explode(' ', get_the_content(), $limit);
if (count($content)>=$limit) {
array_pop($content);
$content = implode(" ",$content).'...';
} else {
$content = implode(" ",$content);
}
$content = preg_replace('/[.+]/','', $content);
$content = apply_filters('the_content', $content);
$content = str_replace(']]>', ']]&gt;', $content);
return $content;
}
