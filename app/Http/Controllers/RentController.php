<?php

namespace App\Http\Controllers;

use App\Http\Requests\RentsRequest;
use App\Models\Rent;
use App\Models\Tenant;
use App\Services\RentsService;
use Barryvdh\DomPDF\Facade\Pdf as FacadePdf;
use Barryvdh\DomPDF\PDF as DomPDFPDF;
use PDF;
use Exception;
use Illuminate\Http\Request;

class RentController extends Controller
{
    protected RentsService $service;

    function __construct(RentsService $service){
        $this->service = $service;
    }
    
    public function index()
    {
        $rents = Rent::paginate(10);
        return view('backend.rent.index', compact('rents'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $tenants = Tenant::with('house')->with('flat')->get();     
        //dd($tenants);   
        return view('backend.rent.create', compact('tenants'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(RentsRequest $request)
    {
        //dd($request->all());
        try{
            
            $this->service->add($request->validated());            
            return redirect()->route('rents.index')->with('message', 'Added');
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
    public function edit(Rent $rent)
    {        
        $rent->load(['house']);
        
        return view('backend.rent.edit', compact('rent'));
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
    public function destroy(string $id)
    {
        //
    }

    public function dueReport(Request $request){ 
        if($request->input('month')){
            $month = $request->input('month') ?? now()->format('Y-m');
            $rents = Rent::whereBetween('month', [$month, now()])->paginate(10);
        }
        if($request->status == null){       
            return redirect()->route('rents.index')->with('error', 'Not found');
        }elseif($request->status != null){
            $rents = Rent::where('status', $request->status)->paginate(10);
        }
        
        return view('backend.rent.index', compact('rents'));         
    }
    
    public function billCheck(Rent $id){
        $rent = $id;  
        return view('backend.rent.invoice', compact('rent'));
    }

    public function generateInvoice(Rent $id){ 
        $rent = $id;  
             
        $pdf = FacadePdf::loadView('backend.rent.invoice', compact('rent'));
        return $pdf->download('invoice-'.$rent->tenant->name.'-'.$rent->month.'.pdf');
    }
}
