@extends('layouts.master')
 
@section('content')
    <div class="row" style="margin-top: 5rem;">
        <div class="col-lg-12 margin-tb">
            <div class="pull-left">
                <h2>Units</h2>
            </div>
            <div class="pull-right">
                <a class="btn btn-primary" href="{{ route('units.create') }}"> Create New Unit</a>
                <a class="btn btn-primary" href="{{ route('products.index') }}">Products</a>
                <a class="btn btn-light mt-2" href="{{ route('convertFunction') }}">Convert Function</a>  
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
            <th>Unit</th>
            <th width="280px">Actions</th>
        </tr>
        @foreach ($units as $unit)
        <tr>
            <td>{{ $unit->id }}</td>
            <td>{{ $unit->unit }}</td>
            <td>
                <form action="{{ route('units.destroy',$unit->id) }}" method="POST">   
                    <a class="btn btn-info" href="{{ route('units.show',$unit->id) }}">Show</a>    
                    <a class="btn btn-primary" href="{{ route('units.edit',$unit->id) }}">Edit</a> 
                    @csrf
                    @method('DELETE')      
                    <button type="submit" class="btn btn-danger">Delete</button>
                    <a class="btn btn-light mt-2" href="{{ route('units.createSubunit',$unit->id) }}">Add Subunit</a>  
                </form>
            </td>
        </tr>
        @endforeach
    </table>  
 
@endsection