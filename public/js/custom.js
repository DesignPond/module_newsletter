function is_touch_device() {
  return !!('ontouchstart' in window);
}

/*--------------------------------------------------
  STICKY FOOTER
---------------------------------------------------*/
jQuery(window).load(function() {  

   /* var footer_fixed = true;

    if( is_touch_device() || !footer_fixed){
        jQuery('#footer, #wrapper').css({'position':'static', 'z-index':'0'});
        jQuery('#wrapper:last').css("margin-bottom", "0");
        jQuery("#footer").removeClass("fixed");
    }
    else
    {
        var margin = jQuery('#footer').outerHeight() + 25;
        var wrapper_margin_bottom = margin+'px';
        jQuery("#wrapper").after('<div style="height:' + wrapper_margin_bottom + '; float:left; width:100%;"></div>');
        jQuery("#footer").addClass("fixed");
    }*/

    var width = $( window ).width();
    var innerHeight   = jQuery('#inner-content').outerHeight();
    var sidebarHeight = jQuery('#sidebar').outerHeight();
    innerHeight = innerHeight + 30;

    if(width > 1024){
        if(sidebarHeight < innerHeight){
            jQuery('#sidebar').css('height',innerHeight);
        }
    }


});


/*--------------------------------------------------
	 BACK TO TOP
---------------------------------------------------*/
jQuery(document).ready(function($){
	$("#back-top").hide();
	
	$(function () {
		$(window).scroll(function () {
			if ($(this).scrollTop() > 100) {
				$('#back-top').fadeIn();
			} else {
				$('#back-top').fadeOut();
			}
		});

		$('#back-top').click(function () {
			$('body,html').animate({
				scrollTop: 0
			}, 800);
			return false;
		});
	});

});


/*!
 * Bootstrap v3.2.0 (http://getbootstrap.com)
 * Copyright 2011-2014 Twitter, Inc.
 * Licensed under MIT (https://github.com/twbs/bootstrap/blob/master/LICENSE)
 */

/*!
 * Generated using the Bootstrap Customizer (http://getbootstrap.com/customize/?id=e1effff67141dc384bfa)
 * Config saved to config.json and https://gist.github.com/e1effff67141dc384bfa
 */
if (typeof jQuery === "undefined") { throw new Error("Bootstrap's JavaScript requires jQuery") }

/* ========================================================================
 * Bootstrap: alert.js v3.2.0
 * http://getbootstrap.com/javascript/#alerts
 * ========================================================================
 * Copyright 2011-2014 Twitter, Inc.
 * Licensed under MIT (https://github.com/twbs/bootstrap/blob/master/LICENSE)
 * ======================================================================== */


+function ($) {
    'use strict';

    // ALERT CLASS DEFINITION
    // ======================

    var dismiss = '[data-dismiss="alert"]'
    var Alert   = function (el) {
        $(el).on('click', dismiss, this.close)
    }

    Alert.VERSION = '3.2.0'

    Alert.prototype.close = function (e) {
        var $this    = $(this)
        var selector = $this.attr('data-target')

        if (!selector) {
            selector = $this.attr('href')
            selector = selector && selector.replace(/.*(?=#[^\s]*$)/, '') // strip for ie7
        }

        var $parent = $(selector)

        if (e) e.preventDefault()

        if (!$parent.length) {
            $parent = $this.hasClass('alert') ? $this : $this.parent()
        }

        $parent.trigger(e = $.Event('close.bs.alert'))

        if (e.isDefaultPrevented()) return

        $parent.removeClass('in')

        function removeElement() {
            // detach from parent, fire event then clean up data
            $parent.detach().trigger('closed.bs.alert').remove()
        }

        $.support.transition && $parent.hasClass('fade') ?
            $parent
                .one('bsTransitionEnd', removeElement)
                .emulateTransitionEnd(150) :
            removeElement()
    }


    // ALERT PLUGIN DEFINITION
    // =======================

    function Plugin(option) {
        return this.each(function () {
            var $this = $(this)
            var data  = $this.data('bs.alert')

            if (!data) $this.data('bs.alert', (data = new Alert(this)))
            if (typeof option == 'string') data[option].call($this)
        })
    }

    var old = $.fn.alert

    $.fn.alert             = Plugin
    $.fn.alert.Constructor = Alert


    // ALERT NO CONFLICT
    // =================

    $.fn.alert.noConflict = function () {
        $.fn.alert = old
        return this
    }


    // ALERT DATA-API
    // ==============

    $(document).on('click.bs.alert.data-api', dismiss, Alert.prototype.close)

}(jQuery);