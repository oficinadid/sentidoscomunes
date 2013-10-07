<?
add_theme_support( 'post-thumbnails' );

/* big image */
add_image_size('1280', 1280, 9999, false); // big
add_image_size('1000', 1000, 9999, false); // big


/* thumbs edicion */
add_image_size('640x430', 640, 430, true); // big
add_image_size('640x215', 640, 215, true); // med horizontal
add_image_size('320x430', 320, 430, true); // med vertical
add_image_size('320x320', 320, 320, true); // med vertical
add_image_size('320x215', 320, 215, true); // small

/* thumb noticia home */
add_image_size('640x320', 640, 320, true); // med vertical


function arphabet_widgets_init() {

	register_sidebar( array(
		'name' => 'Main Sidebar',
		'id' => 'main-sidebar',
		'before_widget' => '<div class="widget">',
		'after_widget' => '</div>',
		'before_title' => '<h3>',
		'after_title' => '</h3>',
	) );

	register_sidebar( array(
		'name' => 'Posts Sidebar',
		'id' => 'posts-sidebar',
		'before_widget' => '<div class="widget">',
		'after_widget' => '</div>',
		'before_title' => '<h3>',
		'after_title' => '</h3>',
	) );

	register_sidebar( array(
		'name' => 'Page Sidebar',
		'id' => 'page-sidebar',
		'before_widget' => '<div class="widget">',
		'after_widget' => '</div>',
		'before_title' => '<h3>',
		'after_title' => '</h3>',
	) );
}
add_action( 'widgets_init', 'arphabet_widgets_init' );

register_nav_menu( 'primary', 'Main Menu' );