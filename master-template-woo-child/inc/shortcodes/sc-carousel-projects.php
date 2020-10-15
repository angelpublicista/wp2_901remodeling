<?php

if(!function_exists('carousel_projects_func')){
    function carousel_projects_func($atts){
        $atts = shortcode_atts(
            array(
                'category_project' => ''
            ),
            $atts,
            "carousel_projects"
        );

        $args = array(
            "post_type" => "projects",
            'tax_query' => array(
                array(
                    'taxonomy'  => 'category_project',
                    'field'     => 'slug',
                    'terms'     => $atts['category_project']
                ),
            ),
        );

        $projects_query = new WP_Query($args);
        ob_start();
        ?>
        
        <?php if($projects_query->have_posts()): ?>
            <div class="slick-theme slick-projects" id="<?php echo $atts['category_project']; ?>">
                <?php while($projects_query->have_posts()): ?>
                    <?php $projects_query->the_post(); ?>
                    <!-- Content Projects -->
                    <div class="item-project d-block">
                        <?php the_content(); ?>
                    </div>
                <?php endwhile; ?>
            </div>
        <?php endif; ?>
        
        <?php
        wp_reset_query();    
        
        return ob_get_clean();
    }

    add_shortcode( 'carousel_projects', 'carousel_projects_func' );
}
