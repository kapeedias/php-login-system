<?php
//error_reporting(0);


    session_start();
    
    $GLOBALS['config'] = array(
        'mysql' => array(
            'host' => '68.178.226.214',
            'username' => 'livewd',
            'password' => '$@!D##P@K',
            'db' => 'crm_livewd'
        ),
        'remember' => array(
            'cookie_name' => 'livewd_hash',
            'cookie_expiry' =>  604800
        ),
        'session' => array(
            'session_name' => 'user',
            'token_name' => 'token'        
        )
    );

    spl_autoload_register(function($class){
        require_once 'classes/'.$class.'.php';
    });

require_once 'functions/sanitize.php';
