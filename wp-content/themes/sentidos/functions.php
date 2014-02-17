<?
add_theme_support( 'post-thumbnails' );

/* big image */
add_image_size('1280', 1280, 9999, false); // big
add_image_size('1000', 1000, 9999, false); // big


/* thumbs edicion */
add_image_size('640x430', 640, 430, true); // big
add_image_size('640x215', 640, 215, true); // med horizontal
add_image_size('320x430', 320, 430, true); // med vertical
add_image_size('320x320', 320, 320, true); // square
add_image_size('320x215', 320, 215, true); // small

/* thumb noticia home */
add_image_size('640x320', 640, 320, true); // med vertical


/*  Enqueue javascript
/* ------------------------------------ */
function sc_scripts()
{
    wp_enqueue_script( 'hoverIntent', true );

    if (is_home()) {
    	wp_enqueue_script( 'add2home', get_template_directory_uri() . '/inc/js/add2home.js','', true );
    }

    // waypoints_sticky
    // if (in_category('2944')) {
    	wp_enqueue_script( 'waypoints', get_template_directory_uri() . '/inc/js/waypoints.min.js', array( 'jquery' ),'', true );
    	wp_enqueue_script( 'waypoints_sticky', get_template_directory_uri() . '/inc/js/waypoints-sticky.min.js', array( 'jquery', 'waypoints' ),'', true );
    // }
    wp_enqueue_script( 'functions', get_template_directory_uri() . '/inc/js/functions.min.js', array( 'jquery' ),'', true );

    // if ( is_singular() && get_option( 'thread_comments' ) ) { wp_enqueue_script( 'comment-reply' ); }
}
add_action( 'wp_enqueue_scripts', 'sc_scripts' );


/*  Agregamos categorías a body_class
/* ------------------------------------ */
add_filter('body_class','add_category_to_single');
function add_category_to_single($classes, $class) {
	if (is_single() ) {
		global $post;
		foreach((get_the_category($post->ID)) as $category) {
			// añadimos slug de categoría al array $classes
			$classes[] = $category->category_nicename;
		}
	}
	// retornamos el array $classes
	return $classes;
}


/*  Widgets
/* ------------------------------------ */

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



/*  Agregamos suscriptores a dropdown autores
/* 	http://wordpress.stackexchange.com/questions/50827/select-subscriber-as-author-of-post-in-admin-panel
/* ------------------------------------ */

add_filter('wp_dropdown_users', 'MySwitchUser');
function MySwitchUser($output)
{

    //global $post is available here, hence you can check for the post type here
    $users = get_users('role=subscriber');

    $output = "<select id=\"post_author_override\" name=\"post_author_override\" class=\"\">";

    //Leave the admin in the list
    $output .= "<option value=\"1\">Admin</option>";
    foreach($users as $user)
    {
        $sel = ($post->post_author == $user->ID)?"selected='selected'":'';
        $output .= '<option value="'.$user->ID.'"'.$sel.'>'.$user->user_login.'</option>';
    }
    $output .= "</select>";

    return $output;
}

/**
 * Include posts from authors in the search results where
 * either their display name or user login matches the query string
 *
 * @author danielbachhuber
 */
add_filter( 'posts_search', 'db_filter_authors_search' );
function db_filter_authors_search( $posts_search ) {

	// Don't modify the query at all if we're not on the search template
	// or if the LIKE is empty
	if ( !is_search() || empty( $posts_search ) )
		return $posts_search;

	global $wpdb;
	// Get all of the users of the blog and see if the search query matches either
	// the display name or the user login
	add_filter( 'pre_user_query', 'db_filter_user_query' );
	$search = sanitize_text_field( get_query_var( 's' ) );
	$args = array(
		'count_total' => false,
		'search' => sprintf( '*%s*', $search ),
		'search_fields' => array(
			'display_name',
			'user_login',
		),
		'fields' => 'ID',
	);
	$matching_users = get_users( $args );
	remove_filter( 'pre_user_query', 'db_filter_user_query' );
	// Don't modify the query if there aren't any matching users
	if ( empty( $matching_users ) )
		return $posts_search;
	// Take a slightly different approach than core where we want all of the posts from these authors
	$posts_search = str_replace( ')))', ")) OR ( {$wpdb->posts}.post_author IN (" . implode( ',', array_map( 'absint', $matching_users ) ) . ")))", $posts_search );
	return $posts_search;
}
/**
 * Modify get_users() to search display_name instead of user_nicename
 */
function db_filter_user_query( &$user_query ) {

	if ( is_object( $user_query ) )
		$user_query->query_where = str_replace( "user_nicename LIKE", "display_name LIKE", $user_query->query_where );
	return $user_query;
}


/*  WP SEO by Yoast - modificamos tipo de Twitter Card
/* ------------------------------------ */

add_filter( 'wpseo_twitter_card_type', 'change_card_type', 20 );
function change_card_type(  ) {
	return 'summary_large_image';
}

function sc_opengraph_image_size($size="medium") {
	return "320x320";
}
add_filter('wpseo_opengraph_image_size','sc_opengraph_image_size',10,1);
