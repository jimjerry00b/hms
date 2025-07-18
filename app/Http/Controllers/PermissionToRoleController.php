<?php

namespace App\Http\Controllers;

use App\Http\Requests\PermissionToRoleRequest;
use App\Models\PermissionModel;
use App\Models\PermissionRole;
use App\Models\RoleModel;
use App\Services\PermissionToRoleService;
use Exception;
use Illuminate\Http\Request;

class PermissionToRoleController extends Controller
{

    protected PermissionToRoleService $service;

    function __construct(PermissionToRoleService $service){
        $this->service = $service;
    }

    public function index()
    {
        $permissionsWithRoles = PermissionModel::with('roles')->whereHas('roles')->get();
        //dd($permissionToRoles);
        return view('backend.permissions_to_role.index', compact('permissionsWithRoles'));
    }


    public function create()
    {
        $roles = RoleModel::all();
        $permissions = PermissionModel::all();
        return view('backend.permissions_to_role.create', compact('roles', 'permissions'));
    }


    public function store(PermissionToRoleRequest $request)
    {
        try{
            $this->service->add($request->validated());
            return redirect()->route('permission_to_role.index')->with('message', 'Added');
        }catch(Exception $e){
            return redirect()->back()->with('error', $e->getMessage());
        }
    }

    public function show(string $id)
    {
        //
    }

    public function edit(PermissionRole $permissionToRole)
    {
        $permissions = PermissionModel::all();
        return view('backend.permissions_to_role.edit', compact('permissionToRole', 'permissions'));
    }

    public function update(PermissionToRoleRequest $request, PermissionToRoleRequest $permissionToRole)
    {
        try{
            $this->service->update($request->validated, $permissionToRole);
            return redirect()->route('permission_to_role.index')->with('message', 'Added');
        }catch(Exception $e){
            return redirect()->back()->with('error', $e->getMessage());
        }
    }

    public function destroy(string $id)
    {
        //
    }
}
