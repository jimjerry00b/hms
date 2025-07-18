<?php

namespace App\Http\Controllers;

use App\Http\Requests\PermissionRequest;
use App\Models\PermissionModel;
use App\Services\PermissionService;
use Exception;
use Illuminate\Http\Request;

class PermissionController extends Controller
{

    protected PermissionService $service;

    function __construct(PermissionService $service){
        $this->service = $service;
    }

    public function index()
    {
        $permissions = PermissionModel::all();
        return view('backend.permissions.index', compact('permissions'));
    }


    public function create()
    {

        return view('backend.permissions.create');
    }


    public function store(PermissionRequest $request)
    {
        try{
            $this->service->add($request->validated());
            return redirect()->route('permission.index')->with('message', 'Added');
        }catch(Exception $e){
            return redirect()->back()->with('error', $e->getMessage());
        }
    }


    public function show(string $id)
    {
        //
    }


    public function edit(string $id)
    {
        return view('backend.permissions.edit');
    }


    public function update(Request $request, string $id)
    {
        //
    }


    public function destroy(string $id)
    {
        //
    }
}
