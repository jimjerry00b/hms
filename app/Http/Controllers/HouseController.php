<?php

namespace App\Http\Controllers;

use App\Http\Requests\HouseRequest;
use App\Models\House;
use Exception;
use Illuminate\Http\Request;
use App\Services\HouseService;

class HouseController extends Controller
{
    protected HouseService $service;

    function __construct(HouseService $service){
        $this->service = $service;
    }

    public function index()
    {
        $houses = House::paginate(10);
        return view('backend.house.index', compact('houses'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('backend.house.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(HouseRequest $request)
    {       
        try{
            $this->service->add($request->validated());            
            return redirect()->route('houses.index')->with('message', 'Added');
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
    public function edit(House $house)
    {
        return view('backend.house.edit', compact('house'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(House $house)
    {
        try{
            $this->service->delete($house);
            return redirect()->route('houses.index')->with('message', 'Deleted');
        }catch(Exception $e){
            return redirect()->back()->with('error', $e->getMessage());
        }
    }
}
