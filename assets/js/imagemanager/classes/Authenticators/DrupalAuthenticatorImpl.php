<?php
/**
 * DrupalAuthenticatorImpl.php
 *
 * @package MCImageManager.authenicators
 * @author Moxiecode
 * @copyright Copyright © 2005, Moxiecode Systems AB, All rights reserved.
 */

// Include Drupal bootstrap logic
@session_destroy();

$tiny_dir = getcwd();
define('TINY_OLDDIR', $tiny_dir);
$tiny_root = "";

// Loop down to bootstrap
while($tiny_dir = @dirname($tiny_dir)) {
	if (@file_exists($tiny_dir ."/includes/bootstrap.inc")) {
		$tiny_root = $tiny_dir;
		break;
	}
}

if ($tiny_root == "")
	die("Error, root of Drupal not found!");

define('TINY_ROOT', $tiny_root);

chdir($tiny_root);
require_once("includes/bootstrap.inc");
require_once("includes/common.inc");

if (function_exists("drupal_bootstrap"))
	drupal_bootstrap(DRUPAL_BOOTSTRAP_FULL);

chdir(TINY_OLDDIR);

// Require default config again, cause... weird.
require("includes/default_config.php");


/**
 * This class is a Drupal CMS authenticator implementation.
 *
 * @package MCImageManager.Authenticators
 */
class DrupalAuthenticatorImpl extends BaseAuthenticator {
    /**#@+
	 * @access public
	 */

	/**
	 * Main constructor.
	 */
	function DrupalAuthenticatorImpl() {
	}

	/**
	 * Initializes the authenicator.
	 *
	 * @param Array $config Name/Value collection of config items.
	 */
	function init(&$config) {
	}

	/**
	 * Returns a array with group names that the user is bound to.
	 *
	 * @return Array with group names that the user is bound to.
	 */
	function getGroups() {
		return "";
	}

	/**
	 * Returns true/false if the user is logged in or not.
	 *
	 * @return bool true/false if the user is logged in or not.
	 */
	function isLoggedin() {
		return user_access('access tinymce');
	}

	/**#@-*/
}

?>