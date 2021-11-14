<?php

namespace App\Classes\MessageSavers;

use App\Models\Message;
use Illuminate\Support\Facades\Mail;
use SaverCreator;

class FirstMessageSaver implements SaverCreator {
    const MODEL = Message::class;
    const EMAIL = 'sample@email.com';
    const EMAIL_BLADE = 'emails.message';
    const FILE_SAVE_ROUTE = '/first';

    private $name, $phone, $message;


    public function __construct(string $name, string $phone, string $message) {
        $this->name = $name;
        $this->phone = $phone;
        $this->message = $message;
    }

    public function validate(): bool {
        $valid_name = $this->name !== null && $this->name !== '';
        $valid_phone = $this->phone !== null && $this->phone !== '' && count_chars($this->message) > 10;
        $valid_message = $this->message !== null && $this->message !== '' && count_chars($this->message) > 5;

        return $valid_name && $valid_phone && $valid_message;
    }

    public function saveToDB(): void {
        $data = [
            'name' => $this->name,
            'phone' => $this->phone,
            'message' => $this->message,
        ];
        self::MODEL->create($data);
    }

    public function saveToFile(): void {
        $text = "name: " . $this->name . "\r\n";
        $text .= "phone: " . $this->phone . "\r\n";
        $text .= "message: " . $this->message . "\r\n";

        $filename = self::FILE_SAVE_ROUTE . '/file_' . time() . '.txt';

        $fh = fopen($filename, 'w');
        fwrite($fh, $text);
        fclose($fh);
    }

    public function sendEMail(): void {
        Mail::send(self::EMAIL_BLADE, [
            'name' => $this->name,
            'phone' => $this->phone,
            'message' => $this->message
        ], function ($message) {
            $message->subject('Сообщение от ' . $this->name);
            $message->to(self::EMAIL);
        });
    }
}
