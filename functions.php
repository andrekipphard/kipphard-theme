<?php
/**
 * kipphard functions and definitions
 *
 * @link https://developer.wordpress.org/themes/basics/theme-functions/
 *
 * @package kipphard
 */

if ( ! defined( '_S_VERSION' ) ) {
	// Replace the version number of the theme on each release.
	define( '_S_VERSION', '1.0.0' );
}

/**
 * Sets up theme defaults and registers support for various WordPress features.
 *
 * Note that this function is hooked into the after_setup_theme hook, which
 * runs before the init hook. The init hook is too late for some features, such
 * as indicating support for post thumbnails.
 */
function kipphard_setup() {
	/*
		* Make theme available for translation.
		* Translations can be filed in the /languages/ directory.
		* If you're building a theme based on kipphard, use a find and replace
		* to change 'kipphard' to the name of your theme in all the template files.
		*/
	load_theme_textdomain( 'kipphard', get_template_directory() . '/languages' );

	// Add default posts and comments RSS feed links to head.
	add_theme_support( 'automatic-feed-links' );

	/*
		* Let WordPress manage the document title.
		* By adding theme support, we declare that this theme does not use a
		* hard-coded <title> tag in the document head, and expect WordPress to
		* provide it for us.
		*/
	add_theme_support( 'title-tag' );

	/*
		* Enable support for Post Thumbnails on posts and pages.
		*
		* @link https://developer.wordpress.org/themes/functionality/featured-images-post-thumbnails/
		*/
	add_theme_support( 'post-thumbnails' );

	// This theme uses wp_nav_menu() in one location.
	register_nav_menus(
		array(
			'menu-1' => esc_html__( 'Primary', 'kipphard' ),
		)
	);

	/*
		* Switch default core markup for search form, comment form, and comments
		* to output valid HTML5.
		*/
	add_theme_support(
		'html5',
		array(
			'search-form',
			'comment-form',
			'comment-list',
			'gallery',
			'caption',
			'style',
			'script',
		)
	);

	// Set up the WordPress core custom background feature.
	add_theme_support(
		'custom-background',
		apply_filters(
			'kipphard_custom_background_args',
			array(
				'default-color' => 'ffffff',
				'default-image' => '',
			)
		)
	);

	// Add theme support for selective refresh for widgets.
	add_theme_support( 'customize-selective-refresh-widgets' );

	/**
	 * Add support for core custom logo.
	 *
	 * @link https://codex.wordpress.org/Theme_Logo
	 */
	add_theme_support(
		'custom-logo',
		array(
			'height'      => 250,
			'width'       => 250,
			'flex-width'  => true,
			'flex-height' => true,
		)
	);
}
add_action( 'after_setup_theme', 'kipphard_setup' );

/**
 * Set the content width in pixels, based on the theme's design and stylesheet.
 *
 * Priority 0 to make it available to lower priority callbacks.
 *
 * @global int $content_width
 */
function kipphard_content_width() {
	$GLOBALS['content_width'] = apply_filters( 'kipphard_content_width', 640 );
}
add_action( 'after_setup_theme', 'kipphard_content_width', 0 );

/**
 * Register widget area.
 *
 * @link https://developer.wordpress.org/themes/functionality/sidebars/#registering-a-sidebar
 */
function kipphard_widgets_init() {
	register_sidebar(
		array(
			'name'          => esc_html__( 'Sidebar', 'kipphard' ),
			'id'            => 'sidebar-1',
			'description'   => esc_html__( 'Add widgets here.', 'kipphard' ),
			'before_widget' => '<section id="%1$s" class="widget %2$s">',
			'after_widget'  => '</section>',
			'before_title'  => '<h2 class="widget-title">',
			'after_title'   => '</h2>',
		)
	);
}
add_action( 'widgets_init', 'kipphard_widgets_init' );

/**
 * Enqueue scripts and styles.
 */
function kipphard_scripts() {
	wp_enqueue_style( 'kipphard-style', get_stylesheet_uri(), array(), _S_VERSION );
	wp_enqueue_style( 'kipphard-main', get_template_directory_uri() .'/css/main.css');
	wp_enqueue_style( 'bootstrap-icons', 'https://cdn.jsdelivr.net/npm/bootstrap-icons@1.9.1/font/bootstrap-icons.css');

	wp_style_add_data( 'kipphard-style', 'rtl', 'replace' );

	wp_enqueue_script( 'kipphard-navigation', get_template_directory_uri() . '/js/navigation.js', array(), _S_VERSION, true );
	wp_enqueue_script( 'kipphard/portfolio-filter-desktop', get_template_directory_uri(). '/js/portfolio-filter-desktop.js', array('jquery'), _S_VERSION );
	wp_enqueue_script( 'kipphard/portfolio-filter-mobile', get_template_directory_uri(). '/js/portfolio-filter-mobile.js', array('jquery'), _S_VERSION );
	wp_enqueue_script( 'kipphard/offcanvas', get_template_directory_uri(). '/js/offcanvas.js', array('jquery'), _S_VERSION );
	if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
		wp_enqueue_script( 'comment-reply' );
	}
}
add_action( 'wp_enqueue_scripts', 'kipphard_scripts' );

/**
 * Custom Fonts.
 * 
 */
function enqueue_custom_fonts(){
	if(!is_admin()){
		wp_register_style('roboto', 'https://fonts.googleapis.com/css2?family=Roboto:ital,wght@0,100;0,300;0,400;0,500;0,700;0,900;1,100;1,300;1,400;1,500;1,700;1,900&display=swap');
		wp_enqueue_style('roboto');
		wp_register_style('nunito', 'https://fonts.googleapis.com/css2?family=Nunito:ital,wght@0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap');
		wp_enqueue_style('nunito');
	}
}
add_action('wp_enqueue_scripts', 'enqueue_custom_fonts');

