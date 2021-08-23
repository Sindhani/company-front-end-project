@extends('back_end.layouts.partials.master')
@section('contents')
    <div class="row">
        <div class="col-12 col-lg-12">

            <div class="container-fluid py-2">
                <span class="font-weight-light text-muted py-3 display-4">Welcome To Your </span><span
                        class="display-4">Single Email Validator</span>

                <br><br>
                <p>Type in any email address to have it quickly validated or use our bulk email validator to
                    validate large lists with our proven anti-greylist technology to reduce unknowns.</p>
            </div>


        </div>
    </div>
    <div class="row">
        <div class="col-xs-12 col-sm-12 col-md-12 col-12 col-lg-12">
            <div class="card radius-15">
                <div class="card-body">
                    <div class="card-title">
                        <h4 class="mb-0">EMAIL ADDRESS</h4>
                    </div>
                    <hr>
                    <form action="{{route('email-validator.store')}}" method="post">
                        @csrf
                        <div class="form-row">
                            <div class="form-group offset-3 col-md-3">
                                <input name="email" class="form-control form-control-lg" type="text"
                                       placeholder="Please enter an email address">
                            </div>
                            <div class="form-group col-md-3">
                                <button class="form-control form-control-lg btn btn-warning btn-lg" type="submit">
                                    Validate
                                </button>
                            </div>
                        </div>
                    </form>
                    @if(isset($error))
                        <h3>Invalid Email Address Syntax</h3>
                    @endif
                    @if(isset($result))

                        <table class="table table-bordered">
                            <tr>
                                <td>Status</td>
                                <td>{!! $result[$email] ? 'Valid' : 'In-valid' !!}</td>
                                <td>Sub-Status</td>
                                <td>{!! !empty($err) ? $err: '' !!}</td>
                                <td>Account</td>
                                <td>{{$account  }}</td>
                            </tr>
                            <tr>
                                <td>Domain</td>
                                <td>{{$domain}}</td>
                                <td>Disposable</td>
                                <td></td>
                                <td>Toxic</td>
                                <td></td>
                            </tr>
                            <tr>
                                <td>First Name</td>
                                <td>@php echo isset($result['first_name']) ? $result['Not Found']: 'Not Found'; @endphp</td>
                                <td>Last Name</td>
                                <td>@php echo isset($result['last_name']) ? $result['last_name']: 'Not Found'; @endphp</td>
                                <td>Gender</td>
                                <td>@php echo isset($result['gender']) ? $result['gender']: 'Unknown'; @endphp</td>
                            </tr>

                        </table>


                    @endif

                </div>
            </div>
        </div>
    </div>

@endsection