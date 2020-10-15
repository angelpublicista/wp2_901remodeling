<?php

if (!function_exists('card_blog_func')) {
    function card_blog_func($atts){
        $atts = shortcode_atts(
            array(
                "post_type" => "post",
            ), 
            "card_blog"
        );

        $post_query = new WP_Query($atts);
        ob_start();
        ?>
        <div class="row">        
            <?php
                if($post_query->have_posts()){
                    while ($post_query->have_posts()) {
                        $post_query->the_post();
                        ?>
                        <div class="col-12 col-md-4 my-md-3">
                        <div class="card-blog shadow-sm rounded mb-5">
                            <div class="card-blog__img position-relative">
                                    <div class="card-blog__img__date text-center position-absolute">
                                        <img src="http://localhost/remodeling-901/wp-content/uploads/2020/10/Rectangle-91.png" alt="" class="card-blog__img__date__bg position-relative">
                                        
                                        <div class="card-blog__img__date__content position-absolute d-flex flex-column align-items-center justify-content-center w-100 p-3">
                                            <span class="card-blog__img__date__day d-block">
                                            <?php echo get_the_date('d'); ?>
                                        </span>
                                        <span class="card-blog__img__date__month d-block">
                                            <?php echo get_the_date('M'); ?>
                                        </span>
                                        <hr class="m-1">
                                        <span class="card-blog__img__date__year d-block">
                                            <?php echo get_the_date('Y'); ?>
                                        </span>
                                        </div>
                                    </div>
                                    <?php the_post_thumbnail('medium', array('class' => 'card-blog__img__figure')) ?>
                                    <a href="<?php the_post_thumbnail_url('full') ?>" data-lightbox="image-1" data-title="<?php the_title(); ?>" class="card-blog__img__caption position-absolute d-flex justify-content-center align-items-center">
                                    <i class="fas fa-images"></i>
                                    </a>
                                </div>
                            
                                <div class="card-blog__info p-3 px-4">
                                <span class="card-blog__info__posted-on"> Posted on <?php the_date(); ?></span>
                                
                                <a href="<?php the_permalink(); ?>" class="card-blog__info__link"><h5 class="card-blog__info__title mt-1"><?php the_title(); ?></h5></a>
                                <p class="card-blog__info__desc"><?php echo mb_strimwidth(get_the_excerpt(), 0, 60, "..."); ?></p>
                                
                                <a href="<?php the_permalink(); ?>" class="my-3 d-inline-block card-blog__info__button button-master principal-button rounded text-uppercase">View more</a>
                                </div>
                            </div>
                        </div>
                        <?php
                    }
                }

                wp_reset_query ();
                return ob_get_clean();
            ?>
        </div>
        <?php
    }

    add_shortcode( "card_blog", "card_blog_func" );
}