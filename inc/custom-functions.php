<?php
function convertToDate($parametro)
{
    $newDate = date('d/m/Y', strtotime($parametro));
    return $newDate;
}

/**
 * SEO & Social Meta Tags
 */
function union_seo_meta_tags()
{
    $site_name = get_bloginfo('name');
    $site_description = get_bloginfo('description');

    if (is_front_page()) {
        $description = $site_description;
        $title = $site_name;
        $url = home_url();
    } elseif (is_singular()) {
        global $post;
        $description = get_the_excerpt($post);
        if (empty($description)) {
            $description = wp_trim_words($post->post_content, 25);
        }
        $title = get_the_title();
        $url = get_permalink();
    } else {
        $description = $site_description;
        $title = wp_get_document_title();
        $url = (isset($_SERVER['HTTPS']) && $_SERVER['HTTPS'] === 'on' ? "https" : "http") . "://$_SERVER[HTTP_HOST]$_SERVER[REQUEST_URI]";
    }

    $description = wp_strip_all_tags($description);

    // Standard Meta
    echo '    <meta name="description" content="' . esc_attr($description) . '">' . "\n";

    // Canonical
    echo '    <link rel="canonical" href="' . esc_url($url) . '">' . "\n";

    // Geolocalization
    echo '    <meta name="geo.region" content="BR-RJ">' . "\n";
    echo '    <meta name="geo.placename" content="Rio de Janeiro">' . "\n";
    echo '    <meta name="geo.position" content="-22.9068;-43.1729">' . "\n";
    echo '    <meta name="ICBM" content="-22.9068, -43.1729">' . "\n";

    // Facebook Open Graph
    echo '    <meta property="og:locale" content="pt_BR">' . "\n";
    echo '    <meta property="og:type" content="' . (is_front_page() ? 'website' : 'article') . '">' . "\n";
    echo '    <meta property="og:title" content="' . esc_attr($title) . '">' . "\n";
    echo '    <meta property="og:description" content="' . esc_attr($description) . '">' . "\n";
    echo '    <meta property="og:url" content="' . esc_url($url) . '">' . "\n";
    echo '    <meta property="og:site_name" content="' . esc_attr($site_name) . '">' . "\n";

    if (is_singular() && has_post_thumbnail()) {
        echo '    <meta property="og:image" content="' . get_the_post_thumbnail_url(get_the_ID(), 'full') . '">' . "\n";
    } else {
        // Imagem padrão para a Home e outras páginas sem imagem destacada
        echo '    <meta property="og:image" content="' . get_template_directory_uri() . '/assets/img/og-image.png">' . "\n";
    }

    // Twitter Card
    echo '    <meta name="twitter:card" content="summary_large_image">' . "\n";
    echo '    <meta name="twitter:title" content="' . esc_attr($title) . '">' . "\n";
    echo '    <meta name="twitter:description" content="' . esc_attr($description) . '">' . "\n";
    if (is_singular() && has_post_thumbnail()) {
        echo '    <meta name="twitter:image" content="' . get_the_post_thumbnail_url(get_the_ID(), 'full') . '">' . "\n";
    } else {
        echo '    <meta name="twitter:image" content="' . get_template_directory_uri() . '/assets/img/og-image.png">' . "\n";
    }
}

/**
 * Register Strings for Polylang
 */
