<?php

namespace App\Http\Controllers;

use Illuminate\Routing\Controller as BaseController;
use Illuminate\Http\Request;
use App\Models\Unit;
use App\Models\Subunit;
use App\Models\Product;
use Validator;

class ConvertController extends BaseController
{
  public function convertUnitView(){
    $units    = Unit::all();
    $subunits = Subunit::all();
    return view('convertFunction',compact('units','subunits'));
  }
  ## Calculate how many subunits in units ##
  public function convertUnit(Request $request){
    $value          = $request->value;
    $unitId         = $request->unit_id;
    $subunitId      = $request->subunit_id;
    $subunit        = Subunit::where('id',$subunitId)->first();
    $total          = $value* $subunit->ratio;
    $final          = ['total' => $total];
    return $final;  
  }
  ## Calculate total number of units each product may have ##
  public function totalUnits($id){
    $product     = Product::find($id);
    $subunit     = Subunit::where('id',$product->subunit_id)->first();
    $ratio       = $subunit->ratio;
    $qty_unit    = $product->qty_unit;
    $qty_subunit = $product->qty_subunit;
    $total       = $qty_unit + $qty_subunit/$ratio;
    $final       = ['product' => $product->name,'total' => $total];
    return $final;  
  }
  ## Calculate total number of subunits each product may have ##
  public function totalSubunits($id){
    $product     = Product::find($id);
    $subunit     = Subunit::where('id',$product->subunit_id)->first();
    $ratio       = $subunit->ratio;
    $qty_unit    = $product->qty_unit;
    $qty_subunit = $product->qty_subunit;
    $total       = $qty_subunit + $qty_unit*$ratio;
    $final       = ['product' => $product->name,'total' => $total];
    return $final;  
  }
}