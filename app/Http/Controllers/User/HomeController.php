<?php

namespace App\Http\Controllers\User;
use App\Models\Category;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index()
    {
        $categories = Category::where(
            'is_active',
            true
        )->get();

        return view(
            'user.home.home',
            compact('categories')
        );
    }
}
