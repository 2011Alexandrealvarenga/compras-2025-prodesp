<?php 
function criar_post_type_logistica() {
	$args = array(
			'labels' => array(
					'name'               => 'logistica',
					'singular_name'      => 'Logística',
					'add_new'            => 'Adicionar Novo',
					'add_new_item'       => 'Adicionar Novo Post de Logística',
					'edit_item'          => 'Editar Post de Logística',
					'new_item'           => 'Novo Post de Logística',
					'all_items'          => 'Todos os Posts de Logística',
					'view_item'          => 'Ver Post de Logística',
					'search_items'       => 'Buscar Posts de Logística',
					'not_found'          => 'Nenhum Post de Logística encontrado',
					'not_found_in_trash' => 'Nenhum Post de Logística encontrado na lixeira',
					'menu_name'          => 'Logística',
			),
			'public' => true,
			'has_archive' => true,
			'show_in_rest' => true, 
			'supports' => array('title', 'editor', 'thumbnail', 'custom-fields'),
			'menu_icon' => 'dashicons-location', 
			'rewrite' => array('slug' => 'logistica'), 
	);
	register_post_type('logistica', $args);
}
add_action('init', 'criar_post_type_logistica');

function adicionar_campos_personalizados_logistica() {
	add_meta_box(
			'video_logistica',            
			'Vídeo Logística',
			'campo_video_logistica_html', 
			'logistica',                  
			'normal',                     
			'default'                     
	);
}
add_action('add_meta_boxes', 'adicionar_campos_personalizados_logistica');

function campo_video_logistica_html($post) {
	wp_nonce_field('video_logistica_nonce', 'video_logistica_nonce_field');
	
	$video_url = get_post_meta($post->ID, '_video_logistica', true);

	echo '<label for="video_logistica">URL do Vídeo (YouTube):</label>';
	echo '<input type="text" id="video_logistica" name="video_logistica" value="' . esc_attr($video_url) . '" size="25" />';
}

function salvar_video_logistica($post_id) {
	if (!isset($_POST['video_logistica_nonce_field']) || !wp_verify_nonce($_POST['video_logistica_nonce_field'], 'video_logistica_nonce')) {
			return;
	}

	if (isset($_POST['video_logistica'])) {
			update_post_meta($post_id, '_video_logistica', sanitize_text_field($_POST['video_logistica']));
	}
}
add_action('save_post', 'salvar_video_logistica');
