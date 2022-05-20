<?php

namespace App\Http\Controllers;

use App\Models\Tag;
use App\Models\Store;
use App\Models\Product;
use App\Models\Variant;
use App\Models\Category;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use App\Models\ProductImages;
use App\Models\Variant_Option;
use Illuminate\Support\Facades\Auth;
use App\Http\Requests\ProductRequest;
use Illuminate\Support\Facades\Storage;


class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        if(Auth::user()->hasAbility('products.view')){
        $products = Product::where('store_id','=',Auth::user()->store_id)->get();
        return view('admin.products.index', compact('products'));
    }else
    return view('layouts.denied_page');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        if(Auth::user()->hasAbility('products.create')){
        $parents = Category::where('store_id',Auth::user()->store_id)->orderBy('name', 'asc')->get();
        return view('admin.products.create', compact('parents'));
    }else
    return view('layouts.denied_page');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(ProductRequest $request)
    {
        $user=Auth::user();
        $store=Store::where('user_id',$user->id)->first();
        $data = $request->all();
        //$data['slug'] = Str::slug($data['name']);
        $data['store_id']=Auth::user()->store_id;;
        if ($request->hasFile('image')) {
            $file = $request->file('image');
            $new_avatar_name = time() . '.' . $request->image->extension();
            $file->move(public_path('img'), $new_avatar_name);
            $image = $new_avatar_name;
            $data['image'] = $image;
        }
        $product = Product::create($data);
        $tags = $request->tags;
        $tags = json_decode($tags);
        if (is_array($tags) && count($tags) > 0) {
            $product_tags = [];
            foreach ($tags as $tag) {
                $tag_name = $tag->value;
                $tagModel = Tag::firstOrCreate([
                    'name' => $tag_name
                ], [
                    'slug' => Str::slug($tag_name)
                ]);
                $product_tags[] = $tagModel->id;
            }
            $product->tags()->sync($product_tags);
        }


         if ($request->hasFile('gallery')) {
            $files = $request->file('gallery');
            foreach ($files as $file) {
                $new_gallery_name = rand() . '.' . $file->getClientOriginalExtension();
                $file->move(public_path('img'), $new_gallery_name);
                $photos = explode(",", $request->get('photos'));
                foreach ($photos as $photo) {
                    $form_data  = array(
                        'image_path' => $new_gallery_name,
                        'product_id' => $product->id,
                    );
                    ProductImages::create($form_data);
                }
            }
        }

       /*  if ($request->hasFile('gallery')) {
            foreach ($request->file('gallery') as $file) {
                $new_image_name =  time() . '.' . $file->extension();
                $img = $file->move(public_path('img'), $new_image_name);
                $product->images()->create(['image_path' => $img]);
            }
        } */

        if ($request->variant !== Null) {
            $variant = $request->variant;

            foreach ($variant as $variantss) {
                 $variants = array(
                    'product_id' => $product->id,
                    'price_variant' => $variantss['price_variant'],
                    'quantity_variant' => $variantss['quantity_variant'],

                );
                $variant_create = Variant::create($variants);
                $variant_options_size = array(
                    'variants_id' => $variant_create->id,
                    'option' => 'size',
                    'value' => $variantss['size'],
                );
                Variant_Option::create($variant_options_size);
                $variant_options_color = array(
                    'variants_id' => $variant_create->id,
                    'option' => 'color',
                    'value' => $variantss['color'],
                );
                Variant_Option::create($variant_options_color);
            }
        }

        return redirect()->route('products.index')->with('success', __('home.added_successfully'));
    }
    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function show(Product $product)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function edit(Product $product, $id)
    {
        if(Auth::user()->hasAbility('products.update')){
        $product = Product::findOrFail($id);
        $tag = $product->tags()->pluck('name')->toArray();
        $tags = implode(',', $tag);
        $parents = Category::where('store_id',Auth::user()->store_id)->orderBy('name', 'asc')->get();

        return view('admin.products.edit', compact('product', 'tags', 'parents'));
    }else
    return view('layouts.denied_page');
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function update(ProductRequest $request, Product $product, $id)
    {
        $product = Product::findOrFail($id);
        $data = $request->all();
        //$data['slug'] = Str::slug($data['name']);
        if ($request->hasFile('image')) {
            $file = $request->file('image');
            $new_avatar_name =  uniqid() . '.' . $request->image->extension();
            $file->move(public_path('img'), $new_avatar_name);
            $image = $new_avatar_name;
            $data['image'] = $image;
        }
        if ($request->hasFile('gallery')) {
            foreach ($request->file('gallery') as $file) {
                //$new_image_name =  uniqid() . '.' . $request->image->extension();
                $new_gallery_name = rand() . '.' . $file->getClientOriginalExtension();
                $img = $file->move(public_path('img'), $new_gallery_name);
                //$product->images->create(['image_path' => $img]);
                $photos = explode(",", $request->get('photos'));
                foreach ($photos as $photo) {
                    $form_data  = array(
                        'image_path' => $new_gallery_name,
                        'product_id' => $product->id,
                    );
                    ProductImages::create($form_data);
                }
            }
        }
        $product->update($data);
        $tags = $request->tags;
        $tags = json_decode($tags);
        if (is_array($tags) && count($tags) > 0) {
            $product_tags = [];
            foreach ($tags as $tag) {
                $tag_name = $tag->value;
                $tagModel = Tag::firstOrCreate([
                    'name' => $tag_name
                ], [
                    'slug' => Str::slug($tag_name)
                ]);
                $product_tags[] = $tagModel->id;
            }
            $product->tags()->sync($product_tags);
        }

        if ($request->variant !== Null) {
            foreach ($request->variant as $variant_id => $options) {
                $variant =  Variant::find($variant_id);
                if ($variant) {
                    $variant->update($options);
                }
            }
        }

        return redirect()->route('products.index')->with('success', __('home.updated_successfully'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function destroy(Product $product, $id)
    {
        if(Auth::user()->hasAbility('products.delete')){
        $product = Product::findOrFail($id);
        $product->delete();
        /* if ($product->image) {
            Storage::disk('uploads')->delete($product->image);
        } */
        return redirect()->route('products.index')->with('success', __('home.deleted_successfully'));
    }else
    return view('layouts.denied_page');
    }

    public function status($id){
        $product=Product::findOrFail($id);
        if($product->status == 'active'){
          $staus ='inactive';
        }else
        $staus ='active';
        $product = Product::whereId($id)->update([
         'status' =>$staus,
     ]);
 return redirect()->route('products.index')->with('success' ,__('home.status_updated_successfully'));

    }

    public function addVariant($id,Request $request)
    {
        $product=Product::findOrFail($id);
        if ($request->variant !== Null) {
            $variant = $request->variant;
            foreach ($variant as $variantss) {
                 $variants = array(
                    'product_id' => $product->id,
                    'price_variant' => $variantss['price_variant'],
                    'quantity_variant' => $variantss['quantity_variant'],
                );
                $variant_create = Variant::create($variants);
                $variant_options_size = array(
                    'variants_id' => $variant_create->id,
                    'option' => 'size',
                    'value' => $variantss['size'],
                );
                Variant_Option::create($variant_options_size);
                $variant_options_color = array(
                    'variants_id' => $variant_create->id,
                    'option' => 'color',
                    'value' => $variantss['color'],
                );
                Variant_Option::create($variant_options_color);
            }
        }
        return redirect()->route('products.edit')->with('success', __('home.added_successfully'));
    }
}
