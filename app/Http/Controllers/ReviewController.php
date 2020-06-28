<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Review;

use App\Shop;

class ReviewController extends Controller
{
    public function create()
    {
        // $shop = Shop::findOrFail($id);
        // echo var_dump($id);
        // return view('shop.edit', ['shop' => $shop]);
        return view('review/create');
    }

    public function store(Request $request)
    {
        $review = new Review;
        
        $review->evaluation = $request->input('evaluation');
        
        $review->detail = $request->input('detail');
        
        $review->user_id = $request->user()->id;
        
        // $review->save();
        // echo var_dump($request->id);
        // $shop = Shop::find($request->id);
        $review->shop_id = $request->id;
        $review->save();



        return redirect('/');
    }
}
