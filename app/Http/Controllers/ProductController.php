<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use App\Models\Product;
use App\Models\Cart;
use App\Models\Order;
use App\Models\Shipping;

use Session;
use Illuminate\Support\Facades\DB;

class ProductController extends Controller
{
    function index()
    {
        $data= Product::all();

       return view('landingpage',['products'=>$data]);
    }
    function detail($id)
    {
        $data =Product::find($id);
        return view('detail',['product'=>$data]);
    }
    function search(Request $req)
    {
        $data= Product::
        where('category', 'like', '%'.$req->input('query').'%')
        ->get();
        return view('search',['products'=>$data]);
    }
    function addToCart(Request $req)
    {
        if($req->session()->has('user'))
        {
           $cart= new Cart;
           $cart->user_id=$req->session()->get('user')['id'];
           $cart->product_id=$req->product_id;
           $cart->save();
           return redirect('/landingpage');

        }
        else
        {
            return redirect('/login');
        }
    }
    static function cartItem()
    {
     $userId=Session::get('user')['id'];
     return Cart::where('user_id',$userId)->count();
    }
    function cartList()
    {
        $userId=Session::get('user')['id'];
       $products= DB::table('cart')
        ->join('products','cart.product_id','=','products.id')
        ->where('cart.user_id',$userId)
        ->select('products.*','cart.id as cart_id')
        ->get();

        return view('cart',['products'=>$products]);
    }
    function removeCart($id)
    {
        Cart::destroy($id);
        return redirect('cart');
    }
    function orderNow(Request $req)
    { 
        if($req->session()->has('user')){
        $userId = Session::get('user')['id'];
        $products = DB::table('cart')
        ->join('products', 'cart.product_id', '=', 'products.id')
        ->select('products.*', 'cart.id as cart_id')
        ->where('cart.user_id', $userId)
        ->get(); // Retrieve products as an array of objects

        $total = $products->sum('price');

    return view('checkout', ['total' => $total, 'products' => $products]);
    }
    else
        {
            return redirect('/login');
        }
    }

    public function placeOrder(Request $request)
    {
        if($request->session()->has('user')){
        $validatedData = $request->validate([
            // Add validation rules for shipping details here
        ]);
        $userId = $request->session()->get('user')['id'];

        // Retrieve cart items for the user
        $cartItem = Cart::where('user_id', $userId)->first();
    
        if (!$cartItem) {
            // Handle case when cart is empty
            return redirect()->route('cart');
        }
    
        // Attempt to retrieve the product associated with the cart item
        $product = Product::find($cartItem->product_id);
    
        // Create a new order
        $order = new Order();
        $order->user_id = $userId;
        $order->product_id = $cartItem->product_id;
        $order->quantity = $cartItem->quantity;
        $order->price = $product->price; // Assuming product has a price field
        $order->save();

        // Create a new shipping record
        $shipping = new Shipping();
        $shipping->order_id = $order->id;
        // Populate shipping data from the request
        $shipping->first_name = $request->input('firstName');
        $shipping->last_name = $request->input('lastName');
        $shipping->address = $request->input('address');
        $shipping->apt_suite = $request->input('aptSuite');
        $shipping->city = $request->input('city');
        $shipping->country = $request->input('country');
        $shipping->mobile_number = $request->input('number');
        $shipping->postal_code = $request->input('code');
        $shipping->save();

        // Decrease product quantity and delete items from the cart
        $cartItems = Cart::where('user_id', $order->user_id)->get();
        foreach ($cartItems as $cartItem) {
            $product = Product::find($cartItem->product_id);
            if ($product) {
                // Decrease the product quantity
                $product->quantity -= $cartItem->quantity;
                $product->save();
            }
        }
        
        Cart::where('user_id', $order->user_id)->delete();

        // Redirect the user to a thank you page or order confirmation page
        return view('success');
        }
        else{
            return redirect('/login');
        }
    }

