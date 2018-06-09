<form role="search" method="get" class="search-form" action="<?php echo home_url( '/' ); ?>">
    <alpha>
        <span class="screen-reader-text"><?php echo _x( 'What are you looking for:', 'alpha' ) ?></span>
        <input type="search" class="search-field"
               placeholder="<?php echo esc_attr_x( 'Search …', 'placeholder' ) ?>"
               value="<?php echo get_search_query() ?>" name="s"
               title="<?php echo esc_attr_x( 'Search for:', 'alpha' ) ?>" />
    </alpha>
    <input type="submit" class="search-submit"
           value="<?php echo esc_attr_x( 'Search', 'submit button' ) ?>" />
</form>