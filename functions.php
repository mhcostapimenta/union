<?php

/**
* Fuctions and definitions
*
* @package WordPress
* @subpackage Quattri
* @since 1.0
* @version 1.0
*/

// Requerendo o arquivo do Customizer
require get_template_directory(). '/inc/customizer.php';

// Requerendo os CTPs
require get_template_directory() . '/inc/cpts.php';

// Requerendo o Custom Navigation Walker - Customizador do menu para o bootstrap 4.0
require_once get_template_directory() . '/inc/class-wp-bootstrap-navwalker.php';

// Carregar scripts e folhas de estilo
function load_scripts(){
	wp_enqueue_script('bootstrap-js', get_template_directory_uri().'/assets/bootstrap/js/bootstrap.min.js', array('jquery'), '4.4', true );
	wp_enqueue_style('bootstrap-css', get_template_directory_uri().'/assets/bootstrap/css/bootstrap.min.css', array(), '4.4', 'all');
  wp_enqueue_style('ubuntu', 'https://fonts.googleapis.com/css2?family=Ubuntu:wght@300;400;500&display=swap', array(), null, 'all');
	wp_enqueue_style('epilogue', 'https://fonts.googleapis.com/css2?family=Epilogue:wght@100;300;500&display=swap', array(), null, 'all');
	wp_enqueue_style('better-nav-css', 'https://unpkg.com/@bootstrapstudio/bootstrap-better-nav/dist/bootstrap-better-nav.min.css', array(), null, 'all');	
	wp_enqueue_style('fontawesome', get_template_directory_uri().'/assets/fonts/font-awesome.min.css', array(), null, 'all');
	wp_enqueue_style('scroll-to-top', get_template_directory_uri().'/assets/css/scrollToTop.css', array(), null, 'all');
	wp_enqueue_style('template', get_template_directory_uri().'/assets/css/styles.css','1.0','all');
	wp_deregister_script('jquery');
  wp_register_script('jquery', get_template_directory_uri().'/assets/js/jquery.min.js', null, '1.0', true );
	wp_enqueue_script('scroll-slow', get_template_directory_uri().'/assets/js/scrollSlow.js', null, '1.0', true );	
	wp_enqueue_script('scroll-to-top', get_template_directory_uri().'/assets/js/scroolToTop.js', null,  '1.0' , true );
	wp_enqueue_script('better-nav-js', get_template_directory_uri().'/assets/js/betternav.js', null, '2', true );
	wp_enqueue_script('main', get_template_directory_uri().'/assets/js/main.js', null,  '1.0' , true );
}

// Dispara o Hook com os scripts e os estilos
add_action('wp_enqueue_scripts', 'load_scripts');

// Função de configuração do Tema
function union_config() {
	// Registrando nossos menus
	register_nav_menus(
		array(
			'my_main_menu' => 'Main Menu',
			'footer_menu' => 'Footer Menu',
			'my_main_menu_interno' => 'Main Menu Interno',
			'footer_menu_interno' => 'Footer Menu Interno',
		)
	);

	// Tamanhos Padrão de Imagens
	add_image_size('slider', 1920, 1080, true);
	add_image_size('thumb', 340, 200, true);

	add_theme_support('post-formats',  array( 'video', 'image') ); // Adiciona metabox de formato de Post com as opcoes no array
	add_theme_support( 'post-thumbnails'); // Adiciona a metabox de imagem destacada no editor de Posts
	add_theme_support('title-tag'); // Carrega os dados Title do Site em todas as páginas


}

// Dispara o Hook com os Menus e a customização do Gutemberg
add_action('after_setup_theme','union_config', 0 );

// Requere as funcoes customizadas
require get_template_directory() . '/inc/custom-functions.php';

// Requere os widgets customizáveis
require get_template_directory() . '/inc/custom-widgets.php';

// Requere o breadcrumb customizável
require get_template_directory() . '/inc/custom-breadcrumb.php';

// Requere a customização de menu categoria
require get_template_directory() . '/inc/custom-menu-categorias.php';

// Dispara o Hook com os Widgets
add_action( 'widgets_init', 'union_widgets');

// Dispara o Hook para customização do Tema
function custom_setup() {
  add_theme_support( 'title-tag' );
}
add_action( 'after_setup_theme', 'custom_setup' );


//Dispara o Hook para incluir apenas Posts e o CTP Apresentação no resultado da busca
function include_cpt_search( $query ) {
	
	if ( $query->is_search ) {
	$query->set( 'post_type', array( 'post', 'apresentacoes' ) );
	}
	
	return $query;
	
}
add_filter( 'pre_get_posts', 'include_cpt_search' ); 

?>