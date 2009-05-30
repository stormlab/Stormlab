<?php  if (!defined('BASEPATH')) exit('No direct script access allowed');
/**
 * Code Igniter
 *
 * An open source application development framework for PHP 4.3.2 or newer
 *
 * @package		CodeIgniter
 * @author		Rick Ellis
 * @copyright	Copyright (c) 2006, pMachine, Inc.
 * @license		http://www.codeignitor.com/user_guide/license.html 
 * @link		http://www.codeigniter.com
 * @since		Version 1.0
 * @filesource
 */
 
// ------------------------------------------------------------------------

/**
 * Code Igniter Asset Helper - Based off the Asset Helper written
 * by Nick Cernis [ www.goburo.com ].
 *
 * @package		CodeIgniter
 * @subpackage	Helpers
 * @category	Helpers
 * @author		Bryan Fillmer | Sparta Performance Training
 */

// ------------------------------------------------------------------------

/**
 * Image Helper
 *
 * Generates an img tag with a full base url to add images within your views. 
 *
 * @access	public
 * @param	string	the image name
 * @param	mixed	any attributes
 * @param   bool	whether this image is a submit button for a form
 * @return	string
 */
	function img_tag($img_name='',$atts='',$input=FALSE) {
		$CI = & get_instance();
		$base = $CI->config->item('base_url');
		$img_folder = $CI->config->item('assets_img');
		return !$input ? '<img src="'.$base.$img_folder.$img_name.'"'._parse_atts($atts).' />' : '<input type="image" src="'.$base.$img_folder.$img_name.'"'._parse_atts($atts).' />'."\r\n";
	}

// ------------------------------------------------------------------------

/**
 * Stylesheet Helper
 *
 * Generates a link tag using your base_url and assets_css to generate the proper path.
 *
 * @access  public
 * @param   string  the stylesheet name, can contain a file extension
 * @param   mixed   any attributes
 * @return  string
 */
	function css_link($css_name='',$atts='') {
		$CI = & get_instance();
		$base = $CI->config->item('base_url');
		$css_folder = $CI->config->item('assets_css');
		$css_name = (count(explode('.',$css_name))==1) ? $css_name.'.css' : $css_name;
		return '<link rel="stylesheet" type="text/css" href="'.$base.$css_folder.$css_name.'"'._parse_atts($atts).' />'."\r\n";
	}
	
// ------------------------------------------------------------------------

/**
 * Javascript Helper
 *
 * Generates a set of script tags pointing to the js file.
 *
 * @access  public
 * @param   string  the javascript name, can contain a file extension
 * @param   mixed   any attributes
 * @return  string
 */
	function js_tags($js_name='',$atts='') {
		$CI = & get_instance();
		$base = $CI->config->item('base_url');
		$js_folder = $CI->config->item('assets_js');
		$js_name = (count(explode('.',$js_name))==1) ? $js_name.'.js' : $js_name;
		return '<script type="text/javascript" src="'.$base.$js_folder.$js_name.'"'._parse_atts($atts).'></script>'."\r\n";
	}

// ------------------------------------------------------------------------
	
/**
 * Parse out the attributes
 *
 * The functions use this to write out the list of attributes.
 * Simplified version of the same function in Rick Ellis' url_helper.
 *
 * @access	private
 * @param	array, or string
 * @return	string
 */
	function _parse_atts($atts='') {
		if(is_string($atts)) {
			return ($atts != '') ? ' '.$atts : '';
		}

		$attributes = array();
		foreach($atts as $att => $val) {
			$attributes[] = $att.'="'.$val.'"';
		}

		return ' '.implode(' ',$attributes);
	}

?>