<?php

// Função construtora de menu categorias de uma taxonomia
function listCategories( $taxonomia, $urlAll ) {

    $category_ids = get_all_category_ids();

    $args = array(
         'orderby' => 'slug',
         'parent' => 0,
         'taxonomy' => $taxonomia
    );

    $categories = get_categories( $args );

    echo '<a class="btn botaoCategoria" role="button" href="'. get_bloginfo('url') . '/' . $urlAll . '/">Todos</a>';
    
    foreach ( $categories as $category ) {

        echo '<a class="btn botaoCategoria" role="button" href="' . get_category_link( $category->term_id ) . '">' . $category->name . '' . '' . $category->description . '</a>';
      }
                        
}

// Função construtora de menu categorias de posts
function listCategoriesPosts( $urlAll ) {

    $category_ids = get_all_category_ids();

    $args = array(
         'orderby' => 'slug',
         'parent' => 0,
    );

    $categories = get_categories( $args );

    echo '<a class="btn botaoCategoria" role="button" href="'. get_bloginfo('url') . '/' . $urlAll . '/">Todos</a>';
    
    foreach ( $categories as $category ) {

        echo '<a class="btn botaoCategoria" role="button" href="' . get_category_link( $category->term_id ) . '">' . $category->name . '' . '' . $category->description . '</a>';
      }
                        
}

// Adiciona classe personalizada para os links das tags
// add_filter( "term_links-post_tag", 'add_tag_class');

// function add_tag_class($links) {
//   return str_replace('<a href="', '<a class="btn botaoCategoria" href="', $links);
// }

// Função construtora de menu categorias de posts
function listTags( $urlAll ) {

  // $category_ids = get_all_category_ids();

  $args = array(
       'orderby' => 'slug',
       'parent' => 0,
  );

  $tags = get_tags( $args );

  echo '<div class="btn botaoTags"><a role="button" href="'. get_bloginfo('url') . '/' . $urlAll . '/">Todos</a></div>';
  
  foreach ( $tags as $tag ) {

      echo '<div class="btn botaoTags"><a role="button" href="' . get_tag_link( $tag->term_id ) . '">' . $tag->name . '' . '' . $tag->description . '</a></div>';
    }
                      
}
