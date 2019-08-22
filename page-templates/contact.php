<?php
/**
 * Template Name: Contact Page
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
<div style="background-color: rgba(0, 0, 0, 0.75); height: 75vh;">
	<div class="container d-flex h-100">
    <div class="row my-auto">
        <div class="col-md-6">
            <img src="<?php echo get_the_post_thumbnail_url( $post->ID, 'full' ); ?>" class="rounded" alt="...">
        </div>
        <div class="col-md-6 my-auto">
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

						<!-- Contact Form starts here -->
						<form method="get" action="<?= $_SERVER['PHP_SELF']; ?>" class="card p-4 py-5 my-5 shadow">
							<h2 class="text-center">Fill out your contact information below:</h2>
							<hr>
							<div class="form-row">
								<div class="form-group col-md-4">
								<label for="inputFirst">First Name</label>
								<input type="text" class="form-control" name="inputFirst" id="inputFirst" placeholder="First">
								</div>
								<div class="form-group col-md-4">
								<label for="inputLast">Last Name</label>
								<input type="text" class="form-control" name="inputLast" id="inputLast" placeholder="Last">
								</div>
								<div class="form-group col-md-4">
								<label for="inputEmail">Email</label>
								<input type="email" class="form-control" name="inputEmail" id="inputEmail" placeholder="Email">
								</div>
							</div>
							<div class="form-group">
								<label for="inputAddress">Address</label>
								<input type="text" class="form-control" name="inputAddress" id="inputAddress" placeholder="1234 Main St">
							</div>
							<div class="form-group">
								<label for="inputAddress2">Address 2</label>
								<input type="text" class="form-control" name="inputAddress2" id="inputAddress2" placeholder="Apartment, studio, or floor">
							</div>
							<div class="form-row">
								<div class="form-group col-md-6">
								<label for="inputCity">City</label>
								<input type="text" class="form-control" name="inputCity" id="inputCity">
								</div>
								<div class="form-group col-md-4">
								<label for="inputState">State</label>
								<select name="inputState" id="inputState" class="form-control">
									<option selected>Choose...</option>
									<option>AZ</option>
									<option>CA</option>
									<option>CO</option>
								</select>
								</div>
								<div class="form-group col-md-2">
								<label for="inputZip">Zip</label>
								<input type="text" class="form-control" name="inputZip" id="inputZip">
								</div>
							</div>
							<div class="form-group">
								<div class="form-check">
								<input class="form-check-input" type="checkbox" name="gridCheck" id="gridCheck">
								<label class="form-check-label" for="gridCheck">
									Check me out
								</label>
								</div>
							</div>
							<hr>
							<input type="submit" name="send" id="send" value="Send Info" class="btn btn-primary rounded col-2 mx-auto">
						</form>
						<pre>
							<?php 
							if ($_GET) {
								echo 'Content of the $_GET array:<br>';
								print_r($_GET);
							} else if ($_POST) {
								echo 'Content of the $_POST array:<br>';
								print_r($_POST);
							}
							?>
						</pre>

						<!-- Contact Form ends here -->

					<?php endwhile; // end of the loop. ?>

				</main><!-- #main -->

			</div><!-- #primary -->

		</div><!-- .row end -->

	</div><!-- #content -->

</div><!-- #full-width-page-wrapper -->

<?php get_footer(); ?>
