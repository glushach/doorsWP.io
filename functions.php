<?php
add_action('wp_footer', 'addScripts');
add_action('wp_enqueue_scripts', 'addStyles');
add_theme_support('custom-logo');


function addScripts(){
  wp_deregister_script('jquery-core');
  wp_register_script('jquery-core', get_template_directory_uri() .
  '/assets/js/jquery-3.5.1.min.js');
  wp_enqueue_script('jquery');

  wp_enqueue_script('bootstrap-js', get_template_directory_uri() .
  '/assets/js/bootstrap.min.js');
}

function addStyles(){
  wp_enqueue_style('style?1', get_stylesheet_uri());
}
/*Добавление разделов дверей*/
add_action('init', 'dveri_custom_post_type');
function dveri_custom_post_type(){
	register_taxonomy('category_door', array('doors'), array(
		'label'                 => 'Категории', // определяется параметром $labels->name
		'labels'                => array(
			'name'              => 'Категории',
			'singular_name'     => 'Категория',
			'search_items'      => 'Искать Категории',
			'all_items'         => 'Все Категории',
			'parent_item'       => 'Родит. категория',
			'parent_item_colon' => 'Родит. категория:',
			'edit_item'         => 'Ред. Категория',
			'update_item'       => 'Обновить Категории',
			'add_new_item'      => 'Добавить Категорию',
			'new_item_name'     => 'Новая категория',
			'menu_name'         => 'Категория',
		),
		'description'           => 'Рубрики для категорий', // описание таксономии
		'public'                => true,
		'show_in_nav_menus'     => false, // равен аргументу public
		'show_ui'               => true, // равен аргументу public
		'show_tagcloud'         => false, // равен аргументу show_ui
		'hierarchical'          => true,
		'rewrite'               => array('slug'=>'doors', 'hierarchical'=>false, 'with_front'=>false, 'feed'=>false ),
		'show_admin_column'     => true, // Позволить или нет авто-создание колонки таксономии в таблице ассоциированного типа записи. (с версии 3.5)
  ) );
  
	register_post_type('doors', array(
		'labels'             => array(
			'name'               => 'Двери', // Основное название типа записи
			'singular_name'      => 'Дверь', // отдельное название записи типа Book
			'add_new'            => 'Добавить новую',
			'add_new_item'       => 'Добавить новую дверь',
			'edit_item'          => 'Редактировать дверь',
			'new_item'           => 'Новая дверь',
			'view_item'          => 'Посмотреть дверь',
			'search_items'       => 'Найти дверь',
			'not_found'          =>  'Дверей не найдено',
			'not_found_in_trash' => 'В корзине дверей не найдено',
			'parent_item_colon'  => '',
			'menu_name'          => 'Двери'

		  ),
		'public'             => true,
		'publicly_queryable' => true,
		'show_ui'            => true,
		'show_in_menu'       => true,
		'query_var'          => true,
		'rewrite'            => true,
		'capability_type'    => 'post',
		'has_archive'        => true,
		'hierarchical'       => false,
    'menu_position'      => null,
    'menu_icon'          => 'dashicons-welcome-add-page',
		'supports'           => array('title','editor')
	) );
}
?>