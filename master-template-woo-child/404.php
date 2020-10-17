<?php
get_header();
?>
<div class="container text-center">
    <section class="d-flex flex-column justify-content-center align-items-center p-5">
        <h1>Error 404</h1>
        <p>Page not found</p>
        <img src="<?php echo get_stylesheet_directory_uri(); ?>/assets/images/not-found.svg" alt="" class="img-not-found mb-5" width="200px">
        <a href="<?php echo home_url() ?>" class="button-master principal-button rounded">Back to home</a>
    </section>
</div>
<?php
get_footer();