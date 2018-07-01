<?php
$alpha_layout_class = "col-md-8";
$alpha_text_class   = "";
if ( ! is_active_sidebar( "sidebar-1" ) ) {
    $alpha_layout_class = "col-md-10 offset-md-1";
    $alpha_text_class   = "text-center";
}
?>

<?php get_header(); ?>
<body <?php body_class( array( "first_class", "second_class" ) ); ?>>
<?php get_template_part( "/template-parts/common/hero" ); ?>
    <div class="container">
        <div class="row">
            <div class="<?php echo $alpha_layout_class; ?>">
                <div class="posts" <?php ?>>
                    <?php
                    while ( have_posts() ) :
                        the_post();
                        ?>
                        <div <?php post_class( array( "first_class", "second_class" ) ); ?>>
                            <div class="container">
                                <div class="row">
                                    <div class="col-md-12">
                                        <h2 class="post-title <?php echo $alpha_text_class; ?>">
                                            <?php the_title(); ?>
                                        </h2>
                                        <p class="<?php echo $alpha_text_class; ?>">
                                            <em><?php the_author_posts_link(); ?></em><br/>
                                            <?php echo get_the_date(); ?>
                                        </p>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-12">
                                        <div class="slider">
                                            <?php
                                            if ( class_exists( 'Attachments' ) ) {
                                                $attachments = new Attachments( 'slider' );
                                                if ( $attachments->exist() ) {
                                                    while ( $attachment = $attachments->get() ) { ?>
                                                        <div>
                                                            <?php echo $attachments->image( 'large' ); ?>
                                                        </div>
                                                        <?php
                                                    }
                                                }
                                            }
                                            ?>
                                        </div>
                                        <div>
                                            <?php
                                            if ( ! class_exists( 'Attachments' ) ) {
                                                if ( has_post_thumbnail() ) {
                                                    $thumbnail_url = get_the_post_thumbnail_url( null, "large" );
                                                    printf( '<a class="popup" href="%s" data-featherlight="image">', $thumbnail_url );
                                                    the_post_thumbnail( "large", array( "class" => "img-fluid" ) );
                                                    echo '</a>';
                                                }
                                            }

                                            the_content();


                                            if ( get_post_format() == "image" && function_exists( "the_field" ) ):

                                                /*$camera_model = get_post_meta(get_the_ID(),"camera_model",true);
                                                $related_posts = get_post_meta(get_the_ID(),"related_posts",true);
                                                print_r($related_posts); */
                                                ?>
                                                <div class="metainfo">
                                                    <strong>Camera
                                                        Model: </strong> <?php the_field('camera_model'); ?><br/>
                                                    <strong>Location: </strong>
                                                    <?php
                                                    $alpha_location = get_field( "location" );
                                                    echo esc_html( $alpha_location );
                                                    ?>
                                                    <br/>
                                                    <strong>Date: </strong> <?php the_field( "date" ); ?><br/>
                                                    <?php if ( get_field( "licensed" ) ): ?>
                                                        <?php echo apply_filters( "the_content", get_field( "license_information" ) ); ?>
                                                    <?php endif; ?>

                                                    <p>
                                                        <?php
                                                        $alpha_image         = get_field( "image" );
                                                        $alpha_image_details = wp_get_attachment_image_src( $alpha_image, "alpha-square" );
                                                        echo "<img src='" . esc_url( $alpha_image_details[0] ) . "'/>'";
                                                        ?>
                                                    </p>

                                                    <p>
                                                        <?php
                                                        $file = get_field( "attachment" );
                                                        if ( $file ) {
                                                            $file_url   = wp_get_attachment_url( $file );
                                                            $file_thumb = get_field( "thumbnail", $file );
                                                            if ( $file_thumb ) {
                                                                $file_thumb_details = wp_get_attachment_image_src( $file_thumb );
                                                                echo "<a target='_blank' href='{$file_url}'><img src='" . esc_url( $file_thumb_details[0] ) . "'/></a>";
                                                            } else {
                                                                echo "<a target='_blank' href='{$file_url}'>{$file_url}</a>";
                                                            }
                                                        }
                                                        ?>
                                                    </p>


                                                    <?php if ( function_exists( "the_field" ) ) : ?>
                                                        <div>
                                                            <h1><?php _e( "Related Posts", "alpha" ); ?></h1>
                                                            <?php
                                                            $related_posts = get_field( "related_posts" );
                                                            $alpha_rp      = new WP_Query( array(
                                                                'post__in' => $related_posts,
                                                                'orderby'  => 'post__in',
                                                            ) );


                                                            while ( $alpha_rp->have_posts() ) {
                                                                $alpha_rp->the_post();
                                                                ?>
                                                                <h4><?php the_title(); ?></h4>
                                                                <?php
                                                            }
                                                            wp_reset_query();
                                                            ?>
                                                        </div>
                                                    <?php endif; ?>


                                                </div>
                                            <?php
                                            endif;
                                            ?>

                                            <?php

                                            if ( get_post_format() == "image" && class_exists("CMB2")):

                                            $alpha_camera_model = get_post_meta(get_the_ID(),"_alpha_camera_model",true);
                                            $alpha_location = get_post_meta(get_the_ID(),"_alpha_location",true);
                                            $alpha_date = get_post_meta(get_the_ID(),"_alpha_date",true);
                                            $alpha_licensed = get_post_meta(get_the_ID(),"_alpha_licensed",true);
                                            $alpha_license_information = get_post_meta(get_the_ID(),"_alpha_license_information",true);
                                            ?>
                                            <div class="metainfo">
                                                <strong>Camera
                                                    Model: </strong> <?php echo esc_html($alpha_camera_model); ?><br/>
                                                <strong>Location: </strong>
                                                <?php
                                                echo esc_html( $alpha_location );
                                                ?>
                                                <br/>
                                                <strong>Date: </strong> <?php echo esc_html($alpha_date); ?><br/>
                                                <?php if ( $alpha_licensed ): ?>
                                                    <?php echo apply_filters( "the_content", $alpha_license_information ); ?>
                                                <?php endif; ?>

                                                <p>
                                                    <?php
                                                    $alpha_image         = get_post_meta( get_the_ID(), "image", true );
                                                    $alpha_image_details = wp_get_attachment_image_src( $alpha_image, "alpha-square" );
                                                    echo "<img src='" . esc_url( $alpha_image_details[0] ) . "'/>";
                                                    ?>
                                                </p>

                                                <p>
                                                    <?php
                                                    $alpha_file         = get_post_meta( get_the_ID(), "_alpha_resume", true );
                                                    echo esc_url($alpha_file);
                                                    ?>
                                                </p>

                                            </div>
                                            <?php
                                            endif;
                                            ?>

                                            <?php
                                            wp_link_pages();

                                            ?>
                                        </div>
                                    </div>

                                    <div class="authorsection">
                                        <div class="row">
                                            <div class="col-md-2 authorimage">
                                                <?php
                                                echo get_avatar( get_the_author_meta( "ID" ) );
                                                ?>
                                            </div>
                                            <div class="col-md-10">
                                                <h4>
                                                    <?php echo get_the_author_meta( "display_name" ); ?>
                                                </h4>
                                                <p>
                                                    <?php echo get_the_author_meta( "description" ); ?>
                                                </p>
                                                <?php if ( function_exists( "the_field" ) ): ?>
                                                    <p>
                                                        Facebook
                                                        URL: <?php the_field( "facebook", "user_" . get_the_author_meta( "ID" ) ) ?>
                                                        <br/>
                                                        Twitter
                                                        URL: <?php the_field( "twitter", "user_" . get_the_author_meta( "ID" ) ) ?>
                                                        <br/>
                                                    </p>
                                                <?php endif; ?>

                                            </div>
                                        </div>
                                    </div>

                                    <?php if ( ! post_password_required() ): ?>
                                        <div class="col-md-12">
                                            <?php
                                            //comments_template();
                                            ?>
                                        </div>
                                    <?php endif; ?>
                                </div>
                            </div>
                        </div>
                    <?php
                    endwhile;
                    ?>

                    <div class="container post-pagination">
                        <div class="row">
                            <div class="col-md-4"></div>
                            <div class="col-md-8">
                                <?php
                                the_posts_pagination( array(
                                    "screen_reader_text" => ' ',
                                    "prev_text"          => "New Posts",
                                    "next_text"          => "Old Posts"
                                ) );
                                ?>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <?php
            if ( is_active_sidebar( "sidebar-1" ) ):
                ?>
                <div class="col-md-4">
                    <?php
                    if ( is_active_sidebar( "sidebar-1" ) ) {
                        dynamic_sidebar( "sidebar-1" );
                    }
                    ?>
                </div>
            <?php endif; ?>
        </div>
    </div>

<?php get_footer(); ?>