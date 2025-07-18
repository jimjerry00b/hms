<?php

namespace App\Http\Controllers;

use App\Http\Requests\TenantRequest;
use App\Models\FlatModel;
use App\Models\House;
use App\Models\Tenant;
use App\Services\TenantService;
use Exception;
use Illuminate\Http\Request;

class TenantController extends Controller
{
    protected TenantService $service;

    function __construct(TenantService $service){
        $this->service = $service;
    }

    public function index()
    {
        $tenants = Tenant::with('house')->with('flat')->where('is_active', 1)->paginate(10); 
        return view('backend.tenant.index', compact('tenants'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $houses = House::paginate(10);
        $flats = FlatModel::where('is_active', 0)->get();
        return view('backend.tenant.create', compact('houses', 'flats'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(TenantRequest $request)
    {
        try{
            $this->service->add($request->validated());            
            return redirect()->route('tenants.index')->with('message', 'Added');
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
    public function edit(Tenant $tenant)
    {
        try{
            $tenant->load(['house']);
            $houses = House::orderBy('name')->get();        
            $flats = FlatModel::where('is_active', 0)
                        ->orWhere(function ($query) use ($tenant) {
                    $query->where('id', $tenant->flat_id)
                        ->where('is_active', 1);})
                        ->get();
        
            return view('backend.tenant.edit', compact('tenant', 'houses', 'flats'));
        }catch(Exception $e){
            return redirect()->back()->with('error', $e->getMessage());
        }
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(TenantRequest $request, Tenant $tenant)
    {        

        try {
            $this->service->update($request->validated(), $tenant);            
            return redirect()->route('tenants.index')->with('success', 'Modified');
        } catch (Exception $e) {
            return redirect()->back()->with('error', $e->getMessage());
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Tenant $tenant)
    {
        $this->service->delete($tenant);
        return redirect()->route('tenants.index')->with('success', 'Deleted');
    }

    public function getTenentFlatDetails(FlatModel $id){

        $id->load('getElectricityMonthlyBill');
        if (!$id) {
            return response()->json([
                'success' => false,
                'message' => 'Tenant not found.'
            ], 404);
        }

       
        return response()->json([
            'success' => true,
            'data' => [
                'monthly_rent' => $id->monthly_rent,
                'electric_meter_id' => $id->id,
            ]
        ]);
    }
}
