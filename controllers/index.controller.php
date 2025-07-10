<?php
$search = $_GET['search'] ?? '';

$strCleaner = strToLower($search);
$sql = "SELECT * FROM books WHERE LOWER(`title`) like :search";
// $sql = "SELECT
//   b.*,
//   r.rating,
//   r.review
// FROM books AS b
// LEFT JOIN reviews AS r
//   ON b.id = r.id
// WHERE
//   LOWER(b.title) LIKE :search;";

$books = $DBCONN->query(query: $sql, class: Book::class, params: ['search' => "%$search%"])->fetchAll();

$sqlReview = "SELECT * FROM reviews";
$reviews = $DBCONN->query(query: $sqlReview, class: Review::class)->fetchAll();

view('index',compact('books', 'reviews'));
