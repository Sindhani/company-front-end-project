@extends('back_end.layouts.partials.master')
@section('contents')
    <link href="{{asset('assets/back_end/plugins/fancy-file-uploader/fancy_fileupload.css')}}" rel="stylesheet">
    <link rel="stylesheet" href="{{asset('assets/back_end/plugins/notifications/css/lobibox.min.css')}}">
    <div class="row">
        <div class="col-12 col-lg-12">

            <div class="container-fluid py-2">
                <span class="font-weight-light text-muted py-3 display-4">Let's Get Started By .</span>
                <span class="display-4">Uploading Your File Here</span>

                <br><br>
                <p>Select a CSV, TXT, XLS, or XLSX file to upload. Then click on "Validate File." You will be notified
                    via email once your entire list has been validated. You can always check the <a
                            href="{{route('email-validator.create',['type'=>'download'])}}"><b>"Email Validation -
                            Download Your Result"</b></a> page to get the current status.</p>
            </div>

        </div>
    </div>
    <div class="card radius-15">
        <div class="card-body">
            <div class="card-title">
                <h4 class="mb-0">Fancy File Upload</h4>
            </div>
            <hr>
            <input id="fancy-file-upload" type="file" name="emails" accept=".csv, .txt"
                   class="ff_fileupload_hidden">

        </div>
    </div>
    </div>


@endsection
@section('scripts')
    <script src="{{asset('assets/back_end/plugins/notifications/js/lobibox.min.js')}}"></script>
    <script src="{{asset('assets/back_end/plugins/notifications/js/notifications.min.js')}}"></script>
    <script>
        $(document).ready(function () {
            $('#fancy-file-upload').FancyFileUpload({
                url: "{{route('import.file')}}",
                params: {
                    _token: "{{csrf_token()}}"

                },
                continueupload : function(e, data) {
            var ts = Math.round(new Date().getTime() / 1000);

            // Alternatively, just call data.abort() or return false here to terminate the upload but leave the UI elements alone.
            
        },
                uploadcompleted : function(e, data) {
                    if(data.result.success){
                        Lobibox.notify('success', {
                            pauseDelayOnHover: true,
                            size: 'mini',
                            rounded: true,
                            icon: 'bx bx-check-circle',
                            delayIndicator: false,
                            continueDelayOnInactiveTab: false,
                            position: 'top right',
                            msg: 'Your file is uploaded successfully, you can check the progress in <a class="text-danger" href="{{route('email-validator.create', ['type' => 'download'])}}">Here</a>'
                        });
                    }
                    data.ff_info.RemoveFile();
                },
                maxfilesize: 1000000
            });
        });


    </script>
@endsection