@extends('layouts.master')
  
@section('content')
    <div class="row" style="margin-top: 5rem;">
        <div class="col-lg-12 margin-tb">
            <div class="pull-left">
                <h2> Show Product</h2>
            </div>
            <div class="pull-right">
                <a class="btn btn-primary" href="{{ route('products.index') }}"> Back</a>
            </div>
        </div>
    </div>
   
    <div class="row">
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>Product:</strong>
                {{ $product->name }}
            </div>
            <div class="form-group">
                <strong>Product Price:</strong>
                {{ $product->price }}
            </div>
            <div class="form-group">
                <strong>Product Qty(Units):</strong>
                {{ $product->qty_unit }}
            </div>
            <div class="form-group">
                <strong>Product Qty(Subunits):</strong>
                {{ $product->qty_subunit }}
            </div>
            <div class="form-group">
                <strong>Product Subunit:</strong>
                {{ $product->subunit->subunit }}
            </div>
        </div>
    </div>
@endsection