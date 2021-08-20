@extends('back_end.layouts.partials.master')
@section('contents')
    <div class="row">
        <div class="col-12 col-lg-6">
            <div class="card border-lg-top-danger">
                <div class="card-body p-5">
                    <div class="card-title d-flex align-items-center">
                        <div><i class="bx bxs-user mr-1 font-24 text-danger"></i>
                        </div>
                        <h4 class="mb-0 text-danger">Add New Client Details</h4>
                    </div>
                    <hr>
                    <form action="{{route('admin.login')}}" method="post">
                        @csrf
                        <div class="form-body">
                            <div class="form-row">
                                <div class="form-group col-md-6">
                                    <label>Client Name</label>
                                    <div class="input-group">
                                        <div class="input-group-prepend"><span class="input-group-text bg-transparent"><i
                                                        class="bx bx-user"></i></span>
                                        </div>
                                        <input type="text" class="form-control border-left-0" name="name" placeholder="Client Full name">
                                    </div>
                                </div>
                            </div>
                            <div class="form-group">
                                <label>Email</label>
                                <div class="input-group">
                                    <div class="input-group-prepend"><span class="input-group-text bg-transparent"><i
                                                    class="bx bx-phone"></i></span>
                                    </div>
                                    <input type="email" class="form-control border-left-0" placeholder="Client email address" name="email">
                                </div>
                            </div>
                            <div class="form-group">
                                <label>Purchase Code</label>
                                <div class="input-group">
                                    <div class="input-group-prepend"><span class="input-group-text bg-transparent"><i
                                                    class="bx bx-phone"></i></span>
                                    </div>
                                    <input type="text" class="form-control border-left-0" placeholder="Purchase Code" name="purchase_code">
                                </div>
                            </div>
                            <div class="form-group">
                                <label>Invoice #</label>
                                <div class="input-group">
                                    <div class="input-group-prepend"><span class="input-group-text bg-transparent"><i
                                                    class="bx bx-phone"></i></span>
                                    </div>
                                    <input type="text" class="form-control border-left-0" placeholder="Invoice #" name="invoice_number">
                                </div>
                            </div>
                            <button type="submit" class="btn btn-danger px-5">Register</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection