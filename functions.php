<?php

//
// ---- https://codex.wordpress.org/TinyMCE_Custom_Styles
//
// Callback function to insert 'styleselect' into the $buttons array
function my_mce_buttons_2( $buttons ) {
	array_unshift( $buttons, 'styleselect' );
	return $buttons;
}
// Register our callback to the appropriate filter
add_filter( 'mce_buttons_2', 'my_mce_buttons_2' );


// Callback function to filter the MCE settings
function my_mce_before_init_insert_formats( $init_array ) {  
	// Define the style_formats array
	$style_formats = array(  
		// Each array child is a format with it's own settings
		array(  
			'title' => 'Typo Gold',  
			'inline' => 'span',  
			'classes' => 'gold-color'
		),  
		array(  
			'title' => 'Typo Weiss',  
			'inline' => 'span',  
			'classes' => 'white-color'
		),
		array(  
			'title' => 'Typo Schwarz',  
			'inline' => 'span',  
			'classes' => 'black-color'
		),
		array(  
			'title' => 'Button Schwarz',  
			'inline' => 'span',  
			'classes' => 'btn-black'
		),
		array(  
			'title' => 'Button Grau',  
			'inline' => 'span',  
			'classes' => 'btn-grey'
		)
	);  
	// Insert the array, JSON ENCODED, into 'style_formats'
	$init_array['style_formats'] = json_encode( $style_formats );  
	
	return $init_array;  
  
} 
// Attach callback to 'tiny_mce_before_init' 
add_filter( 'tiny_mce_before_init', 'my_mce_before_init_insert_formats' ); 


/**
 * Registers an editor stylesheet for the theme.
 */
function wpdocs_theme_add_editor_styles() {
    add_editor_style( );
}
add_action( 'admin_init', 'wpdocs_theme_add_editor_styles' );

?>