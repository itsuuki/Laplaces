<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Shop;

use App\Image;

use App\User;

use App\Post;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        $posts = Post::orderBy('created_at', 'desc')->get();
        $shops = Shop::all();
        $images = Image::all();
        $user = User::all();
        return view('post.index', ['posts' => $posts, 'shops' => $shops, 'images'=> $images, 'user'=>$user]);
    }

    public function search(Request $request){
        $keyword = $request->input('search');
        // $query = Shop::all();
        $query = Shop::query();
        $shops = $query->where('sname','like', '%' .$keyword. '%')->get();
        // echo var_dump($shop);
        return view('shop/index', ['shops' => $shops]);

        // $shops = $query->get();


    }
}
