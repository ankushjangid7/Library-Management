// JavaScript Document
		;(function($) {

         // DOM Ready
        $(function() {

            // Binding a click event
            // From jQuery v.1.7.0 use .on() instead of .bind()
            $('.jqPopapps').bind('click', function(e) {

                // Prevents the default action to be triggered. 
                e.preventDefault();

                // Triggering bPopup when click event is fired
                $('.element_to_pop_up').bPopup();

            });
			
			  $('.jqDownapps').bind('click', function(e) {

                // Prevents the default action to be triggered. 
                e.preventDefault();

                // Triggering bPopup when click event is fired
                $('.down_element_to_pop_up').bPopup();

            });
			  
			   $('.jqGalapps').bind('click', function(e) {

                // Prevents the default action to be triggered. 
                e.preventDefault();

                // Triggering bPopup when click event is fired
                $('.gal_element_to_pop_up').bPopup();

            });

        });

    })(jQuery);