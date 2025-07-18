<?php

namespace App\Http\Controllers;

use App\Http\Requests\RoleRequest;
use App\Models\RoleModel;
use App\Services\RoleService;
use Exception;
use Illuminate\Http\Request;

class RoleController extends Controller
{

    protected RoleService $service;

    function __construct(RoleService $service)
    {
        $this->service = $service;
    }

    public function index()
    {
        $roles = RoleModel::all();
        return view('backend.roles.index', compact('roles'));
    }


    public function create()
    {
        return view('backend.roles.create');
    }


    public function store(RoleRequest $request)
    {
        try{
            $this->service->add($request->validated());
            return redirect()->route('role.index')->with('message', 'Added');
        }catch(Exception $e){
            return redirect()->back()->with('error', $e->getMessage());
        }
    }


    public function show(string $id)
    {
        //
    }


    public function edit(RoleModel $role)
    {
        return view('backend.roles.edit', compact('role'));
    }


    public function update(RoleRequest $request, RoleModel $role)
    {
        try{
            $this->service->update($request->validated(), $role);
            return redirect()->route('role.index')->with('message', 'Updated');
        }catch(Exception $e){
            return redirect()->back()->with('error', $e->getMessage());
        }
    }


    public function destroy(RoleModel $role)
    {
        try{
            $this->service->delete($role);
            return redirect()->route('role.index')->with('message', 'Deleted');
        }catch(Exception $e){
            return redirect()->back()->with('error', $e->getMessage());
        }
    }
}
