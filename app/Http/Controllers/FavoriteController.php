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
        // echo var_dump($shop);
        // $shops = Shop::where('id', $shop->id)->get();
        $shop->users()->attach(Auth::id());
        return back();
    }



public function destroy(Shop $shop)
    {
        $shop->users()->detach(Auth::id());
        return back();
    }
}