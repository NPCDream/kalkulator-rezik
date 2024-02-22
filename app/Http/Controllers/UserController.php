<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    //
    public function logout()
    {
        Auth::logout(); 
        return redirect()->route('login');
    }
    public function showChangePasswordForm()
    {
        return view('myprofil.changepassword');
    }
    public function changepassword(Request $request){
        if(!(Hash::check($request->get('current-password'), 
        Auth::user()->password))){
            // the password matches
            return redirect()->back()->with("error","passwordmu yang sekarang tidak sama dengan yang kamu masukkan, tolong dimasukkan ulang");
        }
        if(strcmp($request->get('current-password'),
        $request->get('new-password')) == 0){
            //same new dan current password
            return redirect()->back()->with("error","Password baru sama dengan yang lama. pilih password baru");
        }
        if(!(strcmp($request->get('new-password'),
        $request->get('new-password-confirmation'))) == 0){
            //password baru dan password dimasukkan tidak sama
            return redirect()->back()->with("error","Password baru harus sama dengan yang dimasukkan. mohon untuk dimasukkan ulang");
        }
        //merubah password
        $user = Auth::user();
        $user->password = bcrypt($request->get('new-password'));
        $user->save();
        return redirect()->back()->with("success","Password change successfull");
    }
}
