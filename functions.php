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
function load_scripts() {
    // Bootstrap CSS (Crítico)
    wp_enqueue_style('bootstrap-css', 'https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css', array(), '5.3.3', 'all');

    // Google Fonts - Combinadas e com display=swap
    wp_enqueue_style('google-fonts', 'https://fonts.googleapis.com/css2?family=Epilogue:wght@100;300;500&family=Ubuntu:wght@300;400;500&display=swap', array(), null, 'all');

    // CSS Não-Críticos (Serão carregados asincronamente via filtro abaixo)
    wp_enqueue_style('better-nav-css', 'https://unpkg.com/@bootstrapstudio/bootstrap-better-nav/dist/bootstrap-better-nav.min.css', array(), null, 'all');
    wp_enqueue_style('fontawesome', get_template_directory_uri() . '/assets/fonts/font-awesome.min.css', array(), null, 'all');
    wp_enqueue_style('scroll-to-top', get_template_directory_uri() . '/assets/css/scrollToTop.css', array(), null, 'all');

    // Estilos Principais do Tema
    wp_enqueue_style('template', get_template_directory_uri() . '/assets/css/styles.css', array('bootstrap-css'), '1.1', 'all');

    // Scripts (No rodapé por padrão)
    wp_deregister_script('jquery');
    wp_register_script('jquery', get_template_directory_uri() . '/assets/js/jquery.min.js', null, '1.0', true);
    wp_enqueue_script('bootstrap-js', 'https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js', array('jquery'), '5.3.3', true);
    wp_enqueue_script('scroll-slow', get_template_directory_uri() . '/assets/js/scrollSlow.js', array('jquery'), '1.0', true);
    wp_enqueue_script('scroll-to-top', get_template_directory_uri() . '/assets/js/scroolToTop.js', array('jquery'), '1.0', true);
    wp_enqueue_script('better-nav-js', get_template_directory_uri() . '/assets/js/betternav.js', array('jquery'), '2', true);
    wp_enqueue_script('main', get_template_directory_uri() . '/assets/js/main.js', array('jquery'), '1.0', true);
}

// Dispara o Hook com os scripts e os estilos
add_action('wp_enqueue_scripts', 'load_scripts');

/**
 * Filtro para adiar o carregamento de CSS não-crítico (Defer CSS)
 */
function union_defer_non_critical_css($tag, $handle, $src) {
    // Lista de estilos que NÃO são críticos para a primeira renderização
    $non_critical_styles = array(
        'google-fonts',
        'fontawesome',
        'better-nav-css',
        'scroll-to-top',
        'wp-pagenavi' // Adicionado pois você mencionou que o Google listou pagenavi
    );

    if (in_array($handle, $non_critical_styles)) {
        return '<link rel="stylesheet" id="' . $handle . '-css" href="' . $src . '" type="text/css" media="print" onload="this.media=\'all\'; this.onload=null;">' . "\n";
    }

    return $tag;
}
add_filter('style_loader_tag', 'union_defer_non_critical_css', 10, 3);

/**
 * Filtro global para adicionar 'defer' a todos os scripts enfileirados no front-end,
 * eliminando scripts bloqueantes.
 */
function union_defer_all_scripts($tag, $handle, $src) {
    if (is_admin()) {
        return $tag;
    }

    // Lista de handles de scripts cruciais que NÃO devem ser diferidos (defer)
    // para evitar quebras em scripts inline síncronos acoplados (como o wp-i18n e jQuery)
    $excluded_handles = array(
        'jquery',
        'jquery-core',
        'jquery-migrate',
        'wp-i18n'
    );

    if (in_array($handle, $excluded_handles)) {
        return $tag;
    }

    // Evita aplicar a scripts inline que não possuam atributo src
    if (strpos($tag, ' src=') === false) {
        return $tag;
    }

    if (strpos($tag, 'defer') === false && strpos($tag, 'async') === false) {
        return str_replace(' src=', ' defer src=', $tag);
    }

    return $tag;
}
add_filter('script_loader_tag', 'union_defer_all_scripts', 10, 3);

/**
 * Remover scripts e estilos desnecessários (Cleanup)
 */
function union_cleanup_assets() {
    // Remove estilos do editor de blocos (Gutenberg) que não usamos no front
    wp_dequeue_style('wp-block-library');
    wp_dequeue_style('wp-block-library-theme');
    wp_dequeue_style('wc-block-style'); // WooCommerce (se houver)
    wp_dequeue_style('global-styles'); // Variáveis CSS globais do WP
    wp_dequeue_style('classic-theme-styles'); // Estilos de temas clássicos do WP
}
add_action('wp_enqueue_scripts', 'union_cleanup_assets', 100);

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

