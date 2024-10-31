jQuery(window).on('load', function () {
	
	console.log('our file is connected');
	
	jQuery('.npl_nofollow > option').each(function(){
		
		console.log(jQuery(this).text());
		var v = jQuery(this).text();
		if(v != ''){
			
			jQuery('.'+v).attr('rel','nofollow');
			
		}
	});
});