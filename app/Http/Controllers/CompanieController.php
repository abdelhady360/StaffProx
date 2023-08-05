<?php

namespace App\Http\Controllers;

use App\Http\Requests\CompanieName;
use App\Http\Requests\ContactInfo;
use App\Http\Requests\eCompanieName;
use App\Http\Requests\LicenseInfo;
use App\Models\Accommodation;
use App\Models\companie;
use App\Models\established_accounts;
use App\Models\faq;
use App\Models\LegalForm;
use App\Models\research;
use App\Models\Transaction;
use App\Models\Uae;
use App\Models\Visa;
use Carbon\Carbon;
use Illuminate\Http\Request;

class CompanieController extends Controller
{

    public function __construct(){
        $this->middleware('auth');
    }

    public function index(){
        $companie = companie::all();
        $transaction=Transaction::all();
        $faq = faq::all();
        $research = research::all();
        $LegalForm = LegalForm::all();

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

        return view('Companies.index_companies',compact('companie','transaction','faq','research','LegalForm','CountExpVisas','CountExpAccommodations','CountExpVisaPasspors','CountExpAccommodationPasspors','CountExpCompanieInsurances','EXPVesa','EXPAccommodationPasspors','EXPVisaPasspors','EXPInsurance','EXPAccommodation','EXPPermitWorkExpired','EXPPermitWorkEnd'));
    }

    public function create(){
        $uae = Uae::all();
        $companie = companie::all();
        $LegalForm = LegalForm::all();
        return view('Companies.all_companies',compact('companie','LegalForm','uae'));
    }

    public function store(\App\Http\Requests\companie $request){
        $companie = companie::create([
            'name' => $request->name,
            'license_start' => $request->license_start,
            'license_end' => $request->license_end,
            'icp_start' => $request->icp_start,
            'icp_end' => $request->icp_end,
            'no_facility' => $request->no_facility,
            'emirate' => $request->emirate,
            'insurance_end' => $request->insurance_end,
            'license_number'=> $request->license_number,
            'phone_number' => $request->phone_number,
            'email' => $request->email,
            'address' => $request->address,
            'slug'    => Str_slug($request->name),
        ]);
        if($companie){
            notify()->success(' تم إضافة شركة جديدة ', 'Success');
            return back();
        }
        else
            return back();
    }

    public function show(companie $companie, $slug){
        $LegalForm = LegalForm::all();
        $companie = companie::where('slug', $slug)->first();

        $visa = $companie->visa;
        $accommodation = $companie->accommodation;
        $account = $companie->established_accounts;

        $ExpCompanieAccommodation = $accommodation-> whereBetween('accommodation_end',[Carbon::now(),Carbon::now()->addDay(30)]);
        $CountExpCompanieAccommodations = $ExpCompanieAccommodation->count();

        $ExpCompanieVisa = $visa-> whereBetween('visa_end',[Carbon::now(),Carbon::now()->addDay(15)]);
        $CountExpCompanieVisas = $ExpCompanieVisa->count();

        $ExpCompanieAccommodationPasspor = $accommodation-> whereBetween('passpor_end',[Carbon::now(),Carbon::now()->addDay(30)]);
        $CountExpPassporCompanieAccommodations = $ExpCompanieAccommodationPasspor->count();

        $ExpCompaniePasspor = $visa-> whereBetween('passpor_end',[Carbon::now(),Carbon::now()->addDay(30)]);
        $CountExpPassporCompanieVisas = $ExpCompaniePasspor->count();

        $ExpCompaniePermitWork_end = $accommodation-> whereBetween('PermitWork_end',[Carbon::now(),Carbon::now()->addDay(30)]);
        $CountExpPermitWorkendCompanieVisas = $ExpCompaniePermitWork_end->count();


        $ExpCompanieAccommodationExp = $accommodation-> where('accommodation_end','<',Carbon::now());
        $CountExpCompanieAccommodationsExp = $ExpCompanieAccommodationExp->count();

        $ExpCompanieVisaExp = $visa-> where('visa_end','<',Carbon::now());
        $CountExpCompanieVisasExp = $ExpCompanieVisaExp->count();

        $ExpCompanieAccommodationPassporExp = $accommodation-> where('passpor_end','<',Carbon::now());
        $CountExpPassporCompanieAccommodationsExp = $ExpCompanieAccommodationPassporExp->count();

        $ExpCompanieVisaPassporExp = $visa-> where('passpor_end','<',Carbon::now());
        $CountExpPassporCompanieVisaExp = $ExpCompanieVisaPassporExp->count();


        $ExpCompanieAccommodationPermitWorkendExp = $accommodation-> where('PermitWork_end','<',Carbon::now());
        $CountExpPermitWorkendCompanieAccommodationsExp = $ExpCompanieAccommodationPermitWorkendExp->count();


        return view('Companies.watch-info_companies',compact('companie','account','LegalForm','visa','accommodation','CountExpCompanieVisas','CountExpCompanieAccommodations','CountExpPassporCompanieAccommodations','CountExpPassporCompanieVisas','CountExpCompanieAccommodationsExp','CountExpCompanieVisasExp','CountExpPassporCompanieAccommodationsExp','CountExpPermitWorkendCompanieVisas','CountExpPermitWorkendCompanieAccommodationsExp','CountExpPassporCompanieVisaExp'));

    }

