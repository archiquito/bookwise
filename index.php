<?php
session_start();
require "./models/Book.model.php";
require "./models/User.model.php";
require "./models/Review.model.php";

require "functions.php";
$config = require('config.php');
require "Database.php";
require "routes.php";
