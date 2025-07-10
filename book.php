<?php
require 'dados.php';

$id = $_GET['id'];

$filteredBook = array_filter($books, fn($book) => $book['id'] == $id);

$book = array_pop($filteredBook);

$view = 'book';
require './views/template/app.php';
