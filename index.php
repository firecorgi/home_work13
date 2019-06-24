<?php
error_reporting(E_ALL);
ini_set('display_errors', 1);

require ('vendor/autoload.php');
require('config/config.php');

use Entity\Article;
use Service\ArticleManager;

$title = $_POST['title'] ?? '';
$text = $_POST['text'] ?? '';

$manager = new ArticleManager();
$manager->getById(14);

$article = new Article('myname', 'iswho');
$article->setId(12);
$manager->save($article);


