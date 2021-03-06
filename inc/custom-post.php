<?php
/////////////CPT secao
add_action( 'init', 'secoes_cpt' );
function secoes_cpt() {
	$labels = array(                        
		'name'               => 'Seções',
		'singular_name'      => 'Seção ',
		'menu_name'          => 'Seções ',
		'name_admin_bar'     => ' Seção',
		'add_new'            => 'Adicionar Nova ',
		'add_new_item'       => 'Adicionar Nova Seção',
		'new_item'           => 'Nova Seção ' ,
		'edit_item'          => 'Editar Seção ',
		'view_item'          => 'Ver todas' ,
		'all_items'          => 'Todas' ,
		'search_items'       => 'Buscar',
		'parent_item_colon'  => 'Pai' ,
		'not_found'          => 'Nenhuma encontrado' ,
		'not_found_in_trash' => 'Nenhuma encontrado na lixeira' ,
	);

	$args = array(
		'labels'             => $labels,
		'public'             => true,
		'publicly_queryable' => true,
		'show_ui'            => true,
		'show_in_menu'       => true,
		'query_var'          => true,
		'rewrite'            => array( 'slug' => 'secao' ),
		'capability_type'    => 'post',
		'has_archive'        => true,
		'hierarchical'       => false,
		'menu_position'      => null,
		'menu_icon' => 'dashicons-format-gallery',
		'supports'           => array( 'title', 'editor', 'thumbnail', 'excerpt' )
	);

	register_post_type( 'secao', $args );
}
/////////////CPT Equipe
add_action( 'init', 'equipe_cpt' );

function equipe_cpt() {
	$labels = array(                        
		'name'               => 'Pessoas',
		'singular_name'      => 'Pessoa ',
		'menu_name'          => 'Equipe ',
		'name_admin_bar'     => 'Pessoa',
		'add_new'            => 'Adicionar Nova ',
		'add_new_item'       => 'Adicionar Nova Pessoa',
		'new_item'           => 'Nova Pessoa ' ,
		'edit_item'          => 'Editar Pessoa ',
		'view_item'          => 'Ver todas' ,
		'all_items'          => 'Todas' ,
		'search_items'       => 'Buscar',
		'parent_item_colon'  => 'Pai' ,
		'not_found'          => 'Nenhuma encontrado' ,
		'not_found_in_trash' => 'Nenhuma encontrado na lixeira' ,
	);

	$args = array(
		'labels'             => $labels,
		'public'             => true,
		'publicly_queryable' => true,
		'show_ui'            => true,
		'show_in_menu'       => true,
		'query_var'          => true,
		'rewrite'            => array( 'slug' => 'equipe' ),
		'capability_type'    => 'post',
		'has_archive'        => true,
		'hierarchical'       => false,
		'menu_position'      => null,
		'menu_icon' => 'dashicons-groups',
		'supports'           => array( 'title', 'editor', 'thumbnail' )
	);

	register_post_type( 'equipe', $args );
}
/////////////////////////////////////////

	/////////////CPT Flautas
	// add_action( 'init', 'flauta_cpt' );
	// 
	// 	function flauta_cpt() {
	// 		$labels = array(                        
	// 			'name'               => 'flautas',
	// 			'singular_name'      => 'Flauta',
	// 			'menu_name'          => 'Flautas',
	// 			'name_admin_bar'     => 'Flauta',
	// 			'add_new'            => 'Adicionar Nova',
	// 			'add_new_item'       => 'Adicionar Nova Flauta',
	// 			'new_item'           => 'Nova Flauta' ,
	// 			'edit_item'          => 'Editar Flauta',
	// 			'view_item'          => 'Ver todas' ,
	// 			'all_items'          => 'Todas' ,
	// 			'search_items'       => 'Buscar',
	// 			'parent_item_colon'  => 'Pai' ,
	// 			'not_found'          => 'Nenhuma encontrado' ,
	// 			'not_found_in_trash' => 'Nenhuma encontrado na lixeira' ,
	// 		);
	// 
	// 		$args = array(
	// 			'labels'             => $labels,
	// 			'public'             => true,
	// 			'publicly_queryable' => true,
	// 			'show_ui'            => true,
	// 			'show_in_menu'       => true,
	// 			'query_var'          => true,
	// 			'rewrite'            => array( 'slug' => 'flauta' ),
	// 			'capability_type'    => 'post',
	// 			'has_archive'        => true,
	// 			'hierarchical'       => false,
	// 			'menu_position'      => null,
	// 			'menu_icon' => 'dashicons-format-audio',
	// 			'supports'           => array( 'title', 'editor', 'thumbnail' )
	// 		);
	// 
	// 		register_post_type( 'flauta', $args );
	// 	}
	/////////////////////////////////////////
	
	/////////////CPT Projetos
	add_action( 'init', 'projeto_cpt' );

	function projeto_cpt() {
		$labels = array(                        
			'name'               => 'projetos',
			'singular_name'      => 'Projeto',
			'menu_name'          => 'Projetos',
			'name_admin_bar'     => 'Projeto',
			'add_new'            => 'Adicionar Novo',
			'add_new_item'       => 'Adicionar Novo Projeto',
			'new_item'           => 'Novo Projeto' ,
			'edit_item'          => 'Editar Projeto',
			'view_item'          => 'Ver todos' ,
			'all_items'          => 'Todos' ,
			'search_items'       => 'Buscar',
			'parent_item_colon'  => 'Pai' ,
			'not_found'          => 'Nenhum encontrado' ,
			'not_found_in_trash' => 'Nenhum encontrado na lixeira' ,
		);

		$args = array(
			'labels'             => $labels,
			'public'             => true,
			'publicly_queryable' => true,
			'show_ui'            => true,
			'show_in_menu'       => true,
			'query_var'          => true,
			'rewrite'            => array( 'slug' => 'projeto' ),
			'capability_type'    => 'post',
			'has_archive'        => true,
			'hierarchical'       => false,
			'menu_position'      => null,
			'menu_icon' => 'dashicons-playlist-video',
			'supports'           => array( 'title', 'editor', 'thumbnail' )
		);

		register_post_type( 'projeto', $args );
	}
	/////////////////////////////////////////

	/////////////CPT Mídia
	add_action( 'init', 'midia_cpt' );

	function midia_cpt() {
		$labels = array(                        
			'name'               => 'midias',
			'singular_name'      => 'Mídia',
			'menu_name'          => 'Mídias',
			'name_admin_bar'     => 'Mídia',
			'add_new'            => 'Adicionar Nova',
			'add_new_item'       => 'Adicionar Nova Mídia',
			'new_item'           => 'Nova Mídia' ,
			'edit_item'          => 'Editar Mídia',
			'view_item'          => 'Ver todas' ,
			'all_items'          => 'Todas' ,
			'search_items'       => 'Buscar',
			'parent_item_colon'  => 'Pai' ,
			'not_found'          => 'Nenhuma encontrado' ,
			'not_found_in_trash' => 'Nenhuma encontrado na lixeira' ,
		);

		$args = array(
			'labels'             => $labels,
			'public'             => true,
			'publicly_queryable' => true,
			'show_ui'            => true,
			'show_in_menu'       => true,
			'query_var'          => true,
			'rewrite'            => array( 'slug' => 'midia' ),
			'capability_type'    => 'post',
			'has_archive'        => true,
			'hierarchical'       => false,
			'menu_position'      => null,
			'menu_icon' => 'dashicons-format-audio',
			'supports'           => array( 'title', 'editor', 'thumbnail' )
		);

		register_post_type( 'midia', $args );
	}
	/////////////////////////////////////////
	
	
	
	/////////////CPT Discos
	add_action( 'init', 'disco_cpt' );

	function disco_cpt() {
		$labels = array(                        
			'name'               => 'discos',
			'singular_name'      => 'Disco',
			'menu_name'          => 'Discos',
			'name_admin_bar'     => 'Disco',
			'add_new'            => 'Adicionar Novo',
			'add_new_item'       => 'Adicionar Novo Disco',
			'new_item'           => 'Novo Disco' ,
			'edit_item'          => 'Editar Disco',
			'view_item'          => 'Ver todos' ,
			'all_items'          => 'Todos' ,
			'search_items'       => 'Buscar',
			'parent_item_colon'  => 'Pai' ,
			'not_found'          => 'Nenhum encontrado' ,
			'not_found_in_trash' => 'Nenhum encontrado na lixeira' ,
		);

		$args = array(
			'labels'             => $labels,
			'public'             => true,
			'publicly_queryable' => true,
			'show_ui'            => true,
			'show_in_menu'       => true,
			'query_var'          => true,
			'rewrite'            => array( 'slug' => 'disco' ),
			'capability_type'    => 'post',
			'has_archive'        => true,
			'hierarchical'       => false,
			'menu_position'      => null,
			'menu_icon' => 'dashicons-album',
			'supports'           => array( 'title', 'editor', 'thumbnail' )
		);

		register_post_type( 'disco', $args );
	}
	/////////////////////////////////////////
