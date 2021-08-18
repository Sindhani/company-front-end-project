@extends('back_end.layouts.partials.master')
@section('contents')
    <div class="row">
        <div class="col-12 col-lg-12">
            <div class="card radius-15">
                <div class="card-body">
                    <div class="card-title">
                        <h4 class="mb-0">Packages</h4>
                    </div>
                    <hr>
                    <div class="table-responsive">
                        <table class="table table-bordered">
                            <thead>
                            <tr>
                                <th scope="col">#</th>
                                <th scope="col">Name</th>
                                <th scope="col">Price</th>
                                <th scope="col">Duration</th>
                                <th scope="col">Action</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($packages as $package)
                            <tr>
                                <th scope="row">{{$loop->iteration}}</th>
                                <td>{{$package->title}}</td>
                                <td>{{$package->price}}</td>
                                <td>{{$package->duration}}</td>
                                <td><a href="{{route('packages.edit', $package->id)}}"><i class="bx bx-edit"></i> </a></td>
                            </tr>
@endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>

        </div>
    </div>
@endsection