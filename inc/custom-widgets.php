<?php

// Função de registro dos Widgets
function union_widgets() {

	// Widget Formulário de Contato
	register_sidebar(
		array(
			'name' => 'Formulário Contato',
			'id' => 'form-contato',
			'description' => 'Formulário de Contato Sessão Contato',
			'before_widget' => '',
			'after_widget' => '',
			'before-title' => '',
			'after-title' => ''
		)
	);

}