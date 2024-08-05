<?php

namespace App\Http\Controllers;


use Illuminate\Http\Request;
use App\Models\User;
use App\Models\food;
use App\Models\Foodchef;
use App\Models\Order;
use App\Models\Reservation;
use Illuminate\Support\Facades\Auth;


class AdminController extends Controller
{
    public function user()
    {
        $data = User::all();
        return view("admin.users", compact("data"));
    }

    public function deleteuser($id)
    {
        $data = user::find($id);
        $data->delete();
        return redirect()->back();
    }

    public function foodmenu()
    {
        $data = food::all();
        return view('admin.foodmenu', compact('data'));
    }

    public function uploadfood(Request $request)
    {
        if ($request->hasfile('image')) {
            $image = $request->file('image')->getClientOriginalName();
            $filename = time() . '.' . $image;
            $path = 'images\foodimages';
            $request->file('image')->move($path, $filename);
        }

        $data = new food();
        $data->title = $request->title;
        $data->price = $request->price;
        $data->image = $filename;
        $data->description = $request->description;
        $data->save();
        return redirect()->back();
    }

    public function deletemenu($id)
    {
        food::findOrFail($id)->delete();
        return redirect()->back();
    }

    public function updatemenu(Request $request, $id)
    {
        if ($request->hasfile('image')) {
            $image = $request->file('image')->getClientOriginalName();
            $filename = time() . '.' . $image;
            $path = 'images\foodimages';
            $request->file('image')->move($path, $filename);

            food::where('id', $id)->update([
                'title' => $request->title,
                'price' => $request->price,
                'description' => $request->description,
                'image' => $filename,
            ]);
        } else {
            food::where('id', $id)->update([
                'title' => $request->title,
                'price' => $request->price,
                'description' => $request->description,
            ]);
        }


        return redirect()->back();
    }


    public function updateview($id)
    {
        $data = food::find($id);
        return view('admin.updateview', compact('data'));
    }

    public function reservation(Request $request)
    {
        $data = Reservation::insert([
            'name' => $request->name,
            'email' => $request->email,
            'phone' => $request->phone,
            'guest' => $request->guest,
            'date' => $request->date,
            'time' => $request->time,
            'message' => $request->message,
        ]);
        return redirect()->back();
    }

    public function viewreservation(Request $request)
    {
        $data = Reservation::all();

        return view('admin.adminreservation', compact('data'));
    }

    public function viewchef()
    {
        $data = Foodchef::all();
        return view('admin.adminchef', compact('data'));
    }

    public function uploadchef(Request $request)
    {


        if ($request->hasfile('image')) {
            $image = $request->file('image')->getClientOriginalName();
            $filename = time() . '.' . $image;
            $path = 'images\foodchefs';
            $request->file('image')->move($path, $filename);

            Foodchef::insert([
                'name' => $request->name,
                'speciality' => $request->speciality,
                'image' => $filename,
            ]);
        } else {
            Foodchef::insert([
                'name' => $request->name,
                'speciality' => $request->speciality,
                'image' => 'null',
            ]);
        }

        return redirect()->back();
    }

    public function deletechef($id)
    {
        Foodchef::find($id)->delete();
        return redirect()->back();
    }

    public function updatechef($id)
    {
        $data = Foodchef::find($id);
        return view('admin.updatechef', compact('data'));
    }

    public function updatefoodchef(Request $request, $id)
    {
        if ($request->hasfile('image')) {
            $image = $request->file('image')->getClientOriginalName();
            $filename = time() . '.' . $image;
            $path = 'images\foodchefs';
            $request->file('image')->move($path, $filename);

            Foodchef::where('id', $id)->update([
                'name' => $request->name,
                'speciality' => $request->speciality,
                'image' => $filename,
            ]);
        } else {
            Foodchef::where('id', $id)->update([
                'name' => $request->name,
                'speciality' => $request->speciality,
            ]);
        }


        return redirect()->back();
    }

    public function orders(){

        $data = Order::all();
        return view('admin.orders',compact('data'));
    }


}