    public function buyNow(Request $req)
    {
    if($req->session()->has('user'))
    {
        $userId = $req->session()->get('user')['id'];

        // Check if the product exists
        $product = Product::find($req->product_id);
        if (!$product) {
            return redirect()->back()->with('error', 'Product not found');
        }

        // Create a new cart entry for the product
        $cart = new Cart;
        $cart->user_id = $userId;
        $cart->product_id = $req->product_id;
        $cart->quantity = 1; // Assuming quantity is 1 for 'Buy Now'
        $cart->save();

        // Retrieve the product details directly for the 'Buy Now' functionality
        $products = collect([
            (object) [
                'id' => $product->id,
                'name' => $product->name,
                'price' => $product->price,
                'quantity' => 1,
                'gallery' => $product->gallery,
                'size' => $product->size,
            ]
        ]);

        $total = $product->price;

        return view('checkout', ['total' => $total, 'products' => $products]);
    }
    else
    {
        return redirect('/login');
    }
}
    function myOrders(Request $req)
    {
        if($req->session()->has('user')){
            $userId = Session::get('user')['id'];
            $orders = DB::table('orders')
            ->join('products', 'orders.product_id', '=', 'products.id')
            ->where('orders.user_id', $userId)
            ->select('orders.*', 'products.name as product_name', 'products.gallery', 'products.price', 'products.size')
            ->get();

            return view('orders', ['orders' => $orders]);
        }
        else{
            return redirect('/login');
        }    
    }
    /*
    public function increaseQuantity($id)
    {
        $cartItem = Cart::findOrFail($id);
        $cartItem->quantity += 1;
        $cartItem->save();

        return response()->json(['quantity' => $cartItem->quantity]);
    }

    public function decreaseQuantity($id)
    {
        $cartItem = Cart::findOrFail($id);

        if ($cartItem->quantity > 1) {
            $cartItem->quantity -= 1;
            $cartItem->save();
        } else {
            $cartItem->delete();
        }

        return response()->json(['quantity' => $cartItem->quantity]);
    }*/
    public function shirts()
    {
        $products = Product::where('category', 'shirts')->get();
        return view('shirts', compact('products'));
    }

    public function shoes()
    {
        $products = Product::where('category', 'shoes')->get();
        return view('shoes', compact('products'));
    }

    public function watches()
    {
        $products = Product::where('category', 'watches')->get();
        return view('watches', compact('products'));
    }

    public function jackets()
    {
        $products = Product::where('category', 'jacket')->get();
        return view('jackets', compact('products'));
    }

    public function glasses()
    {
        $products = Product::where('category', 'glasses')->get();
        return view('glasses', compact('products'));
    }

    public function jeans()
    {
        $products = Product::where('category', 'jeans')->get();
        return view('jeans', compact('products'));
    }

    // Dashboard functions
    public function all()
    {
        $products = Product::all();
        return view('adminproducts', compact('products'));
    }

    public function edit($id)
    {
        $product = Product::findOrFail($id);
        return view('editproduct', compact('product'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'name' => 'required',
            'description' => 'required',
            'price' => 'required|numeric',
            'category' => 'required',
            'gallery' => 'nullable|image',
        ]);
    
        $product = Product::findOrFail($id);
        $product->name = $request->name;
        $product->description = $request->description;
        $product->price = $request->price;
        $product->category = $request->category;
    
        if ($request->hasFile('gallery')) {
            $uploadedFile = $request->file('gallery');
            $originalName = $uploadedFile->getClientOriginalName(); // Get the original file name
            $categoryFolder = str_replace(' ', '_', strtolower($request->category)); // Replace spaces with underscores and convert to lowercase
            $imagePath = $uploadedFile->storeAs('img/' . $categoryFolder, $originalName, 'public'); // Store the image with the original name in the category folder
            $product->gallery = $imagePath;
        }
    
        $product->save();
    
        return redirect()->route('adminproducts.index')->with('success', 'Product updated successfully');
    }
    
    public function destroy($id)
    {
        $product = Product::findOrFail($id);
        
        // Delete the associated image from storage if it exists
        if ($product->gallery) {
            Storage::disk('public')->delete($product->gallery);
        }
        
        // Delete the product from the database
        $product->delete();
    
        return redirect()->route('adminproducts.index')->with('success', 'Product deleted successfully');
    }

    public function store(Request $request)
{
    $request->validate([
        'productName' => 'required',
        'productDescription' => 'required',
        'productPrice' => 'required',
        'productSize' => 'required',
        'productCategory' => 'required',
        'productImage' => 'nullable|image',
    ]);

    $product = new Product();
    $product->name = $request->productName;
    $product->description = $request->productDescription;
    $product->price = $request->productPrice;
    $product->size = $request->productSize;
    $product->category = $request->productCategory;

    if ($request->hasFile('productImage')) {
        $uploadedFile = $request->file('productImage');
        $imageName = $uploadedFile->getClientOriginalName(); // Get the original file name
        $imagePath = $uploadedFile->storeAs('img/' . $request->productCategory, $imageName, 'public'); // Store the image with the original name in the category folder
        $product->gallery = $imagePath;
    }

    $product->save();

    return redirect()->route('adminproducts.index')->with('success', 'Product added successfully');
}
}
