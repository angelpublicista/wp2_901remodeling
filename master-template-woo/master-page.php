<?php
/*
Template Name: Master Page
*/

get_header();
?>

<div id="master-page" class="content-master-page">
		<main id="main" class="site-main">
				<?php
					while ( have_posts() ) :
                        the_post();

						get_template_part( 'template-parts/content', 'master-page' );

						// If comments are open or we have at least one comment, load up the comment template.
						if ( comments_open() || get_comments_number() ) :
							comments_template();
						endif;

					endwhile; // End of the loop.
				?>
		</main><!-- #main -->
</div><!-- #primary -->


<?php

get_footer();