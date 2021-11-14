<?php

namespace App\Http\Controllers;

use App\Classes\MessageSavers\FirstMessage;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller as BaseController;

class MessageController extends BaseController {

    public function add(Request $request) {
        $first_message = new FirstMessage($request->name, $request->phone, $request->message);
        $first_message->createPost();
    }
}
