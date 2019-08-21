<?php
/**
 * The main template file.
 *
 * This is the most generic template file in a WordPress theme
 * and one of the two required files for a theme (the other being style.css).
 * It is used to display a page when nothing more specific matches a query.
 * E.g., it puts together the home page when no home.php file exists.
 * Learn more: http://codex.wordpress.org/Template_Hierarchy
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
        <div class="col-lg-6 col-md-12">
            <img src="<?php echo get_the_post_thumbnail_url( $post->ID, 'full' ); ?>" class="rounded" alt="...">
        </div>
        <div class="col-lg-6 col-md-12 my-auto">
        <hr class="my-4 bg-white">
            <h1 class="display-4">Our Blog</h1>
			<p>Most recent post: <?php the_title(); ?></p>
        <hr class="my-4 bg-white">
			<!-- <p>Most recent post: <?php the_title(); ?></p> -->
			<!-- <h2><?php the_title(); ?></h2> -->
			<p><?php the_excerpt(); ?></p>
        </div>
    </div>
    </div>
</div>
</div>

<?php if ( is_front_page() && is_home() ) : ?>
	<?php get_template_part( 'global-templates/hero' ); ?>
<?php endif; ?>

<div class="wrapper" id="index-wrapper">

	<div class="<?php echo esc_attr( $container ); ?>" id="content" tabindex="-1">

		<div class="row">

			<!-- Do the left sidebar check and opens the primary div -->
			<?php get_template_part( 'global-templates/left-sidebar-check' ); ?>

			<main class="site-main" id="main">

				<?php if ( have_posts() ) : ?>

					<?php /* Start the Loop */ ?>

					<?php while ( have_posts() ) : the_post(); ?>

						<?php

						/*
						 * Include the Post-Format-specific template for the content.
						 * If you want to override this in a child theme, then include a file
						 * called content-___.php (where ___ is the Post Format name) and that will be used instead.
						 */
						get_template_part( 'loop-templates/content', get_post_format() );
						?>

					<?php endwhile; ?>

				<?php else : ?>

					<?php get_template_part( 'loop-templates/content', 'none' ); ?>

				<?php endif; ?>

			</main><!-- #main -->

			<!-- The pagination component -->
			<?php understrap_pagination(); ?>

			<!-- Do the right sidebar check -->
			<?php get_template_part( 'global-templates/right-sidebar-check' ); ?>

		</div><!-- .row -->

	</div><!-- #content -->

</div><!-- #index-wrapper -->

<?php get_footer(); ?>
