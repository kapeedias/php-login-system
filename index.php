<?php
require_once 'core/init.php';

$user = DB::getInstance()->get('users', array('username','=','sai'));

if($user->error()){


    echo "No User";
}else{
    echo "Ok";
}