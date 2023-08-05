<?php

namespace App\Http\Controllers;

use App\Http\Requests\Transactions;
use App\Models\Accommodation;
use App\Models\authority;
use App\Models\companie;
use App\Models\faq;
use App\Models\research;
use App\Models\Transaction;
use App\Models\Uae;
use App\Models\Visa;
use Carbon\Carbon;
use Illuminate\Http\Request;
use DB;

class TransactionController extends Controller
{ // Start Function

    // Start Construct
    public function __construct(){
        $this->middleware('auth');
    }
    // End Construct

    // Start Index
    public function index(){
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

        return view('transactions.index_transactions',compact('transaction', 'faq','research','companie','visa','accommodation','CountExpVisas','CountExpAccommodations','CountExpVisaPasspors','CountExpAccommodationPasspors','CountExpCompanieInsurances'));
    }
    // End Index

    // Start Create
    public function all(){
        $uae= Uae::all();
        $authority = authority::all();
        $transaction=Transaction::all();
        return view('transactions.all_transactions',compact('transaction','uae','authority'));
    }
    // End Create

    // Start Create
    public function create(){
        $uae= Uae::all();
        $authority = authority::all();
        $transaction=Transaction::all();
        return view('transactions.add_transactions',compact('transaction','uae','authority'));
    }
    // End Create

    // Start Store
    public function store(Transactions $request){
      $transaction = Transaction::create([
          'name'       => $request->name,
          'lfees'      => $request->lfees,
          'ofees'      => $request->ofees,
          'info'       => $request->info,
          'emirate'    => $request->emirate,
          'authority'  => $request->authority,
          'url'        => $request->url,
          'sinfo'      => $request->sinfo,
          'note'       => $request->note,
          'doc'        => $request->doc,
          'slug'       => Str_slug($request->name),

    ]);

      if($transaction){
          notify()->success(' تم إضافة خدمة جديدة ', 'Success');
          return redirect('AllTransactions');
    }
    else
        return back();

    }
    // End Store

    // Start Info
    public function info($slug){
        $transaction = Transaction::where('slug', $slug)->first();
        return view('transactions.watch-info_transactions',compact('transaction'));
    }
    // End Info

    // Start Steps
    public function steps($slug){
        $transaction = Transaction::where('slug', $slug)->first();
        return view('transactions.watch-steps_transactions',compact('transaction'));
    }
    // End Steps

    // Start Edit
    public function edit(Transaction $transaction, $slug){
        $uae= Uae::all();
        $authority = authority::all();
        $edittransaction = Transaction::where('slug', $slug)->first();
        return view('transactions.edit_transactions',compact('edittransaction','uae','authority'));
    }
    // End Edit

    // Start Update
    public function update(Transactions $request,  $id){
        $transaction = Transaction::find($id);
        $transaction->update([
            'name'       => $request->name,
            'lfees'      => $request->lfees,
            'ofees'      => $request->ofees,
            'emirate'    => $request->emirate,
            'authority'  => $request->authority,
            'url'        => $request->url,
            'info'       => $request->info,
            'sinfo'      => $request->sinfo,
            'note'       => $request->note,
            'doc'        => $request->doc,
//            'slug'       => Str_slug($request->name),

        ]);

        if($transaction){
            notify()->success(' تم تحديث الخدمة ', 'Success');
            return back();
        }
        else
            return back();
    }
    // End Update

    // Start Destroy
    public function destroy(Transaction $transaction , $id){
        $info = Transaction::where('id',$id)->first();
        if($info != null){

            $info->delete();
            notify()->success(' تم حذف الخدمة  ', 'Success');

            return redirect('AllTransactions');
        }
        else
            return redirect('AllTransactions');
    }
    // End Destroy


} // End Function
