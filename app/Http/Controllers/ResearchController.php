<?php

namespace App\Http\Controllers;

use App\Models\Accommodation;
use App\Models\companie;
use App\Models\faq;
use App\Models\research;
use App\Models\Transaction;
use App\Models\Uae;
use App\Models\Visa;
use Carbon\Carbon;
use Illuminate\Http\Request;

class ResearchController extends Controller
{

    // Start Construct
    public function __construct(){
        $this->middleware('auth');
    }
    // End Construct

    public function index(){
        $faq = faq::all();
        $research = research::all();
        $transaction=Transaction::all();
        $companie =companie::all();

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

        return view('Research.index_Research',compact('faq','transaction','research','companie','CountExpVisas','CountExpAccommodations','CountExpVisaPasspors','CountExpAccommodationPasspors','CountExpCompanieInsurances','EXPVesa','EXPAccommodationPasspors','EXPVisaPasspors','EXPInsurance','EXPAccommodation','EXPPermitWorkExpired','EXPPermitWorkEnd'));
    }

    public function create(){
        $research = research::all();
        $uae = Uae::all();
        return view('Research.all_Research',compact('research','uae'));
    }

    public function add(){
        $research = research::all();
        $uae = Uae::all();
        return view('Research.add_Research',compact('research','uae'));
    }

    public function store(\App\Http\Requests\research $request){
        $research = research::create([
            'name'     => $request->name,
            'emirate'  => $request->emirate,
            'url'      => $request->url,
            'info'     => $request->info,
            'sinfo'    => $request->sinfo,
            'doc'      => $request->doc,
            'slug'    => Str_slug($request->name),

        ]);

        if($research){
            notify()->success(' تم إضافة استعلام جديدة ', 'Success');
            return redirect('AllResearchs');
        }
        else
            return back();
    }

    public function show(research $research , $slug){
        $faq = faq::all();
        $research = research::where('slug', $slug)->first();
        $transaction=Transaction::all();

        return view('Research.watch-info_research',compact('faq','transaction','research'));
    }

    public function edit(research $research, $slug){
        $research = research::where('slug', $slug)->first();
        $uae = Uae::all();
        return view('Research.edit_research',compact('research','uae'));
    }

    public function update(\App\Http\Requests\research $request, research $research , $id){
        $research = research::find($id);
        $research->update([
            'name'     => $request->name,
            'emirate'  => $request->emirate,
            'url'      => $request->url,
            'info'     => $request->info,
            'sinfo'    => $request->sinfo,
            'doc'      => $request->doc,
            'slug'    => Str_slug($request->name),

        ]);

        if($research){
            notify()->success(' تم تحديث الاستعلام ', 'Success');
            return back();
        }
        else
            return back();

    }

    public function destroy(research $research , $id){
        $research = research::where('id',$id)->first();

        if($research != null){

            $research->delete();
            notify()->success(' تم حذف الاستعلام  ', 'Success');

            return redirect('AllResearchs');
        }
        else
            return redirect('AllResearchs');
    }

}
