<?php

include_once 'Request.php';
include_once 'Router.php';
include_once 'model/surah.php';

$router = new Router(new Request);
$surahHandler = new Surah("data/quran.json");

$router->get('/', function() {
  return <<<HTML
  <h1>Hello world</h1>
HTML;
});


$router->get('/all', function($surahHandler) {
    header('Content-Type: application/json; charset=utf-8');
    $surahHandler->getAllSurah();
});

$router->post('/data', function($request) {

  return json_encode($request->getBody());
});