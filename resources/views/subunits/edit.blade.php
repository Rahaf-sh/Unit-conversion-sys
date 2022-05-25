@extends('layouts.master')
   
@section('content')
    <div class="row" style="margin-top: 5rem;">
        <div class="col-lg-12 margin-tb">
            <div class="pull-left">
                <h2>Edit Unit</h2>
            </div>
            <div class="pull-right">
                <a class="btn btn-primary" href="{{ route('subunits.index') }}"> Back</a>
            </div>
        </div>
    </div>
   
    @if ($errors->any())
        <div class="alert alert-danger">
            <strong>Whoops!</strong> There were some problems with your input.<br><br>
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif
  
    <form action="{{ route('subunits.update',$subunit->id) }}" method="POST">
        @csrf
        @method('PUT')
   
         <div class="row">
         <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>Unit:</strong>
                <select class="form-control" name="unit_id" required>
                    @foreach($units as $unit)
                    <option value="{{ $unit->id }}" {{ old('unit_id') == $unit->id ? 'selected' : '' }}>{{ $unit->unit }}</option>
                    @endforeach
                </select>
            </div>
        </div>

        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>Subunit:</strong>
                <input type="text" name="subunit" class="form-control"  value="{{$subunit->subunit}}" placeholder="Enter Subunit">
            </div>
        </div>
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>Ratio:</strong>
                <input type="text" name="ratio" class="form-control" value="{{$subunit->ratio}}" placeholder="Enter Ratio">
            </div>
        </div>
            <div class="col-xs-12 col-sm-12 col-md-12 text-center">
              <button type="submit" class="btn btn-primary">Save</button>
            </div>
        </div>
   
    </form>
@endsection