<?php

namespace App\Services;

use Illuminate\Support\Facades\Mail;

class ContactService
{
    public function sendMessage(array $data): void
    {
        Mail::raw("
            Name: {$data['name']}
            Email: {$data['email']}
            Message: {$data['message']}
        ", function ($mail) use ($data) {
            $mail->to('devmohamedalaaoraby@gmail.com')
                 ->subject($data['subject']);
        });
    }
}