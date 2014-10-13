<?php
/*
	Plugin Name: AA Coming Soon 
	Author: A. Roy
	Version: 8.0
	Author URI:Author has not enough money to buy a domain 
*/

///algoridom 
//create a option page with image upload option 
// make a statement with is_home() 
// display it and wp die()

// create custom plugin settings menu
add_action('admin_menu', 'baw_create_menu');

function baw_create_menu() {

	//create new top-level menu
	add_menu_page('Comming soon', 'BAW Settings', 'administrator', __FILE__, 'baw_settings_page',plugins_url('/images/icon.png', __FILE__));

	//call register settings function
	add_action( 'admin_init', 'register_mysettings' );
}


function register_mysettings() {
	//register our settings
	register_setting( 'baw-settings-group', 'new_option_name' );
	register_setting( 'baw-settings-group', 'some_other_option' );
	register_setting( 'baw-settings-group', 'third_option' );
	//register_setting( 'baw-settings-group', 'option_etc' );
}

function baw_settings_page() {
?>
<div class="wrap">
<h2>Comming soon</h2>

<form method="post" action="options.php">
    <?php settings_fields( 'baw-settings-group' ); ?>
    <?php do_settings_sections( 'baw-settings-group' ); ?>
    <table class="form-table">
        <tr valign="top">
        <th scope="row">Image Link</th>
        <td><input type="text" name="new_option_name" value="<?php echo esc_attr( get_option('new_option_name') ); ?>" /></td>
        </tr>
         
        <tr valign="top">
        <th scope="row">Put the data when you will be open your site</th>
        <td><input type="text" name="some_other_option" value="<?php echo esc_attr( get_option('some_other_option') ); ?>" /></td>
        </tr>
         <tr valign="top">
        <th scope="row">Isert 1 to enable the coming soon</th>
        <td><input type="text" name="third_option" value="<?php echo esc_attr( get_option('third_option') ); ?>" /></td>
        </tr>
        
       
    </table>
    
    <?php submit_button(); ?>

</form>
</div>
<?php } 


///is home 

if( !is_admin() && esc_attr( get_option('third_option') ) == "1"){
	echo "<!--doctype html--><head><title>Offline</title></head><center style='background:#f1f1f1;'><h1>".get_bloginfo('blogname')."</h1>";
	//echo "<img src='".esc_attr( get_option('new_option_name') )."'/>";
	echo "<style>body{background:url(".esc_attr( get_option('new_option_name') ).")}</style>";
	echo "<br>".get_bloginfo('description')."<br>";
	echo "The site will be open at ".esc_attr( get_option('some_other_option') );
	echo "</center>";
	
	die();
}

