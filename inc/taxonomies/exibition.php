<?php

/**
 * Undocumented exbition taxonomy function
 *
 * @package Prodesp
 * @return void
 */

add_action('init',  'exibition_taxonomy_init', 0);

function exibition_taxonomy_init()
{
  $labels = [
    'name'                       => _x('Exibições', 'taxonomy general name', 'Prodesp'),
    'singular_name'              => _x('Exibição', 'taxonomy singular name', 'Prodesp'),
    'search_items'               => __('Buscar exibições', 'Prodesp'),
    'popular_items'              => __('Exibições populares', 'Prodesp'),
    'all_items'                  => __('Todas exibições', 'Prodesp'),
    'parent_item'                => null,
    'parent_item_colon'          => null,
    'edit_item'                  => __('Editar exibição', 'Prodesp'),
    'update_item'                => __('Atualizar exibição', 'Prodesp'),
    'add_new_item'               => __('Adicionar nova exibição', 'Prodesp'),
    'new_item_name'              => __('Nome da nova exibição', 'Prodesp'),
    'separate_items_with_commas' => __('Separar exibições por vírgula', 'Prodesp'),
    'add_or_remove_items'        => __('Adicionar ou remover exibições', 'Prodesp'),
    'choose_from_most_used'      => __('Escolha entre a exibição mais usada', 'Prodesp'),
    'not_found'                  => __('Nenhuma Exibição encontrada.', 'Prodesp'),
    'menu_name'                  => __('Exibições', 'Prodesp')
  ];

  $args = [
    'labels'            => $labels,
    'hierarchical'      => true,
    'show_in_nav_menus' => true,
    'show_in_rest'      => true,
    'show_admin_column' => true,
    'query_var'         => true,
    'rewrite'           => true
  ];

  register_taxonomy('exibition', 'hiring', $args);
}
