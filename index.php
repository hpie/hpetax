<?php
date_default_timezone_set('UTC'); 
$lifetime=600;
session_set_cookie_params($lifetime);
ini_set( 'session.cookie_httponly', 1 );
session_start();
setcookie(session_name(),session_id(),time()+$lifetime,'/',null,null,TRUE);
if(!isset($_SESSION['securityToken1'])){
    $_SESSION['securityToken1']=bin2hex(random_bytes(24));
}
header("X-XSS-Protection: 1; mode=block");
header('X-Content-Type-Options: nosniff');
header('X-Frame-Options: deny');
header('X-Powered-By:');


include 'common_url.php';


define('IS_LOGS', false);
define('DEFAULT_LANG', 'en');

if(!isset($_SESSION['token'])){
    $_SESSION['tokenvalue'] = bin2hex(random_bytes(24));
    $_SESSION['tokenchekvalue']=$_SESSION['tokenvalue'];
}

/*
 * ---------------------------------------------------------------
 * SYSTEM FOLDER NAME
 * ---------------------------------------------------------------
 *
 * This variable must contain the name of your "system" folder.
 * Include the path if the folder is not in the same  directory
 * as this file.
 *
 */
$system_path = 'system';
/*
 * ---------------------------------------------------------------
 * APPLICATION FOLDER NAME
 * ---------------------------------------------------------------
 *
 * NO TRAILING SLASH!
 *
 */
$application_folder = 'application';

/*
 * ---------------------------------------------------------------
 * CONFIG FOLDER NAME
 * ---------------------------------------------------------------
 *
 * NO TRAILING SLASH!
 *
 */
$config_folder = 'Config';

/*
 * ---------------------------------------------------------------
 * LOGS FOLDER NAME
 * ---------------------------------------------------------------
 *
 * NO TRAILING SLASH!
 *
 */
$logs_folder = 'Logs';



/*
 * ---------------------------------------------------------------
 * COMMON FOLDER NAME
 * ---------------------------------------------------------------
 *
 * NO TRAILING SLASH!
 *
 */
$common_folder = 'Common';

/*
 * ---------------------------------------------------------------
 *  Resolve the system path for increased reliability
 * ---------------------------------------------------------------
 */

// Set the current directory correctly for CLI requests
if (defined('STDIN')) {
    chdir(dirname(__FILE__));
}

if (realpath($system_path) !== FALSE) {
    $system_path = realpath($system_path) . '/';
}

// ensure there's a trailing slash
$system_path = rtrim($system_path, '/') . '/';

// Is the system path correct?
if (!is_dir($system_path)) {
    exit("Your system folder path does not appear to be set correctly. Please open the following file and correct this: " . pathinfo(__FILE__, PATHINFO_BASENAME));
}



/*
 * -------------------------------------------------------------------
 *  Now that we know the path, set the main path constants
 * -------------------------------------------------------------------
 */
// The ROOT directory of the Project
define('ROOT', getcwd() . "/");

// The name of THIS file
define('SELF', pathinfo(__FILE__, PATHINFO_BASENAME));

// The PHP file extension
// this global constant is deprecated.
define('EXT', '.php');

// Path to the system folder
define('BASEPATH', str_replace("\\", "/", $system_path));

// Path to the front controller (this file)
define('FCPATH', str_replace(SELF, '', __FILE__));

// Name of the "system folder"
define('SYSDIR', trim(strrchr(trim(BASEPATH, '/'), '/'), '/'));


// The path to the "application" folder
if (is_dir($application_folder)) {
    define('APPPATH', $application_folder . '/');
} else {
    if (!is_dir(BASEPATH . $application_folder . '/')) {
        exit("Your application folder path does not appear to be set correctly. Please open the following file and correct this: " . SELF);
    }

    define('APPPATH', BASEPATH . $application_folder . '/');
}

// Application dir root path
define('APPLICATION_PATH', getcwd() . "/" . APPPATH);
define('MVC_PATH', getcwd() . "/" . APPPATH."MVC/");
define('LOGS_PATH', getcwd() . "/" . APPPATH.$logs_folder);
define('APP_INCLUDE',  APPPATH."MVC/");
define('APP_INCLUDE_M',  APPPATH."MVC/Model/");
define('APP_INCLUDE_V',  APPPATH."MVC/View/");
define('APP_INCLUDE_C',  APPPATH."MVC/Controller/");
define('APP_INCLUDE_Library',  APPPATH."Libraries/");
/*
 * --------------------------------------------------------------------
 * INITIALISE application
 * --------------------------------------------------------------------
 *
 * 
 */
include_once("$application_folder/$common_folder/init.php");
?>