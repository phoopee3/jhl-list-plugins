<?php
/*
Plugin Name: JHL List Plugins
Description: List plugins
Version: 1.0.0
Author: Jason Lawton <jason@jasonlawton.com>
Author URI: mailto:jason@jasonlawton.com?subject=JHL List Plugins
*/

define( 'JHL_LP_PLUGIN_DIR', plugin_dir_path( __FILE__ ) );
define( 'JHL_LP_PLUGIN_URL', plugin_dir_url( __FILE__ ) );

add_action( 'admin_menu', 'jhl_lp_add_admin_menu' );

function jhl_lp_add_admin_menu(  ) { 
    
	add_menu_page( 'JHL List Plugins', 'JHL List Plugins', 'manage_categories', 'jhl_list_plugins', 'jhl_lp_options_page' );

    add_action( 'admin_init', 'jhl_lp_register_settings' );

}

function jhl_lp_register_settings() {
}

function jhl_lp_settings_section_callback(  ) { 

	echo __( 'Use this page to list plugins', 'jhl_lp' );

}


function jhl_lp_options_page(  ) { 
    // get post types

    // $the_plugs = get_option('active_plugins'); 
    $the_plugs = get_plugins(); 
    echo '<ul>';
    foreach($the_plugs as $key => $value) {
        // $string = explode('/',$value); // Folder name will be displayed
        echo '<li>' . $value['Title'] . '<ul><li>';
        // echo $value['Name'] . '<br>';
        echo $value['Version'] . '<br>';
        echo $value['Description'];
        echo '</li></ul></li>';
    }
    echo '</ul>';

    ?>
    <style>
    #wpbody-content > ul > li {
        font-weight: bold;
    }
    #wpbody-content li > ul {
        margin-left: 30px;
    }
    #wpbody-content li > ul li {
        font-weight: normal;
    }
    </style>

    <?php
}
