<?php
namespace YdLines;

define("BASEPATH", plugin_dir_path(__FILE__) . "../");

class LineShortCode {
  
  public $prefix = "yd_line_";
  public $shortcodes = [
    'form',
    'index',
    'user_index',
    'edit',
    'show'
    ];

  public static function init() {
    $object = new LineShortCode();
    $object->register();
  }

  function __construct($shortcodes = []) {
    $this->shortcodes += $shortcodes;
  }

  public function register() {
    foreach ($this->shortcodes as $shortcode) {
      add_shortcode($this->prefix . $shortcode, array($this, $shortcode));
    }
  }

  public function form() {
    is_user_logged_in() || auth_redirect();
    $line = new \YdLine();
    require(BASEPATH . '/views/new.php');
  }

  public function index() {
    require(BASEPATH . '/views/index.php');
  }

  public function new_line() {
    require(BASEPATH . '/views/new.php');
  }

  public function user_index() {
    is_user_logged_in() || auth_redirect();
    global $user_ID;
    $user = \YdUser::find($user_ID);
    $lines = $user->lines;
    require(BASEPATH . '/views/user_index.php');
  }

  function edit() {
    $line = \YdLine::find($_GET['line_id']);
    require(BASEPATH . '/views/edit.php');
  }

  function show() {
    $line = \YdLine::find($_GET['line_id']);
    require(BASEPATH . '/views/show.php');
  }

}

?>
