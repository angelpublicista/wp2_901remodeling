<?php

if(!function_exists('grid_services_func')){
    function grid_services_func($atts){
        $atts = shortcode_atts(
            array(
                'button-text' => 'Find out more',
                'cols'  => 2
            ), 
            $atts, 
            'grid_services'
        );

        $args = array(
            'post_type' => 'services'
        );

        switch ($atts['cols']) {
            case 2:
                $cols = 'col-md-6';
                break;
            
            case 3:
                $cols = 'col-md-4';
                break;
            
            case 1:
                $cols = false;
                break;
            
            default:
                $cols = 'col-md-6';
                break;
        }

        $services_query = new WP_Query($args);

        ob_start();
        ?>
        
        <?php if($services_query->have_posts()): ?>
            <div class="rm-services">
                <div class="row">
                    <?php while($services_query->have_posts()): ?>
                        <?php $services_query->the_post(); ?>
                        <!-- Content Services -->
                        <div class="col-12 <?php echo $cols; ?>">
                            <div class="rm-card-service position-relative rounded shadow mb-4">
                                <a href="<?php the_permalink(); ?>/?service=<?php the_title(); ?>" class="rm-link-service d-block">
                                    <?php the_post_thumbnail( 'full', array('class' => 'img-fluid rm-img-service') ); ?>
                                    <div class="rm-caption-card position-absolute d-flex justify-content-between align-items-center p-2">
                                        <h2><?php the_title(); ?></h2>
                                        <a href="<?php the_permalink(); ?>/?service=<?php the_title(); ?>" class="rm-service-button button-master secondary-button rounded"><?php echo $atts['button-text']; ?></a>
                                    </div>
                                </a>
                            </div>
                        </div>
                    <?php endwhile; ?>
                </div>
            </div>
        <?php endif; ?>
        
        <?php
        wp_reset_query();    
        
        return ob_get_clean();
    }

    add_shortcode('grid_services', 'grid_services_func');
}