if ( ! function_exists( 'custom_tax_categoria' ) ) {

// Register Custom Taxonomy
function custom_tax_categoria() {

	$labels = array(
		'name'                       => _x( 'Categorias', 'Taxonomy General Name', 'odin' ),
		'singular_name'              => _x( 'Categoria', 'Taxonomy Singular Name', 'odin' ),
		'menu_name'                  => __( 'Categorias', 'odin' ),
		'all_items'                  => __( 'Todas Categorias', 'odin' ),
		'parent_item'                => __( 'Categoria Parente', 'odin' ),
		'parent_item_colon'          => __( 'Categoria Parente:', 'odin' ),
		'new_item_name'              => __( 'Adicionar nova Categoria', 'odin' ),
		'add_new_item'               => __( 'Adicionar nova Categoria', 'odin' ),
		'edit_item'                  => __( 'Editar categoria', 'odin' ),
		'update_item'                => __( 'Atualizar categoria', 'odin' ),
		'view_item'                  => __( 'Ver Categoria', 'odin' ),
		'separate_items_with_commas' => __( 'Categorias separadas por virgula', 'odin' ),
		'add_or_remove_items'        => __( 'Adicionar ou remover categorias', 'odin' ),
		'choose_from_most_used'      => __( 'Escolha pelos mais usados', 'odin' ),
		'popular_items'              => __( 'Categorias populares', 'odin' ),
		'search_items'               => __( 'Buscar Categoria', 'odin' ),
		'not_found'                  => __( 'Não encontrado', 'odin' ),
	);
	$args = array(
		'labels'                     => $labels,
		'hierarchical'               => true,
		'public'                     => true,
		'show_ui'                    => true,
		'show_admin_column'          => true,
		'show_in_nav_menus'          => true,
		'show_tagcloud'              => true,
	);
	register_taxonomy( 'categoria', array( 'midia' ), $args );

}

// Hook into the 'init' action
add_action( 'init', 'custom_tax_categoria', 0 );

}