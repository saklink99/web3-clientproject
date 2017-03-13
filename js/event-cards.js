$(document).ready(function(){
	// now we override, and show the first package by default
	$('#weddings > .package-card').show();

	// when the select element is "changed"....
	$( "select" ).change(function () {
		// for the option selected...
	    $( "select option:selected" ).each(function() {
	    	// we get the value of the option (ie. package1 ... see html) and store it in a variable...
	    	var id = $(this).val();
	    	// and then, if the value equals package1, we show package1 div! (and make sure we always re-hide all other divs)
	    	if(id == "weddings") {
	    		$('.menu-item').hide();
	    		$('#weddings').addClass("menu-item-active");
	    	} else if(id == "business"){
	    		$('.menu-item').removeClass();
	    		$('#business').addClass("menu-item-active");
	    	} else if(id == "tailgates"){
	    		$('.menu-item').hide();
	    		$('#tailgates').show();
	    	} else if(id == "aeries"){
	    		$('.menu-item').hide();
	    		$('#aeries').show();
	    	}
	    }); 
		

	})
});
