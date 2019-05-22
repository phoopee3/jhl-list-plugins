<?php
/*
Plugin Name: JHL List Plugins
Description: List plugins
Version: 1.0.1
Author: Jason Lawton <jason@jasonlawton.com>
Author URI: mailto:jason@jasonlawton.com?subject=JHL List Plugins
*/

define( 'JHL_LP_PLUGIN_DIR', plugin_dir_path( __FILE__ ) );
define( 'JHL_LP_PLUGIN_URL', plugin_dir_url( __FILE__ ) );

add_action( 'admin_menu', 'jhl_lp_add_admin_menu' );

function jhl_lp_add_admin_menu(  ) { 
    
	add_menu_page( 'JHL List Plugins', 'JHL List Plugins', 'manage_categories', 'jhl_list_plugins', 'jhl_lp_options_page' );

}

function jhl_lp_options_page(  ) { 

    wp_enqueue_style( 'datatables', '//cdn.datatables.net/1.10.19/css/jquery.dataTables.min.css', [], '10.1.9' );
    wp_enqueue_script( 'datatables', '//cdn.datatables.net/1.10.19/js/jquery.dataTables.min.js', ['jquery'], '10.1.9' );

    wp_enqueue_style( 'datatables-buttons', '//cdn.datatables.net/buttons/1.5.6/css/buttons.dataTables.min.css', [], '1.5.6' );
    wp_enqueue_script( 'datatables-buttons', '//cdn.datatables.net/buttons/1.5.6/js/dataTables.buttons.min.js', ['jquery'], '1.5.6' );
    wp_enqueue_script( 'datatables-buttons', '//cdn.datatables.net/buttons/1.5.6/js/buttons.html5.min.js', ['jquery'], '1.5.6' );
    wp_enqueue_script( 'jszip', 'https://cdnjs.cloudflare.com/ajax/libs/jszip/3.2.0/jszip.min.js', ['jquery'], '3.2.0' );
    wp_enqueue_script( 'pdfmake', 'https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.56/pdfmake.min.js', ['jquery'], '0.1.56' );

    // $the_plugs = get_option('active_plugins'); 
    $the_plugs = get_plugins(); 
    ?>
    <table class="mydt">
        <thead>
            <tr>
                <th>Name</th>
                <th>Version</th>
                <th>Author</th>
                <th>Description</th>
                <th>Link</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach( $the_plugs as $key => $value ) { ?>
                <tr>
                    <td width="15%"><strong><?php echo esc_html( $value['Title'] ); ?><strong></td>
                    <td width="5%"><?php echo esc_html( $value['Version'] ); ?></td>
                    <td width="15%"><?php echo esc_html( $value['Author'] ); ?></td>
                    <td width="60%"><?php echo esc_html( $value['Description'] ); ?></td>
                    <td width="5%"><a href="<?php echo esc_html( $value['Link'] ); ?>" target="_blank">Link</a></td>
                </tr>
            <?php } ?>
        </tbody>
    </table>

    <script>
    jQuery(document).ready(function () {
        jQuery('.mydt').DataTable({
            // "dom": 'Bfrtip',
            // "buttons": [
            //     'copy', 'excel', 'pdf'
            // ],
            "order" : [
                [ 0, "asc" ]
            ],
            "columnDefs": [ {
                "targets": [ 1, 3, 4 ],
                "orderable": false
            } ]
        });
    });
    </script>

    <?php
}
