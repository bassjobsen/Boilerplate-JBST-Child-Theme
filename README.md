Boilerplate JBST Child Theme
============================
JBST is a powerful theme framework that can be used as a standalone website builder or as a framework to create child themes for wordpress build on Twitter's Bootstrap 3. Full customizable with [LESS](http://www.lesscss.org/).
[http://www.jbst.eu/](http://www.jbst.eu/)

Getting started
---------------
 1. Download, install (do not active) JBST [https://github.com/bassjobsen/jamedo-bootstrap-start-theme/archive/master.zip](https://github.com/bassjobsen/jamedo-bootstrap-start-theme/archive/master.zip)
 2. Copy [the Boilerplate files](https://github.com/bassjobsen/Boilerplate-JBST-Child-Theme/archive/master.zip) to `wordpress/wp-content/themes/Boilerplate-JBST-Child-Theme/`
 3. rename the folder from step 2 and open 'style.css' and change the theme info (name, author, description, etc) 
 4. activate your child theme in your Dashboard Appearance > Themes
 
LESS Compiler
-------------
The built-in LESS compiler (Appearance > LESS Compiler) plays an important role in JBST childtheming:

Use the built-in compiler to: 
- set any [Bootstrap](http://getbootstrap.com/customize/) variable or use Bootstrap's mixins:
	-`@navbar-default-color: blue;`
        - create a custom button: `.btn-custom {
  .button-variant(white; red; blue);
}`
- set any built-in LESS variable: for example `@footer_bg_color: black;` sets the background color of the footer to black
- use built-in mixins: - add a custom font: `.include-custom-font(@family: arial,,@font-path, @path: @custom-font-dir, @weight: normal, @style: normal);

Alternatively you can also add the LESS code mentioned above to less/custom.less in your child theme's folder.

You always have to recompile your LESS code into CSS by using the recompile function (Appearance > LESS Compiler) after changing less/custom.less or one of the predefined settings (see below) in functions.php.

Predefined settings
-------------------
You can predefine some settings you can with the Customizer. Predefined settings make sense if you want to create a theme which is ready to use direct after activating. Theme for clients or theme you want to sell (see: http://themes.jbst.eu/) should be ready to use.

Predefined settings should be add to to functions in your child theme's folder. Add the settings inside a function which is hooked by `jbst_child_settings`, for instance:

	add_action('jbst_child_settings','sample_jbst_child_settings');
	function sample_jbst_child_settings()
	{
		define('navbar_background_color','red');
	}

The above will color your navbar red. 
Note predefined settings only have effect direct after activation. If you change a setting you should have to recompile your CSS or run your theme with `remove_theme_mods()` te remove old settings.

Below you will find a list of predefined setting:
-------------------------------------------------
 /* PREDEFINED SETTINGS */

 
 
 	/* navbar */
	if(!defined('navbar_style'))define('navbar_style','default');
	
	if(!defined('navbar_background_color'))define('navbar_background_color',false);
	if(!defined('navbar_border_color'))define('navbar_border_color',false);
	if(!defined('navbar_link_color'))define('navbar_link_color',false);
	if(!defined('navbar_linkhover_color'))define('navbar_linkhover_color',false);
	if(!defined('navbar_linkhoverbackground_color'))define('navbar_linkhoverbackground_color',false);
	if(!defined('navbar_activelink_color'))define('navbar_activelink_color',false);
	if(!defined('navbar_activebackground_color'))define('navbar_activebackground_color',false);
	
	if(!defined('navbar_search'))define('navbar_search',1);
	if(!defined('navbar_account'))define('navbar_account',1);
	if(!defined('navbar_cart'))define('navbar_cart',1);
	
	/* logo text */
	if(!defined('logo_link_color'))define('logo_link_color',false);
	if(!defined('logo_linkhover_color'))define('logo_linkhover_color',false);
	
	/* logo */
	if(!defined('logo_image_position'))define('logo_image_position','in-nav');
	if(!defined('logo_image'))define('logo_image','');
	if(!defined('logo_outside_nav_text_align'))define('logo_outside_nav_text_align','left');
	
	
	/* footer */
	if(!defined('footer_width'))define('footer_width','cont-width');
	if(!defined('footer_bg_color'))define('footer_bg_color',false);
	if(!defined('footer_text_color'))define('footer_text_color',false);
	if(!defined('footer_link_color'))define('footer_link_color',false);
	if(!defined('footer_linkhover_color'))define('footer_linkhover_color',false);
	if(!defined('footer_widgets_number'))define('footer_widgets_number',4);
	
	
	/* disable LESS / Customizer / Options  */
	if(!defined('jbst_less'))define('jbst_less',1);
	if(!defined('jbst_customizer'))define('jbst_customizer',1);
	if(!defined('jbst_options'))define('jbst_options',1);
	
	/* site color */
	if(!defined('link_color'))define('link_color',false);
	
	/* grid */
	if(!defined('container_width'))define('container_width','1200');
	if(!defined('gridfloatbreakpoint'))define('gridfloatbreakpoint','768');
	if(!defined('default_grid'))define('default_grid','md');
	
	/* fonts */
	if(!defined('heading_font_family'))define('heading_font_family','Helvetica Neue'); 
		
Action hooks and filters
========================

The best and safest way to customize the JBST theme, is to actions hooks. You can add actions ( add_action( 'hook-name','your-function-name', $priority, $arguments)  ) to existing hooks and order them with the priority parameter.

JBST action hooks are used to render HTML or execute some code in predefined locations, while filters are used either to get values or modify html output (usually rendered by actions).

Action hooks
------------
	<?
	/* This is just a reference for all of the hooks available in JBST */

	/**
	 * Displays the header.
	 *
	 * Displays all of the <head> section and everything up till <div id="contentwrap">
	 * Includes de <header> section with logo and navbar
	 * 
	 * @hooked jbst_doc_type - 9 
	 * @hooked jbst_doc_title - 20 
	 * @hooked jbst_head_after - 30 
	 * @hooked jbst_body_open - 40 
	 * @hooked jbst_main_navbar - 50 
	 * @hooked jbst_top_content_wrapper - 60 
	 * @since 2.0.6
	 */
	do_action( 'jbst_header' ); 

	/**
	 * Displays the footer
	 *
	 * Displays footer for every page, wrapped inside <footer>
	 * Includes a copy right at bottom
	 * 
	 * @hooked jbst_right_sidebar - 9
	 * @hooked jbst_bottom_content_wrapper - 20
	 * @hooked jbst_footer_area - 30
	 * @hooked jbst_body_close - 40
	 * 
	 * @since 2.0.6
	 */
	do_action( 'jbst_footer' ); 

	/* content nav - runs above and below all content. We recommend you further filter these, for example only making content navigation buttons on posts and not other content types */
	jbst_content_nav( 'nav-above' );
	jbst_content_nav( 'nav-below' );

	/* This runs before the main container of the page. Originally for ads in wordpress.com themes. Carried over from the _s theme. */
	do_action( 'jbst_before' );

	/** 
	 * This runs inside the <head> just before wp_head() 
	 * @hooked jbst_add_google_fonts - 5
	 */
	do_action( 'jbst_head' );

	/** 
	 * before the main content including side bars 
	 * @hooked jbst_open_content_wrappers - 10
	 */
	do_action( 'jbst_before_content_page' ); //index.php

	/** 
	 * after the main content including side bars 
	 * @hooked jbst_close_content_wrappers - 10
	 */
	do_action( 'jbst_after_content_page' ); //index.php
	do_action( 'after_page_content' ); //jbst-footer-functions.php


	/** 
	 * runs direct after ul.nav.navbar-nav
	 */
	do_action( 'jbst_nav_profile_dropdown');

	 
	/** 
	 * runs inside div#nav-profile-dropdown built the dropdown (ul.dropdown-menu) of the profile button 
	 * @hooked jbst_account_profile_link - 10
	 * @hooked jbst_account_signout_link - 20
	 *	
	 *		if($jbstecommerce):
	 *			@hooked jbst_{ecommerce-plugin}_account_profile_link - 10
	 * 			@dehooked jbst_account_profile_link
	 * 
	 *  	if($buddypress):
	 *			@hooked jbst_bp_account_profile_link - 10
	 * 			@dehooked jbst_account_profile_link
	 */
	do_action( 'jbst_nav_profile_dropdown');

	/** 
	 * runs inside div#nav-login-dropdown built the dropdown (ul.dropdown-menu) of the login button 
	 * @jbst_nav_login_form - 10
	 */
	do_action( 'jbst_nav_login_dropdown');

	/* inside div.widget-area before content */
	do_action( 'jbst_before_sidebar' );
	 
	/* Sidebar actions that run above each sidebar. Note, these are for the sidebar areas and will apply to custom sidebars as well. */
	do_action( 'jbst_before_left_sidebar' );
	do_action( 'jbst_before_right_sidebar' );

	/* Runs before close of comment <form> */
	do_action('comment_form', $post->ID);

	/* Before content of different types */
	do_action( 'jbst_before_content' );
	do_action( 'jbst_before_content_404' );
	do_action( 'jbst_before_content_archive' );
	do_action( 'jbst_before_content_image' );
	do_action( 'jbst_before_content_no_results' );
	do_action( 'jbst_before_content_page' );
	do_action( 'jbst_before_content_search' );
	do_action( 'jbst_before_content_single' );

	/* Runs before inside <footer> before footer content, including footer widgets */
	do_action( 'jbst_footer_start_content' );

	/** 
	 * shows the footer widgets
	 * @hooked jbst_footer_show_widgets - 10
	 */
	do_action( 'jbst_footer_widgets' )

	/* Register the footer widgets */
	add_action( 'widgets_init', 'jbst_footer_widgets_init' );

	/* Runs before footer text */
	do_action( 'jbst_credits' );

	/* Runs before inside <footer> after footer content, including footer widgets */
	do_action( 'jbst_footer_end_content' );

	/* Runs just before </body>, at the end of the page before wp_footer  */
	do_action( 'jbst_after' );

	/** 
	 * Adds setting to the customizer 
	 * @hooked jbst_grid_customizer_options
	 * @hooked jbst_customizer_mainnavigation
	 * @hooked jbst_container_customizer_options
	 * @hooked jbst_gridfloatbreakpoint_customizer_options
	 * @hooked jbst_logo_customizer_options
	 * @hooked jbst_navbar_customizer_options
	 * @hooked jbst_background_customizer_options
	 * @hooked jbst_typography_customizer_options
	 * @hooked jbst_colors_customizer_options
	 * @hooked jbst_buttons_customizer_options
	 * @hooked jbst_blog_customizer_options
	 * @hooked jbst_discussion_customizer_options
	 * @hooked jbst_footer_customizer_options
	 * @hooked jbst_wpec_customizer_options
	 * @since 2.0.6
	 */
	do_action('jbst_add_to_customizer');

	/**
	 * set body height for navbar
	 * @hooked jbst_nav_styles
	 * @since 2.0.6
	 */
	 do_action('jbst_add_to_custom_style');
	 
	 /**
	  * create default settings for your child theme
	  * See prefdefined settings below
	  */
	 do_action('jbst_child_settings');


Filters
-------

	 /* FILTERS */
	 
	 /** 
	  * Filterable image size in content-image.php
	  * /
	 apply_filters( 'jbst_attachment_size', array( 1200, 1200 ) ); // Filterable image size.

	 /**
	  * define Bootstrap's grid class depeding on chosen layout
	  */ 
	 apply_filters('jbstmaingridclass')
	 
	  /**
	  * return Bootstrap's Grid Classes based on page layout type and customizer settings
	  * used in div#primary or div#content
	  */ 
	 apply_filters('jbstmaingridclass',jbst_content_span())
	 
	/**
	 * return CSS class based on post type
	 * use in div#content
	 */ 
	apply_filters('jbst_posttype_classes',jbst_posttype_set_classes()

	/**
	 * returns the logo or brand text, depending on customizer settings (should be an action hook??)
	 * returns only a link
	 * used inside the navbar
	 * see also: https://github.com/bassjobsen/jamedo-bootstrap-start-theme/issues/103
	 */ 
	apply_filters('jbst_logo',jbst_logo());} 

	/**
	 * returns the logo or brand text, depending on customizer settings (should be an action hook??)
	 * returns only a link wrapped in <div class="container"><div class="row"><div class="col-xs-12"><div class="logo-outside-nav container {extraclasses}">
	 * {extraclasses} in the above can be set by: apply_filters('jbst_logooustside_classes',array());, see also: http://jbst.eu/knowledge-base/center-logo-outside-navbar/
	 * used outside the navbar
	 * see also: https://github.com/bassjobsen/jamedo-bootstrap-start-theme/issues/103
	 */ 
	apply_filters('jbst_logooustside',jbst_logooustside());

	/**
	 * Optional HTML5 inside the <header> before content.
	 *
	 * Optional HTML5 inside the <header> add before the main content (logo and navbar).
	 * 
	 *  Example:
	 * 
	 * function test_beforeheader($content)
	 * {
	 * return get_template_part( 'content', 'beforeheader');
	 * }	
	 * add_filter('jbst_before_headercontent','test_beforeheader');
	 * 
	 *
	 * @since 2.0.6
	 *
	 * @param string $content empty HTML5 string.
	 */
	echo apply_filters('jbst_before_headercontent','');

	/**
	 * Optional HTML5 inside the <header> after content.
	 *
	 * Optional HTML5 inside the <header> add after the main content (logo and navbar).
	 * 
	 *  Example:
	 * 
	 * function test_afterheader($content)
	 * {
	 * return get_template_part( 'content', 'beforeheader');
	 * }	
	 * add_filter('jbst_after_headercontent','test_afterheader');
	 * 
	 *
	 * @since 2.0.6
	 *
	 * @param string $content empty HTML5 string.
	 */	 
	echo apply_filters('jbst_after_headercontent','');
	 
	 /**
	 * sets the main classes of the navbar
	 */ 
	apply_filters('jbst_navbar_menu_class','nav navbar-nav')

	 /**
	 * sets webfont, default font or font add with @font-face
	 * see also: https://github.com/bassjobsen/jamedo-bootstrap-start-theme/issues/108
	 */ 
	apply_filters('jbst_set_webfonts',array('Helvetica Neue' => 'Helvetica Neue', 'Arial' => 'Arial', 'Lucida Bright' => 'Lucida Bright','Georgia' => 'Georgia', 'Times New Roman' => 'Times New Roman'));
	
Templates
=========
JBST has it's own templating engine which operates from the index.php file in the parent theme. However, you can make your own custom page templates that override the templating engine and can be selected from the 'Page Attributes' section of your page edit screen.
Also see [Template Hierarchy](http://codex.wordpress.org/Template_Hierarchy) for default templates names.

See also `example-page-template.php`

Post type template
------------------
You do not always have to create a page template template of post types are named:
content-{posttype}.php.
By default JBST makes use of: content-404.php, content-archive.php,content-image.php,content-no-results.php and content-page.php.
You can overwrite these by add a file with the same name in your child theme's folder.
	

Examples
========
 - [ADD a custom webfont](https://github.com/bassjobsen/jamedo-bootstrap-start-theme/issues/108)
 - [How to Remove the logo position filter from header?](https://github.com/bassjobsen/jamedo-bootstrap-start-theme/issues/103)
 - [Two colums in header](https://github.com/bassjobsen/jamedo-bootstrap-start-theme/issues/98)
 - [Create an action for front-page only](https://github.com/bassjobsen/jamedo-bootstrap-start-theme/issues/102) 
 - [How do I install this in the header?](https://github.com/bassjobsen/jamedo-bootstrap-start-theme/issues/97) 
 - [Adopt the parent themes function to manage on childtheme footer widget](https://github.com/bassjobsen/jamedo-bootstrap-start-theme/issues/101)
