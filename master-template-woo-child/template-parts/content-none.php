<?php
/**
 * The template for displaying search results pages
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/#search-result
 *
 * @package Master_Template_Woo
 */

get_header();
?>

	<section id="not-found" class="content-area text-center p-5">
        <img src="<?php echo get_stylesheet_directory_uri(); ?>/assets/images/not-found.svg" alt="" class="img-not-found my-4">
        <h2>Ops. Your search had no results</h2>
        <a href="<?php echo home_url() ?>" class="button-master principal-button rounded">Back to home</a>
	</section><!-- #primary -->

<?php

get_footer();
