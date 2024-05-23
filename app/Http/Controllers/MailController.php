<?php

namespace App\Http\Controllers;

use App\Jobs\SendEmailJob;
use Illuminate\Http\Request;
use App\Mail\StoreMail;
use Illuminate\Support\Facades\Mail;

class MailController extends Controller
{
    public function sendMail()
    {
        $emails = ['juciaravgalvao@hotmail.com', 'geowebmaster@hotmail.com', 'mario.galvao.woohoo@gmail.com'];

        $details = [
            'title' => 'Título do E-mail',
            'body' => 'Corpo do E-mail'
        ];

            foreach ($emails as $email) {
                SendEmailJob::dispatch($email, $details)->onQueue('emails');
            }

        return 'E-mail adicionado a fila!';
    }
}