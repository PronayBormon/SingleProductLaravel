<?php

namespace App\Http\Controllers;

use App\Models\Products;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Order;

class ProductsController extends Controller
{
    public function products()
    {
        $products = Products::orderBy('id', 'desc')->paginate(10);
        return view('admin.pages.products.products', compact('products'));
    }
    public function new_product(Request $request)
    {
        $request->validate([
            'title'                 => 'required|string|max:255',
            'price'                 => 'required|numeric',
            'discount'              => 'nullable|numeric',
            'quantity'              => 'numeric',
            'dis_type'              => 'required', // Assuming 1 is Flat, 2 is Percentage
            'description'           => 'required',
            'short_desc'            => 'required',
            'image'                 => 'required|image|mimes:jpeg,png,jpg,gif,webp|max:2048',
        ]);
        // Handle image upload
        if ($request->hasFile('image')) {
            $image = $request->file('image');
            $imageName = time() . '.' . $image->extension();
            $image->move(public_path('products'), $imageName);
        }
        $slug = Str::slug($request->title);
        $formattedData = [
            'title'             => $request->title,
            'slug'             => $slug,
            'price'             => $request->price,
            'discount'          => $request->discount ?? 0,
            'discount_type'     => $request->dis_type,
            'quantity'          => $request->quantity,
            'description'       => $request->description,
            'short_description' => $request->short_desc,
            'image'             => $imageName,
        ];

        Products::create($formattedData);
        return redirect('admin/products')->with('message', 'Product added successfully');
    }
    public function add_product()
    {
        return view('admin.pages.products.add-product');
    }

    public function edit_product($id)
    {
        // dd($id);
        $product = Products::Where('id', $id)->first();
        return view('admin.pages.products.edit', compact('product'));
    }
    public function update_Product(Request $request)
    {
        // Validate the request data
        $request->validate([
            'id'            => 'required|integer|exists:products,id',
            'title'         => 'required|string|max:255',
            'price'         => 'required|numeric',
            'discount'      => 'nullable|numeric',
            'quantity'      => 'nullable|numeric',
            'dis_type'      => 'required',
            'description'   => 'required',
            'status'        => 'required|numeric',
            'short_desc'    => 'required',
            'image'         => 'nullable|image|mimes:jpeg,png,jpg,gif,webp|max:2048',
        ]);

        // Prepare the data to update
        $dataToUpdate = [
            'title'                => $request->title,
            'price'                => $request->price,
            'discount'             => $request->discount,
            'quantity'             => $request->quantity,
            'discount_type'        => $request->dis_type,
            'short_description'    => $request->short_desc,
            'description'          => $request->description,
            'status'               => $request->status,
        ];

        if ($request->hasFile('image')) {
            $currentImage = Products::where('id', $request->id)->value('image');
            if ($currentImage) {
                $oldImagePath = public_path('products/' . $currentImage);
                if (file_exists($oldImagePath)) {
                    unlink($oldImagePath);
                }
            }

            $image = $request->file('image');
            $imageName = time() . '.' . $image->extension();
            $image->move(public_path('products'), $imageName);

            $dataToUpdate['image'] = $imageName;
        }

        Products::where('id', $request->id)->update($dataToUpdate);

        return redirect('admin/products')->with('message', 'Product updated successfully', 'seccess', 'Product updated successfully',);
    }
    public function delete_product($slug)
    {
        $product = Products::where('slug', $slug)->first();
        if ($product) {
            $product->delete();
            return redirect('admin/products')->with('message', 'Product deleted successfully');
        }
        return redirect('admin/products')->with('error', 'Product not found');
    }

}
