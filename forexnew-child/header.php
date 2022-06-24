<?php
/**
 * The header for our theme.
 *
 * This is the template that displays all of the <head> section and everything up until <div id="content">
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package plant
 */
?><!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
	<meta charset="<?php bloginfo( 'charset' ); ?>">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="profile" href="http://gmpg.org/xfn/11">
	<link href="https://fonts.googleapis.com/css?family=Kanit:100,200,300,300i,400,400i,500,600,700,800,900,900i|Raleway:100,200,300,300i,400,400i,500,500i,600,700,800,900,900i|Sarabun:100,200,300,300i,400,400i,500,600,700,800,800i" rel="stylesheet">
	<?php wp_head(); ?>
	<?php if (function_exists('customize_css')) {customize_css();} ?>
	<?php if (function_exists('customize_ini')) {customize_ini();} ?>
</head>

<?php $bodyClass = ''; if (is_active_sidebar( 'headbar' )) { $bodyClass = 'has-headbar'; } ?>

<body <?php body_class($bodyClass); ?>>
	<a class="skip-link screen-reader-text" href="#content"><?php esc_html_e( 'Skip to content', 'plant' ); ?></a>
	<div id="page" class="site -layout-<?php echo $GLOBALS['s_layout']; ?> -header-mobile-<?php echo $GLOBALS['s_header_mobile']; ?> -header-desktop-<?php echo $GLOBALS['s_header_desktop']; ?> -menu-<?php echo $GLOBALS['s_menu']; ?> -menu-icon-<?php echo $GLOBALS['s_menu_icon'] ; ?> -shop-layout-<?php echo $GLOBALS['s_shop_layout']; ?>">

		<nav id="site-mobile-navigation" class="site-mobile-navigation <?php if($GLOBALS['s_menu'] == 'off-canvas') { echo 'sb-slidebar sb-right'; } else { echo '-dropdown'; } ?> _mobile _heading">
			<?php wp_nav_menu( array( 'theme_location' => 'mobile', 'menu_id' => 'mobile-menu' ) ); ?>
			<?php if(is_active_sidebar('top-right')) { ?><div class="mobile-widget"><?php dynamic_sidebar( 'top-right' ); ?></div><?php } ?>
		</nav>
		<header id="masthead" class="site-header sb-slide _heading" data-seed-scroll="<?php echo $GLOBALS['s_scroll']; ?>">
			<div class="top-bar _desktop">
				<div class="container">
					<div class="row">
						<div class="col-md-12 d-flex">
							<div class="col-md-4">
								<div class="site-branding">
									<div class="site-logo">
										<?php if(function_exists('the_custom_logo')) {the_custom_logo();} ?>
									</div>
								</div>
							</div>
							<div class="col-md-8">
								<div class="right-side-forex">
									<?php dynamic_sidebar( 'aside-header' ); ?>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
			<div class="header-bar">
				<div class="container">
					<a class="site-toggle <?php if($GLOBALS['s_menu'] == 'off-canvas') { echo 'sb-toggle-right'; } ?> _mobile">
						<i><span></span><span></span><span></span><span></span></i><b><?php echo $GLOBALS['s_menu_text']; ?></b>
					</a>
					<div class="site-branding _mobile">
						<div class="site-logo"><?php if(function_exists('the_custom_logo')) {the_custom_logo();} ?></div>
					</div>

						<div class="site-top-right _desktop"><?php dynamic_sidebar( 'top-right' ); ?></div>
						<nav id="site-desktop-navigation" class="site-desktop-navigation _desktop">
							<?php wp_nav_menu( array( 'theme_location' => 'primary', 'menu_id' => 'primary-menu' ) ); ?>
						</nav>

				</div>
			</div>
		</header>

		<div id="sb-site" class="site-canvas">
			<div class="site-header-space"></div>
			<?php
			if (is_front_page()) {
				if (is_active_sidebar( 'home_banner' )) {
					echo '<div class="home-banner">'; dynamic_sidebar( 'home_banner' ); echo '</div>';
				}
				else {
					if (($GLOBALS['s_header_desktop'] == 'overlay')) {
						printf( '<div class="home-banner -blank _desktop">'. __('Please add Image or Slider Widget in <a href="%s">', 'plant') . __( 'Appearance <i class="si-arrow-right"></i> Widgets <i class="si-arrow-right"></i> Home Banner' , 'plant') . '</a>.</div>',  admin_url('widgets.php') );
					}
					if (($GLOBALS['s_header_mobile'] == 'overlay')) {
						printf( '<div class="home-banner -blank _mobile">'. __('Please add Image or Slider Widget in <a href="%s">', 'plant') . __( 'Appearance <i class="si-arrow-right"></i> Widgets <i class="si-arrow-right"></i> Home Banner' , 'plant') . '</a>.</div>',  admin_url('widgets.php') );
					}
				}
			} else {
				if (is_active_sidebar( 'page_banner' )) {
					echo '<div class="page-banner">'; dynamic_sidebar( 'page_banner' ); echo '</div>';
				} else {
					if ($GLOBALS['s_header_desktop'] == 'overlay') {
						echo '<div class="page-banner -blank _desktop">';
						printf(__('Please add Image or Slider Widget in <a href="%s">', 'plant') . __( 'Appearance <i class="si-arrow-right"></i> Widgets <i class="si-arrow-right"></i> Page Banner' , 'plant') . '</a>.<br>', admin_url('widgets.php') );
						printf(__('If you would like to use different Widgets on each page, we reccommend <a href="%s" target="_blank">Widget Context Plugin</a>.', 'plant') , 'https://wordpress.org/plugins/widget-context/');
						echo '</div>';
					}
					if ($GLOBALS['s_header_mobile'] == 'overlay') {
						echo '<div class="page-banner -blank _mobile">';
						printf(__('Please add Image or Slider Widget in <a href="%s">', 'plant') . __( 'Appearance <i class="si-arrow-right"></i> Widgets <i class="si-arrow-right"></i> Page Banner' , 'plant') . '</a>.<br>', admin_url('widgets.php') );
						printf(__('If you would like to use different Widgets on each page, we reccommend <a href="%s" target="_blank">Widget Context Plugin</a>.', 'plant') , 'https://wordpress.org/plugins/widget-context/');
						echo '</div>';
					}
				}
			}
			?>
			<div id="content" class="site-content">
