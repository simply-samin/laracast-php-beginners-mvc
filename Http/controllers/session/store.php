<?php

use Core\Authenticator;
use Http\Forms\LoginForm;

$email = $_POST['email'];
$password = $_POST['password'];


$form = LoginForm::validate([
    'email' => $email,
    'password' => $password
]);

$auth = new Authenticator();

$signedIn = (new Authenticator)->attempt($email, $password);

if(!$signedIn) {

    $form->error('email', 'No matching account found for that email address and password')
        ->throw();

}
    
redirect('/');







