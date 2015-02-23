<?php
/*
Plugin Name: Single Background
Plugin URI: http://wp-time.com/single-background-wordpress-plugin/
Description: Add different background color or responsive background image for every single post or page.
Version: 1.0.0
Author: Qassim Hassan
Author URI: http://qass.im
License: GPLv2 or later
*/

/*  Copyright 2015  Qassim Hassan  (email : qassim.pay@gmail.com)

    This program is free software; you can redistribute it and/or modify
    it under the terms of the GNU General Public License, version 2, as 
    published by the Free Software Foundation.

    This program is distributed in the hope that it will be useful,
    but WITHOUT ANY WARRANTY; without even the implied warranty of
    MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
    GNU General Public License for more details.

    You should have received a copy of the GNU General Public License
    along with this program; if not, write to the Free Software
    Foundation, Inc., 51 Franklin St, Fifth Floor, Boston, MA  02110-1301  USA
*/


// Single Background Function
function single_background_plugin( $atts, $content = null ) {
	
	if( is_single() or is_page() ){ // check if single post or single page
		
		Extract(
			shortcode_atts(
				array(
					"url"		=>	"", // url attr, default is empty
					"color"		=>	"" // color attr, default is empty
				),$atts
			)
		);
		
		if ( !empty($url) ){ // if choose background image
			return '<style type="text/css">	
						html{
							background-image:none !important;
							background:none !important;
						}
						body{
							background:url('.$url.') fixed no-repeat !important;
							background-size:100% 100% !important;
							-webkit-background-size:100% 100% !important;
							-moz-background-size:100% 100% !important;
							-o-background-size:100% 100% !important;
						}
					</style>';
			return false;
		} // end if choose background image
		
		if ( !empty($color) ){ // if choose background color
			return '<style type="text/css">	
						html{
							background-image:none !important;
							background:none !important;
						}
						body{
							background-image:none !important;
							background:none !important;
							background-color:'.$color.' !important;
						}
					</style>';
		} // end if choose background color
	
	} // end if is_single()
	
} // end function
add_shortcode("single_bg", "single_background_plugin"); // Add Shortcode [single_bg url="" color=""]

?>