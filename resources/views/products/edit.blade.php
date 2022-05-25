@extends('layouts.master')

@section('content')
<div class="row" style="margin-top: 5rem;">
    <div class="col-lg-12">
        <div class="pull-left">
            <h2>Edit Product</h2>
        </div>
        <div class="pull-right">
            <a class="btn btn-primary" href="{{ route('products.index') }}"> Back</a>
        </div>
    </div>
</div>

@if ($errors->any())
<div class="alert alert-danger">
    <ul>
        @foreach ($errors->all() as $error)
        <li>{{ $error }}</li>
        @endforeach
    </ul>
</div>
@endif

<form action="{{ route('products.update',$product->id) }}" method="POST">
        @csrf
        @method('PUT')
    <div class="row">
    <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>Product Name:</strong>
                <input type="text" name="name" class="form-control" placeholder="Enter Product Name" value="{{$product->name}}" required>
            </div>
        </div>

        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>Product Price:</strong>
                <input type="text" name="price" class="form-control" placeholder="Enter Product Price" value="{{$product->price}}" required>
            </div>
        </div>
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>Product Quantity (Units):</strong>
                <input type="text" name="qty_unit" class="form-control" value="{{$product->qty_unit}}" placeholder="Enter Product Quanity in units">
            </div>
        </div>
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>Product Quantity (Subunits):</strong>
                <input type="text" name="qty_subunit" class="form-control" value="{{$product->qty_subunit}}" placeholder="Enter Product Quanity in subunits" required>
            </div>
        </div>

        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>Subunit:</strong>
                <select class="form-control" name="subunit_id" required>
                    @foreach($subunits as $subunit)
                    <option value="{{ $subunit->id }}" {{ old('subunit_id') == $subunit->id ? 'selected' : '' }}>{{ $subunit->subunit }}</option>
                    @endforeach
                </select>
            </div>
        </div>
        
        <div class="col-xs-12 col-sm-12 col-md-12 text-center">
            <button type="submit" class="btn btn-primary">Save</button>
        </div>
    </div>

</form>
@endsection