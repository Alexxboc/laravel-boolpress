<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Message;
use App\Mail\AdminContactMessage;
use App\Mail\ContactMessageConfirmation;
use Illuminate\Support\Facades\Mail;

class MessageController extends Controller
{
    
    public function index()
    {
        return view('guest.message-confirmation');
    }
    
    public function store(Request $request)
    {
        //ddd($request->all());
        $data = $request->all();

        $message = Message::create($data);

        //return (new AdminContactMessage($message))->render();
        //return (new ContactMessageConfirmation($message))->render();

        Mail::to('boccardi.alessandro@gmail.com')->send(new AdminContactMessage($message));
        Mail::to($message->email)->send(new ContactMessageConfirmation($message));

        return redirect()->route('contact-form')->with('message', 'Message recived');
    }
}
