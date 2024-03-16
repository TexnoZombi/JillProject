<?php

namespace App\Http\Controllers\Product;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Color;
use App\Models\ColorProduct;
use App\Models\Product;
use App\Models\ProductTag;
use App\Models\Tag;
use Illuminate\Http\Request;

class IndexController extends Controller
{
    public function __invoke(){
        $products = Product::all();
        $tags = Tag::all();
        $colors = Color::all();
        $categories = Category::all();
        $productTags = ProductTag::all();
        $productColors = ColorProduct::all();

        return view('product.index', compact('products', 'tags', 'colors', 'categories', 'productTags', 'productColors'));
    }

}
