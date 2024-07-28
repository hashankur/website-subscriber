<?php

namespace App\Http\Controllers;

use App\Jobs\MailJob;
use Illuminate\Http\Request;

class MailController extends Controller
{
    public function sendMail(Request $request)
    {
        $request->validate([
            "email" => "required|email",
            "title" => "required|string",
            "message" => "required|string",
        ]);

        $email = $request->input("email");
        $title = $request->input("title");
        $description = $request->input("message");

        $job = new MailJob($email, $title, $description);
        dispatch($job);
    }
}
