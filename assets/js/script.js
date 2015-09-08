/**
 * Simple Cookie Notification Bar
 * @since 1.0
 * @athor Lucy Tomás
 */

jQuery(document).ready(function($) {

	
	var scnb_cookie_accept = $( document.getElementById('scnb-cookie-accept') );
	
	if( scnb_cookie_accept ) {

		var myscnb = new scnb_cookie();

		scnb_cookie_accept.on('click', function(){
				
			myscnb.set_cookie( 'scnb-cookie-terms', '1', 365 );
				
		});
	}

	myscnb.check_cookie();


});


//Closure

function scnb_cookie () {

	var notification_bar = jQuery( document.getElementById('scnb-cookie-bar') );

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
	


	return {

		/**
		 * set_cookie
		 * @since 1.0
		 */

		set_cookie : function (name, value, expiration_days){

			var date = new Date();
	    	date.setTime( date.getTime() + ( expiration_days * 24 * 60 * 60 * 1000 ) );
	    		
	    	var expires = 'expires=' + date.toUTCString();

	    	document.cookie = name + '=' + value + '; ' + expires + '; path=/;' + ' domain=.' + scnb_vars.domain_name + ';';
	    	
	    	notification_bar.css('display', 'none');

		},

		/**
		 * check_cookie
		 * @since 1.0
		 */

		check_cookie : function (){
			
			if ( get_cookie( 'scnb-cookie-terms' ) == false) {
				
				notification_bar.css('display', 'block');
			}
			
		}

	}

}

	

	

	



