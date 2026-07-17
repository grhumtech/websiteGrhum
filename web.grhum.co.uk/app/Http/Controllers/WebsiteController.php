<?php



namespace App\Http\Controllers;



use Illuminate\Http\Request;

use Illuminate\Support\Facades\DB;

use Illuminate\Support\Facades\Mail;

use App\Mail\EnquiryMail;

use App\Mail\ContactMail;

use Illuminate\Support\Facades\Session;
use App\Mail\OtpMail;



class WebsiteController extends Controller
{

    /**

     * NOTE on auth/passwords:

     * The legacy CI3 site stored plaintext passwords and compared them directly.

     * To keep existing DB data working during migration this code preserves that

     * behaviour. Once migrated, switch to Hash::make()/Hash::check() and re-hash users.

     */



    /* =========================================================

     |  HOME / LOCATIONS

     * =======================================================*/



    public function index()
    {

        $data['location'] = DB::table('location')->where('status', '1')->get();

        return view('website.login_home', $data);

    }


    public function home2()
    {

        $data['location'] = DB::table('location')->where('status', '1')->get();

        return view('website.2login_home', $data);

    }


    public function home3()
    {

        $data['location'] = DB::table('location')->where('status', '1')->get();

        return view('website.3login_home', $data);

    }


    public function home4()
    {

        $data['location'] = DB::table('location')->where('status', '1')->get();

        return view('website.4login_home', $data);

    }



    public function home5()
    {

        $data['location'] = DB::table('location')->where('status', '1')->get();

        return view('website.5login_home', $data);

    }


    public function home6()
    {

        $data['location'] = DB::table('location')->where('status', '1')->get();

        return view('website.6login_home', $data);

    }



    public function home7()
    {

        $data['location'] = DB::table('location')->where('status', '1')->get();

        return view('website.7login_home', $data);

    }




    // CI redirect() helper -> guard for admin

    public function redirectGuard()
    {

        if (!session('id')) {

            return redirect('admin/index');

        }

    }



    public function getAllLocation()
    {

        $data['location'] = DB::table('location')->where('status', '1')->get();

        return view('website.locations', $data);

    }



    /* =========================================================

     |  PROPERTY SEARCH + LISTING

     * =======================================================*/



    public function searchProperty(Request $request, $street = '')
    {
        if ($request->isMethod('post') && $request->has('submit')) {
            // POST search (location/date based - original ignores them in query)
            $result = DB::table('property')->orderByDesc('id')->get();

            if ($result->isEmpty()) {
                return redirect('website/enquire_now');
            }

            return view('website.property_listing', [
                'data' => $result,
                'street' => null,
            ]);
        }

        // GET listing (optional street filter)
        $street = urldecode($street);

        $query = DB::table('property')->where('website_status', 1);

        if (!empty($street)) {
            $query->where('address', 'like', '%' . $street . '%');
        }

        $result = $query->orderByDesc('id')->get();

        if ($result->isEmpty()) {
            return redirect('website/enquire_now');
        }

        return view('website.property_listing', [
            'data' => $result,
            'street' => $street ?: null,
        ]);
    }


    public function propertyDetail($property_id)
    {

        $data['data'] = DB::select(

            "SELECT p.* FROM `property` p WHERE p.id = ?",

            [$property_id]

        );



        $data['detail'] = DB::table('property_details')

            ->where('property_id', $property_id)->get();



        $data['image'] = DB::table('property_image')

            ->where('property_id', $property_id)->get();







        return view('website.property_detail', $data);

    }



    /* =========================================================

     |  ENQUIRY (logged-in property enquiry)

     * =======================================================*/



    public function sendEnquiry(Request $request)
    {

        if (!$request->has('submit')) {

            return redirect('website/searchProperty');

        }



        $fullName = $request->input('full_name');



        $enquiryId = DB::table('enquiry')->insertGetId([

            'company_name' => $request->input('company_name'),

            'property_id' => $request->input('property_id'),

            'enq_code' => time(),

            'client_id' => $request->input('client_id'),

            'check_in' => $request->input('check_in'),

            'check_out' => $request->input('check_out'),

            'reason' => 0,

            'unit_type' => 0,

            'full_name' => $fullName,

            'email_id' => $request->input('email_id'),

            'mobile' => $request->input('mobile'),

            'enquiry_text' => $request->input('enquiry_text'),

            'client_name' => $fullName,

            'budget' => $request->input('budget'),

            'created' => now(),

        ]);



        DB::table('notification')->insert([

            'notification_text' => "New enquiry from " . $fullName,

            'notification_type' => 1,

            'type_id' => $enquiryId,

            'created' => now(),

        ]);



        return redirect('website/searchProperty');

    }



