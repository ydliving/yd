<?php
/*
Plugin Name: Yd_lines
Version: 0.1-alpha
Description: PLUGIN DESCRIPTION HERE
Author: YOUR NAME HERE
Author URI: YOUR SITE HERE
Plugin URI: PLUGIN SITE HERE
Text Domain: yd_lines
Domain Path: /languages
*/


require APP_ROOT . '/vendor/autoload.php';
require_once(APP_ROOT . '/app/models/YdLine.php');
require 'helpers/lines_helpers.php';
require 'shortcodes/lines_shortcodes.php';
require 'controllers/lines_controller.php';
require_once(ABSPATH . 'wp-includes/pluggable.php');

\ActiveRecord\Config::initialize(function($cfg) 
{
	$cfg->set_model_directory(APP_ROOT . "/app/models");
	$cfg->set_connections(array('development' =>
		'mysql://root@127.0.0.1/ydliving?charset=utf8'));
});



add_action('init', 'init'); 

function init() {

	global $current_user;
	YdLines\LineShortCode::init();
	YdLines\LinesController::run($current_user);
}



/* function init() { */
	/*   require 'helpers/lines_helpers.php'; */
	/*   require 'shortcodes/lines_shortcodes.php'; */
	/*   require_once 'controllers/lines_controller.php'; */
	/*   YdLines\LineShortCode::init(); */
	/*   YdLines\LinesController::run(); */
	/* } */


