<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\Data;
use App\Models\User;

class ProductControl extends Controller
{

    public function index()
    {
        $product = Product::all();
        return $product;
    }

    public function singleproduct($id)
    {
        $product = Product::find($id);
        return $product;
    }
    public function data(Request $request)
    {
        $data = new Data();
        $data->name = $request->name;
        $data->email = $request->email;
        $data->channel = $request->channel;
        $data->save();
    }

    public function Users(Request $request)
    {
        $users =  User::where(array('email' => $request->email, 'password' => $request->password));
        if ($users) {
            return response()->json($users);
        }
    }
}
