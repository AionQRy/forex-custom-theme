<?php
/**
 * Template for displaying search forms in Twenty Seventeen
 *
 * @package WordPress
 * @subpackage Twenty_Seventeen
 * @since 1.0
 * @version 1.0
 */

?>

<?php $unique_id = esc_attr( uniqid( 'search-form-' ) ); ?>

<form role="search" method="get" class="search-box"  action="<?php echo esc_url( home_url( '/' ) ); ?>">
		<input type="search" class="search-txt" placeholder="กรอกเพื่อค้นหา" value="<?php echo get_search_query(); ?>" name="s">
		<button type="submit" class="search-btn" value=""><i class="fa fa-search" aria-hidden="true"></i></button>
</form>
