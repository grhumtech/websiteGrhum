<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\WebsiteController;
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


    // home + locations
    Route::get('/', [WebsiteController::class, 'index'])->name('website.index');
    Route::get('home2', [WebsiteController::class, 'home2'])->name('home2');
    Route::get('home3', [WebsiteController::class, 'home3'])->name('home3');
    Route::get('home4', [WebsiteController::class, 'home4'])->name('home4');
    Route::get('home5', [WebsiteController::class, 'home5'])->name('home5');
    Route::get('home6', [WebsiteController::class, 'home6'])->name('home6');
    Route::get('home7', [WebsiteController::class, 'home7'])->name('home7');
    Route::get('locations', [WebsiteController::class, 'getAllLocation'])->name('locations');
   // Route::match(['get', 'post'], 'locations', [WebsiteController::class, 'locations']);

    // property search + detail
    Route::match(['get', 'post'], 'searchProperty/{street?}', [WebsiteController::class, '  hu i']);
    Route::get('propertyDetail/{property_id}', [WebsiteController::class, 'propertyDetail']);

    // enquiry / feedback / complaint (logged-in)
    Route::post('sendEnquiry', [WebsiteController::class, 'sendEnquiry'])->name('sendEnquiry');
    Route::post('sendFeedback', [WebsiteController::class, 'sendFeedback']);
    Route::match(['get', 'post'], 'createComplaint', [WebsiteController::class, 'createComplaint']);

    // auth
    Route::match(['get', 'post'], 'login', [WebsiteController::class, 'login']);
    Route::get('logout', [WebsiteController::class, 'logout']);

    // user lists
    Route::get('history', [WebsiteController::class, 'history']);
    Route::get('enquiry', [WebsiteController::class, 'enquiry']);

    // complaint chat (ajax)
    Route::post('fetchChat', [WebsiteController::class, 'fetchChat']);
    Route::post('sendMessage', [WebsiteController::class, 'sendMessage']);

    // enquire / contact submit + OTP
    Route::get('enquire_now', [WebsiteController::class, 'enquire_now']);
    Route::get('enquire_now_new', [WebsiteController::class, 'enquire_now_new']);
    Route::post('enquiry_submit', [WebsiteController::class, 'enquiry_submit'])->name('enquiry_submit');
    Route::get('contact-us', [WebsiteController::class, 'contactus']);
    Route::post('submit_contact', [WebsiteController::class, 'submit_contact'])->name('submit_contact');
    Route::post('send_email_otp', [WebsiteController::class, 'sendOtp'])->name('sendOtp');
    Route::post('verify_email_otp', [WebsiteController::class, 'verifyOtp'])->name('verifyOtp');

    // static / cms pages
    Route::get('who_we_are', [WebsiteController::class, 'about_us'])->name('who_we_are');;
    Route::get('how_it_works', [WebsiteController::class, 'your_stay'])->name('how_it_works');
    Route::match(['get', 'post'], 'contact_us', [WebsiteController::class, 'contact_us'])->name('contact_us');
    Route::get('faq', [WebsiteController::class, 'faq']);
    Route::get('blog_listing', [WebsiteController::class, 'blog_listing']);
    Route::get('blog_detail/{id}', [WebsiteController::class, 'blog_detail']);
    Route::get('privacy_policy', [WebsiteController::class, 'privacy_policy']);
    Route::get('terms_condition', [WebsiteController::class, 'terms_condition']);
    Route::get('client_terms_conditions', [WebsiteController::class, 'client_terms_conditions']);
    Route::get('corporate_travel', [WebsiteController::class, 'corporate_travel']);
    Route::get('emergency', [WebsiteController::class, 'emergency']);
    Route::get('construction_crew', [WebsiteController::class, 'construction_crew']);
    Route::get('film_production', [WebsiteController::class, 'film_production']);
    Route::get('holiday', [WebsiteController::class, 'holiday']);
    Route::get('healthcare', [WebsiteController::class, 'healthcare']);
    Route::get('insurance_claims', [WebsiteController::class, 'insurance_catastrophe']);
    Route::get('travel_management', [WebsiteController::class, 'travel_agencies']);
    Route::get('suppliers', [WebsiteController::class, 'suppliers']);
    Route::get('property_management_companies', [WebsiteController::class, 'property_management_companies']);
    Route::get('real_estate_agents', [WebsiteController::class, 'real_estate_agents']);
    Route::get('landlords', [WebsiteController::class, 'landlords']);
    Route::get('service_apartments', [WebsiteController::class, 'service_apartments']);
    Route::get('accreditations_memberships', [WebsiteController::class, 'accreditations_memberships']);
