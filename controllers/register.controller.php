<?php
require 'Validation.php';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {

    $name =  $_POST['name'];
    $email =  $_POST['email'];
    $confirm_email =  $_POST['confirm_email'];
    $password = password_hash($_POST['password'], PASSWORD_DEFAULT);

    $validate = Validation::validate([
        'name' => ['required'],
        'email' => ['required', 'email', 'confirmed', 'unique:users'],
        'password' => ['required', 'min:6', 'max:30']
    ], $_POST);

    if ($validate->validateFail()) {
        flash()->make('registerValidation', $validate->arrValidations);
        view('login');
        exit();
    }

    $sql = "INSERT INTO users (name, email, password) VALUES (:name, :email, :password)";
    $result = $DBCONN->query(
        query: $sql,
        params: [
            'name' => $_POST['name'],
            'email' => $_POST['email'],
            'password' => $password,
        ]
    );
    flash()->make('registerOk', 'Usuário registrado com sucesso!');

    header('location: /login');
    exit();
}

header('location: /login');
exit();
