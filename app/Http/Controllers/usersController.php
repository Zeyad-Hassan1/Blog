<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Auth;

class usersController extends Controller
{
    public function create(Request $request){
        $users = new User();

        $users->create([
            'name'     => $request->name,
            'email'    => $request->email,
            'password' => $request->password,
        ]);

        return redirect('/admin/users');
    }

    public function del_user(Request $request){
        $users = new User();

        $users = $users->find($request->id);
        $users->delete();

        return redirect('/admin/users');
    }

    public function login(Request $request){
        $data = [
            'email' => $request->email,
            'password' => $request->password,
        ];

        if(Auth::attempt($data)){
            return redirect('/admin');
        }else{
            return redirect('/login')->with('error','البريد الالكتروني او كلمة المرور غير صالحة');
        }

       
    }

    public function logout(Request $request){
       Auth::logout();
       return redirect('/login');
    }
}
