jQuery(document).ready(function($) {
     
    // theme switcher sidebar toggle
	$( "a.themes-open" ).on( "click", function(e) {
		e.preventDefault();

		$( "html, body" ).animate({ scrollTop: 0 }, 0);
		$( "#push, #aside" ).toggleClass( "toggled" );
		$( "a.themes-open i" ).toggleClass( "icon-remove" );
	});
	
	// thumbnail preview hover
    $( "#aside ul li" ).on({
	    mouseenter: function(){
	        var self = this;
	        $( "#preview" ).fadeOut('fast', function(){
	            $( this ).attr( "src", $( self ).attr( "data-thumbnail-src" ) ).show();
	        });
	    },
	    mouseleave: function(){
	        $( "#preview" ).hide();
	    }
	});
    
    // set iframe to correct height
    function fixHeight() 
    {
    	var headerHeight = $( "#wrapper" ).height();
    	$( "#iframe" ).attr( "height", ( ( $(window).height() - 0) - headerHeight) + 'px');
    }
    
    // fix iframe height on resize        	
    $(window).resize( function() {
    	fixHeight();
    }).resize();
    
    
    // theme list
    var theme_list_open = false;
    	
    $( "#theme_list li a" ).on( "click", function() 
    {
    	var theme_data = $( this ).attr( "rel" ).split( "," );
    	
    	// hide the theme list
    	$( "#push, #aside" ).toggleClass( "toggled" );
		$( "a.themes-open i" ).toggleClass( "icon-remove" );
		
		// reset data
		$( "a.themes-open" ).html( '<i class="icon-align-justify"></i> Choose Theme' );
		
		// setup links
		$( "li.purchase a" ).attr( "href", theme_data[1] );
        $( "li.remove_frame a" ).attr( "href", theme_data[0] );
        
        // show selected theme
        $( "#iframe" ).attr( "src", theme_data[0] );
        
        theme_list_open = false;
            	
    	return false;
    });
	
	// responsive switcher
	$( ".d" ).on( "click", function () {
		$( "#frame_wrapper" ).removeClass().addClass( "desktop" );	
		$( ".ipad, .iphone, .desktop" ).removeClass( "active" );
		$( this ).addClass( "active" );
			
		return false;
	});
	
	$( ".t" ).on( "click", function () {
		$( "#frame_wrapper" ).removeClass().addClass( "tablet" );	
		$( ".ipad, .iphone, .desktop" ).removeClass( "active" );
		$( this ).addClass( "active" );	
		
		return false;
	});
		        	
	$( ".m" ).on( "click", function () {
		$( "#frame_wrapper" ).removeClass().addClass( "mobile" );
		$('.ipad,.iphone,.desktop').removeClass( "active" );
		$( this ).addClass( "active" );	
		
		return false;
	});
	
	$( ".d" ).addClass( "active" );
});