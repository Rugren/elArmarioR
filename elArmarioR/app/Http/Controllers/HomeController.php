<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index()
    {
        $viewData = [];
        // $viewData["title"] = "Home Page - elArmarioR"; // Mejorado y traducido:
        $viewData["title"] = __('others.HomePage') . " - " . "elArmarioR";

        return view('home.index')->with("viewData", $viewData);
    }

    public function about()
    {
        $viewData = [];
        /* $viewData["title"] = "About us - elArmarioR";
        $viewData["subtitle"] =  "About us";
        $viewData["description"] =  "This is an about page ...";
        $viewData["author"] = "Developed by: Your Name"; */

        $viewData["title"] = __('others.TitleAbout');
        $viewData["subtitle"] =  __('others.About');
        $viewData["description"] =   __('others.PurpouseAbout');
        $viewData["author"] = __('others.DevelopedAbout');

        return view('home.about')->with("viewData", $viewData);
    }
}
