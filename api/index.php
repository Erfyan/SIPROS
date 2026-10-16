<?php
/**
 * Vercel Serverless Bridge for CodeIgniter 3
 * 
 * This file acts as the entry point for Vercel's serverless PHP runtime.
 * All requests are routed here via vercel.json configuration.
 */

// --------------------------------------------------------------------
// APPLICATION ENVIRONMENT
// --------------------------------------------------------------------
define('ENVIRONMENT', isset($_SERVER['CI_ENV']) ? $_SERVER['CI_ENV'] : 'production');

// --------------------------------------------------------------------
// ERROR REPORTING
// --------------------------------------------------------------------
switch (ENVIRONMENT)
{
	case 'development':
		error_reporting(E_ALL & ~E_DEPRECATED);
		ini_set('display_errors', 1);
	break;

	case 'testing':
	case 'production':
		ini_set('display_errors', 0);
		error_reporting(E_ALL & ~E_NOTICE & ~E_DEPRECATED & ~E_STRICT & ~E_USER_NOTICE & ~E_USER_DEPRECATED);
	break;

	default:
		header('HTTP/1.1 503 Service Unavailable.', TRUE, 503);
		echo 'The application environment is not set correctly.';
		exit(1);
}

// --------------------------------------------------------------------
// PATHS — adjusted for api/ subdirectory
// --------------------------------------------------------------------
$system_path = __DIR__ . '/../system';
$application_folder = __DIR__ . '/../application';
$view_folder = '';

// Resolve system path
if (($_temp = realpath($system_path)) !== FALSE)
{
	$system_path = $_temp . DIRECTORY_SEPARATOR;
}

if ( ! is_dir($system_path))
{
	header('HTTP/1.1 503 Service Unavailable.', TRUE, 503);
	echo 'Your system folder path does not appear to be set correctly.';
	exit(3);
}

// Set main path constants
define('SELF', pathinfo(__FILE__, PATHINFO_BASENAME));
define('BASEPATH', $system_path);
define('FCPATH', dirname(__DIR__) . DIRECTORY_SEPARATOR);
define('SYSDIR', basename(BASEPATH));

// Resolve application path
if (($_temp = realpath($application_folder)) !== FALSE)
{
	$application_folder = $_temp;
}

define('APPPATH', $application_folder . DIRECTORY_SEPARATOR);

// Resolve view path
if ( ! isset($view_folder[0]) && is_dir(APPPATH . 'views' . DIRECTORY_SEPARATOR))
{
	$view_folder = APPPATH . 'views';
}

define('VIEWPATH', $view_folder . DIRECTORY_SEPARATOR);

// --------------------------------------------------------------------
// LOAD THE BOOTSTRAP FILE
// --------------------------------------------------------------------
require_once BASEPATH . 'core/CodeIgniter.php';