    public function edit(companie $companie, $slug){
        $companie = companie::where('slug', $slug)->first();
        $uae = Uae::all();
        return view('Companies.edit_name_companies',compact('companie','uae'));
    }
    public function update_name(eCompanieName $request, companie $companie, $id){
        $companie = companie::find($id);
        $companie->update([
            'name'    => $request->name,
            'emirate' => $request->emirate,
            'slug'    => Str_slug($request->name),

        ]);

        if($companie){
            notify()->success(' تم تحديث الشركة  ', 'Success');
            return redirect('AllCompanies');
        }
        else
            return back();
    }
    public function update_insurance_end(Request $request, companie $companie, $id){
        $companie = companie::find($id);
        $companie->update([
            'insurance_end'   => $request->insurance_end,
        ]);

        if($companie){
            notify()->success(' تم تحديث  بوليصة التأمين  ', 'Success');
            return back();
        }
        else
            return back();
    }
    public function update_license(Request $request, companie $companie, $id){
        $companie = companie::find($id);
        $companie->update([
            'license_start'   => $request->license_start,
            'license_end'   => $request->license_end,
        ]);

        if($companie){
            notify()->success(' تم تحديث  تاريخ الرخصة  ', 'Success');
            return back();
        }
        else
            return back();
    }
    public function update_icp(Request $request, companie $companie, $id){
        $companie = companie::find($id);
        $companie->update([
            'icp_star'   => $request->icp_star,
            'icp_end'   => $request->icp_end,
        ]);

        if($companie){
            notify()->success('ICP تم تحديث بيانات الإتشنال', 'Success');
            return back();
        }
        else
            return back();
    }
    public function update_license_number(LicenseInfo $request, companie $companie, $id){

        $companie = companie::find($id);
        $companie->update([
            'license_number'   => $request->license_number,
            'no_facility'   => $request->no_facility,
        ]);

        if($companie){
            notify()->success(' تم تحديث معلومات الرخصة ', 'Success');
            return back();
        }
        else
            return back();
    }
    public function update_contact_info(ContactInfo $request, companie $companie, $id){
        $companie = companie::find($id);
        $companie->update([
            'phone_number'   => $request->phone_number,
            'email'          => $request->email,
            'address'        => $request->address,
        ]);

        if($companie){
            notify()->success(' تم تحديث معلومات التواصل ', 'Success');
            return back();
        }
        else
            return back();
    }

    public function all_passpor_expired(Visa $visa){

        $upcomingVisaPasspor = Visa::whereBetween('passpor_end',[Carbon::now() , Carbon::now()->addDay(30)])->orderBy('passpor_end')->get();
        $upcomingAccommodationPasspor = Accommodation::whereBetween('passpor_end',[Carbon::now(),Carbon::now()->addDay(30)])->orderBy('passpor_end')->get();
        return view('Companies.passpor.expired_passpor',compact('upcomingVisaPasspor','upcomingAccommodationPasspor'));

    }

