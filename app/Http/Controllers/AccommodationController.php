<?php

namespace App\Http\Controllers;

use App\Http\Requests\eAccommodation;
use App\Models\Accommodation;
use App\Models\companie;
use App\Models\Sex;
use App\Models\Visa;
use Carbon\Carbon;
use Illuminate\Http\Request;

class AccommodationController extends Controller
{

    public function __construct(){
        $this->middleware('auth');
    }


    public function index($slug){
        $sex = Sex::all();
        $companie = companie::where('slug', $slug)->first();
        $Accommodation = $companie ->accommodation;
        return view('Companies.accommodation.all_accommodation',compact('companie','Accommodation','sex'));
    }


    public function store(\App\Http\Requests\Accommodation $request){
        $visa= Accommodation::create([
            'companie_id'                => $request->companie_id,
            'name'                       => $request->name,
            'passport_number'            => $request->passport_number,
            'unified_no'                 => $request->unified_no,
            'passpor_start'              => $request->passpor_start,
            'passpor_end'                => $request->passpor_end,
            'dob'                        => $request->dob,
            'nationality'                => $request->nationality,
            'accommodation_start'        => $request->accommodation_start,
            'accommodation_end'          => $request->accommodation_end,
            'PermitWork_start'           => $request->PermitWork_start,
            'PermitWork_end'             => $request->PermitWork_end,
            'id_number'                  => $request->id_number,
            'sex'                        => $request->sex,
            'slug'                       => Str_slug($request->name),
        ]);

        if($visa){
            notify()->success(' تم إضافة إقامة جديدة ', 'Success');
            return back();
        }
        else
            return back();
    }


    public function edit(Accommodation $accommodation, $slug){
        $sex = Sex::all();
        $Accommodation = Accommodation::with('companie')->where('slug', $slug)->first();
        return view('Companies.accommodation.edit_accommodation',compact('Accommodation','sex'));
    }


    public function update(eAccommodation $request, Accommodation $accommodation, $id){
        $Visa = Accommodation::find($id);
        $Visa->update([
            'companie_id'                => $request->companie_id,
            'name'                       => $request->name,
            'passport_number'            => $request->passport_number,
            'unified_no'                 => $request->unified_no,
            'passpor_start'              => $request->passpor_start,
            'passpor_end'                => $request->passpor_end,
            'dob'                        => $request->dob,
            'nationality'                => $request->nationality,
            'accommodation_start'        => $request->accommodation_start,
            'accommodation_end'          => $request->accommodation_end,
            'PermitWork_start'           => $request->PermitWork_start,
            'PermitWork_end'             => $request->PermitWork_end,
            'id_number'                  => $request->id_number,
            'sex'                        => $request->sex,
        ]);

        if($Visa){
            notify()->success(' تم تحديث الإقامة  ', 'Success');
            return back();
        }
        else
            return back();
    }

    public function all_expired(Visa $visa){
        $upcomingAccommodation = Accommodation::whereBetween('accommodation_end',[Carbon::now(),Carbon::now()->addDay(30)])->orderBy('accommodation_end')->get();
        return view('Companies.accommodation.Expired.expired_accommodation',compact('upcomingAccommodation'));
    }

    public function all_end(Visa $visa){
        $upcomingAccommodation = Accommodation::whereRaw('accommodation_end < NOW()')->orderBy('accommodation_end')->get();
        return view('Companies.accommodation.End.expired_accommodation',compact('upcomingAccommodation'));
    }

    public function all_workpermit_end(Visa $visa){
        $upcomingAccommodationPermitWorkend = Accommodation::whereRaw('PermitWork_end < NOW()')->orderBy('PermitWork_end')->get();
        return view('Companies.PermitWorkend.End.end_permitworkend',compact('upcomingAccommodationPermitWorkend'));
    }

    public function all_workpermit_expired(Visa $visa){
        $upcomingAccommodationPermitWorkExpired = Accommodation::whereBetween('PermitWork_end',[Carbon::now(),Carbon::now()->addDay(30)])->orderBy('PermitWork_end')->get();
        return view('Companies.PermitWorkend.Expired.expired_permitworkend',compact('upcomingAccommodationPermitWorkExpired'));
    }

    public function edit_accommodation_expired(Visa $visa ,$slug){
        $Accommodation = Accommodation::with('companie')->where('slug', $slug)->first();
        return view('Companies.accommodation.Expired.edit_accommodation',compact('Accommodation'));
    }

    public function edit_accommodation_end(Visa $visa ,$slug){
        $Accommodation = Accommodation::with('companie')->where('slug', $slug)->first();
        return view('Companies.accommodation.End.edit_accommodation',compact('Accommodation'));
    }

    public function edit_workpermit_end(Visa $visa ,$slug){
        $PermitWorkend = Accommodation::with('companie')->where('slug', $slug)->first();
        return view('Companies.PermitWorkend.End.edit_permitworkend',compact('PermitWorkend'));
    }

    public function edit_workpermit_expired(Visa $visa ,$slug){
        $PermitWorkend = Accommodation::with('companie')->where('slug', $slug)->first();
        return view('Companies.PermitWorkend.Expired.edit_permitworkend',compact('PermitWorkend'));
    }

    public function update_accommodation_expired(Request $request, Visa $visa ,$id){
        $Visa = Accommodation::find($id);
        $Visa->update([
            'accommodation_start'      => $request->accommodation_start,
            'accommodation_end'        => $request->accommodation_end,
        ]);

        if($Visa){
            notify()->success(' تم تمديد الإقامة  ', 'Success');
            return redirect('AllAccommodationExpired');
        }
        else
            return back();
    }

    public function update_accommodation_end(Request $request, Visa $visa ,$id){
        $Visa = Accommodation::find($id);
        $Visa->update([
            'accommodation_start'      => $request->accommodation_start,
            'accommodation_end'        => $request->accommodation_end,
        ]);

        if($Visa){
            notify()->success(' تم تمديد الإقامة  ', 'Success');
            return redirect('AllAccommodationEnd');
        }
        else
            return back();
    }

    public function update_workpermit_end(Request $request, Visa $visa ,$id){
        $Visa = Accommodation::find($id);
        $Visa->update([
            'PermitWork_start'      => $request->PermitWork_start,
            'PermitWork_end'        => $request->PermitWork_end,
        ]);

        if($Visa){
            notify()->success(' تم تمديد تصريح العمل  ', 'Success');
            return redirect('AllWorkPermitEnd');
        }
        else
            return back();
    }

    public function update_workpermit_expired(Request $request, Visa $visa ,$id){
        $Visa = Accommodation::find($id);
        $Visa->update([
            'PermitWork_start'      => $request->PermitWork_start,
            'PermitWork_end'        => $request->PermitWork_end,
        ]);

        if($Visa){
            notify()->success(' تم تمديد تصريح العمل  ', 'Success');
            return redirect('AllWorkPermitExpired');
        }
        else
            return back();
    }

    public function destroy(Accommodation $accommodation ,$id){
        $info = Accommodation::where('id',$id)->first();
        if($info != null){
            $info->delete();
            notify()->success(' تم حذف الإقامة  ', 'Success');
            return back();
        }
        else
            return back();
    }

}
