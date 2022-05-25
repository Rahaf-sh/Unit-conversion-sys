@extends('layouts.master')
 
@section('content')
    <div class="row" style="margin-top: 5rem;">
        <div class="col-lg-12 margin-tb">
            <div class="pull-left">
                <h2>Subunits</h2>
            </div>
            <div class="pull-right">
            <a class="btn btn-primary" href="{{ route('units.index') }}">Units</a>
            <a class="btn btn-primary" href="{{ route('products.create') }}"> Create New Product</a>        </div>
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
            <th>Subunit</th>
            <th>Ratio</th>
            <th>Unit</th>
            <th width="280px">Action</th>
        </tr>
        @foreach ($subunits as $subunit)
        <tr>
            <td>{{ $subunit->id }}</td>
            <td>{{ $subunit->subunit }}</td>
            <td>{{ $subunit->ratio }}</td>
            <td>{{ $subunit->unit->unit }}</td>

            <td>
                <form action="{{ route('subunits.destroy',$subunit->id) }}" method="POST">   
                    <a class="btn btn-info" href="{{ route('subunits.show',$subunit->id) }}">Show</a>    
                    <a class="btn btn-primary" href="{{ route('subunits.edit',$subunit->id) }}">Edit</a>   
                    @csrf
                    @method('DELETE')      
                    <button type="submit" class="btn btn-danger">Delete</button>
                </form>
            </td>
        </tr>
        @endforeach
    </table>  
 
@endsection