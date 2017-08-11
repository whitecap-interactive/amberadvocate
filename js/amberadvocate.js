
jQuery(function() {

    jQuery('ul#primary-menu > li').click(function(event) {
		event.preventDefault();
		if ( jQuery(this).has('ul').length > 0 ) {
	  		jQuery('ul#primary-menu ul.sub-menu').hide();
			jQuery(this).find('ul.sub-menu').show();
	  	} else { 
	  		var link = jQuery(this).find('a').attr('href');
	  		console.log(link);
	  		window.location.href = link;
	  	}
	});

	jQuery('ul.sub-menu > li').click(function(event) {
		var link = jQuery(this).find('a').attr('href');
	  	console.log(link);
	  	window.location.href = link;
	});

	jQuery('html').click(function() {
	  	jQuery('ul#primary-menu ul.sub-menu').hide();
	});	

	jQuery('ul#primary-menu').click(function(event){
	    event.stopPropagation();
	});

});

