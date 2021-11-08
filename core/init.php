<?php
//error_reporting(0);


    session_start();
    
    $GLOBALS['config'] = array(
        'mysql' => array(
            'host' => '127.0.0.1',
            'username' => 'root',
            'password' => '',
            'db' => 'livewdinc'
        ),
        'remember' => array(
            'cookie_name' => 'livewd_hash',
            'cookie_expiry' =>  604800
        ),
        'session' => array(
            'session_name' => 'user'            
        )
    );

    spl_autoload_register(function($class){
        require_once 'classes/'.$class.'.php';
    });

require_once 'functions/sanitize.php';
