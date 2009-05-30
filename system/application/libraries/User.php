<?php  if (!defined('BASEPATH')) exit('No direct script access allowed'); 
	
	/*  USER CLASS
		Four simple functionas to allow a multiple level user system to
		be used. This class does no checking of databases at all, all
		that logic must be done seperately. This library has been written
		primarily to work with a simple integer based system of levels,
		although I suppose you could supply any string you want as well. */
	
	class User {
		
		/*  Set the current user level to the integer specified.
			Optional expiration on the cookie defaults to a year. */
		function set_level($level='',$expire='31536000',$name='ci_user') {
			
			/*  Current CI instance, plus helper. */
			$CI =& get_instance();
			$CI->load->helper('cookie');
			
			$cookie = array(
				'name'   => $name,
				'value'  => $level,
				'expire' => $expire
				);
			set_cookie($cookie);
			
		}
		
		/*  Check the cookie set in the set_level function,
			as well as the page_level set with the needed_level
			function. If they match, in we go! If no, redirect
			to the string if applicable. */
		function check_level($needed_level='',$redirect='',$name='ci_user') {
			
			/*  Current CI instance, plus helpers. */
			$CI =& get_instance();
			$CI->load->helper(array('cookie','url'));
			
			if(get_cookie($name)&&($needed_level>=get_cookie($name))) {
				return TRUE;
			} elseif(!empty($redirect)) {
				redirect($redirect);
			} else {
				return FALSE;
			}
			
		}
		
		/*  Clears out the cookie for the user's level. */
		function clear_level($name='ci_user') {
			
			/*  Current CI instance, plus helper. */
			$CI =& get_instance();
			$CI->load->helper('cookie');
			
			delete_cookie($name);
			
		}
	
	}

?>