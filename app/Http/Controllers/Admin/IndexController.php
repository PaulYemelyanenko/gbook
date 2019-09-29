<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Message;
use Illuminate\Support\Facades\Auth;


class IndexController extends Controller
{
    public $pagetitle = 'Guest Book | admin panel';


    public function index()
    {
        $data = [
            'pagetitle' => $this->pagetitle,
            'messages' => Message::latest()->paginate(15)
        ];

        if(Auth::user()->email == 'admin@mail.com') {
            return view('pages.admin.index', $data);
        }

        return view('pages.messages.index', $data)->with('error', 'Sorry. You are not admin!');
    }

    public function answer(Request $request, $id)
    {
        $message = Message::find($id);
        $message->answer = $request->answer;
        $message->save();

        return back();
    }

    public function deleteMessage($id)
    {
        $message = Message::find($id);
        $message->delete();

        return back();
    }
}
