<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use Illuminate\Support\Collection;

use App\Shop;

use App\Image;

use App\Commodity;

use App\Review;

use App\User;

class ShopController extends Controller
{
    public function index()
    {
        $shops = Shop::all();
        return view('shop/index', ['shops' => $shops]);
    }

    public function create()
    {
        return view('shop/create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'sname' => 'required|max:50',
            'sprice' => 'required|numeric',
            'region' => 'required|max:100',
            'datail' => 'required|max:200',
            'photo' => 'required | numeric | digits_between:8,11',
            `name` => 'required|max:50',
            `price` => 'required|numeric',
            'image' => 'required|image|mimes:jpeg,png,jpg,gif|max:1024',
        ],
        [
            'sname.required' => '店の名前は必須です。',
            'sprice.required' => '平均金額は必須です。',
            'region.required' => '住所は必須です。',
            'datail.required' => '紹介文は必須です。',
            'photo.required' => '電話番号は必須です。',
            `name.required` => '商品名は必須です。',
            `price.required` => '金額は必須です。',
            'image.required' => '写真は必須です。',
        ]);
        $value = new Shop;

        $i = 0;

        $l= 0;

        $value->sname = $request->input('sname');

        $value->sprice = $request->input('sprice');

        $value->region = $request->input('region');

        $value->photo = $request->input('photo');

        $value->datail = $request->input('datail');

        $value->store_in = $request->input('store_in');

        $value->take_out = $request->input('take_out');

        $value->delivery = $request->input('delivery');

        $value->user_id = $request->user()->id;
        
        $value->save();

        foreach ($request->nums as $val) {
            if ($request->img !== null) {
                $img = new Image;

                $img->image = $request->img[$l]->store('images', 'public');

                $img->shop_id = $value->id;

                $img->save();
            }
            $l++;
        }

        foreach ($request->num as $val) {
            $com = new Commodity;
            $image = new Image;
            $com->name = $request->name[$i];
            $com->price = $request->price[$i];
            $com->description = $request->description[$i];
            $com->user_id = $request->user()->id;
            $com->shop_id = $value->id;
            $com->save();
            $image->image = $request->image[$i]->store('images', 'public');
            $image->commodity_id = $com->id;
            $image->save();
            $i++;
        }

        return redirect('/home');
    }

    public function show($id)
    {
        $shop = Shop::findOrFail($id);
        $commodity = Commodity::where('shop_id', $id)->get();
        $image = Image::where('shop_id', $id)->get();
        $commodity_id = $commodity->pluck('id');
        $imgs = array();
        foreach ($commodity_id as $com_id) {
            $img = Image::where('commodity_id', $com_id)->get();
            array_push($imgs,$img);
        }
        $reviews = Review::where('shop_id', $id)->get();
        $reviews->pluck('evaluation');
        $review = collect($reviews)->avg('evaluation');
        $users = User::all();
        $images = Image::all();
        $commodities = collect($commodity)->count();
        return view('shop.show', ['shop' => $shop, 'review' => $review, 'reviews' => $reviews, 'users' => $users, 'images'=> $images, 'commodity' => $commodity,'commodities' => $commodities, 'image' => $image, 'imgs' => $imgs]);
    }

    public function edit($id)
    {
        $shop = Shop::findOrFail($id);
        $commodity = Commodity::where('shop_id', $id)->get();
        $image = Image::where('shop_id', $id)->get();
        $images = array();
        $commodity_id = $commodity->pluck('id');
        foreach ($commodity_id as $com_id) {
            $img = Image::where('commodity_id', $com_id)->get();
            array_push($images,$img);
        }
        $commodities = collect($commodity)->count();
        return view('shop.edit', ['shop' => $shop, 'commodity' => $commodity,'commodities' => $commodities, 'image' => $image, 'images' => $images]);
    }

    public function update(Request $request)
    {
        // $request->validate([
        //     'sname' => 'required|max:50',
        //     'sprice' => 'required|numeric',
        //     'region' => 'required|max:100',
        //     'datail' => 'required|max:200',
        //     'photo' => 'required | numeric | digits_between:8,11',
        //     `name` => 'required|max:50',
        //     `price` => 'required|numeric',
        //     'image' => 'required|max:1024',
        // ],
        // [
        //     'sname.required' => '店の名前は必須です。',
        //     'sprice.required' => '平均金額は必須です。',
        //     'region.required' => '住所は必須です。',
        //     'datail.required' => '紹介文は必須です。',
        //     'photo.required' => '電話番号は必須です。',
        //     `name.required` => '商品名は必須です。',
        //     `price.required` => '金額は必須です。',
        //     'image.required' => '写真は必須です。',
        // ]);
        $i = 0;
        $value = Shop::findOrFail($request->id);
        // $value->fill($request->all())->save();
        $value->sname = $request->input('sname');

        $value->sprice = $request->input('sprice');

        $value->region = $request->input('region');

        $value->photo = $request->input('photo');

        $value->datail = $request->input('datail');

        $value->store_in = $request->input('store_in');

        $value->take_out = $request->input('take_out');

        $value->delivery = $request->input('delivery');
        
        $value->save();
        if ($request->img !== null) {
            $img = Image::find($request->id);
            $img->image = $request->img->store('images', 'public');
            $img->shop_id = $value->id;
            $img->save();
        }
        foreach ($request->num as $val) {
            $com = Commodity::find($val);
            $image= Image::find($val);
            $com->name = $request->name[$i];
            $com->price = $request->price[$i];
            $com->description = $request->description[$i];
            $com->user_id = $request->user()->id;
            $com->shop_id = $request->id;
            $com->save();
            if ($request->image !== null) {
                $image->image = $request->image[$i]->store('images', 'public');
                $image->shop_id = $value->id;
                $image->commodity_id = $com->id;
                $image->save();
            }
            $i++;
        }
        $shop = Shop::findOrFail($request->id);
        $commodity = Commodity::where('shop_id', $request->id)->get();
        $image = Image::where('shop_id', $request->id)->get();
        $commodity_id = $commodity->pluck('id');
        $imgs = array();
        foreach ($commodity_id as $com_id) {
            $img = Image::where('commodity_id', $com_id)->get();
            array_push($imgs,$img);
        }
        $reviews = Review::where('shop_id', $request->id)->get();
        $reviews->pluck('evaluation');
        $review = collect($reviews)->avg('evaluation');
        $users = User::all();
        $images = Image::all();
        $commodities = collect($commodity)->count();
        return view('shop.show', ['shop' => $shop, 'review' => $review, 'reviews' => $reviews, 'users' => $users, 'images'=> $images, 'commodity' => $commodity,'commodities' => $commodities, 'image' => $image, 'imgs' => $imgs]);
    }

    public function destroy(Request $request)
    {
        $shop = Shop::findOrFail($request->shop_del);
        $shop->delete();
        return redirect('/home');
    }
}