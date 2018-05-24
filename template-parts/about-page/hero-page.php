<?php
$alpha_feat_image = get_the_post_thumbnail_url(null,"large");
?>
<div class="header page-header" style="background-image: url(<?php echo $alpha_feat_image;?>);">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <h3 class="tagline">
                    <?php bloginfo( "description" ); ?>
                </h3>
                <h1 class="align-self-center display-1 text-center heading">
                    <a href="<?php echo site_url(); ?>"><?php bloginfo( "name" ); ?></a>
                </h1>
            </div>
        </div>
    </div>
</div>
<div class="container">
    <div class="row">
        <div class="col-md-12">
            <div class="navigation">
                <?php
                wp_nav_menu(
                    array(
                        'theme_location' => 'topmenu',
                        'menu_id'        => 'topmenucontainer',
                        'menu_class'     => 'list-inline text-center',
                    )
                );
                ?>
            </div>
        </div>
    </div>
</div>