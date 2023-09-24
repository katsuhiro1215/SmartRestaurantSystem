<?php

namespace App\Http\Controllers\Employee;

use App\Http\Controllers\Controller;
use App\Models\Shop;
use Illuminate\Http\Request;
use Illuminate\View\View;
use Illuminate\Support\Facades\Auth;

class ShopController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth:employees');
    }
    
    public function index(): View
    {
        $employee = Auth::user();
        $shops = $employee->shops()->paginate(20);

        return view('employee.shop.index', compact('shops'));
    }

    public function show(Shop $shop): View
    {
        $shop = Shop::findOrFail($shop->id);

        return view('employee.shop.show', compact('shop'));
    }
}
