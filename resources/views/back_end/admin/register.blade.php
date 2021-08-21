<!DOCTYPE html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8"/>
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no"/>
    <title>Client Registeration Form</title>
    <!--favicon-->
    <link rel="icon" href="{{asset('assets/back_end/images/favicon-32x32.png')}}" type="image/png"/>
    <!-- Vector CSS -->
    <link href="{{asset('assets/back_end/plugins/vectormap/jquery-jvectormap-2.0.2.css')}}" rel="stylesheet"/>
    <!--plugins-->
    <link href="{{asset('assets/back_end/plugins/simplebar/css/simplebar.css')}}" rel="stylesheet"/>
    <link href="{{asset('assets/back_end/plugins/perfect-scrollbar/css/perfect-scrollbar.css')}}" rel="stylesheet"/>
    <link href="{{asset('assets/back_end/plugins/metismenu/css/metisMenu.min.css')}}" rel="stylesheet"/>
    <!-- loader-->
    <link href="{{asset('assets/back_end/css/pace.min.css')}}" rel="stylesheet"/>
    <script src="{{asset('assets/back_end/js/pace.min.js')}}"></script>
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="{{asset('assets/back_end/css/bootstrap.min.css')}}"/>
    <!-- Icons CSS -->
    <link rel="stylesheet" href="{{asset('assets/back_end/css/icons.css')}}"/>
    <!-- App CSS -->
    <link rel="stylesheet" href="{{asset('assets/back_end/css/app.css')}}"/>
    <link rel="stylesheet" href="{{asset('assets/back_end/css/dark-sidebar.css')}}"/>
    <link rel="stylesheet" href="{{asset('assets/back_end/css/dark-theme.css')}}"/>
</head>

<body>
<!-- wrapper -->
<div class="wrapper">
    <!--page-wrapper-->
    <div class="page-wrapper">
        <!--page-content-wrapper-->
        <div class="page-content-wrapper">
            <div class="page-content">
                <div class="row">
                    <div class="col-12 col-lg-6">
                        <div class="card border-lg-top-danger">
                            <div class="card-header">
                                @if(session('error'))
                                    <h3 class="text-danger">{{session('error')}}</h3>
                                @endif
                                @if($errors->any())
                                    <ul class="text-danger">
                                        @foreach($errors->all() as $error)
                                            <li>{{$error}}</li>
                                        @endforeach
                                    </ul>
                                @endif
                            </div>
                            <div class="card-body p-5">
                                <div class="card-title d-flex align-items-center">
                                    <div><i class="bx bxs-user mr-1 font-24 text-danger"></i>
                                    </div>
                                    <h4 class="mb-0 text-danger">Confirm Your Order</h4>
                                </div>
                                <hr>
                                <form action="{{route('admin.login')}}" method="post">
                                    @csrf
                                    <div class="form-body">
                                        <div class="form-row">
                                            <div class="form-group col-md-6">
                                                <label>Client Name</label>
                                                <div class="input-group">
                                                    <div class="input-group-prepend"><span
                                                                class="input-group-text bg-transparent"><i
                                                                    class="bx bx-user"></i></span>
                                                    </div>
                                                    <input type="text" class="form-control border-left-0" name="name"
                                                           placeholder="Client Full name" value="{{old('name')}}">
                                                    @error('name')
                                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                                    @enderror

                                                </div>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label>Email</label>
                                            <div class="input-group">
                                                <div class="input-group-prepend"><span
                                                            class="input-group-text bg-transparent"><i
                                                                class="bx bx-phone"></i></span>
                                                </div>
                                                <input type="email" class="form-control border-left-0"
                                                       placeholder="Client email address" name="email"
                                                       value="{{old('email')}}">
                                                @error('email')
                                                <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                                @enderror
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label>Password</label>
                                            <div class="input-group">
                                                <div class="input-group-prepend"><span
                                                            class="input-group-text bg-transparent"><i
                                                                class="bx bx-star"></i></span>
                                                </div>
                                                <input type="password" class="form-control border-left-0"
                                                       placeholder="Enter your password" name="password">
                                                @error('password')
                                                <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                                @enderror
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label>Purchase Code</label>
                                            <div class="input-group">
                                                <div class="input-group-prepend"><span
                                                            class="input-group-text bg-transparent"><i
                                                                class="bx bx-purchase-tag"></i></span>
                                                </div>
                                                <input type="text" class="form-control border-left-0"
                                                       placeholder="Purchase Code"
                                                       name="purchase_code" value="{{old('purchase_code')}}">
                                                @error('purchase_code')
                                                <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                                @enderror
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label>Invoice #</label>
                                            <div class="input-group">
                                                <div class="input-group-prepend"><span
                                                            class="input-group-text bg-transparent"><i
                                                                class="bx bx-money"></i></span>
                                                </div>
                                                <input type="text" class="form-control border-left-0"
                                                       placeholder="Invoice #"
                                                       name="invoice_number" value="{{old('invoice_number')}}">

                                            </div>
                                            @error('invoice_number')
                                            <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                            @enderror
                                        </div>
                                        <button type="submit" class="btn btn-danger px-5">Register</button>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!--end page-content-wrapper-->
    </div>
    <!--end page-wrapper-->
    <!--start overlay-->
    <div class="overlay toggle-btn-mobile"></div>
    <!--end overlay-->
    <!--Start Back To Top Button--> <a href="javaScript:;" class="back-to-top"><i class='bx bxs-up-arrow-alt'></i></a>
    <!--End Back To Top Button-->
    <!--footer -->
    <div class="footer">
        <p class="mb-0">Syndash @2020 | Developed By : <a href="https://themeforest.net/user/codervent" target="_blank">codervent</a>
        </p>
    </div>
    <!-- end footer -->
