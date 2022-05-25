@extends('layouts.master')
  
@section('content')
<div class="row" style="margin-top: 5rem;">
    <div class="col-lg-12">
        <div class="pull-left">
            <h2>Add New Unit</h2>
        </div>
        <div class="pull-right">
            <a class="btn btn-primary" href="{{ route('units.index') }}"> Back</a>
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
   
<form action="{{ route('units.store') }}" method="POST">
    @csrf
  
     <div class="row">
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>Unit:</strong>
                <input type="text" name="unit" class="form-control" placeholder="Enter Unit">
            </div>
        </div>
        <div class="col-xs-12 col-sm-12 col-md-12 text-center">
                <button type="submit" class="btn btn-primary">Save</button>
        </div>
    </div>
   
</form>
@endsection