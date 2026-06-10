<?php
/**
 * Sorting functionality for default posts in WordPress Admin.
 *
 * Makes the Categories and Tags columns sortable in the edit.php screen for standard posts,
 * and modifies the SQL queries to sort alphabetically by terms.
 */

if ( ! defined( 'ABSPATH' ) ) {
    exit; // Exit if accessed directly.
}

/**
 * Register Categories and Tags columns as sortable.
 *
 * @param array $sortable_columns List of sortable columns.
 * @return array Modified list of sortable columns.
 */
function union_make_post_columns_sortable( $sortable_columns ) {
    $sortable_columns['categories'] = 'categories';
    $sortable_columns['tags']       = 'tags';
    return $sortable_columns;
}
add_filter( 'manage_edit-post_sortable_columns', 'union_make_post_columns_sortable' );

/**
 * Modify SQL query clauses to sort posts by Category or Tag names.
 *
 * @param array    $clauses The list of SQL clauses.
 * @param WP_Query $query   The current query object.
 * @return array Modified SQL clauses.
 */
function union_sort_posts_by_taxonomy( $clauses, $query ) {
    global $wpdb, $pagenow;

    // Only apply in WordPress Admin for the main query on edit.php screen for standard posts.
    if ( ! is_admin() || ! $query->is_main_query() || 'edit.php' !== $pagenow ) {
        return $clauses;
    }

    // Ensure we are targeting the standard 'post' post type
    $post_type = isset( $_GET['post_type'] ) ? sanitize_text_field( $_GET['post_type'] ) : 'post';
    if ( 'post' !== $post_type ) {
        return $clauses;
    }

    $orderby = $query->get( 'orderby' );
    if ( ! in_array( $orderby, array( 'categories', 'tags' ), true ) ) {
        return $clauses;
    }

    // Set the taxonomy slug depending on which column we are sorting
    $taxonomy = ( 'categories' === $orderby ) ? 'category' : 'post_tag';

    // Join term tables
    $clauses['join'] .= " 
        LEFT JOIN {$wpdb->term_relationships} AS tr ON {$wpdb->posts}.ID = tr.object_id 
        LEFT JOIN {$wpdb->term_taxonomy} AS tt ON tr.term_taxonomy_id = tt.term_taxonomy_id AND tt.taxonomy = '{$taxonomy}' 
        LEFT JOIN {$wpdb->terms} AS t ON tt.term_id = t.term_id";

    // Set Group By to avoid duplicate rows for posts with multiple categories/tags
    if ( empty( $clauses['groupby'] ) ) {
        $clauses['groupby'] = "{$wpdb->posts}.ID";
    } else {
        $clauses['groupby'] .= ", {$wpdb->posts}.ID";
    }

    // Set custom Order By clause using GROUP_CONCAT to sort alphabetically
    $order = strtoupper( $query->get( 'order' ) ) === 'DESC' ? 'DESC' : 'ASC';
    $clauses['orderby'] = "GROUP_CONCAT(t.name ORDER BY t.name {$order}) {$order}";

    return $clauses;
}
add_filter( 'posts_clauses', 'union_sort_posts_by_taxonomy', 10, 2 );

/**
 * Tell 'Post Types Order' plugin to ignore its custom order when sorting by categories or tags.
 *
 * @param WP_Query $query The WP_Query object.
 */
function union_set_ignore_custom_sort_var( $query ) {
    if ( ! is_admin() || ! $query->is_main_query() ) {
        return;
    }

    $orderby = $query->get( 'orderby' );
    if ( in_array( $orderby, array( 'categories', 'tags' ), true ) ) {
        $query->set( 'ignore_custom_sort', true );
    }
}
add_action( 'pre_get_posts', 'union_set_ignore_custom_sort_var', 1 );

/**
 * Prevent 'Post Types Order' plugin from overriding our custom taxonomy sorting.
 *
 * If we are sorting by categories or tags, we instruct the plugin to bypass its custom order.
 *
 * @param bool     $ignore  Whether to ignore the custom order.
 * @param string   $orderby The orderby parameter.
 * @param WP_Query $query   The WP_Query object.
 * @return bool Modified ignore flag.
 */
function union_ignore_pto_custom_sort( $ignore, $orderby, $query ) {
    if ( is_admin() && $query->is_main_query() ) {
        $query_orderby = $query->get( 'orderby' );
        if ( in_array( $query_orderby, array( 'categories', 'tags' ), true ) ) {
            return true;
        }
    }
    return $ignore;
}
add_filter( 'pto/posts_orderby/ignore', 'union_ignore_pto_custom_sort', 10, 3 );

