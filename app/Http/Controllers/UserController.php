<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\User;
use Illuminate\Support\Facades\Auth;

class UserController extends Controller
{
    public function listUser(){
        $lsUser = User::orderByRaw('FIELD(role, "Master", "Admin", "User")')->paginate(6);
        return view('user.list')->with('lsUser',$lsUser);
    }
    public function changeStatus(Request $request){
        $id = $request -> user_id;
        $role = $request -> user_role;
        $user = User::find($id);
        $user->role = $role;
        $user->save();
        // return response()->json([
        //     'success' => 'change status successful'
        // ]);
    }
}