    public function sendFeedback(Request $request)
    {

        if (!$request->has('submit')) {

            return back();

        }



        DB::table('feedback')->insert([

            'user_id' => session('user_id'),

            'property_id' => $request->input('property_id'),

            'title' => $request->input('title'),

            'feedback_text' => $request->input('review'),

            'rating' => $request->input('rating'),

            'is_publish' => 0,

            'created' => now(),

        ]);



        $feedbackId = DB::getPdo()->lastInsertId();



        DB::table('notification')->insert([

            'notification_text' => "New feedback from " . session('full_name'),

            'notification_type' => 4,

            'type_id' => $feedbackId,

            'created' => now(),

        ]);



        return back();

    }



    /* =========================================================

     |  COMPLAINTS

     * =======================================================*/



    public function createComplaint(Request $request)
    {

        if (!session('user_email_id')) {

            return redirect('website/searchProperty');

        }



        if ($request->isMethod('post') && $request->has('submit')) {

            $complaintTicketId = DB::table('complaint_ticket')->insertGetId([

                'ticket_id' => time() . rand(100, 999),

                'booking_id' => $request->input('booking_id'),

                'user_id' => session('user_id'),

                'complaint_title' => $request->input('complaint_title'),

                'created' => now(),

            ]);



            DB::table('conversation')->insert([

                'complaint_ticket_id' => $complaintTicketId,

                'sender_id' => session('user_id'),

                'sender_type' => 1,

                'receiver_id' => 1,

                'receiver_type' => 0,

                'conversation_text' => $request->input('complaint_text'),

            ]);



            $userData = DB::table('user')->where('user_id', session('user_id'))->first();



            DB::table('notification')->insert([

                'notification_text' => "New Complaint from " . ($userData->full_name ?? ''),

                'notification_type' => 2,

                'type_id' => $complaintTicketId,

                'created' => now(),

            ]);



            return redirect('website/createComplaint')

                ->with('success', 'Complaint submitted.');

        }



        $data['booking'] = DB::table('booking')

            ->where('user_id', session('user_id'))->get();



        return view('website.create_complaint', $data);

    }



    /* =========================================================

     |  LOGIN / REGISTER / LOGOUT

     * =======================================================*/



    public function login(Request $request)
    {

        if (session('user_email_id')) {

            return redirect('website/searchProperty');

        }



        // ---- LOGIN ----

        if ($request->has('login')) {

            $email = $request->input('email_id');

            $password = $request->input('password');



            $user = DB::table('user')

                ->where('email_id', $email)

                ->where('password', $password)

                ->first();



            if (!$user) {

                // try supplier

                $supplier = DB::table('supplier')

                    ->where('email_id', $email)

                    ->where('password', $password)

                    ->first();



                if (!$supplier) {

                    return redirect('website/login')->with('message', 'Invalid Credential');

                }



                session([

                    'user_email_id' => $supplier->email_id,

                    'user_id' => $supplier->supplier_id,

                    'id' => $supplier->supplier_id,

                    'full_name' => $supplier->supplier_name,

                    'admin_id' => '1',

                    'admin_type' => 1,

                ]);



                return redirect('adminhome/home');

            }



            // user found (legacy logic preserved: is_active==1 => blocked)

            if ($user->is_active == 1) {

                return redirect('website/login')->with('message', 'Account is in-active');

            }



            session([

                'user_email_id' => $user->email_id,

                'user_id' => $user->user_id,

                'full_name' => $user->full_name,

            ]);



            return redirect('website');

        }



        // ---- REGISTER ----

        if ($request->has('register')) {

            $email = $request->input('email_id');

            $mobile = $request->input('mobile');



            $emailExists = DB::table('user')->where('email_id', $email)->exists();

            if ($emailExists) {

                return redirect('website/login')->with('message', 'Email already exist');

            }



            $mobileExists = DB::table('user')->where('mobile', $mobile)->exists();

            if ($mobileExists) {

                return redirect('website/login')->with('message', 'Mobile number already exist');

            }



            DB::table('user')->insert([

                'email_id' => $email,

                'full_name' => $request->input('full_name'),

                'mobile' => $mobile,

                'password' => $request->input('password'),

                'created' => now(),

            ]);



            return redirect('website/login')->with('message', 'Registration done');

        }



        return view('website.login_registration');

    }



