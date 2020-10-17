<?php

get_header();

?>

<div class="entry-category">

    <div class="container">

        <h1><?php the_archive_title(); ?></h1>

        <hr class="divider-subheader">

        <?php if($geniorama['breadcrumbs-on-off']): ?>

                <div class="breadcrumbs" typeof="BreadcrumbList" vocab="http://schema.org/">

                    <?php

                        if (function_exists('bcn_display')) {

                            bcn_display();

                        }

                    ?>

                </div>

        <?php endif; ?>

    </div>

</div>

<section class="content-category mb-5">
    <div class="container">
        <div class="row">
             <!-- ESPACIO PARA BARRA DE FILTROS -->
            <div class="col-12 col-md-8">
                <?php
                    // CAPTURANDO LOS VALORES POR GET
                     if ( $_GET['orderby']) {
                        $orderby = $_GET['orderby'];
                     } else {
                         $orderby = 'date';
                     }

                     if ($_GET['order']) {
                        $order = $_GET['order'];
                     } else {
                        $order = "DESC";
                     }
                     $paged = ( get_query_var( 'paged' ) ) ? get_query_var( 'paged' ) : 1;
                     $wp_query = new WP_Query(
                       array(
                         'post_type' => array('post', 'projects'),
                         'orderby' => $orderby,
                         'order' => $order,
                         'cat' => get_query_var('cat'),
                         'paged' => $paged
                       )

                     );
                ?>
            
                <div class='post-filters-cont'>
                    <div class="results mb-2">
                        <span>Show 
                            <?php
                            global $wp_query;
                            $number_post = $wp_query->found_posts;
                            $number_page = $wp_query->post_count;
                            if ($number_post > 7){
                                echo  $number_page . ' of ' . $number_post . ' results';
                            }else{
                                echo ' ' .$number_post . ' results';
                            }
                            ?>
                        </span>
                    </div>
                    <form class='post-filters pl-2'>
                        <div class="row">
                            <div class="form-group form-inline align-items-center">
                                <select name="orderby" class="form-control custom-select p-0 px-2 mb-0 mr-1">
                                    <option value='date'>Order by date</option>
                                    <option value='title'>Order by title</option>
                                    <option value='rand'>Random</option>
                                </select>
                                <select name="order" class="form-control custom-select p-0 px-2 mb-0 mr-1">
                                    <option value='DESC'>Falling</option>
                                    <option value='ASC'>Upward</option>
                                </select>
                                <button type="submit" class="btn-filter button-master principal-button rounded small-button">FILTER</button>
                            </div>
                        </div>
                    </form>
                </div>
				<?php 
				
				$grid_arch = array(
					'post_type' => array( 'post', 'projects'),
					'posts_per_page' => 3,
				);
				
				?>
                <div class="row mt-5">
                <?php if (have_posts() ) : while (have_posts() ) : the_post(); ?>
                    <div class="col-12 col-md-6 my-md-3">
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
                    </div>
                <?php endwhile; endif; ?>
                </div>

                <div class="pagination-custom">

                    <?php pagination_custom(); ?>

                </div>

            </div>

            <div class="col-12 col-md-4">

                <div class="sidebar">

                    <?php get_sidebar(); ?>

                </div>

            </div>
        </div>
    </div>
</section>
<?php

get_footer();
