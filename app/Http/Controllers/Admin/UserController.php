<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\User;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Spatie\Permission\Models\Role;

class UserController extends Controller
{
    //
    private function filterUser($users, $request){
        if($request->input('search')){
            $search= $request->input('search');
            $users= $users->where(function ($query) use ($search) {
                $query->where("email", "like", "%".$search."%")->orWhere("name", "like", "%".$search."%");
            });
        }

        if($request->input('role')){
            $role= $request->input('role');
            $users= $users->whereHas('roles', function (Builder $query) use($role) {
                $query->where('roles.id', $role);
            });
        }

        if($request->input('num')){
            $num= $request->input('num');
            $users= $users->paginate($num);
        }else{
            $users= $users->paginate(10);
        }
        return $users;
    }

    public function index(Request $request){
        $users= User::whereNotNull("id");
        $users= $this->filterUser($users, $request);
        $data= [
            'users' => $users
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
