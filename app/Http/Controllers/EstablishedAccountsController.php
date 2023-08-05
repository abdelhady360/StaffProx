<?php

namespace App\Http\Controllers;

use App\Models\established_accounts;
use Illuminate\Http\Request;

class EstablishedAccountsController extends Controller
{
    public function __construct(){
        $this->middleware('auth');
    }

    public function store(Request $request){
        $accounts = established_accounts::create([
            'companie_id' => $request->companie_id,
            'name'        => $request->name,
            'user'        => $request->user,
            'password'    => $request->password,
        ]);
        if($accounts){
            notify()->success(' تم إضافة اكونت جديد  ', 'Success');
            return back();
        }
        else
            return back();
    }

    public function update(Request $request, established_accounts $established_accounts, $id)
    {
//        dd($request);
        $accounts = established_accounts::find($id);
        $accounts -> update([
            'name'        => $request->name,
            'user'        => $request->user,
            'password'    => $request->password,
        ]);
        if($accounts){
            notify()->success(' تم تعديل الاكونت  ', 'Success');
            return back();
        }
        else
            return back();
    }

    public function destroy(established_accounts $established_accounts, $id){
        $info = established_accounts::where('id',$id)->first();
        if($info != null){
            $info->delete();
            notify()->success(' تم حذف الاكونت  ', 'Success');

            return back();
        }
        else
            return redirect('AllCompanies');
    }

}
