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
        foreach ($terms as $term) {
            $string .= '<li class="nav-item"><a href="#" class="nav-link button-project pl-0 mr-1" data-item="#'.$term->slug.'">'.$term->name.'</a></li>';
        }
        $string .= '</ul>';
        //End filters

        $string .= '<div class="row">';
        foreach ($terms as $term){
            $string .= '<div class="col-12">';
            $string .= do_shortcode("[carousel_projects category_project=".$term->slug."]");
            $string .= '</div>';
        }
        $string .= '</div>';

        return $string;
    }

    add_shortcode( 'projects_filter', 'projects_filter_func' );
}