<?php
use Ratchet\Server\IoServer;
use Ratchet\Http\HttpServer;
use Ratchet\WebSocket\WsServer;
use Rchat\Rchat;

require 'vendor/autoload.php';

$server = IoServer::factory(
    new HttpServer(
        new WsServer(
            new Rchat()
        )
    ),
    8080
);

$server->run();