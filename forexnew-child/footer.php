<?php
/**
 * The template for displaying the footer.
 *
 * Contains the closing of the #content div and all content after.
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package plant
 */
?>
</div><!--site-content-->


	<footer id="colophon" class="footer">
		<div id="footer-top" class="footer-top">
			<div class="container">
				<div class="site-top-info">
					<?php dynamic_sidebar( 'top-footer' ); ?>
				</div><!--footer-top-->
			</div><!--container-->
		</div>
		<div class="main-footer">
			<div class="container">
				<div class="row">
					<div class="col-md-12">
						<div class="row">
							<div class="col-md-5 cols">
								<?php dynamic_sidebar( 'footer-1' ); ?>
							</div>
							<div class="col-md-2 cols">
								<?php dynamic_sidebar( 'footer-2' ); ?>
							</div>
							<div class="col-md-2 cols">
								<?php dynamic_sidebar( 'footer-3' ); ?>
							</div>
							<div class="col-md-3 cols cols-last">
								<div class="row-4">
									<?php echo $GLOBALS['s_footer'];?>
								</div><!--site-info-->
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</footer><!--site-footer-->

</div><!--site-canvas-->
</div><!--#page-->

<?php wp_footer(); ?>
<script>
    jQuery(document).ready(function($) {
        $('.chart').easyPieChart({
            size: 130,
						barColor: '#002e5a',
						scaleColor: false,
						lineWidth: 7,
						trackColor: '#e6e6e6',
						lineCap: 'circle',
						animate: 2000
        });
    });
</script>
</body>
</html>