/**
 * Implement the Custom Header feature.
 */
require get_template_directory() . '/inc/custom-header.php';

/**
 * Custom template tags for this theme.
 */
require get_template_directory() . '/inc/template-tags.php';

/**
 * Functions which enhance the theme by hooking into WordPress.
 */
require get_template_directory() . '/inc/template-functions.php';

/**
 * Customizer additions.
 */
require get_template_directory() . '/inc/customizer.php';

/**
 * Load Jetpack compatibility file.
 */
if ( defined( 'JETPACK__VERSION' ) ) {
	require get_template_directory() . '/inc/jetpack.php';
}

require_once get_template_directory() . '/inc/acf.php';

// In your functions.php
// Action function
function form_submit_action() {
	// You can now use $_GET/$_POST variables depending on what method you used in your form
	// In this case we are using method post
	$name = sanitize_text_field($_POST['name']);
	$phone = sanitize_text_field($_POST['phone']);
	$subject = sanitize_text_field($_POST['subject']);
	$email = sanitize_email($_POST['email']);
	$message = sanitize_text_field($_POST['message']);
	if( empty($name) && empty($email) && empty($message) && empty($phone) && empty($subject)){
	  $name = sanitize_text_field($_POST['nameqwer']);
	  $phone = sanitize_text_field($_POST['phoneqwer']);
	  $email = sanitize_email($_POST['emailqwer']);
	  $subject = sanitize_text_field($_POST['subjectqwer']);
	  $message = sanitize_text_field($_POST['messageqwer']);
	  $check = sanitize_text_field($_POST['checkqwer']);
	  
	  // Then do the processing here like create new post/user, update new post/user , etc.
	  // But on this example im gonna show you how send an email, create your own custom html body format.
	  
	  // Send to admin
	  $to = get_bloginfo('admin_email'); // or 'sendee@email.com' to specify email
	  // Email subject
	  $subject = 'New Contact Request | kipphard.com';
	  $subject_customer = 'I Received Your Contact Request | kipphard.com';
	  // Email body/content (tricky part)
	  /* Instead of:
		  $body = '<div>
					  <p>'. $first_name .'</p>
				  </div>'; 
	  */
	  // We can create a custom function with the post fields as your attributes
	  $body = my_email_body_function($name,$email,$message,$check, $subject, $phone);
	  $body_customer = my_email_body_function_customer($name,$email,$message,$check, $subject, $phone);
	  $headers = array('Content-Type: text/html; charset=UTF-8');
	  wp_mail( $to, $subject, $body, $headers );
	  wp_mail( $email, $subject_customer, $body_customer, $headers);
	  
	  // Then redirect to desired page
	  $redirect = add_query_arg ('kontaktformular', 'gesendet', '/#contact');
	  wp_redirect($redirect);
	  exit;
	  //wp_redirect(home_url('/#contact'));
	}
	else{
	  exit;
	}
  }
  // Necessary action hooks
  // Use our specific action form_submit_action to process the data related to our request
  add_action( 'admin_post_nopriv_form_submit_action', 'form_submit_action' );
  add_action( 'admin_post_form_submit_action', 'form_submit_action' );
  
  // Email body function declaration
  function my_email_body_function($name,$email,$message,$check, $subject, $phone) {
	ob_start(); // We have to turn on output buffering. VERY IMPORTANT! or else wp_mail() wont work 
	// Then setup your email body using the postfields from the attritbutes passed on. ?>
	You received a new contact request on your website.
	<table style="width:100%; border-collapse: collapse;">
	<tr>
	  <th style="border: 1px solid #dddddd;text-align: left;padding: 8px;">Name:</th>
	  <th style="border: 1px solid #dddddd;text-align: left;padding: 8px;"><?php echo $name; ?></th>
	</tr>
	<tr>
	  <th style="border: 1px solid #dddddd;text-align: left;padding: 8px;">Email:</th>
	  <th style="border: 1px solid #dddddd;text-align: left;padding: 8px;"><?php echo $email; ?></th>
	</tr>
	<tr>
	  <th style="border: 1px solid #dddddd;text-align: left;padding: 8px;">Phone Number:</th>
	  <th style="border: 1px solid #dddddd;text-align: left;padding: 8px;"><?php echo $phone; ?></th>
	</tr>
	<tr>
	  <th style="border: 1px solid #dddddd;text-align: left;padding: 8px;">Subject:</th>
	  <th style="border: 1px solid #dddddd;text-align: left;padding: 8px;"><?php echo $subject; ?></th>
	</tr>
	<tr>
	  <th style="border: 1px solid #dddddd;text-align: left;padding: 8px;">Message:</th>
	  <th style="border: 1px solid #dddddd;text-align: left;padding: 8px;"><?php echo $message; ?></th>
	</tr>
	  </table>
	
	<?php 
	return ob_get_contents();
	ob_get_clean();
  }
  
  function my_email_body_function_customer($name,$email,$message,$check, $subject, $phone) {
	  ob_start(); // We have to turn on output buffering. VERY IMPORTANT! or else wp_mail() wont work 
	  // Then setup your email body using the postfields from the attritbutes passed on. ?>
	  Hello, <?= $name;?><br><br>
	  thanks for your contact request.<br><br>
	  I will process this immediately and get back to you afterwards..
	  
	  <?php 
	  return ob_get_contents();
	  ob_get_clean();
	}


function register_my_menu() {
	register_nav_menu('footer-menu',__( 'Footer Menu' ));
  }
add_action( 'init', 'register_my_menu' );