<?php

namespace App\Http\Controllers;

use App\Models\Permission;
use Illuminate\Http\Request;

class AdminPermissionController extends Controller
{
    public function createPermissions(){
        return view('admin.permission.add');
    }
    
    public function store(Request $request){
        $permissions = Permission::create([
            'name'=> $request->module_parent,
            'display_name'=> $request->module_parent,
            'parent_id' => 0
        ]);

        foreach ($request->module_childrent as $value) {
            Permission::create([
                'name'=> $value,
                'display_name'=> $value,
                'parent_id' => $permissions->id,
                'key_code' => $request->module_parent. '_' . $value
            ]);
        }

    }
}
