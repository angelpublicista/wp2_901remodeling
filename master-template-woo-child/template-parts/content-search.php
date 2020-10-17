<?php

?>

<section class="content-search">
    <div class="row">
        <div class="col-12">
            <h1 class="search-title"><?php echo $wp_query->found_posts; ?> <?php _e( 'Search Results Found For', 'locale' ); ?>: "<?php the_search_query(); ?>"</h1>
        </div>
        <div class="col-12 col-md-6">
            <a href="<?php the_permalink(); ?>" class="card shadow p-4 d-block rounded">
                <div class="card-body ">
                    <span class="card-date">Posted on <?php the_date(); ?></span>
                    <h4 class="card-title mt-2"><?php the_title(); ?></h4>
                </div>
            </a>
        </div>
    </div>
</section>