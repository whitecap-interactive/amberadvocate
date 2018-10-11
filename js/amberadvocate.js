
jQuery(function() {
	/*Reset Partner Resources Table Filter*/
	jQuery('#reset-button').click(function(){ 
		jQuery('#partner-name-search').val('').trigger('change');
	    jQuery('#partner-state-search').val('').trigger('change');
	    /*jQuery('#partner-region-search').val('').trigger('change');*/
	    jQuery('#partner-topic-search').val('').trigger('change');
      //sortTable(1);
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
		jQuery('.nav-bar').toggleClass('mobile-nav');
		jQuery('.main-logo').toggleClass('main-logo-mobile-nav');
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
	var browserWidth = jQuery( window ).width();
	if ( browserWidth < 900 ) {
		jQuery( "#partner-list" ).insertAfter( jQuery( "#partner-info" ) );
	}

	jQuery( window ).resize(function() {
		browserWidth = jQuery( window ).width();
	 	if ( browserWidth < 900 ) {
	   		jQuery( "#partner-list" ).insertAfter( jQuery( "#partner-info" ) );
	   	} else {
	   		jQuery( "#partner-info" ).insertAfter( jQuery( "#partner-list" ) );
	   	}
	});


});

function stateSelect(state) {
	window.location.href = '/states/' + state;
}

function partnerSearch(searchParam) {
    var input, filter, table, tr, td, i;
    if (searchParam == 'name') { jQuery('select#partner-region-search').val(""); jQuery('select#partner-state-search').val(""); }
    if (searchParam == 'region') { jQuery('input#partner-name-search').attr('placeholder', "Search for Partner Name"); jQuery('select#partner-state-search').val(""); }
    if (searchParam == 'state') { jQuery('input#partner-name-search').attr('placeholder', "Search for Partner Name"); jQuery('select#partner-region-search').val(""); }
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

function resourceSearch(searchParam) {
    var input, filter, table, tr, td, i;
    if (searchParam == 'name') { jQuery('select#partner-region-search').val(""); jQuery('select#partner-state-search').val(""); }
    if (searchParam == 'region') { jQuery('input#partner-name-search').attr('placeholder', "Search for Doc Name"); jQuery('select#partner-state-search').val(""); }
    if (searchParam == 'state') { jQuery('input#partner-name-search').attr('placeholder', "Search for Doc Name"); jQuery('select#partner-region-search').val(""); }
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

jQuery(document).on('ready', function() {
    jQuery(".lazy").slick({
        accessibility: true, 
        autoplay: true,
        autoplaySpeed: 5000,
        arrows: true,
        lazyLoad: 'progressive', // ondemand progressive anticipated
        infinite: true
    });
});

// Flip Clock Counter For Home Page
// http://flipclockjs.com/faces/counter
var clock;
jQuery(document).ready(function() {
	// Instantiate a counter
	clock = new FlipClock(jQuery('.clock'), {
		clockFace: 'Counter',
		autoStart: true,
		minimumDigits: 3,
		callbacks: {
            interval: function() {
                var time = clock.getTime().time;
                if(time > 922) { //change this number
                clock.stop();
                } 
            }
        }
	});
});



function sortTable(n) {
  var table, rows, switching, i, x, y, shouldSwitch, dir, switchcount = 0;
  table = document.getElementById("partner-table");
  switching = true;
  //Set the sorting direction to ascending:
  dir = "asc"; 
  /*Make a loop that will continue until
  no switching has been done:*/
  while (switching) {
    //start by saying: no switching is done:
    switching = false;
    rows = table.rows;
    /*Loop through all table rows (except the
    first, which contains table headers):*/
    for (i = 1; i < (rows.length - 1); i++) {
      //start by saying there should be no switching:
      shouldSwitch = false;
      /*Get the two elements you want to compare,
      one from current row and one from the next:*/
      x = rows[i].getElementsByTagName("TD")[n];
      y = rows[i + 1].getElementsByTagName("TD")[n];
      /*check if the two rows should switch place,
      based on the direction, asc or desc:*/
      if (dir == "asc") {
        if (x.innerHTML.toLowerCase() > y.innerHTML.toLowerCase()) {
          //if so, mark as a switch and break the loop:
          shouldSwitch= true;
          break;
        }
      } else if (dir == "desc") {
        if (x.innerHTML.toLowerCase() < y.innerHTML.toLowerCase()) {
          //if so, mark as a switch and break the loop:
          shouldSwitch = true;
          break;
        }
      }
    }
    if (shouldSwitch) {
      /*If a switch has been marked, make the switch
      and mark that a switch has been done:*/
      rows[i].parentNode.insertBefore(rows[i + 1], rows[i]);
      switching = true;
      //Each time a switch is done, increase this count by 1:
      switchcount ++;      
    } else {
      /*If no switching has been done AND the direction is "asc",
      set the direction to "desc" and run the while loop again.*/
      if (switchcount == 0 && dir == "asc") {
        dir = "desc";
        switching = true;
      }
    }
  }
}