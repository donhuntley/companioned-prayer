<?php


function theme_styles() {

	wp_enqueue_style( 'bootstrap_css', get_template_directory_uri() . '/css/bootstrap.min.css' );
	wp_enqueue_style( 'main_css', get_template_directory_uri() . '/style.css' );
	wp_enqueue_style( 'theme-google-fonts', 'https://fonts.googleapis.com/css?family=Slabo+27px|Open+Sans:400,400italic,600,700' );

}
add_action( 'wp_enqueue_scripts', 'theme_styles' );


function theme_js() {

	global $wp_scripts;

	wp_register_script( 'html5_shiv', 'https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js', '', '', false );
	wp_register_script( 'respond_js', 'https://oss.maxcdn.com/respond/1.4.2/respond.min.js', '', '', false );

	$wp_scripts->add_data( 'html5_shiv', 'conditional', 'lt IE 9' );
	$wp_scripts->add_data( 'respond_js', 'conditional', 'lt IE 9' );

	wp_enqueue_script( 'bootstrap_js', get_template_directory_uri() . '/js/bootstrap.min.js', array ('jquery'), '', true );
	wp_enqueue_script( 'theme_js', get_template_directory_uri() . '/js/theme.js', array ('jquery'), '', true );
	wp_enqueue_script( 'ie10_viewport_fix', get_template_directory_uri() . '/js/ie10-viewport-bug-workaround.js', array('jquery'), '', true );


}
add_action( 'wp_enqueue_scripts', 'theme_js' );

add_action('wp_enqueue_scripts', function(){
    wp_dequeue_style('bootstrap_css');
    wp_dequeue_script('bootstrap_js');
});

//add_filter( 'show_admin_bar', '__return_false' );

add_theme_support( 'menus' );

function register_theme_menus() {
	register_nav_menus(
		array(
			'header-menu'	=> __( 'Header Menu' )
		)
	);
}
add_action( 'init', 'register_theme_menus' );

function create_widget( $name, $id, $description ) {

	register_sidebar(array(
		'name' => __( $name ),	 
		'id' => $id, 
		'description' => __( $description ),
		'before_widget' => '<div class="widget">',
		'after_widget' => '</div>',
		'before_title' => '<h3>',
		'after_title' => '</h3>'
	));

}

create_widget( 'Front Page Left', 'front-left', 'Displays on the left of the homepage' );
create_widget( 'Front Page Center', 'front-center', 'Displays in the center of the homepage' );
create_widget( 'Front Page Right', 'front-right', 'Displays on the right of the homepage' );

create_widget( 'Header Left', 'header-left', 'Displays on the left of the header' );
create_widget( 'Header Center', 'header-center', 'Displays in the center of the header' );
create_widget( 'Header Right', 'header-right', 'Displays on the right of header' );

create_widget( 'Page Sidebar', 'page-with-sidebar', 'Displays on the side of pages with a sidebar' );






?>