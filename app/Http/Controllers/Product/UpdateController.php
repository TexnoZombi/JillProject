<?php

namespace App\Http\Controllers\Product;

use App\Http\Controllers\Controller;
use App\Http\Requests\Product\UpdateRequest;
use App\Models\ColorProduct;
use App\Models\Product;
use App\Models\ProductTag;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class UpdateController extends Controller
{
    public function __invoke(UpdateRequest $request, Product $product)
    {
        $data = $request->validated();
        if (isset($data['preview_image'])) {
            $data['preview_image'] = Storage::disk('public')->put('/images', $data['preview_image']);
        }

        if(isset($data['tags'])){
            $tagsIds = $data['tags'];
            unset($data['tags']);

            // Удаляем все теги продукта, которые не пришли в запросе
            ProductTag::where('product_id', $product->id)->whereNotIn('tag_id', $tagsIds)->delete();

            foreach ($tagsIds as $tagId) {
                ProductTag::updateOrCreate([
                    'product_id' => $product->id,
                    'tag_id' => $tagId
                ]);
            }
        }
        if(isset($data['colors'])){
            $colorsIds = $data['colors'];
            unset($data['colors']);

            // Удаляем все цвета продукта, которые не пришли в запросе
            ColorProduct::where('product_id', $product->id)->whereNotIn('color_id', $colorsIds)->delete();

            foreach ($colorsIds as $colorId) {
                ColorProduct::updateOrCreate([
                    'product_id' => $product->id,
                    'color_id' => $colorId
                ]);
            }
        }
        $product->update($data);
        return redirect()->route('product.index');
    }
}
