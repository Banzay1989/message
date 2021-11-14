<?php

namespace App\Fabric;

use SaverCreator;

abstract class SaverFabric {
    abstract public function getSaverCreator(): SaverCreator;

    public function createPost(): void {
        $creator = $this->getSaverCreator();
        if ($creator->validate()){
            $creator->saveToDB();
            $creator->saveToFile();
            $creator->sendEMail();
        }
    }
}
