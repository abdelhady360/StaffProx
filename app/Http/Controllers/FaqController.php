<?php

namespace App\Http\Controllers;

use App\Models\Accommodation;
use App\Models\companie;
use App\Models\faq;
use App\Models\research;
use App\Models\Transaction;
use App\Models\Visa;
use Carbon\Carbon;
use Illuminate\Http\Request;

class FaqController extends Controller
{

    // Start Construct
    public function __construct(){
        $this->middleware('auth');
    }
    // End Construct

    public function index(){
        $faq = faq::all();
        $research = research::all();
        $companie = companie::all();
        $transaction=Transaction::all();

        $ExpVisas = Visa::whereBetween('visa_end',[Carbon::now(),Carbon::now()->addDay(15)])->orderBy('visa_end')->get();
        $CountExpVisas = $ExpVisas->count();

        $ExpVisaPasspor = Visa::whereBetween('passpor_end',[Carbon::now(),Carbon::now()->addDay(30)])->orderBy('passpor_end')->get();
        $CountExpVisaPasspors = $ExpVisaPasspor->count();

        $ExpAccommodation = Accommodation::whereBetween('accommodation_end',[Carbon::now(),Carbon::now()->addDay(30)])->orderBy('accommodation_end')->get();
        $CountExpAccommodations = $ExpAccommodation->count();

        $ExpAccommodationPasspor = Accommodation::whereBetween('passpor_end',[Carbon::now(),Carbon::now()->addDay(30)])->orderBy('passpor_end')->get();
        $CountExpAccommodationPasspors = $ExpAccommodationPasspor->count();

        $ExpCompanieInsurance = companie::whereBetween('insurance_end',[Carbon::now(),Carbon::now()->addDay(30)])->orderBy('insurance_end')->get();
        $CountExpCompanieInsurances = $ExpCompanieInsurance->count();


        $EXPAccommodation = Accommodation::whereRaw('accommodation_end < NOW()')->orderBy('accommodation_end')->get();
        $EXPVesa = Visa::whereRaw('visa_end < NOW()')->orderBy('visa_end')->get();
        $EXPAccommodationPasspors = Accommodation::whereRaw('passpor_end < NOW()')->orderBy('passpor_end')->get();
        $EXPVisaPasspors = Visa::whereRaw('passpor_end < NOW()')->orderBy('passpor_end')->get();
        $EXPInsurance = companie::whereRaw('insurance_end < NOW()')->orderBy('insurance_end')->get();

        $EXPPermitWorkExpired = Accommodation::whereBetween('PermitWork_end',[Carbon::now(),Carbon::now()->addDay(30)])->orderBy('PermitWork_end')->get();
        $EXPPermitWorkEnd = Accommodation::whereRaw('PermitWork_end < NOW()')->orderBy('PermitWork_end')->get();

        return view('Faqs.index_faq',compact('faq','transaction','research','companie','CountExpVisas','CountExpAccommodations','CountExpVisaPasspors','CountExpAccommodationPasspors','CountExpCompanieInsurances','EXPVesa','EXPAccommodationPasspors','EXPVisaPasspors','EXPInsurance','EXPAccommodation','EXPPermitWorkExpired','EXPPermitWorkEnd'));
    }

    public function create(){
        $faq = faq::all();
        return view('Faqs.all_faq',compact('faq'));
    }

    public function add(){
        $faq = faq::all();
        return view('Faqs.add_faq',compact('faq'));
    }

    public function store(\App\Http\Requests\faq $request){
        $transaction = faq::create([
            'faq'     => $request->faq,
            'info'    => $request->info,
            'slug'    => Str_slug($request->faq),
        ]);

        if($transaction){
            notify()->success(' تم إضافة سؤال جديدة ', 'Success');
            return redirect('AllFaqs');
        }
        else
            return back();
    }

    public function edit(faq $faq, $slug){
        $faq = faq::where('slug', $slug)->first();
        return view('Faqs.edit_faq',compact('faq'));
    }

    public function update(\App\Http\Requests\faq $request, faq $faq, $id){
        $faq = faq::find($id);
        $faq->update([
            'faq'     => $request->faq,
            'info'    => $request->info,
            'slug'    => Str_slug($request->faq),
        ]);

        if($faq){
            notify()->success(' تم تحديث السؤال  ', 'Success');
            return redirect('AllFaqs');
        }
        else
            return back();
    }

    public function destroy(faq $faq, $id){
         $info = faq::where('id',$id)->first();
                if($info != null){
                    $info->delete();
                    notify()->success(' تم حذف السؤال  ', 'Success');

                    return redirect('AllFaqs');
                }
                else
                    return back();
    }

}
