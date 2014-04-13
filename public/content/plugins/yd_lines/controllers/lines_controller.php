<?php

namespace YdLines;

class LinesController {

  public $request_method;

  public $yd_lines_create;
  public $yd_lines_edit;
  public $yd_lines_update;
  public $current_user;

  /* public $actions = ['yd_lines_create']; */

  public static function run($current_user = '') {
    $instance = new LinesController($current_user);

    if($instance->request_method == 'GET') {
      if($_GET['action'] == 'delete')
        $instance->delete();
    }

    if($instance->request_method == 'POST') {

      // 创建路线
      if ( self::is_create_line() ) 
        $instance->create();

      // 更新路线
      if ( self::is_update_line() ) 
        $instance->update();

      // 删除路线
      if ( self::is_delete_line() ) 
        $instance->delete();

    }
  }

  /* INSTANCE METHODS */

  function __construct($current_user = '') {
   $this->request_method = $_SERVER['REQUEST_METHOD'];
   $this->current_user = $current_user;
  }

  function create() {

    global $user_ID;

    $line = new \YdLine($_POST['line']);   
    $line->user_id = $user_ID;

    if ($line->save()) {
      wp_redirect("/lines/$user_ID/index");
      exit();
    }
  } 

  function update() { 
    global $user_ID;

    $line = \YdLine::find($_GET['line_id']);

    if(!$line->owner_by($user_ID)){
      $_COOKIE['error'] = '非法操作';
      wp_redirect("/lines/$user_ID/index");
      exit();
    }
    
    if($line->update_attributes($_POST['line'])){
      $_COOKIE['notice'] = '更新成功。';
      wp_redirect("/lines/$user_ID/index");
      exit();
    }
  
  } 

  function delete() {
    global $user_ID;
    $line = \YdLine::find($_GET['line_id']);
    if($line->owner_by($user_ID) && $line->delete()){
      $_COOKIE['notice'] = '删除成功';
      wp_redirect("/lines/$user_ID/index");
    }

  } 

  function index() {
    global $user_ID;
    $user = \YdUser::find($user_ID);
    $lines = $user->lines();
  }
   
  /* STATIC METHODS */  
  static function is_create_line() {
    if(isset( $_POST['yd_lines_create'] ) || wp_verify_nonce( $_POST['yd_lines_create'], 'yd_lines_create' ))
      return true;
  }

  static function is_update_line() {
    if(isset( $_POST['yd_lines_update'] ) || wp_verify_nonce( $_POST['yd_lines_update'], 'yd_lines_update' ))
      return true;
  }

  static function is_delete_line() {
    if(isset( $_POST['yd_lines_delete'] ) || wp_verify_nonce( $_POST['yd_lines_delete'], 'yd_lines_delete' ))
      return true;
  }

}

