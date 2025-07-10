<?php
require 'Validation.php';

if ($_SERVER['REQUEST_METHOD'] != 'POST') {
    header('location: /');
    exit();
}
if (flash()->getSession('auth')) {

$user_id = flash()->getSession('auth')['id'];
$book_id = $_POST['book_id'];
$review = $_POST['review'];
$rating = $_POST['rating'];

$validate = Validation::validate([
        'review' => ['required'],
        'rating' => ['required'],
    ], $_POST);

    if ($validate->validateFail()) {
        flash()->make('reviewValidation', $validate->arrValidations);
        header('location: /book?id=' . $book_id);
        exit();
    }

$sql = "INSERT INTO reviews (book_id, user_id, review, rating) VALUES (:book_id, :user_id, :review, :rating)";
$result = $DBCONN->query(
    query: $sql,
    params: compact('book_id', 'user_id', 'review', 'rating')
);
flash()->make('reviewValidation', ['Avaliação criada com sucesso!']);
header('location: /book?id=' . $book_id);
exit();
}
flash()->make('msg', ['Você precisa estar logado para fazer o review!']);
header('location: /login');
exit();
