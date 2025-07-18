<?php

namespace App\Http\Controllers;

use App\Http\Requests\UserRequest;
use App\Http\Requests\UserUpdateRequest;
use App\Models\RoleModel;
use App\Models\User;
use App\Services\UserService;
use Exception;
use Illuminate\Http\Request;

class UserController extends Controller
{

    protected UserService $service;

    function __construct(UserService $service){
        $this->service = $service;
    }

    public function index()
    {
        $users = User::paginate(10);
        return view('backend.users.index', compact('users'));
    }


    public function create()
    {
        $roles = RoleModel::whereNotIn('id',[1])->get();
        return view('backend.users.create', compact('roles'));
    }


    public function store(UserRequest $request)
    {
        try{
            $this->service->add($request->validated());
            return redirect()->route('user.index')->with('message', 'Added');
        }catch(Exception $e){
            return redirect()->back()->with('error', $e->getMessage());
        }

    }


    public function show(string $id)
    {
        //
    }


    public function edit($id)
    {
        $user = User::find($id);
        $roles = RoleModel::whereNotIn('id',[1])->get();
        return view('backend.users.edit', compact('user', 'roles'));
    }


    public function update(UserUpdateRequest $request, string $id)
    {
        try{
            $this->service->update($request->validated(), $id);
            return redirect()->route('user.index')->with('message', 'Updated');
        }catch(Exception $e){
            return redirect()->back()->with('error', $e->getMessage());
        }
    }

    public function destroy(string $id)
    {
        //
    }
}
