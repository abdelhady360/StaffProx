<?php

namespace App\Http\Controllers;

use App\Models\Accommodation;
use App\Models\companie;
use App\Models\faq;
use App\Models\Index;
use App\Models\research;
use App\Models\Transaction;
use App\Models\Visa;
use Carbon\Carbon;
use Illuminate\Http\Request;

class IndexController extends Controller
{

    public function index()
    {
        $faq = faq::all();
        $research = research::all();
        $transaction=Transaction::all();
        $companie = companie::all();
        $accommodation = Accommodation::all();
        $visa = Visa::all();

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


        return view('index',compact('transaction', 'faq','research','companie','visa','accommodation','CountExpVisas','CountExpAccommodations','CountExpVisaPasspors','CountExpAccommodationPasspors','CountExpCompanieInsurances','EXPVesa','EXPAccommodationPasspors','EXPVisaPasspors','EXPInsurance','EXPAccommodation','EXPPermitWorkExpired','EXPPermitWorkEnd'));

    }


    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Index  $index
     * @return \Illuminate\Http\Response
     */
    public function show(Index $index)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Index  $index
     * @return \Illuminate\Http\Response
     */
    public function edit(Index $index)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Index  $index
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Index $index)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Index  $index
     * @return \Illuminate\Http\Response
     */
    public function destroy(Index $index)
    {
        //
    }
}
