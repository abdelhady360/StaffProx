<?php

namespace App\Http\Controllers;

use App\Http\Requests\evisa;
use App\Models\companie;
use App\Models\Sex;
use App\Models\Uae;
use App\Models\Visa;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class VisaController extends Controller
{

    public function __construct(){
        $this->middleware('auth');
    }

    public function index($slug ){
        $sex = Sex::all();
       $companie = companie::where('slug', $slug)->first();
       $visa = $companie ->visa;
        return view('Companies.visa.all_visa',compact('companie','visa','sex'));
    }

    public function store(\App\Http\Requests\visa $request){

       $visa= visa::create([
            'companie_id' => $request->companie_id,
            'name' => $request->name,
            'passport_number' => $request->passport_number,
            'passpor_start' => $request->passpor_start,
            'passpor_end' => $request->passpor_end,
            'dob' => $request->dob,
            'nationality' => $request->nationality,
            'visa_start' => $request->visa_start,
            'visa_end' => $request->visa_end,
            'sex' => $request->sex,
            'slug'    => Str_slug($request->name),


       ]);

        if($visa){
            notify()->success(' تم إضافة تأشيرة جديدة ', 'Success');
            return back();
        }
        else
            return back();

    }

    public function edit(Visa $visa, $slug){
        $sex= Sex::all();
        $Visa = Visa::with('companie')->where('slug', $slug)->first();
        return view('Companies.visa.edit_visa',compact('Visa','sex'));
    }

    public function update(evisa  $request, Visa $visa ,$id){
        $Visa = Visa::find($id);
        $Visa->update([
            'companie_id'               => $request->companie_id,
            'name'                      => $request->name,
            'passport_number'           => $request->passport_number,
            'passpor_start'             => $request->passpor_start,
            'passpor_end'               => $request->passpor_end,
            'dob'                       => $request->dob,
            'nationality'               => $request->nationality,
            'visa_start'                => $request->visa_start,
            'visa_end'                  => $request->visa_end,
            'sex'                       => $request->sex,
        ]);

        if($Visa){
            notify()->success(' تم تحديث التأشيرة  ', 'Success');
            return back();
        }
        else
            return back();
    }
    public function all_expired(Visa $visa){
        $upcomingVisas = Visa::whereBetween('visa_end',[Carbon::now(),Carbon::now()->addDay(15)])->orderBy('visa_end')->get();
        return view('Companies.visa.Expired.expired_visa',compact('upcomingVisas'));
    }

    public function all_end(Visa $visa){
        $upcomingVisas = Visa::whereRaw('visa_end < NOW()')->orderBy('visa_end')->get();
        return view('Companies.visa.End.expired_visa',compact('upcomingVisas'));
    }

    public function edit_visa_expired(Visa $visa ,$slug){
        $Visa = Visa::with('companie')->where('slug', $slug)->first();
        return view('Companies.visa.Expired.edit_visa',compact('Visa'));
    }

    public function edit_visa_end(Visa $visa ,$slug){
        $Visa = Visa::with('companie')->where('slug', $slug)->first();
        return view('Companies.visa.End.edit_visa',compact('Visa'));
    }

    public function update_visa_expired(Request $request, Visa $visa ,$id){
        $Visa = Visa::find($id);
        $Visa->update([
            'visa_start'                => $request->visa_start,
            'visa_end'                  => $request->visa_end,
        ]);

        if($Visa){
            notify()->success(' تم تمديد التأشيرة  ', 'Success');
            return redirect('AllVisaExpired');
        }
        else
            return back();

    }

    public function update_visa_end(Request $request, Visa $visa ,$id){
        $Visa = Visa::find($id);
        $Visa->update([
            'visa_start'                => $request->visa_start,
            'visa_end'                  => $request->visa_end,
        ]);

        if($Visa){
            notify()->success(' تم تمديد التأشيرة  ', 'Success');
            return redirect('AllVisaEnd');
        }
        else
            return back();

    }

    public function destroy(Visa $visa ,$id){
        $info = Visa::where('id',$id)->first();
        if($info != null){

            $info->delete();
            notify()->success(' تم حذف التأشيرة  ', 'Success');

            return back();
        }
        else
            return back();
    }

}
