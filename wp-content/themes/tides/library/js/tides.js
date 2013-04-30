'use strict';
/*
Bones Scripts File
Author: Eddie Machado

This file should contain any js scripts you want to add to the site.
Instead of calling it in the header or throwing it inside wp_head()
this file will be called automatically in the footer so as not to
slow the page load.

*/

// IE8 ployfill for GetComputed Style (for Responsive Script below)
if (!window.getComputedStyle) {
    window.getComputedStyle = function(el, pseudo) {
        this.el = el;
        this.getPropertyValue = function(prop) {
            var re = /(\-([a-z]){1})/g;
            if (prop == 'float') prop = 'styleFloat';
            if (re.test(prop)) {
                prop = prop.replace(re, function () {
                    return arguments[2].toUpperCase();
                });
            }
            return el.currentStyle[prop] ? el.currentStyle[prop] : null;
        }
        return this;
    }
}   

// as the page loads, call these scripts
jQuery(document).ready(function ($) {

    var height = $('#footer-content').height();

    $('#nav-mobile').click(function () {
        var $this = $(this);

        $this.next().slideToggle();
    });

    $('.wpcf7 input[type="text"], .wpcf7 textarea').focus(function () {
        var $this = $(this);
        $this.parent().prev().fadeOut('fast');
    });

    $('.wpcf7 input[type="text"], .wpcf7 textarea').blur(function () {
        var $this = $(this);

        if ($this.val() === '')
            $this.parent().prev().fadeIn('fast');
    });

    $('#footer-toggle').click(function (e) {
        var $this        = $(this),
            docHeight    = $(document).height(),
            windowHeight = $(window).height(),
            scrollPos    = docHeight - windowHeight + height;

        $('#footer-content').animate({ height: "toggle"}, 1000);
        $('html, body').animate({ scrollTop: scrollPos + 'px'}, 1000);

        if ($this.hasClass('open')) {
            $this.removeClass('open');
        } else {
            $this.addClass('open');
        }

        e.preventDefault();
    });

    $('#nav-neighborhood ul li.parent a, #mobile-nav-neighborhood ul li.parent a').click(function (e) {
        var $this  = $(this),
            $that  = $this.parent(),
            $child = $that.next();

        if ($that.hasClass('active')) {
            $that.removeClass('active');
            $this.addClass('tides-inactive_sub_nav');
            $this.removeClass('tides-closed_nav');
        } else {
            $that.addClass('active');
            $this.removeClass('tides-inactive_sub_nav');
            $this.addClass('tides-closed_nav');
            $that.siblings().not('.child').removeClass('active');
        }
        
        $('#nav-neighborhood .child').not($child).slideUp();
        $('#mobile-nav-neighborhood .child').not($child).slideUp();
        $child.slideToggle();

        e.preventDefault();
    });

    $('#nav-neighborhood .child a').click(function (e) {
        var $this = $(this),
            href  = $this.attr('href');

        if ($('.location:hidden').length > 0) {
            $('.location').fadeIn('slow', function () {
                $('#' + href).fadeIn('fast');    
            });
        } else {
            $('#' + href).fadeIn('fast');
        }
        
        $('.location li:not(#' + href + ')').fadeOut('fast');

        e.preventDefault();
    });

    $('#mobile-nav-neighborhood .sub-parent a').click(function (e) {
        var $this  = $(this),
            $that  = $this.parent(),
            $child = $that.next();

        if ($that.hasClass('sub-active')) {
            $that.removeClass('sub-active');
        } else {
            $that.addClass('sub-active');
            $that.siblings().not('.sub-child').removeClass('sub-active');
        }
        
        $('#mobile-nav-neighborhood .sub-child').not($child).slideUp();
        $child.slideToggle();

        e.preventDefault();
    });

    $('.blog .post-thumbnail').click(function () {
        var $this = $(this);

        $this.fadeOut('fast', function () {
            $this.next().fadeIn('fast');
        });
    });
    
    $('.blog .entry-content').click(function () {
        var $this = $(this);

        $this.fadeOut('fast', function () {
            $this.prev().fadeIn('fast');
        });
    });

    $('a[href="#mobile-contact-form"]').click(function (e) {
        var pos1, pos2, hash, start, end, total, time,
            $this   = $(this),
            offset  = $($this.attr('href')).offset().top,
            pos1    = $this.offset().top,
            hash    = event.currentTarget.hash.toString(),
            pos2    = $(hash.toString()).offset().top,
            $target = $('html, body');

        start = parseInt(pos1);
        end = parseInt(pos2);
        total = start - end;
        time = Math.abs(total);
        $target.animate({ scrollTop:offset }, time);
        e.preventDefault();
    });

    $('#privacypolicy').click(function (e) {
        $('#modal').fadeIn();
        e.preventDefault();
    });

    $('#modal a').click(function (e) {
        $('#modal').fadeOut();
        e.preventDefault();
    });

    $('#contact-form input[type="submit"]').click(function (e) {
        var errors = [];

        if ($('#contact-form input[name="first_name"]').val() == "") {
            errors.push(1);
            $('#contact-form input[name="first_name"]').addClass('error-field');
        } else {
            $('#contact-form input[name="first_name"]').removeClass('error-field');
        }

        if ($('#contact-form input[name="last_name"]').val() == "") {
            errors.push(1);
            $('#contact-form input[name="last_name"]').addClass('error-field');
        } else {
            $('#contact-form input[name="last_name"]').removeClass('error-field');
        }

        if ($('#contact-form input[name="email"]').val() == "") {
            errors.push(1);
            $('#contact-form input[name="email"]').addClass('error-field');
        } else {
            $('#contact-form input[name="email"]').removeClass('error-field');
        }

        if (errors.length > 0) e.preventDefault();
    });

    $('#mobile-contact-form input[type="submit"]').click(function (e) {
        var errors = [];

        if ($('#mobile-contact-form input[name="first_name"]').val() == "") {
            errors.push(1);
            $('#mobile-contact-form input[name="first_name"]').addClass('error-field');
        } else {
            $('#mobile-contact-form input[name="first_name"]').removeClass('error-field');
        }

        if ($('#mobile-contact-form input[name="last_name"]').val() == "") {
            errors.push(1);
            $('#mobile-contact-form input[name="last_name"]').addClass('error-field');
        } else {
            $('#mobile-contact-form input[name="last_name"]').removeClass('error-field');
        }

        if ($('#mobile-contact-form input[name="email"]').val() == "") {
            errors.push(1);
            $('#mobile-contact-form input[name="email"]').addClass('error-field');
        } else {
            $('#mobile-contact-form input[name="email"]').removeClass('error-field');
        }

        if (errors.length > 0) e.preventDefault();
    });

    $('.carousel-floorplans').carousel({
        itemsPerPage: 3,
        itemsPerTransition: 3,
        easing: 'linear',
        noOfRows: 2,
        pagination: true
    });

    $('.mobile-carousel-floorplans').carousel({
        itemsPerPage: 2,
        itemsPerTransition: 2,
        easing: 'linear',
        noOfRows: 2
    });

    $('.phone-carousel-floorplans').carousel({
        itemsPerPage: 2,
        itemsPerTransition: 2,
        easing: 'linear',
        noOfRows: 2
    });

    $('.carousel-team').carousel({
        itemsPerPage: 4,
        itemsPerTransition: 1,
        easing: 'linear',
        noOfRows: 1,
        pagination: false 
    });

    $('.mobile-carousel-team').carousel({
        itemsPerPage: 4,
        itemsPerTransition: 1,
        easing: 'linear',
        noOfRows: 1,
        pagination: false 
    });

    $('.phone-carousel-team').carousel({
        itemsPerPage: 2,
        itemsPerTransition: 1,
        easing: 'linear',
        noOfRows: 1,
        pagination: false 
    });

    $('.carousel-gallery').carousel({
        itemsPerPage: 3,
        itemsPerTransition: 3,
        easing: 'linear',
        noOfRows: 2,
        pagination: true
    });

    $('.mobile-carousel-gallery').carousel({
        itemsPerPage: 3,
        itemsPerTransition: 3,
        easing: 'linear',
        noOfRows: 2,
        pagination: false
    });

    $('.phone-carousel-gallery').carousel({
        itemsPerPage: 2,
        itemsPerTransition: 2,
        easing: 'linear',
        noOfRows: 2,
        pagination: false
    });

    $('.carousel-neighbors').carousel({
        itemsPerPage: 3,
        itemsPerTransition: 1,
        easing: 'linear',
        noOfRows: 1,
        pagination: false,
    });

    $('.mobile-carousel-neighbors').carousel({
        itemsPerPage: 3,
        itemsPerTransition: 1,
        easing: 'linear',
        noOfRows: 1,
        pagination: false,
    });

    $('.phone-carousel-neighbors').carousel({
        itemsPerPage: 1,
        itemsPerTransition: 1,
        easing: 'linear',
        noOfRows: 1,
        pagination: false,
    });

    Shadowbox.init({
        displayCounter: false,
        onFinish: function (e) {
            var $parent = $(e.link).parent();

            if ($('#sb-counter').next().is('a')) {
                $('#sb-counter').next().remove();
            }

            if ($('#sb-wrapper').find('.neighbor-comment').length > 0) {
                $('#sb-wrapper').find('.neighbor-comment').remove();
            }

            if ($('#sb-wrapper').find('.floorplan-detail').length > 0) {
                $('#sb-wrapper').find('.floorplan-detail').remove();
            }

            if ($('#sb-wrapper').find('.gallery-detail').length > 0) {
                console.log('remove');
                $('#sb-wrapper').find('.gallery-detail').remove();
            }

            if ($parent.find('input[name="floorplan-pdf"]').length > 0) {
                var pdf = $parent.find('input[name="floorplan-pdf"]').val(),
                    anchor = '<a id="download-link" href="' + url + '/' + pdf + '">Download &amp; Print</a>';

                $('#sb-counter').after(anchor);
            }

            if ($parent.find('input[name="gallery-detail"]').length > 0) {
                var text = $parent.find('input[name="gallery-detail"]').val(),
                    tag = '<p class="gallery-detail">"' + text +'"</a>';

                $('#sb-wrapper').append(tag);
            }

            if ($parent.find('input[name="neighbor-comment"]').length > 0) {
                var text = $parent.find('input[name="neighbor-comment"]').val(),
                    tag = '<p class="neighbor-comment">"' + text +'"</a>';

                $('#sb-wrapper').append(tag);
                $('#sb-wrapper').css('top','25px');
            }
        }
    });

    /*
    Responsive jQuery is a tricky thing.
    There's a bunch of different ways to handle
    it, so be sure to research and find the one
    that works for you best.
    */
    
    /* getting viewport width */
    var responsive_viewport = $(window).width();

    /* if is below 481px */
    if (responsive_viewport < 481) {
        
    } /* end smallest screen */

    /* if is larger than 481px */
    if (responsive_viewport > 481) {

    } /* end larger than 481px */
    
    /* if is above or equal to 768px */
    if (responsive_viewport >= 768) {
        $('.news-post .content').jScrollPane();
    }
    
    /* off the bat large screen actions */
    if (responsive_viewport > 1030) {
        
    }

}); /* end of as page load scripts */

