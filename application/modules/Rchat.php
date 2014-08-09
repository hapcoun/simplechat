<?php
namespace Rchat;
use Ratchet\MessageComponentInterface;
use Ratchet\ConnectionInterface;

class Rchat implements MessageComponentInterface {
    protected $clients;

    public function __construct() {
        $this->clients = new \SplObjectStorage;
    }

    public function onOpen(ConnectionInterface $conn) {
//        $user = $this->session->userdata('logged_in');
//        $conn->user = $user;
        $this->clients->attach($conn);

        $this->clients->attach($conn);
        echo "New connection! ({$conn->resourceId})\n";
    }

    public function onMessage(ConnectionInterface $from, $msg) {
        $numRecv = count($this->clients) - 1;
        echo sprintf('Connection %d sending message "%s" to %d other connection%s' . "\n"
            , $from->resourceId, $msg, $numRecv, $numRecv == 1 ? '' : 's');

        $message = [
            'text' => $msg,
            'user' => $from->user,
        ];

        foreach ($this->clients as $client) {
            if ($from !== $client) {

                $client->send($message);
            }
        }
    }

    public function onClose(ConnectionInterface $conn) {

        $this->clients->detach($conn);

        echo "Connection {$conn->resourceId} has disconnected\n";
    }

    public function onError(ConnectionInterface $conn, \Exception $e) {
        echo "An error has occurred: {$e->getMessage()}\n";
        $conn->close();
    }

}