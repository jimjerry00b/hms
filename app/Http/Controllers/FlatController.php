<?php

namespace App\Http\Controllers;

use App\Http\Requests\FlatRequest;
use App\Models\ElectricMeter;
use App\Models\FlatModel;
use App\Models\House;
use App\Services\FlatServices;
use Exception;
use Illuminate\Http\Request;

class FlatController extends Controller
{
    protected FlatServices $service;

    function __construct(FlatServices $service){
        $this->service = $service;
    }

    public function index()
    {
        $flats = FlatModel::with('electricityBills')->paginate(10);
        return view('backend.flat.index', compact('flats'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $houses = House::paginate(10);
        return view('backend.flat.create', compact('houses'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(FlatRequest $request)
    {
        
        try{            
            $this->service->add($request->validated());
            return redirect()->route('flats.index')->with('message', 'Added');
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
    public function edit(FlatModel $flat)
    {      
        $flat->load('electricityBills');
        $houses = House::paginate(10);
        return view('backend.flat.edit', compact('flat', 'houses'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        try{            
            $this->service->add($request->validated());
            return redirect()->route('flats.index')->with('message', 'Added');
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


    public function flatList($id){

        $flats = FlatModel::with('electricityBillsNew')->where('house_id', $id)->get();
        // dd($flats);
        $html = view('backend.flat.flatListJson', compact('flats'))->render();

        return response()->json([
            'html' => $html,
        ]);
    }


    public function flatDetails($id){

        $flat = ElectricMeter::with('flat')->find($id);
        return response()->json([
            'account_number' => $flat->account_number,
            'meter_number' => $flat->meter_number,
            'electric_meter_id' => $flat->flat->id,
        ]);
    }
}
