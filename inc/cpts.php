<?php

  // 1. https://generatewp.com/
	// - Registrar os CTPs (https://generatewp.com/post-type/)
	// - Registrar no argumento supports quais meta boxex padrão irão aparecer
	// - Registrar as Taxonomias (https://generatewp.com/taxonomy/)
	// - Obs.: Cuidado com os slugs dos CTPs e suas respectivas Taxonomias
	// 2. Site para criação de Metabox: https://metabox.io/
	// - Instalar Plugin Meta Box
	// - Ir no Gerador online do Meta Box (link dentro do plugin)
	// - Criar os campos personalizados de cada um dos CTPs
	// - Copiar a parte do array de cada campo ou caso precise abrir uma nova metabox,
	// - Copiar também o array relativo a metabox nova
	// - Registrar todos os campos de uma única vez
	// - Validar os campos (https://docs.metabox.io/validation/)
	// - Incluir logo abaixo dos campos de cada metabox os arrays Validation e Messages

// Registra CTP Soluções
function union_solucoes() {

	$labels = array(
		'name'                  => _x( 'Soluções', 'Post Type General Name', 'union' ),
		'singular_name'         => _x( 'Solução', 'Post Type Singular Name', 'union' ),
		'menu_name'             => __( 'Soluções', 'union' ),
		'name_admin_bar'        => __( 'Solução', 'union' ),
		'archives'              => __( 'Arquivos do Item', 'union' ),
		'attributes'            => __( 'Atributos do Item', 'union' ),
		'parent_item_colon'     => __( 'Item Pai:', 'union' ),
		'all_items'             => __( 'Todos os Items', 'union' ),
		'add_new_item'          => __( 'Adicionar Novo Texto', 'union' ),
		'add_new'               => __( 'Adicionar Novo', 'union' ),
		'new_item'              => __( 'Novo Item', 'union' ),
		'edit_item'             => __( 'Editar Item', 'union' ),
		'update_item'           => __( 'Atualizar Item', 'union' ),
		'view_item'             => __( 'Ver Item', 'union' ),
		'view_items'            => __( 'Ver Itens', 'union' ),
		'search_items'          => __( 'Procurar Item', 'union' ),
		'not_found'             => __( 'Não encontrado', 'union' ),
		'not_found_in_trash'    => __( 'Não encontrado na Lixeira', 'union' ),
		'featured_image'        => __( 'Imagem Destacada', 'union' ),
		'set_featured_image'    => __( 'Configurar imagem destacada', 'union' ),
		'remove_featured_image' => __( 'Remover imagem destacada', 'union' ),
		'use_featured_image'    => __( 'Usar como imagem destacada', 'union' ),
		'insert_into_item'      => __( 'Inserir no item', 'union' ),
		'uploaded_to_this_item' => __( 'Enviado para este item', 'union' ),
		'items_list'            => __( 'Lista do item', 'union' ),
		'items_list_navigation' => __( 'Navegação de lista dos itens', 'union' ),
		'filter_items_list'     => __( 'Filtrar lista de itens', 'union' ),
  );
  
	$args = array(
		'label'                 => __( 'Soluções', 'union' ),
		'description'           => __( 'Informações sobre as soluções', 'union' ),
		'labels'                => $labels,
		'supports'              => array( 'title', 'thumbnail'),
		'taxonomies'            => array( '' ),
		'hierarchical'          => false,
		'public'                => true,
		'show_ui'               => true,
		'show_in_menu'          => true,
		'menu_position'         => 5,
		'show_in_admin_bar'     => true,
		'show_in_nav_menus'     => true,
		'can_export'            => true,
		'has_archive'           => true,
		'exclude_from_search'   => false,
		'publicly_queryable'    => true,
		'capability_type'       => 'post',
	);
	register_post_type( 'solucoes', $args );

}

add_action( 'init', 'union_solucoes', 0 );

