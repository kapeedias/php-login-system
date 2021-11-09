<?php
require_once 'core/init.php';


/* SELECT QUERY 

$user = DB::getInstance()->get('users', array('username' ,'=', 'sai'));

if(!$user->count()){
    echo "No User";
}else{

    //for fertching single column from the row
    echo $user->first()->id;
    echo "<br />";


    //for fetching multiple records
    foreach($user->results() as $user){
        echo $user->username, '<br />';        
    }
}

*/

/* UPDATE QUERY */

$user = DB::getInstance()->update('users',1,array(
    'username'=>'admin',
    'password'=>'6047912932',
    'salt'=>'saltupdate',
    'name' => 'Sai Deepak Chandrasekhar'
    
));

