<?php
/**
 * Template Name: Full Width Page
 *
 * Template for displaying a page without sidebar even if a sidebar widget is published.
 *
 * @package understrap
 */

// Exit if accessed directly.
defined( 'ABSPATH' ) || exit;

get_header();
$container = get_theme_mod( 'understrap_container_type' );
?>

<?php if ( is_front_page() ) : ?>
  <?php get_template_part( 'global-templates/hero' ); ?>
<?php endif; ?>

<div class="jumbotron-fluid rounded-0 text-white mt-5" style="background-image: url('<?php echo get_the_post_thumbnail_url( $post->ID, 'full' ); ?>'); background-size: cover;">
<div class="py-5" style="background-color: rgba(0, 0, 0, 0.75);">
    <div class="container">
    <div class="row">
        <div class="col-md-6">
            <img src="<?php echo get_the_post_thumbnail_url( $post->ID, 'full' ); ?>" class="rounded" alt="...">
        </div>
        <div class="col-md-6">
        <hr class="my-4 bg-white">
            <h1 class="display-4"><?php the_title(); ?></h1>
        <hr class="my-4 bg-white">
        </div>
    </div>
    </div>
</div>
</div>

<div class="wrapper" id="full-width-page-wrapper">

	<div class="<?php echo esc_attr( $container ); ?>" id="content">

		<div class="row">

			<div class="col-md-12 content-area" id="primary">

				<main class="site-main" id="main" role="main">

					<?php while ( have_posts() ) : the_post(); ?>

						<?php get_template_part( 'loop-templates/content', 'page' ); ?>

						<?php
						// If comments are open or we have at least one comment, load up the comment template.
						if ( comments_open() || get_comments_number() ) :
							comments_template();
						endif;
						?>

					<?php endwhile; // end of the loop. ?>

				</main><!-- #main -->

			</div><!-- #primary -->

		</div><!-- .row end -->

	</div><!-- #content -->

</div><!-- #full-width-page-wrapper -->

<?php get_footer(); ?>
