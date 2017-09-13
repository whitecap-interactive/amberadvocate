
jQuery(function() {
	/*Reset Partner Resources Table Filter*/
	jQuery('#reset-button').click(function(){ 
		jQuery('#partner-name-search').val('').trigger('change');
	    jQuery('#partner-state-search').val('').trigger('change');
	    /*jQuery('#partner-region-search').val('').trigger('change');*/
	    jQuery('#partner-topic-search').val('').trigger('change');
	})

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





	jQuery('#nav-icon3').click(function(){
		jQuery(this).toggleClass('open');
		jQuery('.nav-bar').toggle();
	});


	jQuery( window ).resize(function() {
	  var browserWidth = jQuery( window ).width();
	  if ( browserWidth > 900 ) {
	  	jQuery('.nav-bar').show();
	  } else {
	  	jQuery('.nav-bar').hide();
	  }
	});

});

jQuery(document).ready(function(){

});

function partnerSearch(searchParam) {
    var input, filter, table, tr, td, i;
    if (searchParam == 'name') { jQuery('select#partner-region-search').val(""); jQuery('select#partner-state-search').val(""); }
    if (searchParam == 'region') { jQuery('input#partner-name-search').attr('placeholder', "Search for Organization Name"); jQuery('select#partner-state-search').val(""); }
    if (searchParam == 'state') { jQuery('input#partner-name-search').attr('placeholder', "Search for Organization Name"); jQuery('select#partner-region-search').val(""); }
    input = document.getElementById("partner-" + searchParam + "-search");
    filter = input.value.toUpperCase();
    table = document.getElementById("partner-table");
    tr = table.getElementsByTagName("tr");
    for (i = 0; i < tr.length; i++) {
        td = tr[i].getElementsByClassName('partner-' + searchParam )[0];
        if (td) {
            if (td.innerHTML.toUpperCase().indexOf(filter) > -1) {
                tr[i].style.display = "";
            } else {
                tr[i].style.display = "none";
            }
        }       
    }
    //jQuery('table.partner-list tr:visible').removeClass('odd').filter(':odd').addClass('odd');
}