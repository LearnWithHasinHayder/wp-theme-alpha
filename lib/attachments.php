<?php
define( 'ATTACHMENTS_SETTINGS_SCREEN', false );
add_filter( 'attachments_default_instance', '__return_false' );

function alpha_attachments($attachments){
    $fields = array(
       array(
           'name'      => 'title',
           'type'      => 'text',
           'label'     => __( 'Title', 'alpha' ),
       ),
    );

    $args = array(

        'label'         => 'Featured Slider',
        'post_type'     => array( 'post'),
        'filetype'      => array("image"),
        'note'          => 'Add Slider Images',
        'button_text'   => __( 'Attach Files', 'alpha' ),
        'fields'        => $fields,
    );

    $attachments->register( 'slider', $args );
}
add_action( 'attachments_register', 'alpha_attachments' );

function alpha_testimonial_attachments($attachments){
    $fields = array(
        array(
            'name'      => 'name',
            'type'      => 'text',
            'label'     => __( 'Name', 'alpha' ),
        ),
        array(
            'name'      => 'position',
            'type'      => 'text',
            'label'     => __( 'Position', 'alpha' ),
        ),
        array(
            'name'      => 'company',
            'type'      => 'text',
            'label'     => __( 'Company', 'alpha' ),
        ),
        array(
            'name'      => 'testimonial',
            'type'      => 'textarea',
            'label'     => __( 'Testimonial', 'alpha' ),
        ),
    );

    $args = array(

        'label'         => 'Testimonials',
        'post_type'     => array( 'page'),
        'filetype'      => array("image"),
        'note'          => 'Add testimonial',
        'button_text'   => __( 'Attach Files', 'alpha' ),
        'fields'        => $fields,
    );

    $attachments->register( 'testimonials', $args );
}
add_action( 'attachments_register', 'alpha_testimonial_attachments' );


function alpha_team_attachments($attachments){
    $fields = array(
        array(
            'name'      => 'name',
            'type'      => 'text',
            'label'     => __( 'Name', 'alpha' ),
        ),
        array(
            'name'      => 'email',
            'type'      => 'text',
            'label'     => __( 'Email', 'alpha' ),
        ),
        array(
            'name'      => 'position',
            'type'      => 'text',
            'label'     => __( 'Position', 'alpha' ),
        ),
        array(
            'name'      => 'company',
            'type'      => 'text',
            'label'     => __( 'Company', 'alpha' ),
        ),
        array(
            'name'      => 'bio',
            'type'      => 'textarea',
            'label'     => __( 'Testimonial', 'alpha' ),
        ),
    );

    $args = array(

        'label'         => 'Team members',
        'post_type'     => array( 'page'),
        'filetype'      => array("image"),
        'note'          => 'Add a team member',
        'button_text'   => __( 'Attach Files', 'alpha' ),
        'fields'        => $fields,
    );

    $attachments->register( 'team', $args );
}
add_action( 'attachments_register', 'alpha_team_attachments' );





