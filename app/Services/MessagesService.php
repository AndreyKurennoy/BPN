<?php

namespace App\Services;

use App\Models\Messages;

class MessagesService
{
    public $collectionService;

    public function saveMessage($data){

        $message = new Messages();
        $message->fill($data);
        $message->created_at = time();
        $message->save();

        return $message;
    }
}