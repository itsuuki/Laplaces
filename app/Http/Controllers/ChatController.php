<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Chat;
use Illuminate\Support\Facades\Auth;

class ChatController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function create($recieve, $user_name, $shop_id, $shop)
    {
        return view('chat', ['shop' => $shop, 'recieve' => $recieve, 'shop_id' => $shop_id, 'user_name' => $user_name]);
    }

    public function store(Request $request)
    {
        $chat = new Chat;

        $chat->title = $request->input('title');

        $chat->message = $request->input('message');

        $chat->user_id = $request->user_id;

        $chat->shop_id = $request->shop_id;

        $chat->shop_name = $request->shop_name;

        $chat->user_name = $request->user_name;

        $chat->save();

        return redirect('/home');
    }

    public function show($id)
    {
        $chats = Chat::findOrFail($id);
        // echo var_dump($chats);
        return view('chat.show', ['chats' => $chats]);
    }


    public function getData()
    {
        $comments = Chat::orderBy('created_at', 'desc')->get();
        $json = ["comments" => $comments];
        return response()->json($json);
    }

}
