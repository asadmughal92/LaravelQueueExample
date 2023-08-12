<?php

namespace App\Http\Controllers;

use App\Models\Products;
use Illuminate\Http\Request;

class ProductsController extends Controller
{
    public function store(Request $request)
    {
        $request->validate([
            'product_name' => 'required|string',
            'price' => 'required|regex:/^\d+(\.\d{1,2})?$/',
        ]);

        $product = new Products;
        // Queue a job to process the data
        dispatch(new \App\Jobs\ProcessAPIDataJob($request->input(),$product));

        return response()->json(['message' => 'Data processing job queued successfully']);
    }
}
