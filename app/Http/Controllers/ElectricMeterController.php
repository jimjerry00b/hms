<?php

namespace App\Http\Controllers;

use App\Http\Requests\ElecrtricMeterRequest;
use App\Http\Requests\ElectricBillRequest;
use App\Models\ElectricMeter;
use App\Models\FlatModel;
use App\Models\House;
use App\Services\ElectricMeterServices;
use Exception;
use Illuminate\Http\Request;

class ElectricMeterController extends Controller
{
    
    protected ElectricMeterServices $service;

    function __construct(ElectricMeterServices $service)
    {
        $this->service = $service;
    }

    public function index()
    {
        $electricity_bills = ElectricMeter::with('flat')->paginate(10);
        return view('backend.electricity.index', compact('electricity_bills'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $flats = FlatModel::get();
        return view('backend.electricity.create', compact('flats'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(ElecrtricMeterRequest $request)
    {
        try{
            $this->service->add($request->validated());
            return redirect()->route('electricitys.index')->with('message', 'Added');
        }catch(Exception $e){
            return redirect()->back()->with('error', $e->getMessage());
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        $electricMetterInfo = ElectricMeter::find($id);
        $flats = FlatModel::get();
        return view('backend.electricity.edit', compact('electricMetterInfo', 'flats'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(ElecrtricMeterRequest $request, string $id)
    {
        $electricMetterInfo = ElectricMeter::find($id);
        try{
            $this->service->update($request->validated(), $electricMetterInfo);
            return redirect()->route('electricitys.index')->with('message', 'Updated');
        }catch(Exception $e){
            return redirect()->back()->with('error', $e->getMessage());
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }

    public function billCreate()
    {
        $houses =  House::get();
        return view('backend.electricity.bill-create', compact('houses'));
    }

    public function billStore(ElectricBillRequest $request)
    {
        try{
            $this->service->billAdd($request->validated());
            return redirect()->route('electricitys.index')->with('message', 'Added');
        }catch(Exception $e){
            return redirect()->back()->with('error', $e->getMessage());
        }
    }
}