// Requere a funcionalidade de ordenação de posts no admin
// require get_template_directory() . '/inc/admin-sort-posts.php';

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
	if ( is_admin() || ! $query->is_main_query() ) {
		return $query;
	}
	
	if ( $query->is_search ) {
		$query->set( 'post_type', array( 'post', 'apresentacoes' ) );
	}
	
	return $query;
}
add_filter( 'pre_get_posts', 'include_cpt_search' );



add_action('admin_init', function () {
	// Redirect any user trying to access comments page
	global $pagenow;
 
	if ($pagenow === 'edit-comments.php') {
			wp_redirect(admin_url());
			exit;
	}

	// Remove comments metabox from dashboard
	remove_meta_box('dashboard_recent_comments', 'dashboard', 'normal');

	// Disable support for comments and trackbacks in post types
	foreach (get_post_types() as $post_type) {
			if (post_type_supports($post_type, 'comments')) {
					remove_post_type_support($post_type, 'comments');
					remove_post_type_support($post_type, 'trackbacks');
			}
	}
});

// Close comments on the front-end
add_filter('comments_open', '__return_false', 20, 2);
add_filter('pings_open', '__return_false', 20, 2);

// Hide existing comments
add_filter('comments_array', '__return_empty_array', 10, 2);

// Remove comments page in menu
add_action('admin_menu', function () {
	remove_menu_page('edit-comments.php');
});

// Remove comments links from admin bar
add_action('init', function () {
	if (is_admin_bar_showing()) {
			remove_action('admin_bar_menu', 'wp_admin_bar_comments_menu', 60);
	}
});

add_action('wp_before_admin_bar_render', function() {
	global $wp_admin_bar;
	$wp_admin_bar->remove_menu('comments');
});


// Script temporário para criar os menus em Inglês - Pode ser removido após rodar uma vez
function union_create_en_menus() {
    if (get_option('union_menus_en_created')) return;

    $menus = array(
        'Main Home EN' => array(
            'Home' => home_url('/home/'),
            'Solutions' => '#solucoes',
            'Articles' => '#artigos',
            'Projects' => '#projetos',
            'Company' => '#topo',
            'Contact' => '#contato'
        ),
        'Main Interno EN' => array(
            'Home' => home_url('/home/'),
            'Solutions' => home_url('/home/#solucoes'),
            'Articles' => home_url('/articles/'),
            'Projects' => home_url('/projects/'),
            'Company' => home_url('/company/'),
            'Contact' => home_url('/home/#contato')
        ),
        'Footer Home EN' => array(
            'Home' => home_url('/home/'),
            'Solutions' => '#solucoes',
            'Articles' => '#artigos',
            'Projects' => '#projetos'
        ),
        'Footer Interno EN' => array(
            'Home' => home_url('/home/'),
            'Solutions' => home_url('/home/#solucoes'),
            'Articles' => home_url('/articles/'),
            'Projects' => home_url('/projects/')
        )
    );

    foreach ($menus as $menu_name => $items) {
        $menu_id = wp_create_nav_menu($menu_name);
        if (!is_wp_error($menu_id)) {
            foreach ($items as $title => $url) {
                wp_update_nav_menu_item($menu_id, 0, array(
                    'menu-item-title' => $title,
                    'menu-item-url' => $url,
                    'menu-item-status' => 'publish',
                    'menu-item-type' => 'custom'
                ));
            }
        }
    }

    update_option('union_menus_en_created', true);
}
add_action('init', 'union_create_en_menus');

/**
 * Redirecionamento amigável e seguro de sitemap.xml para wp-sitemap.xml
 */
function union_sitemap_redirect() {
    if (isset($_SERVER['REQUEST_URI'])) {
        $home_path = parse_url(home_url(), PHP_URL_PATH);
        $request_path = parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH);
        
        // Normaliza o caminho relativo (funciona em subpastas como /union/)
        $relative_path = $request_path;
        if ($home_path && strpos($request_path, $home_path) === 0) {
            $relative_path = substr($request_path, strlen($home_path));
        }
        
        if (trim($relative_path, '/') === 'sitemap.xml') {
            wp_redirect(home_url('wp-sitemap.xml'), 301);
            exit;
        }
    }
}
add_action('template_redirect', 'union_sitemap_redirect');

/**
 * Remove a tagline (descrição/slogan) do título gerado automaticamente pelo WordPress
 */
function union_remove_tagline_from_title($title_parts) {
    if (isset($title_parts['tagline'])) {
        unset($title_parts['tagline']);
    }
    return $title_parts;
}
add_filter('document_title_parts', 'union_remove_tagline_from_title');
?>