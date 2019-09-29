<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Message;
use Illuminate\Support\Facades\Auth;


class ProfileController extends Controller
{
    public $title = 'Gbook | profile';
    public $pagetitle = 'Profile';


    public function index()
    {
        $user = Auth::user();
        $messages = isset($user) ? Message::where('name', $user->name)->latest()->paginate(15) : '';
        $data = [
            'title' => $this->title,
            'pagetitle' => $this->pagetitle,
            'messages' => $messages
        ];

        return view('pages.messages.profile', $data);
    }
}
