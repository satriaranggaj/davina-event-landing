<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Product;

class SlugController extends Controller
{
    public function check(Request $request)
    {
        $slug = $request->slug;

        return response()->json([
            'exists' => Product::where('slug', $slug)->exists(),
        ]);
    }
}
