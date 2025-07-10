<?php
$id = $_GET['id'];

$sql = "SELECT * FROM books where id = :id";

$book = $DBCONN->query(query: $sql, class: Book::class, params: ['id' => $id])->fetch();
 
$sqlReview = "SELECT * FROM reviews WHERE book_id = :id";
$reviews = $DBCONN->query(query: $sqlReview, class: Review::class, params: ['id' => $id])->fetchAll();

view('book',compact('book', 'reviews'));