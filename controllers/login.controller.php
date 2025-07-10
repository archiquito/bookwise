<?php
$msg = $_GET['msg'] ?? '';
$log = $_GET['log'] ?? '';
require 'Validation.php';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $email = $_POST['email'];
    $password = $_POST['password'];

    $validate = Validation::validate([
        'email' => ['required', 'email'],
        'password' => ['required', 'min:6']
    ], $_POST);

    if ($validate->validateFail()) {
        flash()->make('loginValidation', $validate->arrValidations);
        view('login');
        exit();
    }

    $passwordForm = $_POST['password'];
    $passwordCrypt = password_verify($_POST['password'], PASSWORD_DEFAULT);
   //dd($passwordForm,$passwordCrypt);

    $sql = "SELECT * FROM users WHERE email=:email";
    $user = $DBCONN->query(
        query: $sql,
        class: User::class,
        params: [
            'email' => $_POST['email'],
        ]
    )->fetch();

    if ($user->id > 0 && password_verify($_POST['password'], $user->password)) {
        flash()->make('auth', ['id' => $user->id, 'name' => $user->name ]);

        header('location: /my-book');
        exit();
    }else {
        flash()->make('loginValidation', ['Usuário ou senha estão incorretos!']);
        view('login');
        exit();
    }
}
view('login', compact('msg'));
// header('location: /login?log=Usário não existe ou dados incorretos!');
