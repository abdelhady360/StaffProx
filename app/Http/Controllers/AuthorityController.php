<?php

namespace App\Http\Controllers;

use App\Models\authority;
use Illuminate\Http\Request;

class AuthorityController extends Controller
{ // Start Function

    // Start Construct
    public function __construct(){
        $this->middleware('auth');
    }
    // End Construct

    // Start Index
    public function index(){
        $authority=authority::all();
        return view('Authority.all_authority',compact('authority'));
    }
    // End Index

    // Start Store
    public function store(\App\Http\Requests\authority  $request){
        $authority = authority::create([
            'authority'   => $request->authority,
            'slug'        => Str_slug($request->authority),
        ]);

        if($authority){
            notify()->success(' تم إضافة هيئة جديدة ', 'Success');
            return back();
        }
        else
            return back();
    }
    // End Store

    // Start Eedit
    public function edit(authority $authority ,$slug){
        $authority = authority::where('slug', $slug)->first();
        return view('Authority.edit_authority',compact('authority'));
    }
    // End Eedit

    // Start Uupdate
    public function update(\App\Http\Requests\authority $request, authority $authority, $id){
        $authority = authority::find($id);
        $authority->update([
            'authority'   => $request->authority,
            'slug'    => Str_slug($request->authority),
        ]);

        if($authority){
            notify()->success(' تم تعديل الهيئة  ', 'Success');
            return redirect('AllAuthority');
        }
        else
            return back();
    }
    // End Update

    // Start Destroy
    public function destroy(authority $authority , $id){
        $info = authority::where('id',$id)->first();
        if($info != null){
            $info->delete();
            notify()->success(' تم حذف الهيئة  ', 'Success');
            return redirect('AllAuthority');
        }
        else
            return back();
    }
    // End Destroy


} // End Function
