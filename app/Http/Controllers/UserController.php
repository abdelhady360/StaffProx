<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class UserController extends Controller
{
    public function __construct(){
        $this->middleware('auth');
    }

    public function edit(User $user) // START EDIT
    {
        $user = Auth::user();
        return view('user.settings', compact('user'));
    }

    public function update(\App\Http\Requests\user $request,$id) // START UPDATE
    {
        $input = auth()->user();
        if(!empty($input['password'])){
            $input->update([ 'password'=>bcrypt($request['password']) ]);

            notify()->success(' تم تحديث  كلمة المرور ', 'Success');
            return back();

        }else{

            notify()->error(' عفواً   كلمة المرور غير صحيحة ', 'Error');
            return back();
        }
        notify()->success(' تم تحديث  البيانات ', 'Success');
        return back();
    } // END UPDATE

}
