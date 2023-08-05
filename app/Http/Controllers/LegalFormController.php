<?php

namespace App\Http\Controllers;

use App\Models\LegalForm;
use Illuminate\Http\Request;

class LegalFormController extends Controller
{
    // Start Construct
    public function __construct(){
        $this->middleware('auth');
    }
    // End Construct

    public function index(){
        $LegalForm = LegalForm::all();
        return view('Companies.LegalForm.all_LegalForm', compact('LegalForm'));
    }

    public function create()
    {
        //
    }

    public function store(\App\Http\Requests\LegalForm $request){
        $transaction = LegalForm::create([
            'name'     => $request->name,
            'slug'    => Str_slug($request->name),
        ]);
        if($transaction){
            notify()->success(' تم إضافة شكل قانوني جديدة ', 'Success');
            return back();
        }
        else
            notify()->error('فشل الحفظ برجاء المحاوله مجددا', 'Error');
        return back();
    }

    public function show(LegalForm $legalForm)
    {
        //
    }

    public function edit(LegalForm $legalForm, $slug){
        $LegalForm = LegalForm::where('slug', $slug)->first();
        return view('Companies.LegalForm.edit_LegalForm',compact('LegalForm'));
    }

    public function update(\App\Http\Requests\LegalForm $request, LegalForm $legalForm , $id){
        $uae = LegalForm::find($id);
        $uae->update([
            'name'   => $request->name,
            'slug'    => Str_slug($request->name),
        ]);

        if($uae){
            notify()->success(' تم تحديث الشكل القانوني   ', 'Success');
            return redirect('AllLegalForm');
        }
        else
            return back();
    }

    public function destroy(LegalForm $legalForm, $id){
        $info = LegalForm::where('id',$id)->first();
        if($info != null){

            $info->delete();
            notify()->success(' تم حذف الشكل القانوني  ', 'Success');

            return redirect('AllLegalForm');
        }
        else
            return back();
    }

}
