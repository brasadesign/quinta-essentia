<?php
    $prefix = 'agenda_';
    $meta_box = array(
		'id' => 'my-meta-box',
		'title' => 'Informa&ccedil;&otilde;es do Evento',
		'page' => 'eventos',
		'context' => 'side',
		'priority' => 'default',
		'fields' => array(
			array(
			'name' => 'Data do Evento',
			'desc' => 'Adicione a data do evento',
			'id' => 'agenda-event-date',
			'type' => 'text',
			'std' => ''
			),

			array(
			'name' => 'Hor&aacute;rio',
			'desc' => 'Adicione o hor&aacute;rio do evento',
			'id' => $prefix . 'horario_inic',
			'type' => 'text',
			'std' => ''
			),
			

			array(
			'name' => 'Endere&ccedil;o',
			'desc' => 'Adicione o endere&ccedil;o do evento',
			'id' => $prefix . 'endereco',
			'type' => 'text',
			'std' => ''
			),
						
		)
    );
	
add_action('add_meta_boxes', 'mytheme_add_box');
   
// Adiciona o MetaBox
function mytheme_add_box() {
    global $meta_box;
    add_meta_box(
		$meta_box['id'],
		$meta_box['title'], 
		'mytheme_show_box',
		$meta_box['page'],
		$meta_box['context'],
		$meta_box['priority']);
	
	if (isset($post)){
		$date = (get_post_meta( $post->ID, 'agenda-event-date', true ));

		if( $date != '' ){
			$date = strtotime($date );	
		}
	}
}
	
	
// Callback function to show fields in meta box
function mytheme_show_box($post) {
	wp_nonce_field( 'mytheme_meta_box', 'mytheme_meta_box_nonce' );
	/////////////////////////////
    if(get_post_type($post->ID) != 'eventos'){
    	return;
	}
	// Inicia a tabela
	global $meta_box;
	
	// echo '<pre>';
	// print_r($meta_box);
	// echo '</pre>';

	echo '<table class="agenda-table">';
    foreach ($meta_box['fields'] as $field) {
    // get current post meta data
		if (get_post_meta($post->ID, $field['id'], true)){
			if ($field['id']== 'agenda-event-date'){
				$meta = get_post_meta($post->ID, $field['id'], true);
				$meta = date('d/m/Y', intval($meta));
			}
			else{
				$meta = get_post_meta($post->ID, $field['id'], true);
			}
		}
		else{
			$meta='';
		}
		
	// Inicia o tr
	echo '<tr>',
    '<th style="width:20%"><label for="', $field['id'], '">', $field['name'], '</label></th></tr>',
    '<td>';
    switch ($field['type']) {
    case 'text':
    echo '<input type="text" name="', $field['id'], '" id="', $field['id'], '" value="', $meta ? $meta : $field['std'], '" size="30" style="width:97%" />', '<br />', '<span class="agenda-table-desc">', $field['desc'], '</span>';
    break;
    case 'textarea':
    echo '<textarea name="', $field['id'], '" id="', $field['id'], '" cols="60" rows="4" style="width:97%">', $meta ? $meta : $field['std'], '</textarea>', '<br />', $field['desc'];
    break;
    case 'select':
    echo '<select name="', $field['id'], '" id="', $field['id'], '">';
    foreach ($field['options'] as $option) {
    echo '<option ', $meta == $option ? ' selected="selected"' : '', '>', $option, '</option>';
    }
    echo '</select>';
    break;
    case 'radio':
    foreach ($field['options'] as $option) {
    echo '<input type="radio" name="', $field['id'], '" value="', $option['value'], '"', $meta == $option['value'] ? ' checked="checked"' : '', ' />', $option['name'];
    }
    break;
    case 'checkbox':
    echo '<input type="checkbox" name="', $field['id'], '" id="', $field['id'], '"', $meta ? ' checked="checked"' : '', ' />';
    break;
    }
    echo '</td>',
    '</tr>';
    }
    // Fecha a tabela
	echo '</table>';
}
	
	
add_action('save_post', 'mytheme_save_data');
    // Save data from meta box
function mytheme_save_data($post_id) {
    // Check if our nonce is set.
	if ( ! isset( $_POST['mytheme_meta_box_nonce'] ) ) {
		return;
	}
	if ( ! wp_verify_nonce( $_POST['mytheme_meta_box_nonce'], 'mytheme_meta_box' ) ) {
		return;
	}
	global $meta_box;
	// verify nonce
    // Verify that the nonce is valid.
	
    // Checa se AutoSave est� ativo e o ignora
    if (defined('DOING_AUTOSAVE') && DOING_AUTOSAVE) {
    return $post_id;
    }
    // Checa as Permiss�es do Usu�rio
    if ('page' == $_POST['post_type']) {
    if (!current_user_can('edit_page', $post_id)) {
    return $post_id;
    }
    } elseif (!current_user_can('edit_post', $post_id)) {
    return $post_id;
    }
    
	foreach ($meta_box['fields'] as $field) {
		if ($field['id'] == 'agenda-event-date'){
			$new = explode('/',$_POST[$field['id']]);
			$new = array_reverse($new);
			$new = implode('-',$new);
			$new = strtotime($new);
		    
		}
		else{
			$new = $_POST[$field['id']];
		    
		}
    $old = get_post_meta($post_id, $field['id'], true);
    if ($new && $new != $old) {
    update_post_meta($post_id, $field['id'], $new);
    } elseif ('' == $new && $old) {
    delete_post_meta($post_id, $field['id'], $old);
    }
    }
    }
	

 /**
 * Adiciona os devidos jQuery DatePicker para a Agenda.
 */
function agenda_events_jquery_datepicker() {

	// Carregar jQuery
	wp_enqueue_script ('jquery-ui-datepicker');
	wp_enqueue_style ('jquery estilo', 'http://ajax.googleapis.com/ajax/libs/jqueryui/1.8.2/themes/smoothness/jquery-ui.css');
 
	wp_enqueue_script(
		// Tradu��o do DatePicker
		'agenda-datepicker',
		get_bloginfo('stylesheet_directory') . '/agenda/datepicker/agenda-datepicker.js',
		array('jquery', 'jquery-ui-datepicker')
	);
	
	// wp_enqueue_script(
	// 		'valida-datepicker',
	// 		get_bloginfo('stylesheet_directory') . '/agenda/datepicker/valida-datepicker.js',
	// 		array('jquery')
	// 	);
}
add_action('admin_print_scripts-post-new.php', 'agenda_events_jquery_datepicker');
add_action('admin_print_scripts-post.php', 'agenda_events_jquery_datepicker');

 /**
 * Adiciona o CSS para o jQuery DatePicker da Agenda e demais estilos
 */
function agenda_events_jquery_datepicker_css() {
	wp_enqueue_style(
		'jquery-ui-datepicker',
		get_bloginfo('stylesheet_directory') . '/agenda/datepicker/css/smoothness/jquery-ui-1.8.11.custom.css'
	);
	
	wp_enqueue_style(
		'estilo-agenda',
		get_bloginfo('stylesheet_directory') . '/agenda/estilo-agenda.css'
	);
	
}
add_action('admin_print_styles-post-new.php', 'agenda_events_jquery_datepicker_css');
add_action('admin_print_styles-post.php', 'agenda_events_jquery_datepicker_css');

?>