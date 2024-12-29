<?php

namespace App\Http\Controllers;
use App\Models\Announcement;
use Illuminate\Support\Facades\Auth;
use App\Models\User;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
class UserController extends Controller
{
    public function index(){
        return view('student.login'); // Make sure this view exists
    }

    public function authenticate(Request $request)
{
    if (Auth::attempt(['email' => $request->email, 'password' => $request->password])) {
    if (Auth::user()->role != 'student') {
        Auth::logout();
        return redirect()->route('student.login')->with('error', 'Unauthorized user. Access denied.');
    }
    return redirect()->route('student.dashboard');
    } else {
        return redirect()->route('student.login')->with('error', 'Invalid email or password.');

    }



}


    public function dashboard(){
        $data['announcement'] =Announcement::where('type','student')->latest()->get();
        return view('student.dashboard',$data); // Ensure this file exists in resources/views/student/dashboard.blade.php
    }
    public function logout(){
        Auth::logout();
        return redirect()->route('student.login')->with('success', 'logout successfully');

    }
    public function changePassword(){
       return view('student.change_password');
    }


public function updatePassword(Request $request)
{
    $request->validate([
        'old_password' => 'required',
        'new_password' => 'required',
        'password_confirmation' => 'required|same:new_password',
    ]);

    $old_password = $request->old_password;
    $new_password = $request->new_password; // Fix this to assign the correct value
    $user = User::find(Auth::user()->id);

    // Verify the old password
    if (Hash::check($old_password, $user->password)) {
        // Update password and save
        $user->password = bcrypt($new_password); // Hash the new password
        $user->update();

        return redirect()->back()->with('success', 'Password updated successfully.');
    } else {
        return redirect()->back()->with('error', 'Old password does not match.');
    }
}

}
