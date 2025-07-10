<?php
require 'Validation.php';

if ($_SERVER['REQUEST_METHOD'] != 'POST') {
    header('location: /my-book');
    exit();
}
if (flash()->getSession('auth')) {
//dd($_POST['img_url'], "https://picsum.photos/200/300?random=".rand(1,500) );
$title = $_POST['title'];
$author = $_POST['author'];
$description = $_POST['description'];
$img = $_POST['img_url'] === '' ? "https://picsum.photos/id/".rand(1,500)."/200/200" : $_POST['img_url'];
$user_id = flash()->getSession('auth')['id'];

$validate = Validation::validate([
        'title' => ['required', 'min:3'],
        'author' => ['required', 'min:3'],
        'description' => ['required']
    ], $_POST);

    if ($validate->validateFail()) {
        flash()->make('mybookValidation', $validate->arrValidations);
        header('location: /my-book');
        exit();
    }

$sql = "INSERT INTO books (title, author, description, img, user_id) VALUES (:title, :author, :description, :img, :user_id)";
$result = $DBCONN->query(
    query: $sql,
    params: compact('title', 'author', 'description', 'img', 'user_id')
);
flash()->make('mybookValidation', ['Livro criado com sucesso!']);
header('location: /my-book');
exit();
}
flash()->make('msg', ['Você precisa estar logado para criar um livro!']);
header('location: /login');
exit();