    public function all_passpor_end(Visa $visa){

        $upcomingVisaPasspor = Visa::whereRaw('passpor_end < NOW()')->orderBy('passpor_end')->get();
        $upcomingAccommodationPasspor = Accommodation::whereRaw('passpor_end < NOW()')->orderBy('passpor_end')->get();
        return view('Companies.passpor.End.expired_passpor',compact('upcomingVisaPasspor','upcomingAccommodationPasspor'));

    }

    public function edit_passpor_visa_expired(Visa $visa ,$slug){
        $passpor = Visa::with('companie')->where('slug', $slug)->first();
        return view('Companies.passpor.edit_passpor_visa',compact('passpor'));
    }

    public function edit_passpor_visa_end(Visa $visa ,$slug){
        $passpor = Visa::with('companie')->where('slug', $slug)->first();
        return view('Companies.passpor.End.edit_passpor_visa',compact('passpor'));
    }

    public function edit_passpor_accommodation_expired(Visa $visa ,$slug){
        $passpor = Accommodation::with('companie')->where('slug', $slug)->first();
        return view('Companies.passpor.edit_passpor_accommodation',compact('passpor'));
    }

    public function edit_passpor_accommodation_end(Visa $visa ,$slug){
        $passpor = Accommodation::with('companie')->where('slug', $slug)->first();
        return view('Companies.passpor.End.edit_passpor_accommodation',compact('passpor'));
    }


    public function update_passpor_visa_expired(Request $request, Visa $visa ,$id){
        $Visa = Visa::find($id);
        $Visa->update([
            'passpor_start'                => $request->passpor_start,
            'passpor_end'                  => $request->passpor_end,
        ]);

        if($Visa){
            notify()->success(' تم تحديث جواز السفر   ', 'Success');
            return redirect('AllPassporExpired');
        }
        else
            return back();

    }

    public function update_passpor_visa_end(Request $request, Visa $visa ,$id){
        $Visa = Visa::find($id);
        $Visa->update([
            'passpor_start'                => $request->passpor_start,
            'passpor_end'                  => $request->passpor_end,
        ]);

        if($Visa){
            notify()->success(' تم تحديث جواز السفر   ', 'Success');
            return redirect('AllPassporEnd');
        }
        else
            return back();

    }

    public function update_passpor_accommodation_expired(Request $request, Visa $visa ,$id){
        $Visa = Accommodation::find($id);
        $Visa->update([
            'passpor_start'                => $request->passpor_start,
            'passpor_end'                  => $request->passpor_end,
        ]);

        if($Visa){
            notify()->success(' تم تحديث جواز السفر  ', 'Success');
            return redirect('AllPassporExpired');
        }
        else
            return back();

    }

    public function update_passpor_accommodation_end(Request $request, Visa $visa ,$id){
    $Visa = Accommodation::find($id);
    $Visa->update([
        'passpor_start'                => $request->passpor_start,
        'passpor_end'                  => $request->passpor_end,
    ]);

    if($Visa){
        notify()->success(' تم تحديث جواز السفر  ', 'Success');
        return redirect('AllPassporEnd');
    }
    else
        return back();

}

    public function all_daman_expired(Visa $visa){
        $upcomingInsurance = companie::whereBetween('insurance_end',[Carbon::now() , Carbon::now()->addDay(30)])->orderBy('insurance_end')->get();
        return view('Companies.daman.expired_daman',compact('upcomingInsurance'));
    }

    public function all_daman_end(Visa $visa){
        $upcomingInsurance = companie::whereRaw('insurance_end < NOW()')->orderBy('insurance_end')->get();
        return view('Companies.daman.End.expired_daman',compact('upcomingInsurance'));
    }

    public function destroy(companie $companie, $id){
        $info = companie::find($id);
        if($info != null){
            $info->visa()->delete();
            $info->accommodation()->delete();
            $info->established_accounts()->delete();
            $info->delete();
            notify()->success(' تم حذف الشركة  ', 'Success');

            return redirect('AllCompanies');
        }
        else
            return redirect('AllCompanies');
    }

}
