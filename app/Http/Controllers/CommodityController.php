<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Shop;

use App\Commodity;

use App\Review;

use App\Image;

class CommodityController extends Controller
{
    public function create($id)
    {
        return view('commodity/create', ['id' => $id]);
    }

    public function store(Request $request)
    {
        $request->validate([
            'name[]' => 'required|max:50',
            'price[]' => 'required|numeric',
            'image' => 'required|max:200',
        ],
        [
            'name[].required' => '店の名前は必須です。',
            'price[].required' => '平均金額は必須です。',
            'image.required' => '写真は必須です。',
        ]);
        $value = Shop::findOrFail($request->id);
        $i = 0;
        foreach ($request->num as $val) {
            $com = new Commodity;
            $image = new Image;
            $com->name = $request->name[$i];
            $com->price = $request->price[$i];
            $com->description = $request->description[$i];
            $com->shop_id = $request->id;
            $com->user_id = $request->user()->id;
            $com->save();
            if ($request->image[$i] !== null) {
                $image->image = $request->image[$i]->store('images');
                $image->shop_id = $value->id;
                $image->commodity_id = $com->id;
                $image->save();
            }
            $i++;
        }
            $reviews = Review::all();
            $review = Review::select('evaluation')->get();
            $review = collect($review)->avg('evaluation');
            return redirect()->route('shop.show', ['$id' => $value, 'shop' => $value, 'review' => $review, 'reviews' => $reviews]);
    }
    public function edit()
    {
        return view('shop/index');
    }

    // public function destroy($post_id)
    // {
    // // echo var_dump($post_id);
    // $post = Post::findOrFail($post_id);
    // $post->delete();
    // $posts = Post::all();
    // $images = Image::all();
    // return view('post.all', ['posts' => $posts, 'images'=> $images]);
    // }
}
