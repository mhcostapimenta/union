<?php
require_once('../../../wp-load.php');

$pages = get_posts(array(
    'post_type' => 'page',
    'post_status' => 'publish',
    'numberposts' => -1
));

$result = array();
foreach ($pages as $page) {
    $result[] = array(
        'ID' => $page->ID,
        'title' => $page->post_title,
        'slug' => $page->post_name
    );
}

echo json_encode($result, JSON_PRETTY_PRINT);
