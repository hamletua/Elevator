<?php

require dirname(__DIR__) . '/vendor/autoload.php';


$loop = React\EventLoop\Factory::create();

$ws = new React\Socket\Server('127.0.0.1:8888',$loop);

new Ratchet\Server\IoServer(
    new Ratchet\Http\HttpServer(
        new Ratchet\WebSocket\WsServer(
            new Ratchet\Wamp\WampServer(
                new \Application\FrontController()
            )
        )
    ),
    $ws
);

$loop->run();
