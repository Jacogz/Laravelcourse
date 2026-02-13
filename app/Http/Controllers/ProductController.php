<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\View\View;

class ProductController extends Controller
{
    public static $products = [
        ["id"=>"1", "name"=>"TV", "description"=>"Best TV", "price"=>"100"],
        ["id"=>"2", "name"=>"iPhone", "description"=>"Best iPhone", "price"=>"2"],
        ["id"=>"3", "name"=>"Chromecast", "description"=>"Best Chromecast", "price"=>"3"],
        ["id"=>"4", "name"=>"Glasses", "description"=>"Best Glasses", "price"=>"4"]
    ];


    public function index(): View
    {
        $viewData = [];
        $viewData["title"] = "Products - Online Store";
        $viewData["subtitle"] =  "List of products";
        $viewData["products"] = ProductController::$products;
        return view('product.index')->with("viewData", $viewData);
    }

    public function show(string $id) : View | \Illuminate\Http\RedirectResponse
    {
        if($id > count(ProductController::$products)){
            return redirect()->route("home.index");
            #return view('home.index');
        }
        $viewData = [];
        $product = ProductController::$products[$id-1];
        $viewData["title"] = $product["name"]." - Online Store";
        $viewData["subtitle"] =  $product["name"]." - Product information";
        $viewData["product"] = $product;
        return view('product.show')->with("viewData", $viewData);
    }
}
