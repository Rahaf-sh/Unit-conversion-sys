@extends('layouts.master')
  
@section('content')
    <div class="row" style="margin-top: 5rem;">
        <div class="col-lg-12 margin-tb">
            <div class="pull-left">
                <h2> Show Subunit</h2>
            </div>
            <div class="pull-right">
                <a class="btn btn-primary" href="{{ url()->previous() }}"> Back</a>
            </div>
        </div>
    </div>
   
    <div class="row">
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>Subunit:</strong>
                {{ $subunit->subunit }}
            </div>
            <div class="form-group">
                <strong>Unit:</strong>
                {{ $subunit->unit->unit }}
            </div>
            <div class="form-group">
                <strong>Ratio:</strong>
                {{ $subunit->ratio }}
            </div>
        </div>
    </div>
@endsection