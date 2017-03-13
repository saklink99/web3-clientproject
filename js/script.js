$(document).ready(function(){

	$('.mobile-nav-btn').click(function(e){
		$('.mobile-nav').slideToggle();
		// this prevents the browser from doing the default link action
		e.preventDefault();
	});


	var $window = $(window);
	  $window.on('resize', function (){
        if ($window.width() > 800)
        {
            $('.mobile-nav').hide();
        }
    });

	  // now we override, and show the first package by default
	  $('#weddings').show();

	  // when the select element is "changed"....
	  $( "select" ).change(function () {
	  	// for the option selected...
	      $( "select option:selected" ).each(function() {
	      	// we get the value of the option (ie. package1 ... see html) and store it in a variable...
	      	var id = $(this).val();
	      	// and then, if the value equals package1, we show package1 div! (and make sure we always re-hide all other divs)
	      	if(id == "weddings") {
	      		$('.menu-item').hide();
	      		$('#weddings').show();
	      	} else if(id == "business"){
	      		$('.menu-item').hide();
	      		$('#business').show();
	      	} else if(id == "tailgates"){
	      		$('.menu-item').hide();
	      		$('#tailgates').show();
	      	} else if(id == "aeries"){
	      		$('.menu-item').hide();
	      		$('#aeries').show();
	      	}	else if(id == "greek-life"){
	      		$('.menu-item').hide();
	      		$('#greek-life').show();
	      	}	else if(id == "wine-down-wednesday"){
	      		$('.menu-item').hide();
	      		$('#wine-down-wednesday').show();
	      	}
	      }); 
	  	

	  })


});

