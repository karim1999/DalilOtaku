<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;

class RoleController extends Controller
{
    //
    public function index(){
        $data= [
            'roles' => Role::paginate(15)
        ];
        return view("admin.roles.view", $data);
    }
    public function create(){
        $data= [
            "permissions"=> Permission::all()
        ];
        return view("admin.roles.form", $data);
    }
    public function store(Request $request){
        $name= $request->input("name");
        $permissions= $request->input("permissions");
        $role = Role::create(['name' => $name]);
        $role->syncPermissions($permissions);
        return redirect()->route('admin.roles.index')->with('status', 'تم اضافة الدور بنجاح');
    }
    public function edit(Role $role){
        $data= [
            "permissions"=> Permission::all(),
            "role"=> $role
        ];
        return view("admin.roles.form", $role, $data);
    }
    public function update(Role $role, Request $request){
        $permissions= $request->input("permissions");
        $role->syncPermissions($permissions);
        return back()->with('status', 'تم تعديل الدور بنجاح');
    }
    public function destroy(Role $role){
        $role->delete();
        return back()->with('status', 'تم حظف الدور بنجاح');
    }


}
