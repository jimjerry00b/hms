<?php

namespace App\Http\Controllers;

use App\Http\Requests\PermissionRouterRequest;
use App\Models\PermisionToRouteModel;
use App\Models\PermissionModel;
use App\Services\PermissionRouteService;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

class PermisionToRouteController extends Controller
{

    protected PermissionRouteService $service;

    function __construct(PermissionRouteService $service)
    {
        $this->service = $service;
    }

    public function index()
    {
        $routerPermissions = PermisionToRouteModel::with('permission')->get();
        return view('backend.permissions_to_route.index', compact('routerPermissions'));
    }


    public function create()
    {
        $routes = Route::getRoutes();
        $middlewaregroup = 'admin';
        $routeDetails = [];

        foreach($routes as $route){
            $middlewares = $route->gatherMiddleware();

            if(in_array($middlewaregroup, $middlewares)){

                if($route->getName() !== 'dashboard' && $route->getName() !== 'logout'){
                    $routeDetails [] = [
                        'name' => $route->getName(),
                        'uri'  => $route->uri()
                    ];
                }

            }
        }

        $permissions = PermissionModel::all();
        return view('backend.permissions_to_route.create', compact('permissions', 'routeDetails'));
    }

    public function store(PermissionRouterRequest $request)
    {
        try{
            $this->service->add($request->validated());
            return redirect()->route('permission_to_route.index')->with('message', 'Added');
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
        //
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
