<?php 

require_once 'core/init.php';
if(Input::exists()){
   //echo Input::get('username');
   $validate = new Validate();
   $validation = $validate->check($_POST, array(
     'username' =>  array(
            'name'     => 'Username',
            'required' => true,
            'min'      => 2,
            'max'      => 20,
            'unique'   => 'users'
    ),
     'password' => array(
            'name'     => 'Password',
            'required' => true,
            'min'      => 8
    ),
     'passwordagain' => array(
            'name'     => 'Re-Enter Password',
            'required' => true,
            'matches'  => 'password'
     ),
     'fullname' => array(
            'name'     => 'Full Name',
            'required' => true,
            'min'      => 2    
     )
   ));


   if($validation->passed()){
        echo "passed";
   }else{
        print_r($validation->errors());
   }


}
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <title>Register</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.2/dist/css/bootstrap.min.css" rel="stylesheet">
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.2/dist/js/bootstrap.bundle.min.js"></script>
</head>
<body>

<div class="container mt-5 col-md-4">
  <h1>Register Page</h1>
 
    <form action="" method="POST" class="form">
        <div class="form-group mt-2">
            <label for="username">Username</label>
            <input type="text" name="username" id="username" value="<?php echo Input::get('username'); ?>" class="form-control" autocomplete="off"/>
        </div>
        <div class="form-group mt-2">
            <label for="password">Password</label>
            <input type="password" name="password" id="password" value="" class="form-control" autocomplete="off"/>
        </div>
        <div class="form-group mt-2">
            <label for="passwordagain">Re-Enter Password</label>
            <input type="password" name="passwordagain" id="passwordagain" value="" class="form-control" autocomplete="off"/>
        </div>
        <div class="form-group mt-2">
            <label for="fullname">Full Name</label>
            <input type="text" name="fullname" id="fullname" value="<?php echo Input::get('fullname'); ?>" class="form-control" autocomplete="off"/>
        </div>
        <div class="form-group mt-2">
            <input type="submit" name="doRegister" id="doRegister" value="Register" class="btn btn-success"/>
        </div>


    </form>



</div>

</body>
</html>
