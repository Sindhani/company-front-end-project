@extends('back_end.layouts.partials.master')
@section('contents')
    <div class="row">

        <div class="col-12 col-lg-6">
            <div class="card border-lg-top-danger">
                <div class="card-body p-5">
                    <div class="card-title d-flex align-items-center">
                        <div><i class="bx bxs-user mr-1 font-24 text-danger"></i>
                        </div>
                        <h4 class="mb-0 text-danger">Subscription</h4>
                    </div>
                    <hr>
                    <table class="table table-bordered">
                        <tr><td>Package Name</td><td>{{$package->title}}</td></tr>
                        <tr><td>Package Price</td><td>{{$package->price}}</td></tr>
                        <tr><td>Package Duration</td><td>{{$package->duration}}</td></tr>
                        <tr><td>Package Description</td>
                            <td>
                                @foreach($package->description as $item)
                                    {{$item->description}}<br>
                                    @endforeach

                            </td>
                        </tr>
                    </table>
                    <form action="{{route('subscription.store')}}" method="post">
                        @csrf
                        <input type="hidden" name="willing_to_update" value="true">
                        <input type="hidden" name="package" value="{{Crypt::encryptString($package->id)}}">
                        <div class="form-body">
                            <button type="submit" class="btn btn-danger px-5">Subscribe</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection