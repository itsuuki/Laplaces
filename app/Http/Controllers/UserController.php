<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

// use Illuminate\Http\DB;
use Illuminate\Support\Facades\DB;

use App\Shop;

use App\User;

use App\Image;

use App\Post;

use App\Order;

use App\Reservation;

use App\Commodity;

use App\Favorite;

class UserController extends Controller
{
    // public function index()
    // {
    //     $shop = Shop::find($shop_id);
    //     return view("user/index", ['shop' => $shop]);
    // }

    public function show($id)
    {
        $user = User::findOrFail($id);
        $shops = Shop::where('user_id', $id)->get();

        $posts = Post::where('user_id', $id)->get();
        $image_id = $posts->pluck('id');
        // echo var_dump($posts);
        $images = array();
        foreach ($image_id as $img_id) {
            $image =Image::where('post_id', $img_id)->get();
            array_push($images,$image);
        }

        $reser_shops = DB::table('reservations')
        ->join('users', 'reservations.user_id', '=', 'users.id')
        ->join('shops', 'reservations.shop_id', '=', 'shops.id')
        ->select('users.id', 'shops.sname', 'shops.created_at')
        ->groupBy('users.id', 'shops.sname', 'shops.created_at')
        ->where('users.id', $id)
        ->latest('shops.created_at')
        ->get();
        $commodities = DB::table('reservations')
        ->join('users', 'reservations.user_id', '=', 'users.id')
        ->join('shops', 'reservations.shop_id', '=', 'shops.id')
        ->join('commodities', 'reservations.commodity_id', '=', 'commodities.id')
        ->select('users.id', 'shops.sname', 'commodities.name', 'reservations.id', 'reservations.remark', 'reservations.created_at')
        ->groupBy('users.id', 'shops.sname', 'commodities.name', 'reservations.id', 'reservations.remark', 'reservations.created_at')
        ->where('users.id', $id)
        ->latest('reservations.created_at')
        ->get();
        $reservations = DB::table('reservations')
        ->join('users', 'reservations.user_id', '=', 'users.id')
        ->join('shops', 'reservations.shop_id', '=', 'shops.id')
        ->select('users.id', 'shops.sname', 'reservations.form', 'reservations.day', 'reservations.month', 'reservations.hour', 'reservations.minute', 'reservations.people', 'reservations.created_at')
        ->groupBy('users.id', 'shops.sname', 'reservations.form', 'reservations.day', 'reservations.month', 'reservations.hour', 'reservations.minute', 'reservations.people', 'reservations.created_at')
        ->where('users.id', $id)
        ->latest('reservations.created_at')
        ->get();

        $favorites = Favorite::where('user_id', $id)->get();
        $favorite_id = $favorites->pluck('shop_id');
        $fav_shops = array();
        if (count($favorite_id) === 0) {
            $fav_shops = null;
        } else {
            foreach ($favorite_id as $favorite) {
                $fav_shop = Shop::where('id', $favorite)->get();
                array_push($fav_shops, $fav_shop);
            }
        }
        return view("user.show", ['user' => $user, 'shops'=> $shops, 'id' => $id, 'posts' => $posts, 'images'=> $images, 'reservations' => $reservations, 'commodities' => $commodities, 'reser_shops' => $reser_shops, 'fav_shops' => $fav_shops]);
    }
    public function edit($id)
    {
        $users = User::findOrFail($id);
        return view("user.edit", ['users' => $users]);
    }
    public function update(Request $request)
    {
        $request->validate([
            'name' => 'required|max:50',
            'email' => 'email',
            'uregion' => 'required|max:100',
            // 'uphoto' => 'required | numeric | digits_between:8,11',
        ],
        [
            'name.required' => '名前は必須です。',
            'email.required' => 'メールアドレスは必須です。',
            'uregion.required' => '住所は必須です。',
            // 'uphoto.required' => '電話番号は必須です。',
        ]);
        $value = User::findOrFail($request->id);
        $value->fill($request->all())->save();

        $posts = Post::orderBy('created_at', 'desc')->get();
        $shops = Shop::all();
        $images = Image::all();
        $user = User::all();
        return view('post.index', ['posts' => $posts, 'shops' => $shops, 'images'=> $images, 'user'=>$user]);
    }
}