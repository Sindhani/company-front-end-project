@extends('back_end.layouts.partials.master')
@section('contents')
    <link href="{{asset('assets/back_end/plugins/fancy-file-uploader/fancy_fileupload.css')}}" rel="stylesheet">
    <div class="row">
        <div class="col-12 col-lg-12">

            <div class="container-fluid py-2">
                <span class="font-weight-light text-muted py-3 display-4">Welcome To Your </span>
                <span class="display-4">Email Validation Results</span>

                <br><br>
                <p>To download the results of an e-mail list simply click on the File Name, but not before Zerobounce
                    finishes the validation, and the download options will appear. We recommend only sending to the
                    emails with a valid result. If you want to send to any other status, please read the status code
                    documentation linked below before you make that decision.</p>
            </div>

        </div>
    </div>
    <div class="row">
        <div class="col-md-10">
            @foreach($results as $result)
                @if($result->status == 'processing')
                    <div class="card radius-15">
                        <div class="card-body">
                            <div class="d-lg-flex align-items-center">
                                <div>
                                    <h5 class="mb-4">Email Validation Process</h5>
                                </div>
                            </div>
                            <a href="{{route('download-report', ['q' => 'all'])}}">
                                <div class="progress-wrapper">
                                <p class="mb-1">Total <span class="float-right">{{$result->validated_emails_count}}</span>
                                </p>
                                <div class="progress radius-10" style="height:5px;">
                                    <div class="progress-bar" role="progressbar"
                                         style="width: {{$result->validated_emails_count}}%"></div>
                                </div>
                            </div>
                            </a>
                            <hr>
                            <a href="{{route('download-report', ['q' => 'valid'])}}">
                            <div class="progress-wrapper">
                                <p class="mb-1">Valid <span class="float-right">{{!empty($result->valid) ? number_format(($result->valid * 100) / $result->validated_emails_count,2) : '0'}}
                                        %</span>
                                </p>
                                <div class="progress radius-10" style="height:5px;">
                                    <div class="progress-bar bg-success" role="progressbar"
                                         style="width: {{!empty($result->valid) ? number_format(($result->valid * 100) / $result->validated_emails_count,2) : '0'}}%"></div>
                                </div>
                            </div>
                            </a>
                            <hr>
                            <a href="{{route('download-report', ['q' => 'in_valid'])}}">
                            <div class="progress-wrapper">
                                <p class="mb-1">Invalid <span class="float-right">{{!empty($result->valid) ? number_format(($result->invalid * 100)/ $result->validated_emails_count,2): '0'}}
                                        %</span>
                                </p>
                                <div class="progress radius-10" style="height:5px;">
                                    <div class="progress-bar bg-danger" role="progressbar"
                                         style="width: {{!empty($result->invalid) ? number_format(($result->invalid * 100 ) / $result->validated_emails_count,2): '0'}}%"></div>
                                </div>
                            </div>
                            </a>

                        </div>
                    </div>
                @endif
            @endforeach
        </div>
    </div>

    <div class="card radius-15">
        <div class="card-body">
            <div class="card-title">
                <h4 class="mb-0 fa-pull-left">Download Your Results<span class="text-muted"><a
                                href="{{route('email-validator.create',['type'=>'download'])}}"> <i
                                    class="bx bx-refresh"></i></a></span></h4>

            </div>
            <hr>
            <table class="table table-bordered table-sm">
                <thead>
                <tr>
                    <th>S#</th>
                    <th>File Name</th>
                    <th>Status</th>
                    <th>Upload Date</th>
                    <th>Total</th>
                    <th>Valid</th>
                    <th>Invalid</th>
                    <th>Catch-All</th>
                    <th>Spam-trap</th>
                    <th>Abuse</th>
                    <th>Do Not Mail</th>
                    <th>Unkown</th>
                    <th>Delete</th>

                </tr>
                </thead>
                <tbody>
                @foreach($results as $result)
                    <tr>
                        <td>{{$loop->iteration}}</td>
                        <td><a href="{{route('download-report', ['q' => 'all'])}}">{{$result->file_name}}</a></td>
                        <td>{{$result->status}}</td>
                        <td>{{$result->upload_date}}</td>
                        <td>{{$result->validatedEmails()->count()}}</td>
                        <td>{{$result->validatedEmails()->where('valid','1')->count('valid')}}</td>
                        <td>{{$result->validatedEmails()->where('valid','0')->count('valid')}}</td>
                        <td>{{$result->validatedEmails()->count('catch_all')}}</td>
                        <td>{{$result->validatedEmails()->count('spam_trap')}}</td>
                        <td>{{$result->validatedEmails()->count('abuse')}}</td>
                        <td>{{$result->validatedEmails()->count('do_not_mail')}}</td>
                        <td>{{$result->validatedEmails()->count('unknown')}}</td>
                        <td>{{$result->validatedEmails()->count('delete')}}</td>

                    </tr>
                @endforeach
                </tbody>

            </table>

        </div>
    </div>


@endsection
@section('scripts')

    <script>
        $(document).ready(function () {
            $('#fancy-file-upload').FancyFileUpload({
                url: "{{route('import.file')}}",
                params: {
                    _token: "{{csrf_token()}}"

                },
                maxfilesize: 1000000
            });
        });


    </script>
@endsection