if (function_exists('pll_register_string')) {
    add_action('after_setup_theme', function () {
        // Home Strings
        pll_register_string('Union Theme', 'Sobre a empresa', 'Home');
        pll_register_string('Union Theme', 'Soluções e Tecnologias', 'Home');
        pll_register_string('Union Theme', 'Artigos', 'Home');
        pll_register_string('Union Theme', 'Apresentações em Eventos', 'Home');
        pll_register_string('Union Theme', 'Projetos', 'Home');
        pll_register_string('Union Theme', 'Parceiros', 'Home');
        pll_register_string('Union Theme', 'Contato', 'Home');

        // Home Otimizada para SEO/GEO
        pll_register_string('Union Theme', 'Soluções em Telecomunicações e Telemática Industrial', 'Home');
        pll_register_string('Union Theme', 'Artigos Técnicos e Tendências em Telecom', 'Home');
        pll_register_string('Union Theme', 'Apresentações Técnicas e Debates do Setor', 'Home');
        pll_register_string('Union Theme', 'Projetos de Telecomunicações e Infraestrutura de Rede', 'Home');
        pll_register_string('Union Theme', 'Parceiros de Tecnologia e Engenharia', 'Home');
        pll_register_string('Union Theme', 'Fale com Nossos Especialistas em Telemática', 'Home');
        pll_register_string('Union Theme', 'Todos os Artigos', 'Buttons');
        pll_register_string('Union Theme', 'Todas as Apresentações', 'Buttons');
        pll_register_string('Union Theme', 'Todos os Projetos', 'Buttons');
        pll_register_string('Union Theme', 'apresentacoes', 'URL Slugs');
        pll_register_string('Union Theme', 'empresa', 'URL Slugs');
        pll_register_string('Union Theme', 'Ler', 'Buttons');
        pll_register_string('Union Theme', 'Pesquisar', 'Search');
        pll_register_string('Union Theme', 'Nada encontrado ainda ...', 'General');
        pll_register_string('Union Theme', 'Resultado da busca para:', 'Search');

        // Footer Strings
        pll_register_string('Union Theme', 'Conteúdo da Página', 'Footer');
        pll_register_string('Union Theme', 'Union Engenharia de Telemática - Copyright © 2021 - Todos os direitos reservados', 'Footer');

        // Single Strings
        pll_register_string('Union Theme', 'Últimos Artigos', 'Single Sidebar');
        pll_register_string('Union Theme', 'Últimos Projetos', 'Single Sidebar');
        pll_register_string('Union Theme', 'Parceiros', 'Single Sidebar');
        pll_register_string('Union Theme', 'Últimas Apresentações', 'Single Sidebar');

        // Search and Archives
        pll_register_string('Union Theme', 'Resultados', 'Search');
        pll_register_string('Union Theme', 'Nenhum item encontrado!', 'Search');
        pll_register_string('Union Theme', 'Resultados para:', 'Archive');
        pll_register_string('Union Theme', 'Nenhum item encontrado com a TAG selecionada!', 'Archive');

        // 404 Page
        pll_register_string('Union Theme', 'Erro 404', '404');
        pll_register_string('Union Theme', 'Página não encontrada. Por favor, verifique o endereço digitado.', '404');

        // Search Form
        pll_register_string('Union Theme', 'Pesquisar ...', 'Search');
        pll_register_string('Union Theme', 'Voltar ao topo', 'Acessibilidade');
        pll_register_string('Union Theme', 'Alternar navegação', 'Acessibilidade');

        // Search Results
        pll_register_string('Union Theme', 'Resultado da busca para:', 'Search');

        // Customizer Strings (Dynamic)
        pll_register_string('Union Theme', get_theme_mod('set_titulo_home'), 'Customizer Home');
        pll_register_string('Union Theme', get_theme_mod('set_texto_empresa'), 'Customizer Home');
    });
}

/**
 * Helper to get the correct category slug based on current language
 */
function union_get_cat_slug($base_slug)
{
    if (!function_exists('pll_current_language'))
        return $base_slug;

    $lang = pll_current_language();

    // Mapeamento simples de slugs PT -> EN
    $mapping = array(
        'artigos' => ($lang == 'en' ? 'papers' : 'artigos'),
        'projetos' => ($lang == 'en' ? 'projects' : 'projetos'),
        'parceiros' => ($lang == 'en' ? 'partners' : 'parceiros'),
    );

    return isset($mapping[$base_slug]) ? $mapping[$base_slug] : $base_slug;
}

/**
 * Helper to get translated string
 */
function union_get_string($string)
{
    if (function_exists('pll__')) {
        return pll__($string);
    }
    return $string;
}

function union_the_string($string)
{
    if (function_exists('pll_e')) {
        pll_e($string);
    } else {
        echo $string;
    }
}

/**
 * Injeta Schemas JSON-LD dinâmicos para Artigos (Article) e Apresentações (TechArticle)
 */
function union_inject_dynamic_schemas() {
    if (is_singular('post') || is_singular('apresentacoes')) {
        global $post;
        
        $title = get_the_title();
        $excerpt = get_the_excerpt();
        if (empty($excerpt)) {
            $excerpt = wp_trim_words($post->post_content, 25);
        }
        $excerpt = wp_strip_all_tags($excerpt);
        
        $published_date = get_the_date('c');
        $modified_date = get_the_modified_date('c');
        $author = get_the_author();
        if (empty($author)) {
            $author = "Union Engenharia";
        }
        
        $image = get_the_post_thumbnail_url(get_the_ID(), 'full');
        if (empty($image)) {
            $image = get_template_directory_uri() . '/assets/img/og-image.png';
        }
        
        // Define o tipo de Schema (Article para posts comuns e TechArticle para apresentações/artigos técnicos)
        $schema_type = is_singular('apresentacoes') ? 'TechArticle' : 'Article';
        
        $schema = array(
            "@context" => "https://schema.org",
            "@type" => $schema_type,
            "headline" => esc_attr($title),
            "description" => esc_attr($excerpt),
            "image" => esc_url($image),
            "datePublished" => $published_date,
            "dateModified" => $modified_date,
            "author" => array(
                "@type" => "Organization",
                "name" => esc_attr($author),
                "url" => home_url()
            ),
            "publisher" => array(
                "@type" => "Organization",
                "name" => "Union Engenharia de Telemática",
                "logo" => array(
                    "@type" => "ImageObject",
                    "url" => get_theme_mod('set_imagem_logo_home') ? esc_url(get_theme_mod('set_imagem_logo_home')) : get_template_directory_uri() . '/assets/img/logoUnionBranca.png'
                )
            ),
            "mainEntityOfPage" => array(
                "@type" => "WebPage",
                "@id" => get_permalink()
            )
        );
        
        echo "\n" . '<!-- Dynamic ' . $schema_type . ' Schema JSON-LD -->' . "\n";
        echo '<script type="application/ld+json">' . "\n";
        echo json_encode($schema, JSON_UNESCAPED_SLASHES | JSON_UNESCAPED_UNICODE | JSON_PRETTY_PRINT) . "\n";
        echo '</script>' . "\n";
    }
}
add_action('wp_head', 'union_inject_dynamic_schemas');

