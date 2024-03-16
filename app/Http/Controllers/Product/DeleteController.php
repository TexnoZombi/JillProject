<?php

namespace App\Http\Controllers\Product;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\ColorProduct;
use App\Models\Product;
use App\Models\ProductTag;
use Illuminate\Http\Request;

class DeleteController extends Controller
{
    public function __invoke(Product $product)
    {

        ColorProduct::where('product_id', $product->id)->delete();
        ProductTag::where('product_id', $product->id)->delete();
        $product->delete();

        return redirect()->route('product.index');
    }
}