    public function logout()
    {

        session()->forget(['user_email_id', 'user_id', 'full_name']);

        session()->flush();

        return redirect('website/login');

    }



    /* =========================================================

     |  HISTORY / ENQUIRY LISTS

     * =======================================================*/



    public function history()
    {

        if (!session('user_email_id')) {

            return redirect('website/login');

        }



        $data['data'] = DB::select(

            "SELECT * FROM `booking` b

             JOIN `property` p ON b.property_id = p.property_id

             WHERE b.user_id = ?

             ORDER BY b.booking_id DESC",

            [session('user_id')]

        );



        return view('website.history', $data);

    }



    public function enquiry()
    {

        if (!session('user_email_id')) {

            return redirect('website/login');

        }



        $data['data'] = DB::select(

            "SELECT * FROM `enquiry` b

             JOIN `property` p ON b.property_id = p.property_id

             WHERE b.client_id = ?

             ORDER BY b.enquiry_id DESC",

            [session('user_id')]

        );



        return view('website.enquiry_history', $data);

    }



    /* =========================================================

     |  STATIC / CMS PAGES

     * =======================================================*/



    public function about_us()
    {
        return view('website.about_us');
    }

    public function your_stay()
    {
        return view('website.your_stay');
    }



    public function contact_us()
    {

        $num1 = rand(1, 9);

        $num2 = rand(1, 9);

        session(['captcha_answer' => $num1 + $num2]);

        return view('website.contact_us', ['captcha_num1' => $num1, 'captcha_num2' => $num2]);

    }



    public function faq()
    {

        $data['faq'] = DB::table('faqs')->where('is_deleted', '0')->get();

        return view('website.faq', $data);

    }



    public function blog_listing()
    {

        $data['blogs'] = DB::table('blogs')->where('is_deleted', '0')->get();

        return view('website.blog_listing', $data);

    }



    public function blog_detail($id)
    {

        $data['blogs'] = DB::table('blogs')->where('id', $id)->get();

        return view('website.blog_detail', $data);

    }



    public function privacy_policy()
    {
        return view('website.privacy_policy');
    }

    public function terms_condition()
    {
        return view('website.terms_condition');
    }

    public function client_terms_conditions()
    {
        return view('website.client_terms_conditions');
    }

    public function corporate_travel()
    {
        return view('website.corporate_travel');
    }

    public function emergency()
    {
        return view('website.emergency');
    }

    public function construction_crew()
    {
        return view('website.construction_crew');
    }

    public function film_production()
    {
        return view('website.film_production');
    }

    public function holiday()
    {
        return view('website.holiday');
    }

    public function healthcare()
    {
        return view('website.healthcare');
    }

    public function insurance_catastrophe()
    {
        return view('website.insurance_catastrophe');
    }

    public function travel_agencies()
    {
        return view('website.travel_agencies');
    }

    public function suppliers()
    {
        return view('website.suppliers');
    }

    public function property_management_companies()
    {
        return view('website.property_management_companies');
    }

    public function real_estate_agents()
    {
        return view('website.real_estate_agents');
    }

    public function landlords()
    {
        return view('website.landlords');
    }

    public function service_apartments()
    {
        return view('website.service_apartments');
    }



    public function locations()
    {

        $data['location'] = DB::table('location')->where('status', '1')->get();

        return view('website.locations', $data);

    }



    public function enquire_now()
    {

        $num1 = rand(1, 9);
        $num2 = rand(1, 9);

        session([
            'captcha_num1' => $num1,
            'captcha_num2' => $num2,
            'captcha_answer' => $num1 + $num2,
        ]);

        return view('website.enquire_now', [
            'captcha_num1' => $num1,
            'captcha_num2' => $num2,
        ]);
    }

    public function contactus()
    {
        $num1 = rand(1, 9);
        $num2 = rand(1, 9);

        session([
            'captcha_num1' => $num1,
            'captcha_num2' => $num2,
            'captcha_answer' => $num1 + $num2,
        ]);

        return view('website.contact_us', [
            'captcha_num1' => $num1,
            'captcha_num2' => $num2,
        ]);
    }


    public function enquire_now_new()
    {

        $num1 = rand(1, 9);

        $num2 = rand(1, 9);

        session(['captcha_answer' => $num1 + $num2]);

        return view('website.enquire_now_new', ['captcha_num1' => $num1, 'captcha_num2' => $num2]);

    }



