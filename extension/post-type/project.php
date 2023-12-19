<?php
/*
*---------------------------------------------------------------------
* This file create and contains the template post_type meta elements
*---------------------------------------------------------------------
*/

add_action('init', 'clinic_create_project', 10);

function clinic_create_project() {

    /* Start post type template */
    $labels = array(   
        'name'                  =>  _x( 'Dự án', 'post type general name', 'clinic' ),
        'singular_name'         =>  _x( 'Dự án', 'post type singular name', 'clinic' ),
        'menu_name'             =>  _x( 'Dự án', 'admin menu', 'clinic' ),
        'name_admin_bar'        =>  _x( 'Danh sách Dự án', 'add new on admin bar', 'clinic' ),
        'add_new'               =>  _x( 'Thêm mới', 'Dự án', 'clinic' ),
        'add_new_item'          =>  esc_html__( 'Thêm Dự án', 'clinic' ),
        'edit_item'             =>  esc_html__( 'Sửa Dự án', 'clinic' ),
        'new_item'              =>  esc_html__( 'Dự án mới', 'clinic' ),
        'view_item'             =>  esc_html__( 'Xem dự án', 'clinic' ),
        'all_items'             =>  esc_html__( 'Tất cả dự án', 'clinic' ),
        'search_items'          =>  esc_html__( 'Tìm kiếm dự án', 'clinic' ),
        'not_found'             =>  esc_html__( 'Không tìm thấy', 'clinic' ),
        'not_found_in_trash'    =>  esc_html__( 'Không tìm thấy trong thùng rác', 'clinic' ),
        'parent_item_colon'     =>  ''
    );

    $args = array(
        'labels'             => $labels,
        'public'             => true,
        'show_ui'            => true,
        'show_in_menu'       => true,
        'query_var'          => true,
        'menu_icon'          => 'dashicons-open-folder',
        'capability_type'    => 'post',
        'rewrite'            => array('slug' => 'du-an' ),
        'has_archive'        => true,
        'hierarchical'       => true,
        'menu_position'      => 5,
        'supports'           => array( 'title', 'editor', 'thumbnail', 'excerpt' ),
    );

    register_post_type('clinic_project', $args );
    /* End post type template */

    /* Start taxonomy */
    $taxonomy_labels = array(
        'name'              => _x( 'Danh mục dự án', 'taxonomy general name', 'clinic' ),
        'singular_name'     => _x( 'Danh mục dự án', 'taxonomy singular name', 'clinic' ),
        'search_items'      => __( 'Tìm kiếm danh mục', 'clinic' ),
        'all_items'         => __( 'Tất cả danh mục', 'clinic' ),
        'parent_item'       => __( 'Danh mục cha', 'clinic' ),
        'parent_item_colon' => __( 'Danh mục cha:', 'clinic' ),
        'edit_item'         => __( 'Sửa', 'clinic' ),
        'update_item'       => __( 'Cập nhật', 'clinic' ),
        'add_new_item'      => __( 'Thêm mới', 'clinic' ),
        'new_item_name'     => __( 'Tên mới', 'clinic' ),
        'menu_name'         => __( 'Danh mục', 'clinic' ),
    );

    $taxonomy_args = array(

        'labels'            => $taxonomy_labels,
        'hierarchical'      => true,
        'public'            => true,
        'show_ui'           => true,
        'show_admin_column' => true,
        'query_var'         => true,
        'rewrite'           => array( 'slug' => 'danh-muc-du-an' ),
    );

    register_taxonomy( 'clinic_project_cat', array( 'clinic_project' ), $taxonomy_args );
    /* End taxonomy */

}