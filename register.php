<?php 
require_once 'core/init.php';


if(Input::exists()){

    //CSRF Protection
    if(Token::check(Input::get('token'))){

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
            'fist_name' => array(
                'first_name'     => 'First Name',
                'required' => true,
                'min'      => 2,
                'max'      => 50
            ),
            'last_name' => array(
                    'last_name'     => 'Last Name',
                    'required' => true,
                    'min'      => 2,
                    'max'      => 50
            )
        ));


        if($validation->passed()){

                $user = new User();
                $salt = Hash::salt(32);

                try{

                    $user->create(array(
                        'username' => Input::get('username'),
                        'password_hash' => Hash::make(Input::get('password'),$salt),
                        'salt' => $salt,
                        'first_name' => Input::get('firstname'),
                        'last_name' => Input::get('lastname'),
                        'joined' => date('Y-m-d H:i:s'),
                        'group' => '1',
                        'email' => Input::get('email'),
                        'tel' => Input::get('tel')
                    ));

                } catch(Exception $e){
                    die($e->getMessage());
                }

                Session::flash('success','You registered successfully');
                header('Location: index.php');
        }else{
                foreach($validation->errors() as $error){
                    echo $error, '<br>';

                }
        }

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
            <input type="hidden" name="token" value="<?php echo Token::generate();?>" />
            <input type="submit" name="doRegister" id="doRegister" value="Register" class="btn btn-success"/>
        </div>


    </form>



</div>

</body>
</html>
