/**
 * Simple Cookie Notification Bar
 * @since 1.0
 * @athor Lucy Tomás
 */

jQuery(document).ready(function($) {
	
	if( $('#scnb-cookie-accept') ) {
		$('#scnb-cookie-accept').on('click', function(){
				
			set_cookie( 'scnb-cookie-terms', '1', 365 );
				
		});
	}

	check_cookie();

	/**
	 * set_cookie
	 * @since 1.0
	 */

	function  set_cookie (name, value, expiration_days){
		
		var date = new Date();
    	date.setTime( date.getTime() + ( expiration_days * 24 * 60 * 60 * 1000 ) );
    		
    	var expires = "expires=" + date.toUTCString();

    	document.cookie = name + "=" + value + "; " + expires;
    	
    	$('#scnb-cookie-bar').css('display', 'none');

	}

	/**
	 * check_cookie
	 * @since 1.0
	 */

	function  check_cookie (){
		
		if ( get_cookie( 'scnb-cookie-terms' ) == false) {
			
			$('#scnb-cookie-bar').css('display', 'block');
		}
		
	}

	/**
	 * get_cookie
	 * @since 1.0
	 */

	function  get_cookie ( cookie_name ){

		var name = cookie_name + "=";

	    var tmp = document.cookie.split(';');
	    
	    for(var i = 0; i < tmp.length; i ++) {
	        
	        var c = tmp[i];
	        
	        while (c.charAt(0)==' ') { 
	        	
	        	c = c.substring(1);
	        }

	        if ( c.indexOf(name) != -1) {
	        	
	        	return c.substring( name.length, c.length );
	        }
	    }// for

	    return false;
	}
	
	
	
	
	
	
});