    public function accreditations_memberships()
    {

        return view('website.accreditations_partnerships');

    }



    /* =========================================================

     |  COMPLAINT CHAT (AJAX)

     * =======================================================*/



    public function fetchChat(Request $request)
    {

        $complaintId = $request->input('complaint_id');



        $comp = DB::select(

            "SELECT c.*, u.full_name FROM `complaint_ticket` c

             JOIN `user` u ON c.user_id = u.user_id

             WHERE c.complaint_ticket_id = ?",

            [$complaintId]

        );



        $first = $comp[0] ?? null;



        $headerData = [

            'title' => $first->full_name ?? '',

            'complaint_id' => '#' . ($first->ticket_id ?? ''),

            'booking_id' => '#' . ($first->booking_id ?? ''),

        ];



        $rows = DB::table('conversation')

            ->where('complaint_ticket_id', $complaintId)->get();



        $chatData = '';

        foreach ($rows as $conv) {

            if ($conv->sender_type == 1) {

                $chatData .= "<div class='right-side-chat'><span class='user-name'>"

                    . e($first->full_name ?? '') . "</span><p>" . e($conv->conversation_text) . "</p></div>";

            } else {

                $chatData .= "<div class='left-side-chat'><span class='admin-name'>Admin</span><p>"

                    . e($conv->conversation_text) . "</p></div>";

            }

        }

        $chatData .= '<div class="grhum-chat"></div>';



        return response()->json([

            'chat' => $chatData,

            'header' => $headerData,

        ]);

    }



    public function sendMessage(Request $request)
    {

        $message = $request->input('message');

        $complaintId = $request->input('complaint_id');



        DB::table('conversation')->insert([

            'complaint_ticket_id' => $complaintId,

            'sender_id' => session('user_id'),

            'sender_type' => 1,

            'receiver_id' => 1,

            'receiver_type' => 0,

            'conversation_text' => $message,

        ]);



        return "<div class='right-side-chat'><span class='user-name'>"

            . e(session('full_name')) . "</span><p>" . e($message) . "</p></div>";

    }



    /* =========================================================

     |  ENQUIRY SUBMIT (OTP + captcha + mail)

     * =======================================================*/



    public function enquiry_submit(Request $request)
    {


        $expected = session('captcha_answer');

        if ((int) $request->input('captcha_answer') !== (int) $expected) {
            return redirect('website/enquire_now')
                ->with('error', 'Wrong answer. Please try again.');
        }

        // captcha passed — clear it so it can't be reused, then continue processing
        session()->forget(['captcha_num1', 'captcha_num2', 'captcha_answer']);

        $email = trim($request->input('email_id'));

        $otpData = Session::get('enq_otp');
        if (!$otpData || !$otpData['verified'] || $otpData['email'] !== $request->input('email_id')) {
            return back()->withInput()->withErrors([
                'email_id' => 'Please verify your email before submitting.',
            ]);
        }
        session()->forget(['enq_otp']);





        $request->merge([
            'guest_details' => [
                'adults' => (int) $request->input('adults', 0),
                'children' => (int) $request->input('children', 0),
                'infants' => (int) $request->input('infants', 0),
                'pets' => (int) $request->input('pets', 0),
            ],
        ]);

        $guests = $request->input('guest_details');

        $labels = [
            'adults' => ['Adult', 'Adults'],
            'children' => ['Child', 'Children'],
            'infants' => ['Infant', 'Infants'],
            'pets' => ['Pet', 'Pets'],
        ];

        $parts = [];
        foreach ($labels as $key => [$singular, $plural]) {
            $count = (int) ($guests[$key] ?? 0);
            if ($count > 0) {
                $parts[] = $count . ' ' . ($count === 1 ? $singular : $plural);
            }
        }

        $guestSummary = implode(', ', $parts) ?: 'No guests specified';

        $payload = [
            'company_name' => $request->input('company_name'),
            'full_name' => $request->input('full_name'),
            'email_id' => $request->input('email_id'),
            'mobile' => $request->input('mobile'),
            'check_in' => $request->input('check_in'),
            'check_out' => $request->input('check_out'),
            'budget' => $request->input('budget'),
            'enquiry_text' => $request->input('enquiry_text'),
            'guest_details' => $guestSummary,
            'webisite_enquiry' => '1',
            'enq_code' => rand(1111, 9999),
        ];

        $mailData = $payload;

        Mail::to($payload['email_id'])
            ->cc('info@grhum.co.uk')
            ->send(
                new EnquiryMail(
                    $payload,
                    'info@grhum.co.uk',               // From email
                    [],                              // Extra CC (optional)
                    'New Website Enquiry'            // Subject
                )
            );

        // } catch (\Throwable $e) {

        //     // log but don't block submission

        //     \Log::error('Enquiry mail failed: ' . $e->getMessage());

        // }



        $saved = DB::table('enquiry')->insert($payload);



        if ($saved) {

            return redirect('enquire_now')

                ->with('success', 'Your enquiry has been submitted. Our team will be in touch shortly');

        }

        return redirect('enquire_now')->with('error', 'Failed to submit enquiry.');

    }



