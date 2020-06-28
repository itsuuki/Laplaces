<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Shop;
use Auth;

use App\User;

use App\Review;

class favoriteController extends Controller
{
    public function store(Shop $shop)
    {
        // echo var_dump($shop->users()->attach(Auth::id()));
        $shop->users()->attach(Auth::id());
        // $reviews = Review::all();
        // $review = Review::select('evaluation')->get();
        // $review = collect($review)->avg('evaluation');
        // $users = User::all();
        // return view('shop.show', ['shop' => $shop, 'review' => $review, 'reviews' => $reviews, 'users' => $users]);
        return back();
    }



public function destroy(Shop $shop)
    {
        $shop->users()->detach(Auth::id());
        // $reviews = Review::all();
        // $review = Review::select('evaluation')->get();
        // $review = collect($review)->avg('evaluation');
        // $users = User::all();
        // return view('shop.show', ['shop' => $shop, 'review' => $review, 'reviews' => $reviews, 'users' => $users]);
        return back();
    }
}