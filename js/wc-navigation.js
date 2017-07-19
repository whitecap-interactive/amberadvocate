jQuery(".menu-item-has-children").addClass("folder");


jQuery(".folder").each( function( index, value ) {
	jQuery( this ).prepend( "<input type='checkbox' name='folder-toggle-" + index + 1 +"' id='folder-toggle-" + index + 1 +"' class='folder-toggle-box hidden' />" );
	jQuery( this ).find("a:first").wrap(function() {
	  return "<label for='folder-toggle-" + index + 1 +"' class='folder-toggle-label'></label>";
	});
	jQuery( this ).find("a:first").removeAttr("href");
});
