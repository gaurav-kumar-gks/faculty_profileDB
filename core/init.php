<?php

// START SESSION AT EACH RELOAD OF PAGE 
session_start();

// SETTING THE CONFIGS
$GLOBALS['config'] = array(
  'mysql' => array(
    'host' => 'db',
    'user' => 'root',
    'password' => 'jrtalent',
    'db' => 'faculty_profile_db'
    // 'host' => 'db',
    // 'user' => 'testuser2',
    // 'password' => 'Test@2021x',
    // 'db' => 'faculty_profile_db'
  ),
  'remember' => array(
    'cookie_name' => 'hash',
    'cookie_expiry' => 604800 
  ),
  'session' => array(
    'session_name' => 'user',
    'token_name' => 'token'
  )
);

spl_autoload_register(function($class){
  require_once 'classes/' .$class. '.php';
});

require_once 'functions/sanitize.php';

