<?php
/*
Plugin Name: Single Background
Plugin URI: http://wp-time.com/single-background-wordpress-plugin/
Description: Add different background color or responsive background image for every single post or page.
Version: 1.0.1
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


// WP Time
if( !function_exists('WP_Time') ) {
	function WP_Time() {
		add_menu_page( 'WP Time', 'WP Time', 'update_core', 'WP_Time', 'WP_Time_Page', 'dashicons-admin-links');
		function WP_Time_Page() {
			?>
            	<div class="wrap">
                	<h2>WP Time</h2>
					<div class="tool-box">
                		<h3 class="title">Thanks for using our plugins!</h3>
                    	<p>For more plugins, please visit <a href="http://wp-time.com" title="Our Website" target="_blank">WP Time Website</a> and <a href="https://profiles.wordpress.org/qassimdev/#content-plugins" title="Our profile on WordPress" target="_blank">WP Time profile on WordPress</a>.</p>
                        <p>For contact or support, please visit <a href="http://wp-time.com/contact/" title="Contact us!" target="_blank">WP Time Contact Page</a>.</p>
                        <p>Follow WP Time owner on <a href="https://twitter.com/Qassim_Dev" title="Follow him!" target="_blank">Twitter</a>.</p>
					</div>
					<div class="tool-box">
						<h3 class="title">Beautiful WordPress Themes</h3>
						<p>Get collection of 87 WordPress themes for only $69, a lot of features and free support! <a href="http://j.mp/et_ref_wptimeplugins" title="Get it now!" target="_blank">Get it now</a>.</p>
                        <p>See also <a href="http://j.mp/cm_ref_wptimeplugins" title="CreativeMarket - WordPress themes" target="_blank">CreativeMarket</a> and <a href="http://j.mp/tf_ref_wptimeplugins" title="Themeforest - WordPress themes" target="_blank">Themeforest</a>.</p>
                        <p><a href="http://j.mp/et_ref_wptimeplugins" title="Get collection of 87 WordPress themes for only $69" target="_blank"><img src="http://www.elegantthemes.com/affiliates/banners/570x100.jpg"></a></p>
					</div>
                </div>
			<?php
		}
	}
	add_action( 'admin_menu', 'WP_Time' );
}


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