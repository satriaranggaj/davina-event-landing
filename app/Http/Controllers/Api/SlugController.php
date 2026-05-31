<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Product;
use Illuminate\Support\Str;

class SlugController extends Controller
{
    public function check(Request $request)
    {
        $slug = Str::slug($request->name);

        $exists = Product::where('slug', $slug)->exists();

        return response()->json([
            'slug' => $slug,
            'exists' => $exists,
        ]);
    }
}

