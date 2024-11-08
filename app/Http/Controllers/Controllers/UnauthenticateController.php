<?php

namespace App\Http\Controllers\Controllers;

use App\Models\Order;
use App\Models\Products;
use App\Models\OrderItem;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class UnauthenticateController extends Controller
{
    public function index()
    {
        $user = Auth::user();
        return view("pages.index", compact('user'));
    }
    public function about()
    {
        $user = Auth::user();
        return view("pages.about-us", compact('user'));
    }
    public function contact()
    {
        $user = Auth::user();
        return view("pages.contact-us", compact('user'));
    }
    public function product_store(Request $request)
    {
        // Get sorting and items per page parameters from the request
        $sortBy = $request->get('sort', 'id'); // Default sorting by 'id'
        $perPage = $request->get('per_page', 9); // Default items per page

        // Determine sorting direction based on the selected option
        switch ($sortBy) {
            case 'new':
                $products = Products::orderBy('created_at', 'desc')->where('status', 1)->paginate($perPage);
                break;
            case 'low':
                $products = Products::orderBy('price', 'asc')->where('status', 1)->paginate($perPage);
                break;
            case 'high':
                $products = Products::orderBy('price', 'desc')->where('status', 1)->paginate($perPage);
                break;
            default:
                $products = Products::orderBy('id', 'desc')->where('status', 1)->paginate($perPage);
                break;
        }

        // Calculate final prices for each product while keeping the paginator
        foreach ($products as $product) {
            if ($product->discount_type == 1) { // Flat discount
                $finalPrice = $product->price - $product->discount;
            } elseif ($product->discount_type == 2) { // Percentage discount
                $finalPrice = $product->price - ($product->price * ($product->discount / 100));
            } else {
                $finalPrice = $product->price; // No discount
            }

            $product->price = number_format($product->price, 2);
            // Add the final price as an attribute
            $product->final_price = number_format($finalPrice, 2);
        }

        return view("pages.store", compact('products', 'sortBy', 'perPage'));
    }


    public function product_details($slug)
    {
        $product = Products::where('slug', $slug)->first();
        // dd($product);
        // foreach ($products as $product) {
        // Calculate the final price based on the discount type
        if ($product->discount_type == 1) { // Flat discount
            $finalPrice = $product->price - $product->discount;
        } elseif ($product->discount_type == 2) { // Percentage discount
            $finalPrice = $product->price - ($product->price * ($product->discount / 100));
        } else {
            $finalPrice = $product->price; // No discount
        }

        $product->price = number_format($product->price, 2);
        // Add the final price as an attribute
        $product->final_price = number_format($finalPrice, 2);
        // }
        return view("pages.product-details", compact('product'));
    }



    // ProductController.php

    public function addToCart(Request $request)
    {
        // dd($request->all());
        // return false;

        // quantity: quantity,
        // product_id: productId,
        // title: title,
        // slug: slug,
        // price: price,
        // final_price: final_price,
        // pro_quantity: pro_quantity,
        // discount: discount,
        // discount_type: discount_type,
        // image: image,


        $quantity = $request->input('quantity');
        $productId = $request->input('product_id');
        $quantity = $request->input('quantity');
        $title = $request->input('title');
        $slug = $request->input('slug');
        $price = $request->input('price');
        $final_price = $request->input('final_price');
        $pro_quantity = $request->input('pro_quantity');
        $discount = $request->input('discount');
        $discount_type = $request->input('discount_type');
        $image = $request->input('image');


        // Fetch the product from the database
        $product = Products::find($productId);

        if (!$product || $quantity <= 0) {
            return response()->json(['error' => 'Invalid product or quantity'], 400);
        }

        // Get the cart from the session, or initialize it
        $cart = session()->get('cart', []);

        // Add or update the product in the cart
        if (isset($cart[$productId])) {
            $cart[$productId]['quantity'] += $quantity;
        } else {
            $cart[$productId] = [
                'quantity' => $quantity,
                'id' => $productId,
                'title' => $title,
                'price' => $price,
                'final_price' => $final_price,
                'pro_quantity' => $pro_quantity,
                'discount' => $discount,
                'discount_type' => $discount_type,
                'image' => $image,
            ];
        }

        // Save the cart back to the session
        session()->put('cart', $cart);
        return response()->json(['success' => 'Product added to cart']);
    }
    public function cart()
    {
        $cartItems = session()->get('cart', []);

        // Calculate subtotal
        $subtotal = 0;
        foreach ($cartItems as $item) {
            $quantity = (int)$item['quantity'];
            $subtotal += $item['final_price'] * $quantity;
        }
        return view('pages.cart', compact('cartItems', 'subtotal'));
    }
    public function cart_clear()
    {
        session()->forget('cart');
        session()->flash('message', 'Your cart has been cleared.');
        return redirect()->route('cart'); // Redirect to the cart page
    }
    public function checkout()
    {
        $shipping = number_format('100',2);
        $cartItems = session()->get('cart', []);

        $user = Auth::user();

        // Calculate subtotal
        $Cart_subtotal = 0;
        foreach ($cartItems as $item) {
            $quantity = (int)$item['quantity'];
            $Cart_subtotal += $item['final_price'] * $quantity;
        }

        $subtotal = number_format($Cart_subtotal, 2);
        $sum = $shipping + $Cart_subtotal;
        $total = number_format($sum,2);

        return view("pages.checkout", compact('cartItems', 'subtotal', 'total', 'shipping', 'user'));
    }

    public function create_order(Request $request)
    {
        // dd($request->all());
        // return false;
        // Validate the request data
        $validatedData = $request->validate([
            'mobile'            => 'required|string|max:11|min:11',
            'first_name'        => 'required|string|max:50',
            'last_name'         => 'required|string|max:50',
            'address'           => 'required|string|max:100',
            'address_line'      => 'nullable|string|max:100',
            'city'              => 'required|string|max:50',
            'country'           => 'required|integer', // Assuming you have a country ID
            'postal_code'       => 'string|max:10',
            'order_note'        => 'nullable|string|max:255',
            'payment_method'    => 'required|string'
        ]); 

        $shipping = 100; // Define your shipping cost
        $cartItems = session()->get('cart', []);
     
        $Cart_subtotal = 0;
        foreach ($cartItems as $item) {
            $quantity = (int)$item['quantity'];
            $Cart_subtotal += $item['final_price'] * $quantity;
        }
    
        $subtotal = number_format($Cart_subtotal, 2, '.', ''); 
        $total = number_format($Cart_subtotal + $shipping, 2, '.', '');  
     
        $trackingNumber = strtoupper(Str::random(10)); 
     
        $order = Order::create([
            'first_name'        => $validatedData['first_name'],
            'last_name'         => $validatedData['last_name'],
            'mobile'            => $validatedData['mobile'],
            'address'           => $validatedData['address'],
            'address_line'      => $validatedData['address_line'],
            'city'              => $validatedData['city'],
            'country'           => $validatedData['country'],
            'postal_code'       => $validatedData['postal_code'],
            'order_note'        => $validatedData['order_note'],
            'subtotal'          => $subtotal,
            'shipping'          => number_format($shipping, 2, '.', ''), // Format for database
            'total'             => $total,
            'tracking_id'       => $trackingNumber, // Add tracking number to order
            'payment_method'    => $request->payment_method, // Add tracking number to order
        ]);
    
        // Save order items
        foreach ($cartItems as $item) {
            OrderItem::create([
                'order_id' => $order->id,
                'product_id' => $item['id'], // Assuming you have the product ID
                'title' => $item['title'],
                'image' => $item['image'],
                'price' => $item['final_price'],
                'quantity' => (int)$item['quantity'],
                'subtotal' => number_format($item['final_price'] * $item['quantity'], 2, '.', ''), // Format for database
            ]);
        }
    
        // Clear the cart after the order is created
        session()->forget('cart');
    
        // Optionally return a response, redirect, or view
        return redirect()->route('home')->with('message', 'Order created successfully!');
    }
    
    
}
