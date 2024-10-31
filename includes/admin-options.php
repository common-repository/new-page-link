<?php

/********************
* Options Page
********************/

// protect this code
defined( 'ABSPATH' ) or die( 'No script kiddies please!' );


/*********************************
* Function to Display Options Page
**********************************/

function npl_options_fun()
{ 
	global $npl_options;
	ob_start();?>
	<div class="wrap">
	<h2> New Page Link</h2>
	<p> Type 'Yes' to open links in new tab and 'No' to open in the same window </p>

	<form action="options.php" method="post">
		<?php settings_fields('npl_settings_group'); ?>
    	<h4><?php _e('New Page Link','new-page-link');?></h4>
		<p>
			<label class="description" for="npl_link[newlink]"><?php _e('Open Links in New Window type (Yes / No) :','new-page-link');?></label>
			<input id="npl_link[newlink]" name="npl_link[newlink]"  value="<?php echo $npl_options['newlink'];?>" type="text" />
		</p>
		<p>
			<label class="description" for="npl_link[nofollow]"><?php _e('Convert ahrefs to Nofollow links by entering class names with semicolon at the end','new-page-link');?></label>
			<input id="npl_link[nofollow]" name="npl_link[nofollow]"  value="<?php echo $npl_options['nofollow'];?>" type="text" placeholder="class1;class2;class3;"/>
		</p>
    	<p class="submit">
    		<input  value="<?php _e('save','new-page-link');?>" type="submit" class="button-primary" />
		</p>
	</form>
	</div>	

	<?php echo ob_get_clean();
} //end of function


/************************
* Creating Options Page
*************************/

function npl_optionpage()
{

	// hook creating menu page
	add_options_page('Option Page', 'New Link', 'manage_options','npl_newlink', 'npl_options_fun');
		
} //end of function
add_action('admin_menu','npl_optionpage');


/*******************************************************
* Register Settings and create option for wp_options table
*********************************************************/

//register settings
add_action('admin_init','npl_register_settings');

//actual function which will create get_option on the backend
function npl_register_settings()
{
	register_setting('npl_settings_group','npl_link');	
}
?>