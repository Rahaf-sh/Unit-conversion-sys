<?php

namespace App\Http\Controllers;

use Illuminate\Routing\Controller as BaseController;
use Illuminate\Http\Request;
use App\Models\Unit;
use App\Models\Subunit;
use Validator;


class SubunitController extends BaseController
{
    ## Display all Subunits ##
    public function index()
    {
        $subunits = Subunit::all();
        return view('subunits.index',compact('subunits'));
    }
    ## Create New Subunit View ##
    public function create()
    {
        $units = Unit::all();
        return view('subunits.create',compact('units'));
    }

    ## Store New subunit ##
    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'subunit' => 'required',
            'ratio' => 'required',
            'unit_id' => 'required',
        ]);
        if ($validator->fails()) {
            return response()->json([
                'status'   => '0',
                'details'  => $validator->errors(), 400
            ]);
        }
        $data = [
            'subunit' => $request->subunit,
            'ratio'   => $request->ratio,
            'unit_id'   => $request->unit_id,
        ];
        $subunit =  Subunit::create($data);
        session()->flash('success','Subunit has beed added successfuly');
        return redirect(url('/subunits'));
    }
    ## show specific subunit view ##
    public function show(Subunit $subunit)
    {
        return view('subunits.show',compact('subunit'));
    }
    ## edit specific subunit view ##

    public function edit(Subunit $subunit)
    {
        $units = Unit::all();
        return view('subunits.edit',compact('subunit','units'));

    }
    ## update specific subunit  ##
    public function update(Request $request, Subunit $subunit)
    {
        $validator = Validator::make($request->all(), [
            'subunit' => 'required',
            'ratio' => 'required',
            'unit_id' => 'required',
        ]);
        if ($validator->fails()) {
            return response()->json([
                'status'   => '0',
                'details'  => $validator->errors(), 400
            ]);
        }
        $subunit->update($request->all());
        return redirect()->route('subunits.index')->with('success','Subunit updated successfully');
    }
    ## destroy specific subunit  ##
    public function destroy(Subunit $subunit)
    {
        $subunit->delete();
        return redirect()->route('subunits.index')->with('success','Subunit deleted successfully');
    }
}
