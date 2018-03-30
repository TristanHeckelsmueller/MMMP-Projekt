<?php

function myhob_files() {
  wp_enqueue_style('myhob_main_style',  get_stylesheet_uri(), NULL, microtime());
  wp_enqueue_script('googleMap', '//maps.googleapis.com/maps/api/js?key=AIzaSyD5RpyAt1-2-ZFmJut9Ju5Awvf0WnS6RsI', NULL, '1.0', true);
  wp_enqueue_style('font-awesome', '/wp-content/themes/intermediale/assets/styles/font-awesome/css/font-awesome.min.css', Null, microtime());
  wp_enqueue_script('myhob_ham', get_theme_file_uri( '/assets/scripts/App.js'), NULL, '1.0', true);

}
add_action('wp_enqueue_scripts', 'myhob_files');




function myhob_features(){
  add_theme_support('title-tag');
}
add_action('after_setup_theme', 'myhob_features');


// Advanced Custom fields
if(function_exists("register_field_group"))
{
  register_field_group(array (
  		'id' => 'acf_2nd-content',
  		'title' => '2nd Content',
  		'fields' => array (
  			array (
  				'key' => 'field_5abe2c40de76d',
  				'label' => '2nd Content',
  				'name' => '2nd_content',
  				'type' => 'wysiwyg',
  				'default_value' => '',
  				'toolbar' => 'full',
  				'media_upload' => 'yes',
  			),
  			array (
  				'key' => 'field_5abe35a44a0ba',
  				'label' => '2nd Content Image',
  				'name' => '2nd_content_image',
  				'type' => 'image',
  				'save_format' => 'url',
  				'preview_size' => 'thumbnail',
  				'library' => 'all',
  			),
  		),
  		'location' => array (
  			array (
  				array (
  					'param' => 'post_type',
  					'operator' => '==',
  					'value' => 'interaktive-medien',
  					'order_no' => 0,
  					'group_no' => 0,
  				),
  			),
  		),
  		'options' => array (
  			'position' => 'normal',
  			'layout' => 'no_box',
  			'hide_on_screen' => array (
  			),
  		),
  		'menu_order' => 0,
  	));
  register_field_group(array (
  		'id' => 'acf_3rd-content',
  		'title' => '3rd Content',
  		'fields' => array (
  			array (
  				'key' => 'field_5abe2c7f6daf6',
  				'label' => '3rd Content',
  				'name' => '3rd_content',
  				'type' => 'wysiwyg',
  				'default_value' => '',
  				'toolbar' => 'full',
  				'media_upload' => 'yes',
  			),
  			array (
  				'key' => 'field_5abe367af36bc',
  				'label' => '3rd Content Image',
  				'name' => '3rd_content_image',
  				'type' => 'image',
  				'save_format' => 'url',
  				'preview_size' => 'thumbnail',
  				'library' => 'all',
  			),
  		),
  		'location' => array (
  			array (
  				array (
  					'param' => 'post_type',
  					'operator' => '==',
  					'value' => 'interaktive-medien',
  					'order_no' => 0,
  					'group_no' => 0,
  				),
  			),
  		),
  		'options' => array (
  			'position' => 'normal',
  			'layout' => 'no_box',
  			'hide_on_screen' => array (
  			),
  		),
  		'menu_order' => 0,
  	));

	register_field_group(array (
		'id' => 'acf_content-image',
		'title' => 'Content Image',
		'fields' => array (
			array (
				'key' => 'field_5abe378114d4f',
				'label' => 'Content Image',
				'name' => 'content_image',
				'type' => 'image',
				'save_format' => 'url',
				'preview_size' => 'thumbnail',
				'library' => 'all',
			),
		),
		'location' => array (
			array (
				array (
					'param' => 'post_type',
					'operator' => '==',
					'value' => 'interaktive-medien',
					'order_no' => 0,
					'group_no' => 0,
				),
			),
		),
		'options' => array (
			'position' => 'normal',
			'layout' => 'no_box',
			'hide_on_screen' => array (
			),
		),
		'menu_order' => 0,
	));
	register_field_group(array (
		'id' => 'acf_post-images',
		'title' => 'post-images',
		'fields' => array (
			array (
				'key' => 'field_5aba62f937a56',
				'label' => 'Post Image',
				'name' => 'post_image',
				'type' => 'image',
				'instructions' => 'Lade hier das passende Bild hoch.',
				'required' => 1,
				'save_format' => 'url',
				'preview_size' => 'thumbnail',
				'library' => 'all',
			),
		),
		'location' => array (
			array (
				array (
					'param' => 'post_type',
					'operator' => '==',
					'value' => 'interaktive-medien',
					'order_no' => 0,
					'group_no' => 0,
				),
			),
		),
		'options' => array (
			'position' => 'normal',
			'layout' => 'no_box',
			'hide_on_screen' => array (
			),
		),
		'menu_order' => 0,
	));
}



function myhobMapKey($api){
  $api[key] ='AIzaSyD5RpyAt1-2-ZFmJut9Ju5Awvf0WnS6RsI';
  return $api;
}

add_filter('acf/fields/google_map/api', 'myhobMapKey');

function myhob_adjust_queries($query){
  if (!is_admin() AND is_post_type_archive('program') AND $query->is_main_query()) {
    $query->set('orderby', 'title');
    $query->set('order', 'ASC');
    $query->set('posts_per_page', -1);
  }
}

add_action('pre_get_posts', 'myhob_adjust_queries');


add_action('wp_loaded', 'noSubsAdminBar');

function noSubsAdminBar(){
  $ourCurrentUser = wp_get_current_user();

  if (count($ourCurrentUser->roles) == 1 AND $ourCurrentUser->roles[0] == 'subscriber') {
    show_admin_bar(false);
  }
}

// Customize Login Screen

add_filter('login_headerurl', 'ourHeaderUrl');

function ourHeaderUrl(){
  return esc_url(site_url('/'));
}

add_action('login_enqueue_scripts', 'ourLoginCSS');

function ourLoginCSS(){
  wp_enqueue_style('myhob_main_style',  get_stylesheet_uri(), NULL, microtime());
}


// Admin Bar ausblenden
show_admin_bar(false);



function add_svg_to_upload_mimes($upload_mimes)
	{
	$upload_mimes['svg'] = 'image/svg+xml';
	$upload_mimes['svgz'] = 'image/svg+xml';
	return $upload_mimes;
	}
add_filter('upload_mimes', 'add_svg_to_upload_mimes');

define('ALLOW_UNFILTERED_UPLOADS', true);

?>
