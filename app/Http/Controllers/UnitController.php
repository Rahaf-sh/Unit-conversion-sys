<?php

namespace App\Http\Controllers;

use Illuminate\Routing\Controller as BaseController;
use Illuminate\Http\Request;
use App\Models\Unit;
use App\Models\Subunit;
use Validator;


class UnitController extends BaseController
{
    ## Display all Units ##
    public function index()
    {
        $units = Unit::all();
        return view('units.index',compact('units'));
    }
    ## Create New Unit View ##
    public function create()
    {
        return view('units.create');
    }

    ## Store New Unit ##
    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'unit' => 'required',
        ]);
        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator->errors());
        }
        $data = [
            'unit' => $request->unit,
        ];
        $unit =  Unit::create($data);
        session()->flash('success','Unit has beed added successfuly');
        return redirect(url('/units'));
    }

    public function show(Unit $unit)
    {
        $subunits = Subunit::where('unit_id',$unit->id)->get();
        return view('units.show',compact('unit','subunits'));
    }

    public function edit(Unit $unit)
    {
        return view('units.edit',compact('unit'));

    }

    public function update(Request $request, Unit $unit)
    {
        $validator = Validator::make($request->all(), [
            'unit' => 'required',
        ]);
        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator->errors());

        }
        $unit->update($request->all());
        return redirect()->route('units.index')->with('success','Unit updated successfully');
    }

    public function destroy(Unit $unit)
    {
        $unit->delete();
        return redirect()->route('units.index')->with('success','Unit deleted successfully');
    }

     ## Fetch subunits for specific unit ##
     public function fetchSubunit($id)
     {
        $subunits = Subunit::where('unit_id',$id)->get();
        return $subunits;
     }

    ## Create New SubUnit View ##
    public function createSubunit($id)
    {
        $unit = Unit::find($id);
        return view('subunits.create',compact('unit'));
    }
    
    ## Store subunit to specific unit ##
    public function storeSubunit(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'subunit' => 'required',
            'ratio' => 'required',
            'unit_id' => 'required',
        ]);
        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator->errors());
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

}
