<?php

namespace App\Services;

use App\Models\FlatModel;
use App\Models\Tenant;
use Illuminate\Support\Facades\Auth;

class TenantService
{
    


    function add($request)
    {
    $user = '';
    $nid_copy = '';

    // Handle image upload
    if (!empty($request['image']) && $request['image']->isValid()) {
        $user = $this->fileUpload($request['image']);
    }

    // Handle NID upload
    if (!empty($request['nid']) && $request['nid']->isValid()) {
        $nid_copy = $this->fileUpload($request['nid']);
    }

    // Parse move-in/out dates
    if (!isset($request['move_in_date'])) {
        unset($request['move_in_date']);
    }else{
        strtotime($request['move_in_date']);
    }
    
    strtotime($request['move_out_date']);

    if(empty($request['move_in_date'])){
        return redirect()->back()->with('error', 'Move out date is not applicable');
    }

    // Create tenant
    $tenant = Tenant::create([
        'name'          => $request['name'],
        'email'         => $request['email'],
        'phone'         => $request['phone'],
        'image'         => $user,
        'nid'           => $nid_copy,
        'flat_id'       => $request['flat_id'],
        'house_id'      => $request['house_id'],
        'move_in_date'  => (!empty($request['move_in_date']))? $request['move_in_date'] : null,
        'move_out_date' => $request['move_out_date'],
    ]);

    // Update flat record
    if ($tenant && ($flat = FlatModel::find($request['flat_id']))) {
        $flat->update([
            'tenant_id' => $tenant->id,
            'is_active' => 1,
        ]);
    }

    return $tenant ? true : false;
}

    function fileUpload($file)
    {
        
        $destinationPath = 'assets/img/';
        $filename = $destinationPath . time() .".".$file->getClientOriginalExtension();
        $file->move($destinationPath, $filename);
        return $filename;
    }

    function update($data, $tenant){

        if (!isset($data['move_in_date'])) {
            unset($data['move_in_date']);
        }else{
            strtotime($data['move_in_date']);
        }
        
        strtotime($data['move_out_date']);
        
        if(empty($data['move_in_date'])){
            $data['move_in_date'] = null;
            $data['move_out_date'] = null;
        }

        if(isset($data['image'])){
            $file = $data['image'];       
            if ($file->isValid()) {
                $data['image'] = $this->fileUpload($file);

                if (file_exists($tenant['image'])) {
                    unlink($tenant['image']);
                }
            }
        }
        

        if(isset($data['nid'])){
            $file = $data['nid'];       
            if ($file->isValid()) {
                $data['nid'] = $this->fileUpload($file);

                if (file_exists($tenant['nid'])) {
                    unlink($tenant['nid']);
                }
            }
        }
        
        $flat_id = FlatModel::find($data['flat_id']); 
        if ($flat_id) {
            $flat_id->tenant_id = $tenant['id'];
            $flat_id->is_active = 1;
            $flat_id->save();
        }
        $tenant->update(collect($data)->toArray());
        
    }


    function delete($tenant){
        if (file_exists($tenant['image'])) {
            unlink($tenant['image']);
        }

        if (file_exists($tenant['nid'])) {
            unlink($tenant['nid']);
        }
        
        $tenant->delete();
    }
}
