<?php
/**
 * Plugin Name: Site Admin/Super Admin Quicklink
 * Version:1.0
 * Author: Brajesh Singh
 * Author URI: http://thinkinginwordpress.com
 * Network:true
 * Description: Bring Back the Old site admin/Super Admin quick link
 * License: GPL
 * 
 */
/*Inject Network/Site admin menu in the admin header*/
add_action('in_admin_header','bpdev_show_old_network_admin_link');
function bpdev_show_old_network_admin_link(){
    
    if ( is_multisite() && is_super_admin() ) {
	if ( !is_network_admin() )
		$link = '<a href="' . network_admin_url() . '" title="Manage Network">' . __('Network Admin') . '</a>';
	else
		$link = '<a href="' . get_dashboard_url( get_current_user_id() ) . '" title="' . esc_attr__('Site Admin') . '">' . __('Site Admin') . '</a>';

      echo '<div class="wp-old-quick-menu">'.$link.'</div>';
  
 }


}

//let us position it via css
add_action('admin_head','bpdev_old_menu_css');
function bpdev_old_menu_css(){
    if(!is_super_admin())
        return;
    ?>
    <style type='text/css'>
        .wp-old-quick-menu{
           
            margin-top: -20px;
            position: absolute;
            right:102px;
        }
    </style>
 <?php   
}
?>