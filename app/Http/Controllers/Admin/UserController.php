<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Spatie\Permission\Models\Role;

class UserController extends Controller
{
    //
    public function index(){
        $data= [
            'users' => User::all()
        ];
        return view("admin.users.view", $data);
    }
    public function store(Request $request){
        $validatedData = $request->validate([
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'password' => ['required', 'string', 'min:8', 'confirmed'],
        ]);
        $user= new User();
        $user->name= $request->input("name");
        $user->email= $request->input("email");
        $user->password= Hash::make($request->input("password"));
        $user->email_verified_at= date("Y-m-d H:i:s");
        if($request->file("avatar"))
            $user->addMediaFromRequest("avatar")->toMediaCollection('avatar');
        $user->save();
        $user->assignRole($request->input("role"));
        return redirect()->route('admin.users.index')->with('status', 'تم اضافة المستخدم بنجاح');
    }

    public function create(){
        $data= [
            'roles' => Role::all()
        ];
        return view("admin.users.form", $data);
    }
    public function edit(User $user){
        $data= [
            'roles' => Role::all()
        ];
        return view("admin.users.form", $user, $data);
    }
    public function update(User $user, Request $request){
        $request->validate([
            'name' => ['required', 'string', 'max:255'],
        ]);
        if($request->input("password"))
            $request->validate([
                'password' => ['string', 'min:8', 'confirmed'],
            ]);

        $user->name= $request->input("name");
        if($request->input("password"))
            $user->password= Hash::make($request->input("password"));
        if($request->file("avatar"))
            $user->addMediaFromRequest("avatar")->toMediaCollection('avatar');
        $user->save();
        $user->roles()->detach();
        $user->assignRole($request->input("role"));
        return back()->with('status', 'تم تعديل المستخدم بنجاح');
    }
    public function destroy(User $user){
        $user->delete();
        return back()->with('status', 'تم حذف المستخدم بنجاح');
    }

}
