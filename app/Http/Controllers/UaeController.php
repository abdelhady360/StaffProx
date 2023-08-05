<?php

namespace App\Http\Controllers;

use App\Models\Uae;
use Illuminate\Http\Request;

class UaeController extends Controller
{ // Start Function

    // Start Construct
    public function __construct(){
        $this->middleware('auth');
    }
    // End Construct

    // Start Index
    public function index(){
        $uae=Uae::all();
        return view('uae.all_uae',compact('uae'));
    }
    // End Index

    // Start Create
    public function create(){
        $uae=Uae::all();
        return view('uae.add_uae',compact('uae'));
    }
    // End Create

    // Start Store
    public function store(\App\Http\Requests\Uae  $request){
        $transaction = Uae::create([
            'uae'     => $request->uae,
            'slug'    => Str_slug($request->uae),
        ]);

        if($transaction){
            notify()->success(' تم إضافة إمارة جديدة ', 'Success');
            return back();
        }
        else
            notify()->error('فشل الحفظ برجاء المحاوله مجددا', 'Error');
        return back();
    }
    // End Store

    // Start Edit
    public function edit(Uae $uae ,$slug ){
        $uae = Uae::where('slug', $slug)->first();
        return view('uae.edit_uae',compact('uae'));
    }
    // End Edit

    // Start Update
    public function update(\App\Http\Requests\Uae $request, Uae $uae ,$id)
    {
        $uae = Uae::find($id);

        $uae->update([
            'uae'   => $request->uae,
            'slug'    => Str_slug($request->uae),
        ]);

        if($uae){
            notify()->success(' تم تحديث الإمارة  ', 'Success');
            return redirect('AllUae');
        }
        else
            return back();
    }
    // End Update

    // Start destroy
    public function destroy(Uae $uae , $id){
        $info = Uae::where('id',$id)->first();

        if($info != null){

            $info->delete();
            notify()->success(' تم حذف الإمارة  ', 'Success');

            return redirect('AllUae');
        }
        else
            return back();
    }
    // End destroy


}// End Function
