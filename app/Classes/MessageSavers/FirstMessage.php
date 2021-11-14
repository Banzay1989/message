<?php
namespace App\Classes\MessageSavers;

use App\Fabric\SaverFabric;

class FirstMessage extends SaverFabric {
    private $name, $phone, $message;


    public function __construct(string $name, string $phone, string $message) {
        $this->name = $name;
        $this->phone = $phone;
        $this->message = $message;
    }

    public function getSaverCreator(): \SaverCreator {
        return new FirstMessageSaver($this->name, $this->phone, $this->message);
    }
}
