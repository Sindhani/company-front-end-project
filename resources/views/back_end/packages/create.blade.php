@extends('back_end.layouts.partials.master')
@section('contents')
    <div class="row">
        <div class="col-12 col-lg-6">
            <div class="card border-lg-top-danger">
                <div class="card-body p-5">
                    <div class="card-title d-flex align-items-center">
                        <div><i class="bx bxs-user mr-1 font-24 text-danger"></i>
                        </div>
                        <h4 class="mb-0 text-danger">Add New Package Details</h4>
                    </div>
                    <hr>
                    <form action="{{route('packages.store')}}" method="post">
                        @csrf
                        <div class="form-body">
                            <div class="form-row">
                                <div class="form-group col-md-6">
                                    <label>Package Name</label>
                                    <div class="input-group">
                                        <div class="input-group-prepend"><span class="input-group-text bg-transparent"><i
                                                        class="bx bx-user"></i></span>
                                        </div>
                                        <input type="text" class="form-control border-left-0" name="title" placeholder="Package Name" required id="name" autocomplete="name" autofocus
                                        value="{{old('title')}}">
                                    </div>
                                </div>
                                <div class="form-group col-md-6">
                                    <label>Package Price</label>
                                    <div class="input-group">
                                        <div class="input-group-prepend"><span class="input-group-text bg-transparent"><i
                                                        class="bx bx-user"></i></span>
                                        </div>
                                        <input type="number" class="form-control border-left-0" placeholder="Price" name="price" id="price" required autocomplete="price"
                                               value="{{old('price')}}">
                                    </div>
                                </div>
                            </div>
                            <div class="form-group">
                                <label>Duration</label>
                                @error('duration')
                                <span class="text-danger">{{$message}}</span>
                                @enderror
                                <div class="input-group">
                                    <div class="input-group-prepend"><span class="input-group-text bg-transparent"><i
                                                    class="bx bx-phone"></i></span>
                                    </div>
                                    <input type="text" class="form-control border-left-0" placeholder="Monthly, Yearly" name="duration" required id="duration" autocomplete="duration"
                                           value="{{old('duration')}}">
                                </div>
                            </div>
                            <div class="form-group">

                                <label>Package Description</label>
                                @error('description')
                                <span class="text-danger">{{$message}}</span>
                                @enderror
                                <div class="input-group">
                                    <div class="input-group-prepend"><span class="input-group-text bg-transparent"><i
                                                    class="bx bx-phone"></i></span>
                                    </div>
                                    <input type="text" class="form-control border-left-0" placeholder="Product Recommendation..." name="description[]" required>
                                </div>
                                <div class="input-group mt-2">
                                    <div class="input-group-prepend"><span class="input-group-text bg-transparent"><i
                                                    class="bx bx-phone"></i></span>
                                    </div>
                                    <input type="text" class="form-control border-left-0" placeholder="Product Recommendation..." name="description[]" required>
                                </div>
                                <div class="input-group mt-2">
                                    <div class="input-group-prepend"><span class="input-group-text bg-transparent"><i
                                                    class="bx bx-phone"></i></span>
                                    </div>
                                    <input type="text" class="form-control border-left-0" placeholder="Product Recommendation..." name="description[]" required>
                                </div>
                                <div class="input-group mt-2">
                                    <div class="input-group-prepend"><span class="input-group-text bg-transparent"><i
                                                    class="bx bx-phone"></i></span>
                                    </div>
                                    <input type="text" class="form-control border-left-0" placeholder="Product Recommendation..." name="description[]" required>
                                </div>
                                <div class="input-group mt-2">
                                    <div class="input-group-prepend"><span class="input-group-text bg-transparent"><i
                                                    class="bx bx-phone"></i></span>
                                    </div>
                                    <input type="text" class="form-control border-left-0" placeholder="Product Recommendation..." name="description[]" required>
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