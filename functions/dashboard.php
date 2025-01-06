<?php
// Custom Dashboard Widget
// add_action('wp_dashboard_setup', 'my_custom_dashboard_widgets');
//  
// function my_custom_dashboard_widgets() {
// global $wp_meta_boxes;
//  
// wp_add_dashboard_widget('custom_help_widget', 'WordPress Support', 'custom_dashboard_help');
// }
//  
// function custom_dashboard_help() {
// echo '<p>Need help with WordPress? Contact the developer <a href="mailto:tom@olospo.co.uk">here</a>.</p>';
// }

// Remove welcome panel from dashboard
add_action(
    'admin_init',
    function () {
        remove_action( 'welcome_panel', 'wp_welcome_panel' );
        remove_meta_box('dashboard_primary', 'dashboard', 'side');
    }
);