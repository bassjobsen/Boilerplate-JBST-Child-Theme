<?php
/*
==========================================================
ATTENTION!! THE FUNCTIONS ON THIS PAGE ARE MEANT TO SERVE
AS A GUIDE OF WHAT YOU CAN DO WITH CUSTOM ACTIONS & FILTERS
THESE FUNCTIONS WILL NOT BE ACTIVE UNLESS YOU MOVE THEM
TO YOUR functions.php FILE. YOU CAN MOVE AS MANY OVER AS
YOU WANT AND MODIFY THEM AS YOU SEE FIT.
==========================================================

==========================================================
We have built Skematik to take advantage of actions and
filters the way WordPress intended. To make your own 
custom functionality, what you typically need to do is
create a function with your custom code, then create an
action that tells WordPress where to run that code. We've
provided some examples below. For instance, in the first
example, we create a function that, when run, deactivates
the skematik stylesheet. Then, we make an action to run
that function during the 'wp_enqueue_scripts' action hook.
We also give it a priority of '100'. This is because that
particular stylesheet function has a priority of '99'. We
could have picked any number greater than '99' to make
sure that our function runs after the original.
==========================================================
*/



/*
==========================================================
REMOVE ONE OF SKEMATIK'S STYLESHEETS
==========================================================
*/
function skematik_child_theme_deregister_styles() {
   wp_deregister_style( 'skematik-style' );
}
add_action( 'wp_enqueue_scripts', 'skematik_child_theme_deregister_styles',100 );



/*
==========================================================
ADD A NEW STYLESHEET
If you include the function below, it will activate the
styles in 'assets/css/custom-styles.css'. You can then add
to those styles. We've already included one style rule that
will turn your body background red.
==========================================================
*/
/* Add an action in wp_head so it loads after all the core styles from Skematik */
function skematik_child_theme_add_custom_styles() {
	wp_register_style( 'skematik-child-theme-custom-styles', get_stylesheet_directory_uri() . '/assets/css/custom-styles.css', array(), '', 'all' );
    wp_enqueue_style( 'skematik-child-theme-custom-styles' );
}
add_action( 'wp_head', 'skematik_child_theme_add_custom_styles', 100 );