<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Shop;

use App\Image;

use App\User;

use App\Post;

class PostController extends Controller
{
    public function index()
    {
        $posts = Post::orderBy('created_at', 'desc')->get();
        $shops = Shop::all();
        $images = Image::all();
        $user = User::all();
        return view('post.index', ['posts' => $posts, 'shops' => $shops, 'images'=> $images, 'user'=>$user]);
    }

    public function create()
    {
        $shops = Shop::all();
        return view('post/create', ['shops' => $shops]);
    }

    public function store(Request $request)
    {
        $request->validate([
            'post' => 'required|max:200',
            // 'image' => 'required',
        ],
        [
            'post.required' => '投稿内容は必須です。',
        ]);

        $post = new Post;

        $l= 0;

        $post->post = $request->input('post');

        $post->user_id = $request->user()->id;

        $post->shop_id = $request->input('shop_n');

        $post->save();

        foreach ($request->nums as $val) {
            if ($request->img !== null) {
            $img = new Image;

            $img->image = $request->img[$l]->store('public/images');

            $img->post_id = $post->id;

            $img->save();
            }
            $l++;
        }
        return redirect('/home');
    }

    public function all($id)
    {
        $posts = Post::where('user_id', $id)->get();
        $ushops = Shop::where('user_id', $id)->get();
        $shop_id = $posts->pluck('shop_id');
        $image_id = $posts->pluck('id');
        // echo var_dump($posts);
        // $image_id = $posts->id;
        $images = array();
        foreach ($image_id as $img_id) {
            $image =Image::where('post_id', $img_id)->get();
            array_push($images,$image);
        }
        $shops = array();
        foreach ($shop_id as $sh_id) {
            $shop = Shop::where('id', $sh_id)->get();
            array_push($shops,$shop);
        }
        // $shops = Shop::all();
        // $images = Image::all();
        return view('post.all', ['posts' => $posts, 'images'=> $images, 'shops'=> $shops, 'ushops'=> $ushops]);
    }

    public function destroy($id)
    {
        // echo var_dump($post_id);
        $post = Post::findOrFail($id);
        $post->delete();
    }

    public function search(Request $request){
        $keyword = $request->input('keyword');
        $query = Shop::all();
        $query->where('sname','like','%'.$keyword.'%');
        $shops = $query->get();
        echo var_dump($shops);


    }
}