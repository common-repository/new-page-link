<?php
	
	/****************************
		* Link Open in New Window
	****************************/
	
	global $npl_options;
	
	function npl_autoblank($text) {
		
		$return = str_replace('<a', '<a target="_blank"', $text);
		return $return;
	} //end of function
	
	if($npl_options['newlink']=='Yes')
	{
		add_filter('the_content', 'npl_autoblank');
	} //end of if
	$npl_options['nofollow'];
	add_action('after_setup_theme', 'npl_connect');
	function npl_connect() {
		$nofollow = get_option('npl_link')['nofollow'];
		$npl_a = array();
		$npl_a = explode(';',$nofollow);
		echo '<select style="display:none;" class="npl_nofollow">';
		for($i=0; $i<count($npl_a); $i++){
		echo '<option>'.$npl_a[$i].'</option>';
		}
		echo '</select>';
		if(!empty($nofollow))
		{
			wp_register_script('npl_script',plugin_dir_url(__FILE__). 'js/npl_scripts.js',array('jquery'),'',true);
			//enqueue script and stylesheet files
			wp_enqueue_script( 'npl_script' );
		}
	}
	
	
?>