/**
 * Injeta o Schema LocalBusiness dinâmico no head, com o catálogo de serviços (Service CPT 'solucoes') dinâmico
 */
function union_inject_localbusiness_schema() {
    // Carrega as soluções cadastradas para o idioma atual para preencher o catálogo de serviços
    $services_args = array(
        'post_type'      => 'solucoes',
        'posts_per_page' => 12,
        'orderby'        => 'title',
        'order'          => 'ASC',
        'lang'           => function_exists('pll_current_language') ? pll_current_language() : ''
    );
    
    $services_query = new WP_Query($services_args);
    $services_list = array();
    
    if ($services_query->have_posts()) {
        while ($services_query->have_posts()) {
            $services_query->the_post();
            
            // Tenta pegar o resumo do post (excerpt) ou o metadado union-txtSolucaoBack
            $description = get_the_excerpt();
            if (empty($description)) {
                $description = rwmb_meta('union-txtSolucaoBack');
                if (empty($description)) {
                    $description = wp_trim_words(get_the_content(), 20);
                }
            }
            $description = wp_strip_all_tags($description);
            
            $services_list[] = array(
                "@type" => "Offer",
                "itemOffered" => array(
                    "@type" => "Service",
                    "name" => get_the_title(),
                    "description" => esc_attr($description),
                    "serviceType" => "Telecomunicações e Telemática",
                    "areaServed" => array(
                        "@type" => "Country",
                        "name" => "BR"
                    )
                )
            );
        }
        wp_reset_postdata();
    }
    
    // Se o catálogo estiver vazio, usamos fallbacks para não quebrar a estrutura semântica
    if (empty($services_list)) {
        $services_list = array(
            array(
                "@type" => "Offer",
                "itemOffered" => array(
                    "@type" => "Service",
                    "name" => "Soluções em Telecomunicações e Telemática",
                    "description" => "Projetos, consultoria e implantação de infraestruturas de rede de alto desempenho.",
                    "serviceType" => "Telecomunicações e Telemática",
                    "areaServed" => array(
                        "@type" => "Country",
                        "name" => "BR"
                    )
                )
            )
        );
    }
    
    $logo_home = get_theme_mod('set_imagem_logo_home');
    if (empty($logo_home)) {
        $logo_home = get_template_directory_uri() . '/assets/img/logoUnionBranca.png';
    }

    $schema = array(
        "@context" => "https://schema.org",
        "@type" => "LocalBusiness",
        "name" => "Union Engenharia de Telemática",
        "image" => esc_url($logo_home),
        "@id" => esc_url(home_url('/')),
        "url" => esc_url(home_url('/')),
        "telephone" => "+552134313802",
        "address" => array(
            "@type" => "PostalAddress",
            "streetAddress" => "Av das Américas 3434, 211 bl 4",
            "addressLocality" => "Rio de Janeiro",
            "addressRegion" => "RJ",
            "postalCode" => "22640-102",
            "addressCountry" => "BR"
        ),
        "geo" => array(
            "@type" => "GeoCoordinates",
            "latitude" => -22.997993,
            "longitude" => -43.348273
        ),
        "openingHoursSpecification" => array(
            "@type" => "OpeningHoursSpecification",
            "dayOfWeek" => array(
                "Monday", "Tuesday", "Wednesday", "Thursday", "Friday"
            ),
            "opens" => "09:00",
            "closes" => "18:00"
        ),
        "sameAs" => array(
            "https://www.facebook.com/unionengenharia",
            "https://www.linkedin.com/company/union-engenharia-de-telematica/"
        ),
        "hasOfferCatalog" => array(
            "@type" => "OfferCatalog",
            "name" => function_exists('pll_current_language') && pll_current_language() == 'en' ? "Telematics and Telecommunications Services" : "Serviços de Telemática e Telecomunicações",
            "itemListElement" => $services_list
        )
    );
    
    echo "\n" . '<!-- Dynamic LocalBusiness with Services Catalog Schema JSON-LD -->' . "\n";
    echo '<script type="application/ld+json">' . "\n";
    echo json_encode($schema, JSON_UNESCAPED_SLASHES | JSON_UNESCAPED_UNICODE | JSON_PRETTY_PRINT) . "\n";
    echo '</script>' . "\n";
}
add_action('wp_head', 'union_inject_localbusiness_schema');
?>