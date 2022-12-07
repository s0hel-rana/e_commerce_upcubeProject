<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AdminController extends Controller
{
    public function destroy(Request $request){
        Auth::guard('web')->logout();

        $request->session()->invalidate();

        $request->session()->regenerateToken();

        return redirect('/login');
    }
    public function profile(){
       $id = Auth::user()->id;
       $adminData = User::find($id);
       return view('Backend.admin.profile',compact('adminData'));
    }
    public function editProfile(){
        $id = Auth::user()->id;
        $profileEdit = User::find($id);
        return view('Backend.admin.edit_profile',compact('profileEdit'));
    }
    public function storeProfile(Request $request){
        $id = Auth::user()->id;
        $data = User::find($id);

        $data->name = $request->name;
        $data->username = $request->username;
        $data->email = $request->email;
        if($request->file('p_image')){
            $file = $request->file('p_image');
            $filename = date('YmdHi').$file->getClientOriginalName();
            $file->move(public_path('upload/admin_image'),$filename);
            $data['p_image'] = $filename;
        }
        $data->save();

        $notification = array(
            'message' => 'Admin profile update successfully',
            'alert-type' => 'success'
        );
        return redirect()->route('admin.profile')->with($notification);
    }
}
