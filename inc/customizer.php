<?php

function union_customize ( $wp_customize ){

	// DADOS DA EMPRESA
	$wp_customize->add_section(
		'sec_dados_empresa', array(
			'title' => 'Dados da Empresa',
			'description' => 'Customização dos dados da empresa'
		)
  );

  // LOGO DA PÁGINA HOME
  $wp_customize->add_setting(
    'set_imagem_logo_home', array(
      'type' => 'theme_mod',
      'default' => '',
      'capability' => 'edit_theme_options',
    )
  );

  $wp_customize->add_control(
    new WP_Customize_Image_Control( $wp_customize,
      'set_imagem_logo_home', array(
      'label' => 'Logo da Empresa página home',
      'section' => 'sec_dados_empresa',
      'settings' => 'set_imagem_logo_home',
    ))
  );

  // LOGO DAS PÁGINAS INTERNAS
  $wp_customize->add_setting(
    'set_imagem_logo_interna', array(
      'type' => 'theme_mod',
      'default' => '',
      'capability' => 'edit_theme_options',
    )
  );

  $wp_customize->add_control(
    new WP_Customize_Image_Control( $wp_customize,
      'set_imagem_logo_interna', array(
      'label' => 'Logo da Empresa páginas internas',
      'section' => 'sec_dados_empresa',
      'settings' => 'set_imagem_logo_interna',
    ))
  );

  // TÍTULO DA PÁGINA HOME
  $wp_customize->add_setting(
    'set_titulo_home', array(
      'type' => 'theme_mod',
      'default' => 'Aqui entra o título da página home',
      'sanitize_callback' => 'wp_filter_nohtml_kses'
    )
  );

  $wp_customize->add_control(
    'set_titulo_home', array(
      'label' => 'Titulo Página Home',
      'description' => 'Título que entra na página home',
      'section' => 'sec_dados_empresa',
      'type' => 'text'
    )
  );

  // TEXTO DA PÁGINA HOME
  $wp_customize->add_setting(
    'set_texto_empresa', array(
      'type' => 'theme_mod',
      'default' => 'Aqui entra o texto resumo que fala sobre a empresa na página home',
      'sanitize_callback' => 'sanitize_text'
    )
  );

  function sanitize_text( $input ) {
    $allowed_html = array(
      'br' => array(),
    );
 
    return wp_kses( $input, $allowed_html );
 }

  $wp_customize->add_control(
    'set_texto_empresa', array(
      'label' => 'Texto Empresa',
      'description' => 'Texto institucional sobre a empresa',
      'section' => 'sec_dados_empresa',
      'type' => 'textarea'
    )
  );

}

add_action( 'customize_register', 'union_customize' );
  
