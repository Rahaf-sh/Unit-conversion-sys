@extends('layouts.master')

@section('content')
<div class="row" style="margin-top: 5rem;">
    <div class="col-lg-12 margin-tb">
        <div class="pull-left">
            <h2>Convert From Unit To Subunit</h2>
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

<div class="row">
    <div class="col-xs-12 col-sm-12 col-md-12">
        <div class="form-group">
            <strong>Value:</strong>
            <input type="text" name="value" id="value" class="form-control" placeholder="Enter Value">
        </div>
    </div>
    <div class="col-xs-12 col-sm-12 col-md-12">
        <div class="form-group">
            <strong>Unit:</strong>
            <select class="form-control fetch_subunits" id="unit_id" name="unit_id" required>
                @foreach($units as $unit)
                <option value="{{ $unit->id }}">{{ $unit->unit }}</option>
                @endforeach
            </select>
        </div>
    </div>
    <div class="col-xs-12 col-sm-12 col-md-12">

        <div class="form-group">
            <strong>Subunit:</strong>
            <select id="subunit_id" name="subunit_id" class="form-control">
            </select>
        </div>
    </div>
</div>

<div class="col-xs-12 col-sm-12 col-md-12 text-center">
    <a class="btn btn-primary convert-function">Convert</a>
</div>
</div>
@include('components.modal')
@endsection