<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\User;
use App\Models\Food;
use App\Models\Foodchef;
use App\Models\cart;
use App\Models\Order;



class HomeController extends Controller
{
    public function index()
    {
        $data = Food::all();
        $data2 = Foodchef::all();
        return view('home', compact('data', 'data2'));
    }

    public function home()
    {
        $data = Food::all();
        $data2 = Foodchef::all();

        if (Auth::user()->usertype == '1') {
            // Admin = 1
            return view('admin.admin');
        } else {

            $user_id = Auth::id();
            $count = cart::where('user_id', $user_id)->count();
            return view('home', compact('data', 'data2', 'count'));
        }
    }

    public function addcard(Request $request, $id)
    {
        if (Auth::id()) {

            cart::insert([
                'user_id' => Auth::id(),
                'food_id' => $id,
                'quantity' => $request->quantity,

            ]);

            return redirect()->back();
        } else {

            return redirect('/login');
        }
    }

    public function showcart(Request $request, $id)
    {

        $count = cart::where('user_id', $id)->count();
        $data2 = cart::select('*')->where('user_id', '=', $id)->get();
        $data = cart::where('user_id', $id)->join('food', 'carts.food_id', '=', 'food.id')->get();
        return view('showcard', compact('count', 'data', 'data2'));
    }

    public function remove($id)
    {
        cart::find($id)->delete();
        return redirect()->back();
    }

    public function orderconfirm(Request $request)
    {
        foreach ($request->foodname as $key => $foodname) {

            order::insert([
                'foodname' => $foodname,
                'price' => $request->price[$key],
                'quantity' => $request->quantity[$key],
                'name' => $request->name,
                'phone' => $request->phone,
                'address' => $request->address,
            ]);
        }

        return redirect()->back();
    }
}
