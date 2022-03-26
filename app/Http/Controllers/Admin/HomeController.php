<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Product;
use App\Models\Transaction;
use App\Models\User;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $omset = Transaction::where('status', 'success')->sum('total');
        $customer = User::where('role', 'user')->count();
        $categoryProduct = Category::where('category_id', null)->count();
        $product = Product::count();

        $newOrder = Transaction::where('status', 'pending')->count();
        $processOrder = Transaction::where('status', 'process')->count();
        $sendOrder = Transaction::where('status', 'send')->count();
        $successOrder = Transaction::where('status', 'success')->count();

        return view('admin.home', compact('omset', 'customer', 'categoryProduct', 'product', 'newOrder', 'processOrder', 'sendOrder', 'successOrder'));
    }
}
