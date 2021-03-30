<?php

namespace App\Http\Controllers\API;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Products;
use Validator;

class ProductController extends Controller
{
    public $successStatus = 200;
    
    public function index()
    {
        $products = Products::all();
        return response()->json(['products' => $products->toArray()], $this->successStatus);
    }
    public function store(Request $request)
    {
        $input = $request->all();
        $validator = Validator::make($input, [
            'name' => 'required',
            'img' => 'required',
            'how_to_use' => 'required'
        ]);
        if ($validator->fails()) {
            return response()->json(['error' => $validator->errors()], 401);
        }
        $product = Products::create($input);
        return response()->json(['products' => $product->toArray()], $this->successStatus);
    }
    public function show($id)
    {
        $product = Products::find($id);
        if (is_null($product)) {
            return response()->json(['error' => $validator->errors()], 401);
        }
        return response()->json(['products' => $product->toArray()], $this->successStatus);
    }
    public function update(Request $request, Products $product)
    {
        $input = $request->all();
        $validator = Validator::make($input, [
            'name' => 'required',
            'img' => 'required',
            'how_to_use' => 'required'
        ]);
        if ($validator->fails()) {
            return response()->json(['error' => $validator->errors()], 401);
        }
        $product->name = $input['name'];
        $product->img = $input['img'];
        $product->how_to_use = $input['how_to_use'];
        $product->save();
        return response()->json(['products' => $product->toArray()], $this->successStatus);
    }
    public function destroy(Products $product)
    {
        $product->delete();
        return response()->json(['products' => $product->toArray()], $this->successStatus);
    }
}
