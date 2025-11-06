<?php
/**
 * Add a "Word Count" column in the posts admin list and make it sortable
 */

// 1. Add the column
function add_word_count_column( $columns ) {
    $columns['word_count'] = 'Word Count';
    return $columns;
}
add_filter( 'manage_posts_columns', 'add_word_count_column' );

// 2. Populate the column
function show_word_count_column( $column, $post_id ) {
    if ( 'word_count' === $column ) {
        $content = get_post_field( 'post_content', $post_id );
        echo str_word_count( wp_strip_all_tags( $content ) );
    }
}
add_action( 'manage_posts_custom_column', 'show_word_count_column', 10, 2 );

// 3. Make the column sortable
function word_count_sortable_column( $columns ) {
    $columns['word_count'] = 'word_count';
    return $columns;
}
add_filter( 'manage_edit-post_sortable_columns', 'word_count_sortable_column' );

// 4. Handle sorting
function word_count_orderby( $query ) {
    if ( ! is_admin() || ! $query->is_main_query() ) {
        return;
    }

    if ( 'word_count' === $query->get( 'orderby' ) ) {
        // Sort by the word count of post content
        $query->set( 'meta_key', '' ); // no meta key, we'll sort manually
        add_filter( 'posts_orderby', function( $orderby, $q ) {
            global $wpdb;
            return "LENGTH( {$wpdb->posts}.post_content ) - LENGTH( REPLACE( {$wpdb->posts}.post_content, ' ', '' ) ) " . strtoupper( $_GET['order'] ?? 'ASC' );
        }, 10, 2 );
    }
}
add_action( 'pre_get_posts', 'word_count_orderby' );