<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Mail\StoreMail;
use Illuminate\Support\Facades\Mail;

class MailController extends Controller
{
    public function sendMail()
    {
        $details = [
            'title' => 'Título do E-mail',
            'body' => 'Corpo do E-mail'
        ];

        Mail::to('geowebmaster@hotmail.com')->send(new StoreMail($details));

        return 'E-mail enviado com sucesso!';
    }
}