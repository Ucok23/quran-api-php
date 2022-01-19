<?php

include_once 'Request.php';
include_once 'Router.php';

$router = new Router(new Request);

$router->get('/', function() {
  return <<<HTML
  <h1>Hello world</h1>
HTML;
});

$router->get('/all', function($request) {
    header('Content-Type: application/json; charset=utf-8');
    echo json_encode($request->surahHandler->getAllSurah());
});


// To Do: routing with param
$router->get('/all/:all', function($request) {
  header('Content-Type: application/json; charset=utf-8');
  echo json_encode($request->surahHandler->getAllSurah());
});

$router->post('/data', function($request) {

  return json_encode($request->getBody());
});