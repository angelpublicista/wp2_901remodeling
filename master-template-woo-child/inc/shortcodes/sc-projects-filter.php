<?php

if (!function_exists('projects_filter_func')) {
    function projects_filter_func(){
        $args = array(
            'post_type' => 'projects'
        );

        $post_query = new WP_Query($args);

        $terms = get_terms([
            'taxonomy' => 'category_project'
        ]);
        
        //Start filters
        $string = '<ul class="nav filters mb-3">';
        $pos = -100;
        foreach ($terms as $term) {
            $pos = $pos + 100;
            $string .= '<li class="nav-item"><a href="#" class="nav-link button-project pl-0 mr-1" data-pos="'.$pos.'" data-item="#'.$term->slug.'">'.$term->name.'</a></li>';
        }
        $string .= '</ul>';
        //End filters

        $string .= '<div class="cont-projects">';
            $string .= '<div class="slide-projects">';
            foreach ($terms as $term){
                $string .= '<div class="project" >';
                $string .= do_shortcode("[carousel_projects category_project=".$term->slug."]");
                $string .= '</div>';
            }
            $string .= '</div>';
        $string .= '</div>';

        return $string;
    }

    add_shortcode( 'projects_filter', 'projects_filter_func' );
}