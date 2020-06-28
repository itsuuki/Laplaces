<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

// use Illuminate\Http\DB;
use Illuminate\Support\Facades\DB;

use App\Shop;

use App\User;

use App\Image;

use App\Post;

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


        $reservations = Reservation::where('user_id', $id)->latest()->get();
        $re = $reservations->groupBy('shop_id');
        echo var_dump($re);
        $shop_id = $re->pluck('shop_id');
        // $cc = $reservations->pluck('created_at');
        // $shop_id = $shops_id->unique();
        $res_shops = array();
        foreach ($shop_id as $sh_id) {
            $shop = Shop::where('id', $sh_id)->get();

            array_push($res_shops,$shop);
        }
        $commodities = array();
        $commodity_id = $reservations->pluck('commodity_id');
        foreach ($commodity_id as $com_id) {
            $commodity = Commodity::where('id', $com_id)->get();
            array_push($commodities,$commodity);
        }




        // $reservations = DB::table('reservations')->where('user_id', $id)->latest()->get();
        // // echo var_dump($res);
        // // $res = $res->groupBy('created_at');
        
        // // $a = $res->select('shop_id');
        // // array_unique([$res]);
        // $res_shops = array();
        // foreach ($reservations->groupBy('shop_id.created_at') as $re) {
        //     // $re = $reserva->groupBy('shop_id.created_at');
        //     // echo var_dump($re);
        //     // $reg = get_object_vars($re);
        //     // $res = $re->groupBy('shop_id');
        //     // echo var_dump($res);
        //     $shop_id = $re->pluck('shop_id');
        //     // echo var_dump($shop_id);
        //     // echo var_dump($shop_id);
        //     // $cc = $reservations->pluck('created_at');
        //     // $shop_id = $shops_id->unique();
        //     // $res_shop = array();
        //     foreach ($shop_id as $sh_id) {
        //         $shop = Shop::where('id', $sh_id)->get();

        //         // array_push($res_shop, $shop);
        //     }
        //     array_push($res_shops, $shop);
        // }
        // // echo var_dump($res_shops);

        // $commodities = array();
        // $commodity_id = $re->pluck('commodity_id');
        // foreach ($commodity_id as $com_id) {
        //     $commodity = Commodity::where('id', $com_id)->get();
        //     array_push($commodities,$commodity);
        // }
        // // echo var_dump($res);






        // $vc = $reservations->select('id', 'created_at')->get()->groupBy(DB::raw('CAST(created_at AS DATE)'));
        // echo var_dump($vc);
        // $reserva = DB::table('reservations')->where('user_id', $id);
        // $reserva = Reservation::where('user_id', $id)->get();
        // $res = $reserva->select('created', DB::raw('count() as `count`, created_at'))->groupBy('created')->get();
        // $res = $reserva->select('user_id')->groupBy('created_at')->get();
        // $reser = $reserva->where('id', $id)->get();
        // $shops_id = $reserva->pluck('shop_id');
        
        // echo var_dump($res);
        // $re = $res->select('commodity_id')->get();
        // $jhg = array();
        // foreach ($res as $re) {
        //     $reg = get_object_vars($re);
        //     // echo var_dump($reg);
        //     $gfd = Reservation::where('created_at', $reg)->get();
        //     // echo var_dump($gfd);
        //     array_push($jhg,$gfd);
        //     $shop_id = $gfd->pluck('shop_id');
        // // $cc = $reservations->pluck('created_at');
        // // $shop_id = $shops_id->unique();
        //     $res_shops = array();
            // foreach ($shop_id as $sh_id) {
            //     $shop = Shop::where('id', $sh_id)->get();

            //     array_push($res_shops,$shop);
            // }
            // echo var_dump($res_shops);
        // }
        // echo var_dump($jhg);
        // $commodities = array();
        // foreach ($jhg as $kjh){
        //     $commodity_id = $kjh->pluck('commodity_id');
        //     // $commodity_id = $reservations->pluck('commodity_id');
        //     foreach ($commodity_id as $com_id) {
        //         $commodity = Commodity::where('id', $com_id)->get();
        //         array_push($commodities,$commodity);
        //     }
        // }
        
        


        $favorites = Favorite::where('user_id', $id)->get();
        $favorite_id = $favorites->pluck('shop_id');
        // $judge=array_filter($favorite);
        // echo var_dump($favorite);
        $fav_shops = array();
        if (count($favorite_id) === 0) {
            $fav_shops = null;
        } else {
            foreach ($favorite_id as $favorite) {
                $fav_shop = Shop::where('id', $favorite)->get();
                array_push($fav_shops, $fav_shop);
            }
            // echo var_dump($fav_shop);
        }
        // echo var_dump($fav_shops);
        return view("user.show", ['user' => $user, 'shops'=> $shops, 'id' => $id, 'posts' => $posts, 'images'=> $images, 'commodities' => $commodities, 'reservations' => $reservations, 'res_shops' => $res_shops, 'fav_shops' => $fav_shops]);
        // $commodities = Commodity::all();
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
            'uphoto' => 'required | numeric | digits_between:8,11',
        ],
        [
            'name.required' => '名前は必須です。',
            'email.required' => 'メールアドレスは必須です。',
            'uregion.required' => '住所は必須です。',
            'uphoto.required' => '電話番号は必須です。',
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