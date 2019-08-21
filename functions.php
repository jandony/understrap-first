<?php
/**
 * Understrap functions and definitions
 *
 * @package understrap
 */

// Exit if accessed directly.
defined( 'ABSPATH' ) || exit;

$understrap_includes = array(
	'/hooks.php',                           // - Custom hooks.
	'/enqueue.php',                         // - Enqueue scripts and styles.
	'/theme-settings.php',                  // - Initialize theme default settings.
	'/setup.php',                           // - Theme setup and custom theme supports.
	'/customizer.php',                      // - Customizer additions.
	'/template-tags.php',                   // Custom template tags for this theme.
	'/pagination.php',                      // Custom pagination for this theme.
	'/widgets.php',                         // Register widget area.
	'/extras.php',                          // Custom functions that act independently of the theme templates.
	'/custom-comments.php',                 // Custom Comments file.
	'/jetpack.php',                         // Load Jetpack compatibility file.
	'/class-wp-bootstrap-navwalker.php',    // Load custom WordPress nav walker.
	'/woocommerce.php',                     // Load WooCommerce functions.
	'/editor.php',                          // Load Editor functions.
	'/deprecated.php',                      // Load deprecated functions.
);

foreach ( $understrap_includes as $file ) {
	$filepath = locate_template( 'inc' . $file );
	if ( ! $filepath ) {
		trigger_error( sprintf( 'Error locating /inc%s for inclusion', $file ), E_USER_ERROR );
	}
	require_once $filepath;
}

function format_comment($comment, $args, $depth) {

	$GLOBALS['comment'] = $comment; ?>
       
	   <li <?php comment_class('card p-3 mb-2 shadow'); ?> id="li-comment-<?php comment_ID() ?>">
			
		   <div class="row pb-3">
			<div class="col-1">
				<?php echo get_avatar( get_the_author_meta( 'ID' ), $default, $alt, $args ); ?>
			</div>		   
			<div class="col-11 comment-intro">
				<em>commented on</em> 
				<a class="comment-permalink" href="<?php echo htmlspecialchars ( get_comment_link( $comment->comment_ID ) ) ?>"><?php printf(__('%1$s'), get_comment_date(), get_comment_time()) ?></a>
				<em>by</em>
				<em><?php echo get_author_name() ?></em>		
				<hr>
			</div>
		   </div>

			<?php if ($comment->comment_approved == '0') : ?>
			<em><?php _e('Your comment is awaiting moderation.') ?></em><br />
			<?php endif; ?>
			
			<?php comment_text(); ?>
		   
		   <hr>
		   
		   <div class="reply">
			   <?php comment_reply_link(array_merge( $args, array('depth' => $depth, 'max_depth' => $args['max_depth']))) ?>
		   </div>


<?php } 
