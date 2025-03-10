<?php

/**
 * Hiring post type function.
 * 
 * @package Prodesp
 * @return void
 */

add_action('init', 'hiring_post_type_init');

function hiring_post_type_init()
{

  $labels = [
    'name'                  => _x('Fluxo de contratações', 'Post type general name', 'Prodesp'),
    'singular_name'         => _x('Fluxo de contratação', 'Post type singular name', 'Prodesp'),
    'menu_name'             => _x('Fluxo de contratações', 'Admin Menu text', 'Prodesp'),
    'name_admin_bar'        => _x('Fluxo de contratações', 'Add New on Toolbar', 'Prodesp'),
    'add_new'               => __('Adicionar novo', 'Prodesp'),
    'add_new_item'          => __('Adicionar novo fluxo de contratações', 'Prodesp'),
    'new_item'              => __('Novo fluxo de contratações', 'Prodesp'),
    'edit_item'             => __('Editar fluxo de contratações', 'Prodesp'),
    'view_item'             => __('Ver fluxo de contratações', 'Prodesp'),
    'all_items'             => __('Todos os fluxo de contratações', 'Prodesp'),
    'search_items'          => __('Buscar fluxo de contratações', 'Prodesp'),
    'parent_item_colon'     => __('Pai fluxo de contratações:', 'Prodesp'),
    'not_found'             => __('Nenhum fluxo de contratações encontrado.', 'Prodesp'),
    'not_found_in_trash'    => __('Nenhum Prodesp fluxo de contratações encontrado na Lixeira.', 'Prodesp'),
    'featured_image'        => _x('Imagem do fluxo de contratações', 'Overrides the “Featured Image” phrase for this post type. Added in 4.3', 'Prodesp'),
    'set_featured_image'    => _x('Definir a imagem do fluxo de contratações', 'Overrides the “Set featured image” phrase for this post type. Added in 4.3', 'Prodesp'),
    'remove_featured_image' => _x('Remover imagem', 'Overrides the “Remove featured image” phrase for this post type. Added in 4.3', 'Prodesp'),
    'use_featured_image'    => _x('Usar uma imagem', 'Overrides the “Use as featured image” phrase for this post type. Added in 4.3', 'Prodesp'),
    'archives'              => _x('Arquivos de fluxo de contratações', 'Prodesp'),
    'insert_into_item'      => _x('Inserir no fluxo de contratações', 'Prodesp'),
    'uploaded_to_this_item' => _x('Carregar para esses fluxo de contratações', 'Prodesp'),
    'filter_items_list'     => _x('Filtrar lista de fluxo de contratações', 'Prodesp'),
    'items_list_navigation' => _x('Navegação da lista de fluxo de contratações', 'Prodesp'),
    'items_list'            => _x('Lista de fluxo de contratações', '', 'Prodesp')
  ];

  $args = [
    'labels'             => $labels,
    'public'             => false,
    'publicly_queryable' => true,
    'show_ui'            => true,
    'show_in_menu'       => true,
    'show_in_rest'       => true,
    'query_var'          => true,
    'rewrite'            => false,
    'capability_type'    => 'post',
    'has_archive'        => true,
    'hierarchical'       => true,
    'menu_position'      => 30,
    'menu_icon'          => 'dashicons-networking',
    'supports'           => ['title', 'editor']
  ];

  register_post_type('hiring', $args);
}
