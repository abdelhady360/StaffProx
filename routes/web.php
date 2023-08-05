<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

//Route::get('/', function () {
//    return view('welcome');
//});
//->middleware('auth');
//Auth::routes();



Route::group(['middleware' => 'preventBackHistory','prefix' => (new Mcamara\LaravelLocalization\LaravelLocalization)->setLocale()], function() {


    // register = false
        Auth::routes(['register'=> false]);
    // ./register = false

    ###################################### Start Home #########################################################################################

        Route::get('/', [App\Http\Controllers\IndexController::class, 'index'])->name('/');
        Route::get('/Home', [App\Http\Controllers\IndexController::class, 'index'])->name('Home');
        Route::get('/home', [App\Http\Controllers\IndexController::class, 'index'])->name('home');

    ###################################### End Home ############################################################################################

    ###################################### Start User ##########################################################################################

        Route::get('Settings', [App\Http\Controllers\UserController::class, 'edit'])->name('Settings');
        Route::post('UpdateSettings/{id}', [App\Http\Controllers\UserController::class, 'update'])->name('UpdateSettings');

    ###################################### End User ############################################################################################

    ###################################### Start Uae ###########################################################################################

        Route::get('AllUae', [App\Http\Controllers\UaeController::class, 'index'])->name('AllUae');
        Route::post('StoreUae', [App\Http\Controllers\UaeController::class, 'store'])->name('StoreUae');
        Route::get('EditUae/{slug}', [App\Http\Controllers\UaeController::class, 'edit'])->name('EditUae');
        Route::post('UpdateUae/{slug}', [App\Http\Controllers\UaeController::class, 'update'])->name('UpdateUae');
        Route::delete('DestroyUae/{slug}', [App\Http\Controllers\UaeController::class, 'destroy'])->name('DestroyUae');

    ###################################### End Uae #############################################################################################

    ###################################### Start Authority #####################################################################################

        Route::get('AllAuthority', [App\Http\Controllers\AuthorityController::class, 'index'])->name('AllAuthority');
        Route::post('StoreAuthority', [App\Http\Controllers\AuthorityController::class, 'store'])->name('StoreAuthority');
        Route::get('EditAuthority/{slug}', [App\Http\Controllers\AuthorityController::class, 'edit'])->name('EditAuthority');
        Route::post('UpdateAuthority/{slug}', [App\Http\Controllers\AuthorityController::class, 'update'])->name('UpdateAuthority');
        Route::delete('DestroyAuthority/{slug}', [App\Http\Controllers\AuthorityController::class, 'destroy'])->name('DestroyAuthority');

    ###################################### End Authority #######################################################################################

    ###################################### Start Uae ###########################################################################################

        Route::get('AllLegalForm', [App\Http\Controllers\LegalFormController::class, 'index'])->name('AllLegalForm');
        Route::post('StoreLegalForm', [App\Http\Controllers\LegalFormController::class, 'store'])->name('StoreLegalForm');
        Route::get('EditLegalForm/{slug}', [App\Http\Controllers\LegalFormController::class, 'edit'])->name('EditLegalForm');
        Route::post('UpdateLegalForm/{slug}', [App\Http\Controllers\LegalFormController::class, 'update'])->name('UpdateLegalForm');
        Route::delete('DestroyLegalForm/{slug}', [App\Http\Controllers\LegalFormController::class, 'destroy'])->name('DestroyLegalForm');

    ###################################### End Uae ##############################################################################################

    ###################################### Start Transactions ###################################################################################

//    Route::get('/Transactions', [App\Http\Controllers\TransactionController::class, 'index'])->name('Transactions');
    Route::get('/AllTransactions', [App\Http\Controllers\TransactionController::class, 'all'])->name('AllTransactions');
        Route::get('/AddTransactions', [App\Http\Controllers\TransactionController::class, 'create'])->name('AddTransactions');
        Route::post('/StoreTransactions', [App\Http\Controllers\TransactionController::class, 'store'])->name('StoreTransactions');
        Route::get('/InfoTransactions/{slug}', [App\Http\Controllers\TransactionController::class, 'info'])->name('InfoTransactions');
        Route::get('/StepsTransactions/{slug}', [App\Http\Controllers\TransactionController::class, 'steps'])->name('StepsTransactions');
        Route::get('/EditTransactions/{slug}', [App\Http\Controllers\TransactionController::class, 'edit'])->name('EditTransactions');
        Route::post('/UpdateTransactions/{slug}', [App\Http\Controllers\TransactionController::class, 'update'])->name('UpdateTransactions');
        Route::delete('/DestroyTransaction/{slug}', [App\Http\Controllers\TransactionController::class, 'destroy'])->name('DestroyTransaction');

    ###################################### End Transactions ######################################################################################

    ###################################### Start Faqs ############################################################################################

        Route::get('/Faqs', [App\Http\Controllers\FaqController::class, 'index'])->name('Faqs');
        Route::get('/AllFaqs', [App\Http\Controllers\FaqController::class, 'create'])->name('AllFaqs');
        Route::get('/AddFaqs', [App\Http\Controllers\FaqController::class, 'add'])->name('AddFaqs');
        Route::post('StoreFaq', [App\Http\Controllers\FaqController::class, 'store'])->name('StoreFaq');
        Route::get('EditFaq/{slug}', [App\Http\Controllers\FaqController::class, 'edit'])->name('EditFaq');
        Route::post('UpdateFaq/{slug}', [App\Http\Controllers\FaqController::class, 'update'])->name('UpdateFaq');
        Route::delete('DestroyFaq/{slug}', [App\Http\Controllers\FaqController::class, 'destroy'])->name('DestroyFaq');

    ###################################### End Faqs ##############################################################################################

    ###################################### Start Researchs ############################################################################################

        Route::get('/Researchs', [App\Http\Controllers\ResearchController::class, 'index'])->name('Researchs');
        Route::get('/WatchInfoResearch/{slug}', [App\Http\Controllers\ResearchController::class, 'show'])->name('WatchInfoResearch');
        Route::get('/AllResearchs', [App\Http\Controllers\ResearchController::class, 'create'])->name('AllResearchs');
        Route::get('/AddResearchs', [App\Http\Controllers\ResearchController::class, 'add'])->name('AddResearchs');
        Route::post('StoreResearchs', [App\Http\Controllers\ResearchController::class, 'store'])->name('StoreResearchs');
        Route::get('EditResearchs/{slug}', [App\Http\Controllers\ResearchController::class, 'edit'])->name('EditResearchs');
        Route::post('UpdateResearchs/{slug}', [App\Http\Controllers\ResearchController::class, 'update'])->name('UpdateResearchs');
        Route::delete('UpdateResearchs/{slug}', [App\Http\Controllers\ResearchController::class, 'destroy'])->name('UpdateResearchs');

    ###################################### End Researchs #############################################################################################

    ###################################### Start Companie #######################################################################################

        Route::get('Companies', [App\Http\Controllers\CompanieController::class, 'index'])->name('Companies');
        Route::get('AllCompanies', [App\Http\Controllers\CompanieController::class, 'create'])->name('AllCompanies');
        Route::post('StoreCompanies', [App\Http\Controllers\CompanieController::class, 'store'])->name('StoreCompanies');
        Route::get('WatchCompanies/{slug}', [App\Http\Controllers\CompanieController::class, 'show'])->name('WatchCompanies');
        Route::get('EditNameCompanie/{id}', [App\Http\Controllers\CompanieController::class, 'edit'])->name('EditNameCompanie');
        Route::delete('DestroyCompanies/{slug}', [App\Http\Controllers\CompanieController::class, 'destroy'])->name('DestroyCompanies');

    ####################################  Start Update Companie  #################################################################################

        Route::post('UpdateNameCompanie/{id}', [App\Http\Controllers\CompanieController::class, 'update_name'])->name('UpdateNameCompanie');
        Route::post('UpdateInsuranceEndCompanies/{id}', [App\Http\Controllers\CompanieController::class, 'update_insurance_end'])->name('UpdateInsuranceEndCompanies');
        Route::post('UpdateIicenseCompanies/{id}', [App\Http\Controllers\CompanieController::class, 'update_license'])->name('UpdateIicenseCompanies');
        Route::post('UpdateIcpCompanies/{id}', [App\Http\Controllers\CompanieController::class, 'update_icp'])->name('UpdateIcpCompanies');
        Route::post('UpdateLicenseNumberCompanies/{id}', [App\Http\Controllers\CompanieController::class, 'update_license_number'])->name('UpdateLicenseNumberCompanies');
        Route::post('UpdateContactInfoCompanies/{id}', [App\Http\Controllers\CompanieController::class, 'update_contact_info'])->name('UpdateContactInfoCompanies');

    ####################################  End Update Companie  #################################################################################

    ###################################### End Companie ########################################################################################

    ###################################### Start Established Accounts ###########################################################################

        Route::post('StoreEstablishedAccounts', [App\Http\Controllers\EstablishedAccountsController::class, 'store'])->name('StoreEstablishedAccounts');
        Route::post('EditEstablishedAccounts/{slug}', [App\Http\Controllers\EstablishedAccountsController::class, 'update'])->name('EditEstablishedAccounts');
        Route::delete('DestroyEstablishedAccounts/{slug}', [App\Http\Controllers\EstablishedAccountsController::class, 'destroy'])->name('DestroyEstablishedAccounts');

    ###################################### End Established Accounts #############################################################################

    ###################################### Start Visa ###########################################################################################

        Route::get('/AllVisa/{slug}', [App\Http\Controllers\VisaController::class, 'index'])->name('AllVisa');
        Route::get('/ShowUserVisa/{id}', [App\Http\Controllers\VisaController::class, 'show_user_visa'])->name('ShowUserVisa');
        Route::post('StoreVisa', [App\Http\Controllers\VisaController::class, 'store'])->name('StoreVisa');
        Route::get('EditVisa/{slug}', [App\Http\Controllers\VisaController::class, 'edit'])->name('EditVisa');
        Route::post('UpdateVisa/{slug}', [App\Http\Controllers\VisaController::class, 'update'])->name('UpdateVisa');
        Route::delete('destroyVisa/{id}', [App\Http\Controllers\VisaController::class, 'destroy'])->name('destroyVisa');

    ###################################### End Visa ###########################################################################################

    ###################################### Start Accommodation ################################################################################

        Route::get('/AllAccommodation/{slug}', [App\Http\Controllers\AccommodationController::class, 'index'])->name('AllAccommodation');
        Route::post('StoreAccommodation', [App\Http\Controllers\AccommodationController::class, 'store'])->name('StoreAccommodation');
        Route::get('EditAccommodation/{slug}', [App\Http\Controllers\AccommodationController::class, 'edit'])->name('EditAccommodation');
        Route::post('UpdateAccommodation/{slug}', [App\Http\Controllers\AccommodationController::class, 'update'])->name('UpdateAccommodation');
        Route::delete('destroyAccommodation/{slug}', [App\Http\Controllers\AccommodationController::class, 'destroy'])->name('destroyAccommodation');

    ###################################### End Accommodation ################################################################################

    ###################################### Start Visa Expired ################################################################################

    Route::get('/AllVisaEnd', [App\Http\Controllers\VisaController::class, 'all_end'])->name('AllVisaEnd');
    Route::get('/ExtensionVisaEnd/{slug}', [App\Http\Controllers\VisaController::class, 'edit_visa_end'])->name('ExtensionVisaEnd');
    Route::post('UpdateVisaEnd/{slug}', [App\Http\Controllers\VisaController::class, 'update_visa_end'])->name('UpdateVisaEnd');


    Route::get('/AllVisaExpired', [App\Http\Controllers\VisaController::class, 'all_expired'])->name('AllVisaExpired');
        Route::get('/ExtensionVisaExpired/{slug}', [App\Http\Controllers\VisaController::class, 'edit_visa_expired'])->name('ExtensionVisaExpired');
        Route::post('UpdateVisaExpired/{slug}', [App\Http\Controllers\VisaController::class, 'update_visa_expired'])->name('UpdateVisaExpired');

    ###################################### End Visa Expired ################################################################################

    ###################################### Start Accommodation Expired ################################################################################

        Route::get('/AllAccommodationEnd', [App\Http\Controllers\AccommodationController::class, 'all_end'])->name('AllAccommodationEnd');
        Route::get('/ExtensionAccommodationEnd/{slug}', [App\Http\Controllers\AccommodationController::class, 'edit_accommodation_end'])->name('ExtensionAccommodationEnd');
        Route::post('UpdateAccommodationEnd/{slug}', [App\Http\Controllers\AccommodationController::class, 'update_accommodation_end'])->name('UpdateAccommodationEnd');

        Route::get('/AllAccommodationExpired', [App\Http\Controllers\AccommodationController::class, 'all_expired'])->name('AllAccommodationExpired');
        Route::get('/ExtensionAccommodationExpired/{slug}', [App\Http\Controllers\AccommodationController::class, 'edit_accommodation_expired'])->name('ExtensionAccommodationExpired');
        Route::post('UpdateAccommodationExpired/{slug}', [App\Http\Controllers\AccommodationController::class, 'update_accommodation_expired'])->name('UpdateAccommodationExpired');

    ###################################### End Accommodation Expired ################################################################################

    ###################################### Start Passpor Expired ################################################################################

        Route::get('/AllPassporEnd', [App\Http\Controllers\CompanieController::class, 'all_passpor_end'])->name('AllPassporEnd');
        Route::get('/ExtensionPassporaEnd/{slug}', [App\Http\Controllers\CompanieController::class, 'edit_passpor_accommodation_end'])->name('ExtensionPassporaEnd');
        Route::get('/ExtensionPassporvEnd/{slug}', [App\Http\Controllers\CompanieController::class, 'edit_passpor_visa_end'])->name('ExtensionPassporvEnd');
        Route::post('UpdatePassporVisaEnd/{slug}', [App\Http\Controllers\CompanieController::class, 'update_passpor_accommodation_end'])->name('UpdatePassporVisaEnd');
        Route::post('UpdatePassporVisvEnd/{slug}', [App\Http\Controllers\CompanieController::class, 'update_passpor_visa_end'])->name('UpdatePassporVisvEnd');

        Route::get('/AllPassporExpired', [App\Http\Controllers\CompanieController::class, 'all_passpor_expired'])->name('AllPassporExpired');
        Route::get('/ExtensionPassporvExpired/{slug}', [App\Http\Controllers\CompanieController::class, 'edit_passpor_visa_expired'])->name('ExtensionPassporvExpired');
        Route::get('/ExtensionPassporaExpired/{slug}', [App\Http\Controllers\CompanieController::class, 'edit_passpor_accommodation_expired'])->name('ExtensionPassporaExpired');
        Route::post('UpdatePassporVisaExpired/{slug}', [App\Http\Controllers\CompanieController::class, 'update_passpor_visa_expired'])->name('UpdatePassporVisaExpired');
        Route::post('UpdatePassporAccommodationExpired/{slug}', [App\Http\Controllers\CompanieController::class, 'update_passpor_accommodation_expired'])->name('UpdatePassporAccommodationExpired');

    ###################################### End Passpor Expired ################################################################################

    ###################################### Start Daman Expired ################################################################################

    Route::get('AllDamanEnd', [App\Http\Controllers\CompanieController::class, 'all_daman_end'])->name('AllDamanEnd');
    Route::get('AllDamanExpired', [App\Http\Controllers\CompanieController::class, 'all_daman_expired'])->name('AllDamanExpired');

    ###################################### End Visa ############################################################################################

    Route::get('AllWorkPermitEnd', [App\Http\Controllers\AccommodationController::class, 'all_workpermit_end'])->name('AllWorkPermitEnd');
    Route::get('EditWorkPermitEnd/{slug}', [App\Http\Controllers\AccommodationController::class, 'edit_workpermit_end'])->name('EditWorkPermitEnd');
    Route::post('UpdateWorkpermitEnd/{slug}', [App\Http\Controllers\AccommodationController::class, 'update_workpermit_end'])->name('UpdateWorkpermitEnd');


    Route::get('AllWorkPermitExpired', [App\Http\Controllers\AccommodationController::class, 'all_workpermit_expired'])->name('AllWorkPermitExpired');
    Route::get('EditWorkPermitExpired/{slug}', [App\Http\Controllers\AccommodationController::class, 'edit_workpermit_expired'])->name('EditWorkPermitExpired');
    Route::post('UpdateWorkpermitExpired/{slug}', [App\Http\Controllers\AccommodationController::class, 'update_workpermit_expired'])->name('UpdateWorkpermitExpired');



});



