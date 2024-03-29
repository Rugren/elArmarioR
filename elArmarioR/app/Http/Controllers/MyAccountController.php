<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Order;
use Illuminate\Support\Facades\Auth;

class MyAccountController extends Controller
{
    public function orders()
    {
        $viewData = [];
        /*$viewData["title"] = "My Orders - elArmarioR";
        $viewData["subtitle"] =  "My Orders";*/

        $viewData["title"] = __('others.TitleOrders');
        $viewData["subtitle"] =  __('others.Orders');

        $viewData["orders"] = Order::with(['items.product'])->where('user_id', Auth::user()->getId())->get();
        return view('myaccount.orders')->with("viewData", $viewData);
    }
}
