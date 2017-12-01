/*
================================================================================================
Tifology - customize-preview.js
================================================================================================
This is the most generic template file in a WordPress theme and is one of required files to hide
and show the primary navigation for the Primary Navigation in different resolution and other
features.

@package        Amity WordPress Theme
@copyright      Copyright (C) 2016. Benjamin Lu
@license        GNU General Public License v2 or later (http://www.gnu.org/licenses/gpl-2.0.html)
@author         Benjamin Lu (https://www.luminathemes.com/)
================================================================================================
*/
(function($) {
	// Header text color.
	wp.customize('header_textcolor', function(value) {
		value.bind(function(to) {
			if ('blank' === to) {
				$('.site-title a, .site-description').css( {
					'clip': 'rect(1px, 1px, 1px, 1px)',
					'position': 'absolute'
				} );
			} else {
				$('.site-title a, .site-description').css( {
					'clip': 'auto',
					'position': 'relative'
				} );
				$('.site-title a, .site-description').css( {
					'color': to
				} );
			}
		} );
	} );
    
	// Custom Header Background Color
	wp.customize('header_color', function(value) {
		value.bind(function(to) {
			$('.site-header').css( {
				'background-color': to 
			});
		} );
	} );
    
	// Custom Header Background Color
	wp.customize('body_text_color', function(value) {
		value.bind(function(to) {
			$('body').css( {
				'color': to 
			});
		} );
	} );
    
	// Custom Layout Options
	wp.customize('post_layout', function(value) {
		value.bind(function(to) {
			$( '#general-layout' ).removeClass( 'sidebar-left sidebar-right full-width' );
			$( '#general-layout' ).addClass( to );
		} );
	} );
} )( jQuery );