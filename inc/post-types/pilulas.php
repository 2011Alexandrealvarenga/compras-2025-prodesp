<?php 

function criar_pill_post_type() {
	$args = array(
			'labels' => array(
					'name' => 'Pílulas',
					'singular_name' => 'Pílula',
					'add_new' => 'Adicionar Nova',
					'add_new_item' => 'Adicionar nova Pílula',
					'edit_item' => 'Editar Pílula',
					'new_item' => 'Nova Pílula',
					'view_item' => 'Ver Pílula',
					'search_items' => 'Pesquisar Pílulas',
					'not_found' => 'Nenhuma Pílula encontrada',
					'not_found_in_trash' => 'Nenhuma Pílula encontrada na lixeira',
					'parent_item_colon' => '',
					'menu_name' => 'Pílulas'
			),
			'public' => true,
			'has_archive' => true,
			'supports' => array('title', 'editor', 'thumbnail', 'custom-fields'),
			'menu_icon' => 'dashicons-format-video', 
			'rewrite' => array('slug' => 'pilulas'),
			'show_in_rest' => true, 
	);
	register_post_type('pilulas', $args);
}
add_action('init', 'criar_pill_post_type');

// function adicionar_campos_pilulas() {
// 	add_meta_box(
// 			'duracao_pilula', // ID do campo
// 			'Duração da Pílula', // Título
// 			'campo_duracao_callback', // Função de callback
// 			'pilulas', // Tipo de post
// 			'side', // Localização (sidebar)
// 			'default' // Prioridade
// 	);
// }

function campo_duracao_callback($post) {
	wp_nonce_field(basename(__FILE__), 'duracao_nonce');
	$duracao = get_post_meta($post->ID, '_duracao', true); 

	echo '<label for="duracao">Duração (em minutos):</label>';
	echo '<input type="number" id="duracao" name="duracao" value="' . esc_attr($duracao) . '" />';
}

// function salvar_duracao_pilula($post_id) {
// 	// Verifica a segurança
// 	if (!isset($_POST['duracao_nonce']) || !wp_verify_nonce($_POST['duracao_nonce'], basename(__FILE__))) {
// 			return $post_id;
// 	}

// 	// Verifica se é um autosave
// 	if (defined('DOING_AUTOSAVE') && DOING_AUTOSAVE) {
// 			return $post_id;
// 	}

// 	// Verifica se o campo está presente
// 	if (isset($_POST['duracao'])) {
// 			update_post_meta($post_id, '_duracao', sanitize_text_field($_POST['duracao']));
// 	}
// }
// add_action('add_meta_boxes', 'adicionar_campos_pilulas');
// add_action('save_post', 'salvar_duracao_pilula');

function adicionar_campo_video_pilula() {
	add_meta_box(
			'video_pilula',
			'Link do Vídeo do YouTube', 
			'campo_video_callback', 
			'pilulas', 
			'side', 
			'default' 
	);
}

function campo_video_callback($post) {
	wp_nonce_field(basename(__FILE__), 'video_nonce'); 
	$video_url = get_post_meta($post->ID, '_video_url', true);

	echo '<label for="video_url">URL do Vídeo (YouTube):</label>';
	echo '<input type="url" id="video_url" name="video_url" value="' . esc_attr($video_url) . '" placeholder="https://www.youtube.com/watch?v=ID"/>';
}

function salvar_video_pilula($post_id) {
	if (!isset($_POST['video_nonce']) || !wp_verify_nonce($_POST['video_nonce'], basename(__FILE__))) {
			return $post_id;
	}

	if (defined('DOING_AUTOSAVE') && DOING_AUTOSAVE) {
			return $post_id;
	}

	if (isset($_POST['video_url'])) {
			update_post_meta($post_id, '_video_url', sanitize_text_field($_POST['video_url']));
	}
}
add_action('add_meta_boxes', 'adicionar_campo_video_pilula');
add_action('save_post', 'salvar_video_pilula');