/*! A fix for the iOS orientationchange zoom bug.
 Script by @scottjehl, rebound by @wilto.
 MIT License.
*/
(function(w){
	// This fix addresses an iOS bug, so return early if the UA claims it's something else.
	if( !( /iPhone|iPad|iPod/.test( navigator.platform ) && navigator.userAgent.indexOf( "AppleWebKit" ) > -1 ) ){ return; }
    var doc = w.document;
    if( !doc.querySelector ){ return; }
    var meta = doc.querySelector( "meta[name=viewport]" ),
        initialContent = meta && meta.getAttribute( "content" ),
        disabledZoom = initialContent + ",maximum-scale=1",
        enabledZoom = initialContent + ",maximum-scale=10",
        enabled = true,
		x, y, z, aig;
    if( !meta ){ return; }
    function restoreZoom(){
        meta.setAttribute( "content", enabledZoom );
        enabled = true; }
    function disableZoom(){
        meta.setAttribute( "content", disabledZoom );
        enabled = false; }
    function checkTilt( e ){
		aig = e.accelerationIncludingGravity;
		x = Math.abs( aig.x );
		y = Math.abs( aig.y );
		z = Math.abs( aig.z );
		// If portrait orientation and in one of the danger zones
        if( !w.orientation && ( x > 7 || ( ( z > 6 && y < 8 || z < 8 && y > 6 ) && x > 5 ) ) ){
			if( enabled ){ disableZoom(); } }
		else if( !enabled ){ restoreZoom(); } }
	w.addEventListener( "orientationchange", restoreZoom, false );
	w.addEventListener( "devicemotion", checkTilt, false );
})( this );
