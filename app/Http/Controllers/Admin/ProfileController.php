<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Closure;
use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class ProfileController extends Controller
{
    public function index(){
        $adminData = User::find(Auth::user()->id);
        return view('admin.admin-profile', compact('adminData'));
    }

    public function changePassword()
    {
        $adminData = User::find(Auth::user()->id);
        return view('admin.change-password', compact('adminData'));
    }//end method

    public function update(Request $request){
        return redirect('admin/profile')->with('success', 'Update successfully !');
    }

    public function updatePassword(Request $request){
        // validation
        $request->validate([
            'old_password' =>['required',
                function (string $attribute, mixed $value, Closure $fail) {
                    if (!Hash::check($value,Auth::user()->password)) {
                        $fail("The Old Password is not Match !");
                    }
                },
            ],
            'new_password'=>'required|confirmed|min:3',
            'new_password_confirmation'=>'required|same:new_password|min:3',

        ]);
        return redirect('admin/profile')->with('success', 'Update Password successfully !');
    }
}
