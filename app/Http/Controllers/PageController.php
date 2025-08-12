<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Barang;

class PageController extends Controller
{
    public function welcome()
    {
        $products = Barang::all(); // Or Barang::take(6)->get(); for a limited number
        return view('welcome', compact('products'));
    }

    public function about()
    {
        return view('aboutus');
    }

    public function whyUs()
    {
        return view('whyus');
    }
}