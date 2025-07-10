<?php
if (!flash()->getSession('auth')) {
    flash()->make('msg', ['Você precisa estar logado para criar um livro!']);
    header("location: /login");
    exit();
}

$userId = flash()->getSession('auth')['id'];

$sql = "SELECT * FROM books where user_id = :userId";
$books = $DBCONN->query(query: $sql, class: Book::class, params: ['userId' => $userId])->fetchAll();

$sqlReview = "SELECT * FROM reviews";
$reviews = $DBCONN->query(query: $sqlReview, class: Review::class)->fetchAll();
view('my-book',compact('books', 'reviews'));
