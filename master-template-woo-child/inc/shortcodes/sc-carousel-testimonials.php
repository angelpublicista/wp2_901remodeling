<?php

if(!function_exists('carousel_testimonials_func')){
    function carousel_testimonials_func($atts){
        $atts = shortcode_atts(
            array(

            ),
            $atts, 
            'carousel_testimonials'    
        );

        $args = array(
            'post_type' => 'testimonials'
        );
        
        $test_query = new WP_Query($args);

        ob_start();
        ?>

        <?php if($test_query->have_posts()): ?>
            <div class="slick-theme slick-testimonials">
                <?php while($test_query->have_posts()): ?>
                    <?php $test_query->the_post(); ?>
                        <div class="item">
                            <h5 class="name"><?php echo get_the_title(); ?></h5>
                            <p class="desc"><?php echo get_the_excerpt(); ?></p>
                            <div class="stars-rating">
                            <i class="fas fa-star"></i>
                            <i class="fas fa-star"></i>
                            <i class="fas fa-star"></i>
                            <i class="fas fa-star"></i>
                            <i class="fas fa-star"></i>
                            </div>
                        </div>
                <?php endwhile; ?>
            </div>
        <?php endif; ?>
        <?php
        wp_reset_query();    
        return ob_get_clean();
    }

    add_shortcode('carousel_testimonials', 'carousel_testimonials_func');
}