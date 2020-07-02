<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use Illuminate\Support\Facades\DB;

use App\Image;

use App\Commodity;

use App\Shop;

use App\User;

use App\Reservation;

use App\Order;

use Carbon\Carbon;

class ReservationController extends Controller
{
    

    public function create($shop_id)
    {
        $months = range(1, 12);
        $days = range(1, 31);
        $hours = range(0, 24);
        $minutes = range(0, 60);
        $shop = Shop::find($shop_id);
        $commodity = Commodity::where('shop_id', $shop_id)->get();
        // if ($commodity === null) {
            $coms = $commodity->pluck('id');
            // echo var_dump($coms);
            $commodities = collect($commodity)->count();
            $image = Image::where('commodity_id', $coms)->get();
        // } else {
        //     $coms = null;
        //     $commodities = null;
        //     $image = null;
        // }
        return view('reservation.create', ['image' => $image, 'commodity' => $commodity, 'shop_id' => $shop_id, 'commodities' => $commodities, 'coms' => $coms, 'shop' => $shop, 'months' => $months, 'days' => $days, 'hours' => $hours, 'minutes' => $minutes]);
    }

    public function store(Request $request)
    {
        $i = 0;
        foreach ($request->num as $val) {
            // echo var_dump($request->ids);
            $reser = new Reservation;
            if ($request->remark[$i] !== 0) {
                $reser->remark = $request->remark[$i];
                $reser->form = $request->form;
                $reser->month = $request->month;
                $reser->day = $request->day;
                $reser->hour = $request->hour;
                $reser->minute = $request->minute;
                $reser->total_price = $request->total_price;
                $reser->user_id = $request->user()->id;
                $reser->shop_id = $request->idsss;
                $reser->commodity_id = $request->ids[$i];
                if ($request->people !== null) {
                    $reser->people = $request->people;
                }
                $reser->save();
            }
            $i++;
        }
        // $order->save();

        return redirect('/home');
    }

    public function show($id)
    {
        $reservations = Reservation::where('user_id', $id)->get();
        $shop_id = $reservations->pluck('shop_id');
        $shops = array();
        foreach ($shop_id as $sh_id) {
            $shop = Shop::where('id', $sh_id)->get();
            array_push($shops,$shop);
        }
        $commodities = array();
        $images = array();
        $commodity_id = $reservations->pluck('commodity_id');
        foreach ($commodity_id as $com_id) {
            $commodity = Commodity::where('id', $com_id)->get();
            $image = Image::where('commodity_id', $com_id)->get();
            array_push($commodities,$commodity);
            array_push($images,$image);
        }
        return view('reservation/order', ['reservations' => $reservations, 'shops' => $shops, 'commodities' => $commodities, 'images' => $images]);
    }

    public function index($id)
    {
        // echo var_dump($id);
        // $reservations = Reservation::where('shop_id', $id)->get();
        $users = DB::table('reservations')
        ->join('users', 'reservations.user_id', '=', 'users.id')
        ->join('shops', 'reservations.shop_id', '=', 'shops.id')
        ->select('shops.id', 'users.name', 'users.created_at')
        ->groupBy('shops.id', 'users.name', 'users.created_at')
        ->where('shops.id', $id)
        ->latest('users.created_at')
        ->get();
        $commodities = DB::table('reservations')
        ->join('users', 'reservations.user_id', '=', 'users.id')
        ->join('shops', 'reservations.shop_id', '=', 'shops.id')
        ->join('commodities', 'reservations.commodity_id', '=', 'commodities.id')
        ->select('shops.id', 'users.name', 'commodities.name', 'reservations.id', 'reservations.remark', 'reservations.created_at')
        ->groupBy('shops.id', 'users.name', 'commodities.name', 'reservations.id', 'reservations.remark', 'reservations.created_at')
        ->where('shops.id', $id)
        ->latest('reservations.created_at')
        ->get();
        $reservations = DB::table('reservations')
        ->join('users', 'reservations.user_id', '=', 'users.id')
        ->join('shops', 'reservations.shop_id', '=', 'shops.id')
        ->select('shops.id', 'users.name', 'reservations.form', 'reservations.day', 'reservations.month', 'reservations.hour', 'reservations.minute', 'reservations.people', 'reservations.total_price', 'reservations.created_at')
        ->groupBy('shops.id', 'users.name', 'reservations.form', 'reservations.day', 'reservations.month', 'reservations.hour', 'reservations.minute', 'reservations.people', 'reservations.total_price', 'reservations.created_at')
        ->where('shops.id', $id)
        ->latest('reservations.created_at')
        ->get();
        return view('reservation/index', ['reservations' => $reservations, 'commodities' => $commodities, 'users' => $users]);
    }
}