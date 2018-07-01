<?php
/**
 * Template Name: Custom Query WPQuery
 */
?>
<?php get_header(); ?>
<body <?php body_class(); ?>>
<?php get_template_part( "/template-parts/common/hero" ); ?>
    <div class="posts text-center">
        <?php
        $paged          = get_query_var( "paged" ) ? get_query_var( "paged" ) : 1;
        $posts_per_page = 3;
        $post_ids       = array( 58, 68, 81, 43, 56, 70, 38 );
        $_p             = new WP_Query( array(
            'posts_per_page' => $posts_per_page,
            'paged'          => $paged,
            'meta_query'     => array(
                'relation' => 'AND',
                array(
                    'key'     => 'featured',
                    'value'   => '1',
                    'compare' => '='
                ),
                array(
                    'key'     => 'homepage',
                    'value'   => '1',
                    'compare' => '='
                )
            )
        ) );
        while ( $_p->have_posts() ) {
            $_p->the_post();
            ?>
            <h2><a href="<?php the_permalink(); ?>"><?php the_title(); ?></h2></a>
            <?php
        }

        wp_reset_query();
        ?>

        <div class="container post-pagination">
            <div class="row">
                <div class="col-md-12">
                    <?php
                    echo paginate_links( array(
                        'total'     => $_p->max_num_pages,
                        'current'   => $paged,
                        'prev_next' => false,
                    ) );
                    ?>
                </div>
            </div>
        </div>

    </div>
<?php get_footer(); ?>