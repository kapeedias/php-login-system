<?php

require_once 'core/init.php';

if (Input::exists()) {
    if (Token::check(Input::get('token'))) {
        $validate = new Validate();
        $validation = $validate->check(
            array(
                'username' => array('required' => true),
                'password' => array('required' => true),
            )
        );

        if ($validation->passed()) {

            $user = new User();
            $remember = (Input::get('remember') === 'on') ? true : false;
            $login = $user->login(Input::get('username'), Input::get('password'), $remember);

            if ($login) {
                echo 'Success';
            } else {
                echo 'Login failed';
            }

        } else {
            foreach ($validation->errors() as $error) {
                echo $error . '<br>';
            }
        }

    }
}

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <title>Login</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.2/dist/js/bootstrap.bundle.min.js"></script>
</head>

<body>

    <div class="container mt-5 col-md-4">
        <h1>Login Page</h1>

        <form action="" method="POST" class="form">
            <div class="form-group mt-2">
                <label for="username">Username</label>
                <input type="text" name="username" id="username" value="<?php echo Input::get('username'); ?>"
                    class="form-control" autocomplete="off" />
            </div>
            <div class="form-group mt-2">
                <label for="password">Password</label>
                <input type="password" name="password" id="password" class="form-control" autocomplete="off" />
            </div>
            <div class="form-group mt-2">
                <label for="remember">
                    <input type="checkbox" name="remember" id="remember" class="form-control" />Remember me
                </label>
            </div>

            <div class="form-group mt-2">
                <input type="hidden" name="token" value="<?php echo Token::generate(); ?>" />
                <input type="submit" name="doLogin" id="doLogin" value="Login" class="btn btn-success" />
            </div>


        </form>



    </div>

</body>

</html>