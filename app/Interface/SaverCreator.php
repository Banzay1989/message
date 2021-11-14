<?php

/**
 * Интерфейс для сохранения обращения
 */
interface SaverCreator
{
    public function validate(): bool;

    public function saveToDB(): void;

    public function saveToFile(): void;

    public function sendEMail():void;

}
