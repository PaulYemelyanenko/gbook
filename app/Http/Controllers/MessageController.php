<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Message;

class MessageController extends Controller
{
    public $title = 'Gbook';
    public $pagetitle = 'Guest Book';


    public function index()
    {
        $data = [
            'title' => $this->title,
            'pagetitle' => $this->pagetitle,
            'messages' => Message::latest()->paginate(15)
        ];

        return view('pages.messages.index', $data);
    }

    public function store(Request $request)
    {
        Message::create([
            'name' => $request->name,
            'email' => $request->email,
            'message' => $request->message
        ]);

        return back();
    }
}
