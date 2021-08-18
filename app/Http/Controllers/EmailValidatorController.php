<?php

namespace App\Http\Controllers;

use Aman\EmailVerifier\EmailChecker;
use App\Events\FileImportEvent;
use App\Exports\ReportExport;
use App\Imports\EmailListImport;
use App\Models\EmailValidationResult;
use Illuminate\Http\Request;
use Illuminate\Support\Arr;
use Illuminate\Support\Collection;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Str;
use Maatwebsite\Excel\Facades\Excel;
use Maatwebsite\Excel\HeadingRowImport;
use SMTPValidateEmail\Validator as SmtpEmailValidator;
class EmailValidatorController extends Controller
{
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
        $domain = substr(strrchr($request->email, "@"), 1);
        $account = explode('@', $request->email)[0];

        $email = 'someone@example.org';
        $sender = 'waheed.eliccs@gmail.com';
        $validator = new SmtpEmailValidator($request->email, $sender);

        // If debug mode is turned on, logged data is printed as it happens:
//         $validator->debug = true;
        $result = $validator->validate();
        $log = $validator->log;

//        $result = app(EmailChecker::class)->checkEmail($request->email, 'boolean');
        $email = $request->email;

        return view('back_end.email_validator.single_email_validator', compact('email','result', 'account', 'domain'));
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
        $headings = (new HeadingRowImport())->toArray($request->file('emails'));
        $headings = Arr::flatten($headings);
        if (!in_array('email', $headings)) {
            return response()->json([
                'success' => false,
                'error' => "File doesn't contain email column, one should be provided, See File Format Section",
                'errorcode' => 422
            ]);
        }

        $emails = Excel::import(new EmailListImport, $request->emails);
        FileImportEvent::dispatch($request->file('emails')->getClientOriginalName());
        return response()->json(['success' => true]);
    }

    public function download($q)
    {
        return Excel::download(new ReportExport($q), 'Validated_Emails_Report.csv');
    }


}
