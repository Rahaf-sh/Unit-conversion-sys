<?php

namespace App\Http\Controllers;

use Illuminate\Routing\Controller as BaseController;
use Illuminate\Http\Request;
use App\Models\Subunit;
use App\Models\Product;
use Validator;


class ProductController extends BaseController
{
    ## Display all Products ##
    public function index()
    {
        $products = Product::all();
        return view('products.index',compact('products'));
    }
    ## Create New Product View ##
    public function create()
    {
        $subunits = subunit::all();
        return view('products.create',compact('subunits'));
    }

    ## Store New Product ##
    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'name'        => 'required',
            'price'       => 'required',
            'qty_subunit' => 'required',
            'subunit_id'  => 'required',
        ]);
        if ($validator->fails()) {
            return response()->json([
                'status'   => '0',
                'details'  => $validator->errors(), 400
            ]);
        }
        $data = [
            'name'        => $request->name,
            'price'       => $request->price,
            'qty_unit'    => $request->qty_unit,
            'qty_subunit' => $request->qty_subunit,
            'subunit_id'  => $request->subunit_id,
        ];
        $product =  Product::create($data);
        session()->flash('success','Product has beed added successfuly');
        return redirect(url('/products'));
    }
    ## Show specific Product View ##
    public function show(Product $product)
    {
        return view('products.show',compact('product'));
    }
    ## edit specific Product View ##
    public function edit(product $product)
    {
        $subunits = SubUnit::all();
        return view('products.edit',compact('subunits','product'));

    }
    ## update specific Product  ##
    public function update(Request $request, Product $product)
    {
        $validator = Validator::make($request->all(), [
            'name'        => 'required',
            'price'       => 'required',
            'qty_subunit' => 'required',
            'subunit_id'  => 'required',
        ]);
        if ($validator->fails()) {
            return response()->json([
                'status'   => '0',
                'details'  => $validator->errors(), 400
            ]);
        }
        $product->update($request->all());
        return redirect()->route('products.index')->with('success','Product updated successfully');
    }
    ## destroy specific Product  ##
    public function destroy(Product $product)
    {
        $product->delete();
        return redirect()->route('products.index')->with('success','Product deleted successfully');
    }
}