</div>
<!-- end wrapper -->
<!--start switcher-->

<!--end switcher-->
<!-- JavaScript -->
<!-- jQuery first, then Popper.js, then Bootstrap JS -->
<script src="{{asset('assets/back_end/js/jquery.min.js')}}"></script>
<script src="{{asset('assets/back_end/js/popper.min.js')}}"></script>
<script src="{{asset('assets/back_end/js/bootstrap.min.js')}}"></script>

<script src="{{asset('assets/back_end/plugins/fancy-file-uploader/jquery.ui.widget.js')}}"></script>
<script src="{{asset('assets/back_end/plugins/fancy-file-uploader/jquery.fileupload.js')}}"></script>
<script src="{{asset('assets/back_end/plugins/fancy-file-uploader/jquery.iframe-transport.js')}}"></script>
<script src="{{asset('assets/back_end/plugins/fancy-file-uploader/jquery.fancy-fileupload.js')}}"></script>

<!--plugins-->
<script src="{{asset('assets/back_end/plugins/simplebar/js/simplebar.min.js')}}"></script>
<script src="{{asset('assets/back_end/plugins/metismenu/js/metisMenu.min.js')}}"></script>
<script src="{{asset('assets/back_end/plugins/perfect-scrollbar/js/perfect-scrollbar.js')}}"></script>
<!-- Vector map JavaScript -->
<script src="{{asset('assets/back_end/plugins/vectormap/jquery-jvectormap-2.0.2.min.js')}}"></script>
<script src="{{asset('assets/back_end/plugins/vectormap/jquery-jvectormap-world-mill-en.js')}}"></script>
<script src="{{asset('assets/back_end/plugins/vectormap/jquery-jvectormap-in-mill.js')}}"></script>
<script src="{{asset('assets/back_end/plugins/vectormap/jquery-jvectormap-us-aea-en.js')}}"></script>
<script src="{{asset('assets/back_end/plugins/vectormap/jquery-jvectormap-uk-mill-en.js')}}"></script>
<script src="{{asset('assets/back_end/plugins/vectormap/jquery-jvectormap-au-mill.js')}}"></script>
<script src="{{asset('assets/back_end/plugins/apexcharts-bundle/js/apexcharts.min.js')}}"></script>
<script src="{{asset('assets/back_end/js/index.js')}}"></script>


<!-- App JS -->
<script src="{{asset('assets/back_end/js/app.js')}}"></script>
<script>
    new PerfectScrollbar('.dashboard-social-list');
    new PerfectScrollbar('.dashboard-top-countries');
</script>
@yield('scripts')
</body>

</html>

