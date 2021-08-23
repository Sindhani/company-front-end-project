<?php

namespace App\Http\Controllers;

use Aman\EmailVerifier\EmailChecker;
use App\Events\FileImportEvent;
use App\Exports\ReportExport;
use App\Imports\EmailListImport;
use App\Models\EmailValidationResult;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Arr;
use Illuminate\Support\Collection;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Str;
use Maatwebsite\Excel\Facades\Excel;
use Maatwebsite\Excel\HeadingRowImport;
use SMTPValidateEmail\Validator as SmtpEmailValidator;

class EmailValidatorController extends Controller
{
    private $end_point;
    private $token;

    public function __construct()
    {
        $this->end_point = 'localhost:8080/api/email-validator/';
        $this->token = User::token()->first();

    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {


        $emails = EmailValidationResult::with('validated_emails')->get();
        return view('back_end/index');

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        if (request('type') === 'single-validator') {
            return view('back_end.email_validator.single_email_validator');
        }

        if (request('type') === 'download') {
            $results = EmailValidationResult::
            withCount(
                ['validatedEmails',
                    'validatedEmails as valid' => function ($query) {
                        $query->where('valid', 1);
                    },
                    'validatedEmails as invalid' => function ($query) {
                        $query->where('valid', 0);
                    }
                ])
                ->with('validatedEmails')
                ->get();
//            dd($results);
            return view('back_end.email_validator.download', compact('results'));
        }
        return view('back_end.email_validator.file_upload');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {


        $validator = Validator::make($request->all(), ['email' => 'email']);
        if ($validator->fails()) {
            return view('back_end.email_validator.single_email_validator')->with('error', 1);
        }

        $response = $this->sendRequest(['token' => $this->token, 'email' => $request->email]);
        extract($response->json());
        if(!empty($token_error)){
            return view('back_end.email_validator.single_email_validator', compact('token_error'));
        }

        return view('back_end.email_validator.single_email_validator', compact('email', 'result', 'account', 'domain'));
    }

    /**
     * Display the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }

    public function import(Request $request)
    {
        $end_point = 'localhost:8080/api/email-validator/';
        $token = User::token()->first();



        dd($response->body());
        return $response->json();
    }

    public function download($q)
    {
        return Excel::download(new ReportExport($q), 'Validated_Emails_Report.csv');
    }

    private function sendRequest($data){
        return $response = Http::post($this->end_point, $data);
    }


}
