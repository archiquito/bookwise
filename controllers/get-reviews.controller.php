<?php
$id = $_GET['id'];

$sql = "SELECT * FROM books where id = :id";

$book = $DBCONN->query(query: $sql, class: Book::class, params: ['id' => $id])->fetch();


view('book',['book' => $book]);