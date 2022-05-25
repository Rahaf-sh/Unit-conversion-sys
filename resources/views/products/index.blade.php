@extends('layouts.master')

@section('content')
<div class="row" style="margin-top: 5rem;">
    <div class="col-lg-12 margin-tb">
        <div class="pull-left">
            <h2>Products</h2>
        </div>
        <div class="pull-right">
            <a class="btn btn-primary" href="{{ route('units.index') }}">Units</a>
            <a class="btn btn-primary" href="{{ route('products.create') }}"> Create New Product</a>
        </div>
    </div>
</div>
@if ($message = Session::get('success'))
<div class="alert alert-success">
    <p>{{ $message }}</p>
</div>
@endif

<table class="table table-bordered">
    <tr>
        <th>No</th>
        <th>Product Name</th>
        <th>Product Price</th>
        <th>Product Qty(Unit)</th>
        <th>Product Qty(Subunit)</th>
        <th>Subunit</th>
        <th width="280px">Action</th>
    </tr>
    @foreach ($products as $product)
    <tr>
        <td>{{ $product->id }}</td>
        <td>{{ $product->name }}</td>
        <td>{{ $product->price }}</td>
        <td>{{ $product->qty_unit }}</td>
        <td>{{ $product->qty_subunit }}</td>
        <td>{{ $product->subunit->subunit }}</td>
        <td>
            <form action="{{ route('products.destroy',$product->id) }}" method="POST">
                <a class="btn btn-info" href="{{ route('products.show',$product->id) }}">Show</a>
                <a class="btn btn-primary" href="{{ route('products.edit',$product->id) }}">Edit</a>
                @csrf
                @method('DELETE')
                <button type="submit" class="btn btn-danger">Delete</button>
                <a class="btn btn-light show-total-units" data-id="{{$product->id}}">Total Units</a>
                <a class="btn btn-light show-total-subunits"  data-id="{{$product->id}}">Total Subunits</a>

            </form>
        </td>
    </tr>
    @endforeach
</table>
@include('components.modal')
@endsection