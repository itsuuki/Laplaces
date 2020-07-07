<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Mail\SampleNotification;
use App\Events\ChatMessageRecieved;
use App\Chat;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Mail;

class ChatController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
 
 
    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    

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
    // public function index(Request $request , $recieve , $shop)
    // {
    //     // チャットの画面
    //     $loginId = Auth::id();
    //     // echo var_dump($loginId);
    //     $param = [
    //       'send' => $recieve,
    //       'recieve' => $shop,
    //     ];
 
    //     // 送信 / 受信のメッセージを取得する
    //     // echo var_dump($shop);
    //     $query = Chat::where('send', $recieve)->where('recieve', $shop);
        
    //     $query->orWhere(function ($query) use ($recieve , $shop) {
    //         $query->where('send', $recieve);
    //         $query->where('recieve', $shop);
    //     });
    //     // $querys = Chat::where('send', $shop)->where('recieve', $recieve);
    //     // $querys->orWhere(function ($querys) use ($recieve , $shop) {
    //     //     $query->where('send', $recieve);
    //     //     $query->where('recieve', $shop);
    //     // });
 
    //     $messages = $query->get();
    //     // echo var_dump($messages);
 
    //     return view('chat', compact('param', 'messages', 'shop', 'loginId'));
    // }
 
    // /**
    //  * メッセージの保存をする
    //  */
    // public function store(Request $request)
    // {
 
    //     // リクエストパラメータ取得
    //     // echo var_dump("aa");
    //     // $insertParam = [
    //     //     'send' => $request->input('send'),
    //     //     'recieve' => $request->input('recieve'),
    //     //     'message' => $request->input('message'),
    //     // ];
 
    //     // echo var_dump($request->input('send'));
    //     // メッセージデータ保存
    //     try{
    //         $insertParam = Chat::create([
    //             'send' => $request->send,
    //             'recieve' => $request->recieve,
    //             'message' => $request->message
    //         ]);
    //     }catch (\Exception $e){
    //         return false;
 
    //     }
 
 
    //     // イベント発火
    //     // $text = $request->all();
    //     event(new ChatMessageRecieved($request->all()));
 
    //     // メール送信
    //     // $mailSendUser = User::where('id' , $request->input('recieve'))->first();
    //     // $to = $mailSendUser->email;
    //     // Mail::to($to)->send(new SampleNotification());
 
    //     return true;
 
    // }
}
