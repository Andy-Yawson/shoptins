<?php

namespace App\Http\Controllers;

use App\Admin;
use Illuminate\Http\Request;
use App\Course;
use App\Event;
use App\Blog;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class AdminController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth:admin');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(){
        return view('components.admin.admin_dashboard');
    }



    public function addAdmin(){
        return view('components.admin.add_admin');
    }

    public function getAdmins(){

        $admin = Admin::all();
        return view('components.admin.view_admin',['admins'=>$admin]);
    }

    public function insertAdmin(Request $request){
        Admin::create([
            'name' => $request->admin_name,
            'level' => $request->admin_level,
            'email' => $request->admin_email,
            'password' => Hash::make($request->admin_password),
        ]);

        return redirect(route('admin.add.admin'))->with('status','Admin successfully created');
    }

    public function deleteAdmin($id){
        DB::delete("DELETE FROM admins WHERE id = ? ",[$id]);
        return redirect(route('admin.view.admin'))->with('status','Admin deleted successfully');
    }

    public function getChangePassword(){
        return view('components.admin.edit_admin');
    }

    public function changePassword(Request $request){
        $this->validate($request, [
            'old_password'  => 'required|min:7',
            'password' => 'required|min:6|confirmed'
        ]);

        $user = Auth::user();
        $oldPassword = $request->old_password;
        $newPassword = $request->password;

        if (Hash::check($oldPassword,$user->password)){
            request()->user()->fill([
                'password' => Hash::make($newPassword)
            ])->save();
            request()->session()->flash('success','password changed successfully');
            return redirect(route('admin.edit.admin',$user->id));
        }else{
            request()->session()->flash('error','Make sure you enter your right old password!');
            return redirect(route('admin.edit.admin',$user->id));
        }
    }

}
