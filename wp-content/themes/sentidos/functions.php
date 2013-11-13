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


/*  Enqueue javascript
/* ------------------------------------ */ 
function sc_scripts()  
{
    wp_enqueue_script( 'hoverIntent', true );
    wp_enqueue_script( 'waypoints', get_template_directory_uri() . '/inc/js/waypoints.min.js', array( 'jquery' ),'', true );

    // waypoints_sticky
    if (in_category('2944')) {
    	wp_enqueue_script( 'waypoints_sticky', get_template_directory_uri() . '/inc/js/waypoints-sticky.min.js', array( 'jquery', 'waypoints' ),'', true );
    }
    wp_enqueue_script( 'functions', get_template_directory_uri() . '/inc/js/functions.min.js', array( 'jquery' ),'', true ); 
     
    // if ( is_singular() && get_option( 'thread_comments' ) ) { wp_enqueue_script( 'comment-reply' ); }
}  
add_action( 'wp_enqueue_scripts', 'sc_scripts' );  


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