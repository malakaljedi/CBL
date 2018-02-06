<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Mail\NewUserWelcome;
use Mail;


class MailController extends Controller
{
    public function send()
    {
        Mail::send(new NewUserWelcome());
    }
}
