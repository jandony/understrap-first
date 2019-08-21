<?php
/**
 * The template for displaying all pages.
 *
 * This is the template that displays all pages by default.
 * Please note that this is the WordPress construct of pages
 * and that other 'pages' on your WordPress site will use a
 * different template.
 *
 * @package understrap
 */

// Exit if accessed directly.
defined( 'ABSPATH' ) || exit;

get_header();

$container = get_theme_mod( 'understrap_container_type' );
?>

<div class="jumbotron-fluid rounded-0 text-white mt-5" style="background-image: url('<?php echo get_the_post_thumbnail_url( $post->ID, 'full' ); ?>'); background-size: cover;">
<div style="background-color: rgba(0, 0, 0, 0.75); height: 75vh;">
    <div class="container d-flex h-100">
    <div class="row my-auto">
        <div class="col-md-4">
            <img src="https://cdn.freebiesupply.com/logos/large/2x/bootstrap-4-logo-png-transparent.png" class="rounded" alt="...">
        </div>
        <div class="col-md-8 my-auto">
            <h1 class="display-4">Welcome, Dev Team!</h1>
            <p class="lead">Enter the path of the WordPress Master</p>
            <hr class="my-4 bg-white">
            <p>IMore text.</p>
            <p class="lead">
                <a class="btn btn-primary btn-lg" href="#" role="button">Learn more</a>
            </p>
        </div>
    </div>
    </div>
</div>
</div>

<div class="wrapper" id="page-wrapper">

	<div class="<?php echo esc_attr( $container ); ?>" id="content" tabindex="-1">

		<div class="row">

			<!-- Do the left sidebar check -->
			<?php get_template_part( 'global-templates/left-sidebar-check' ); ?>

			<main class="site-main" id="main">

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

			<!-- Do the right sidebar check -->
			<?php get_template_part( 'global-templates/right-sidebar-check' ); ?>

		</div><!-- .row -->

	</div><!-- #content -->

</div><!-- #page-wrapper -->

<?php get_footer(); ?>
