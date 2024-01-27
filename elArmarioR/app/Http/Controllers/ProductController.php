<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;

// Creadas estas rutas
        // (cuando haga la de Categories descomentar: use App\Models\Categories; (ya puesto para cuando las cree)
use App\Models\Comment;
// use App\Models\Categories;
use Illuminate\Support\Facades\Auth;

class ProductController extends Controller
{

    public function index()
    {
        $viewData = [];
        $viewData["title"] = "Products - Online Store";
        $viewData["subtitle"] =  "List of products";
        $viewData["products"] = Product::all();
        return view('product.index')->with("viewData", $viewData);
    }

    // Esta función muestra todo los relacionado dentro de cada producto.
    public function show($id)
    {
        $viewData = [];
        $product = Product::findOrFail($id);
        
        // Añadido que se muestren todos los comentarios dentro de cada producto:
        $comment = Comment::all();

        $viewData["title"] = $product->getName()." - Online Store";
        $viewData["subtitle"] =  $product->getName()." - Product information";
        $viewData["product"] = $product;

        /* Aquí creado que si usuario está logeado Auth::check, que pueda comentar.
        Y el comentario va asociado al Id del nombre con el que comente) 
        */
        $viewData["comment"] = $comment;
        $userName = null;
        $userId = null;
        if (Auth::check()) {
            $userName = Auth::user()->getName();
            $userId = Auth::user()->getId();
        }
        $viewData["userName"] = $userName;
        $viewData["userId"] = $userId;
        //

        return view('product.show')->with("viewData", $viewData);
    }
}