    public function submit_contact(Request $request)
    {

        $expected = session('captcha_answer');

        if ((int) $request->input('captcha_answer') !== (int) $expected) {
            session()->forget(['captcha_num1', 'captcha_num2', 'captcha_answer']);
            return redirect('website/enquire_now')
                ->with('error', 'Wrong answer. Please try again.');
        }

        // captcha passed — clear it so it can't be reused, then continue processing

        $email = trim($request->input('email'));

        // $otpData = Session::get('enq_otp');
        // if (!$otpData || !$otpData['verified'] || $otpData['email'] !== $request->input('email_id')) {
        //     return back()->withInput()->withErrors([
        //         'email_id' => 'Please verify your email before submitting.',
        //     ]);
        // }





        $payload = [

            'first_name' => $request->input('first_name'),

            'last_name' => $request->input('last_name'),

            'email' => $request->input('email'),

            'contact_number' => $request->input('contact_number'),

            'enquiry_type' => $request->input('enquiry_type'),

            'message' => $request->input('message'),

        ];


        Mail::to($payload['email'])
            ->cc('info@grhum.co.uk')
            ->send(
                new ContactMail(
                    $payload,
                    'info@grhum.co.uk',               // From email
                    [],                              // Extra CC (optional)
                    'Contact Us'            // Subject
                )
            );


        $saved = DB::table('contact_us')->insert($payload);



        if ($saved) {

            return redirect('contact-us')

                ->with('success', 'Your enquiry has been submitted. Our team will be in touch shortly');

        }

        return redirect('contact-us')

            ->with('error', 'There was an error submitting your enquiry. Please try again.');

    }



    /* =========================================================

     |  EMAIL OTP (AJAX JSON)

     * =======================================================*/



    public function sendOtp(Request $request)
    {
        $request->validate([
            'email_id' => 'required|email|max:255',
        ]);

        $email = $request->input('email_id');
        $otp = rand(100000, 999999);

        // store OTP in session (5 min expiry)
        Session::put('enq_otp', [
            'email' => $email,
            'code' => $otp,
            'expires_at' => now()->addMinutes(5)->timestamp,
            'verified' => false,
        ]);

        try {
            Mail::raw(
                "Your Grhum verification code is: {$otp}\n\nThis code expires in 5 minutes.",
                function ($m) use ($email) {
                    $m->to($email)->subject('Your Grhum verification code');
                }
            );
        } catch (\Exception $e) {
            return response()->json([
                'status' => 'error',
                'message' => 'Could not send OTP. Please try again.',
            ], 500);
        }

        return response()->json([
            'status' => 'success',
            'message' => 'OTP sent to your email.',
        ]);
    }


    public function verifyOtp(Request $request)
    {
        $request->validate([
            'email_id' => 'required|email',
            'otp' => 'required|digits:6',
        ]);

        $data = Session::get('enq_otp');

        if (!$data) {
            return response()->json(['status' => 'error', 'message' => 'No OTP found. Please request a new one.'], 422);
        }

        if ($data['email'] !== $request->input('email_id')) {
            return response()->json(['status' => 'error', 'message' => 'Email does not match. Request a new OTP.'], 422);
        }

        if (now()->timestamp > $data['expires_at']) {
            Session::forget('enq_otp');
            return response()->json(['status' => 'error', 'message' => 'OTP expired. Please request a new one.'], 422);
        }

        if ((string) $data['code'] !== (string) $request->input('otp')) {
            return response()->json(['status' => 'error', 'message' => 'Invalid OTP. Please try again.'], 422);
        }

        // mark verified
        $data['verified'] = true;
        Session::put('enq_otp', $data);

        return response()->json(['status' => 'success', 'message' => 'Email verified successfully.']);
    }

}

