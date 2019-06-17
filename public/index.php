<?php
require dirname(__DIR__) . '/vendor/autoload.php';
use Psr\Http\Message\ResponseInterface;
use Psr\Http\Message\ServerRequestInterface;
use Slim\App;

$configuration = [
	'settings' => [
		'displayErrorDetails' => true,
	],
];

$app = new App();

$app->get('/homepage', function (ServerRequestInterface $request, ResponseInterface $response) {
	$hamac = [
		"name" => "hamac",
		"description" => "pour dormir",
	];

	return $response = $response->withJson($hamac);
});

$app->get('/page2', function (ServerRequestInterface $request, ResponseInterface $response) {
	$response = $response->getBody()->write('<h1>bonjour2</h1>');
	return $response;
});

$app->run();