// Registra CTP Apresentações
function union_apresentacoes() {

	$labels = array(
		'name'                  => _x( 'Apresentações', 'Post Type General Name', 'union' ),
		'singular_name'         => _x( 'Apresentação', 'Post Type Singular Name', 'union' ),
		'menu_name'             => __( 'Apresentações', 'union' ),
		'name_admin_bar'        => __( 'Apresentação', 'union' ),
		'archives'              => __( 'Arquivos do Item', 'union' ),
		'attributes'            => __( 'Atributos do Item', 'union' ),
		'parent_item_colon'     => __( 'Item Pai:', 'union' ),
		'all_items'             => __( 'Todos os Items', 'union' ),
		'add_new_item'          => __( 'Adicionar Novo Texto', 'union' ),
		'add_new'               => __( 'Adicionar Novo', 'union' ),
		'new_item'              => __( 'Novo Item', 'union' ),
		'edit_item'             => __( 'Editar Item', 'union' ),
		'update_item'           => __( 'Atualizar Item', 'union' ),
		'view_item'             => __( 'Ver Item', 'union' ),
		'view_items'            => __( 'Ver Itens', 'union' ),
		'search_items'          => __( 'Procurar Item', 'union' ),
		'not_found'             => __( 'Não encontrado', 'union' ),
		'not_found_in_trash'    => __( 'Não encontrado na Lixeira', 'union' ),
		'featured_image'        => __( 'Imagem Destacada', 'union' ),
		'set_featured_image'    => __( 'Configurar imagem destacada', 'union' ),
		'remove_featured_image' => __( 'Remover imagem destacada', 'union' ),
		'use_featured_image'    => __( 'Usar como imagem destacada', 'union' ),
		'insert_into_item'      => __( 'Inserir no item', 'union' ),
		'uploaded_to_this_item' => __( 'Enviado para este item', 'union' ),
		'items_list'            => __( 'Lista do item', 'union' ),
		'items_list_navigation' => __( 'Navegação de lista dos itens', 'union' ),
		'filter_items_list'     => __( 'Filtrar lista de itens', 'union' ),
  );
  
	$args = array(
		'label'                 => __( 'Apresentações', 'union' ),
		'description'           => __( 'Informações sobre o evento', 'union' ),
		'labels'                => $labels,
		'supports'              => array( 'title', 'editor', 'excerpt', 'thumbnail'),
		'taxonomies'            => array( 'post_tag' ),
		'hierarchical'          => false,
		'public'                => true,
		'show_ui'               => true,
		'show_in_menu'          => true,
		'menu_position'         => 5,
		'show_in_admin_bar'     => true,
		'show_in_nav_menus'     => true,
		'can_export'            => true,
		'has_archive'           => true,
		'exclude_from_search'   => false,
		'publicly_queryable'    => true,
		'capability_type'       => 'post',
	);
	register_post_type( 'apresentacoes', $args );

}

add_action( 'init', 'union_apresentacoes', 0 );


// Registra campos personalizados
function union_get_meta_box( $meta_boxes ) {
	$prefix = 'union-';

	// Meta boxe do text area das Soluções
	$meta_boxes[] = array(
		'id' => 'solucoes',
		'title' => esc_html__( 'Informações sobre a solucao', 'union' ),
		'post_types' => array( 'solucoes' ),
		'context' => 'after_title',
		'priority' => 'default',
		'autosave' => 'true',
		'fields' => array(
			array(
				'id' => $prefix . 'txtSolucao',
				'type' => 'textarea',
				'name' => esc_html__( 'Texto sobre a solução', 'union' ),
				'placeholder' => esc_html__( 'Digite o texto da solução', 'union' ),
				'rows' => 5,
				'cols' => 1,
			),
			array(
				'id' => $prefix . 'txtSolucaoBack',
				'type' => 'textarea',
				'name' => esc_html__( 'Texto do verso sobre a solução', 'union' ),
				'placeholder' => esc_html__( 'Digite o texto do verso da solução', 'union' ),
				'rows' => 5,
				'cols' => 1,
			),
		),

    // Regras de validação do text area das Soluções
    'validation' => array( 
      'rules'  => array(
            'union-txtSolucao' => array(
                'required'  => true,
                'maxlength' => 700,
          ),
					'union-txtSolucaoBack' => array(
						'required'  => true,
						'maxlength' => 700,
					),
      ), 

    // Mensagens de erro do text area das Soluções
      'messages'  => array(
        'union-txtSolucao' => array(
            'required'  => 'O texto da solução é obrigatório',
            'maxlength' => 'Tamanho máximo é de 700 caracteres',
        ),
				'union-txtSolucaoBack' => array(
					'required'  => 'O texto do verso da solução é obrigatório',
					'maxlength' => 'Tamanho máximo é de 700 caracteres',
				),
      )

		)

  );

	// Meta boxe do campo do Nome do Evento
	$meta_boxes[] = array(
		'id' => 'apreseventos',
		'title' => esc_html__( 'Informações sobre o evento', 'union' ),
		'post_types' => array( 'apresentacoes' ),
		'context' => 'after_title',
		'priority' => 'default',
		'autosave' => 'true',
		'fields' => array(
			array(
				'id' => $prefix . 'nomeEvento',
				'type' => 'text',
        'name' => esc_html__( 'Nome do Evento', 'union' ),
        'size' => 80,
				'placeholder' => esc_html__( 'Digite o nome do evento', 'union' ),
      ),
      array(
				'id' => $prefix . 'dataEvento',
        'type' => 'date',
				'name' => esc_html__( 'Data do evento', 'union' ),
			),
		),

    // Regras de validação dos campos de Apresentações em Eventos
    'validation' => array( 
      'rules'  => array(
            'union-nomeEvento' => array(
                'required'  => true,
                'maxlength' => 80,
          ),
          'union-dataEvento' => array(
            'required'  => true,
          ),
      ), 

    // Mensagens de erro da validação dos campos das Apresentações em Eventos
      'messages'  => array(
        'union-nomeEvento' => array(
            'required'  => 'O nome do evento é obrigatório',
            'maxlength' => 'Tamanho máximo é de 80 caracteres',
        ),
        'union-dataEvento' => array(
          'required'  => 'A data do evento é obrigatória',
        ),
      )

		)

  );
  
	return $meta_boxes;
}
add_filter( 'rwmb_meta_boxes', 'union_get_meta_box' );