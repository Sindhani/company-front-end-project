@extends('back_end.layouts.partials.master')
@section('contents')
    @can('manage-posts')
    <div class="row">
        <div class="col-12 col-lg-4">
            <div class="card radius-15">
                <div class="card-body">
                    <div class="d-flex mb-2">
                        <div>
                            <p class="mb-0 font-weight-bold">Sessions</p>
                            <h2 class="mb-0">{{$sessions}}</h2>
                        </div>
                        <div class="ml-auto align-self-end">
                            <p class="mb-0 font-14 text-primary"><i class='bx bxs-up-arrow-circle'></i> <span>1.01% 31 days ago</span>
                            </p>
                        </div>
                    </div>
                    <div id="chart1"></div>
                </div>
            </div>
        </div>
        <div class="col-12 col-lg-4">
            <div class="card radius-15">
                <div class="card-body">
                    <div class="d-flex mb-2">
                        <div>
                            <p class="mb-0 font-weight-bold">Visitors</p>
                            <h2 class="mb-0">{{$visitors->count()}}</h2>
                        </div>
                        <div class="ml-auto align-self-end">
                            <p class="mb-0 font-14 text-success"><i class='bx bxs-up-arrow-circle'></i> <span>0.49% 31 days ago</span>
                            </p>
                        </div>
                    </div>
                    <div id="chart2"></div>
                </div>
            </div>
        </div>
        <div class="col-12 col-lg-4">
            <div class="card radius-15">
                <div class="card-body">
                    <div class="d-flex mb-2">
                        <div>
                            <p class="mb-0 font-weight-bold">Page Views</p>
                            <h2 class="mb-0">2,346</h2>
                        </div>
                        <div class="ml-auto align-self-end">
                            <p class="mb-0 font-14 text-danger"><i class='bx bxs-down-arrow-circle'></i> <span>130.68% 31 days ago</span>
                            </p>
                        </div>
                    </div>
                    <div id="chart3"></div>
                </div>
            </div>
        </div>
    </div>
    <!--end row-->
    <div class="row">
        <div class="col-12 col-lg-4">
            <div class="card-deck flex-column flex-lg-row">
                <div class="card radius-15">
                    <div class="card-body">
                        <div class="card-title">
                            <h5 class="mb-0">Browsers Statistics </h5>
                        </div>
                        <hr/>
                        @foreach($browsers as $browser)
                            <div class="media align-items-center">
                                <div>
                                    <img src="{{asset('assets/back_end/images/icons/').strtolower('/'.$browser->browser.'.png')}}" width="35" height="35" alt=""/>
                                </div>
                                <div class="media-body ml-3">

                                    <h6 class="mb-0">{{$browser->total}}</h6>
                                    <p class="mb-0">{{$browser->browser}}</p>
                                </div>
                                <p class="mb-0">
                                    @if(!empty($browser->total))

                                        {{($browser->total/$browsers->sum('total'))*100}}
                                    @endif
                                </p>

                            </div>
                            <hr/>
                        @endforeach


                    </div>
                </div>

            </div>
        </div>

    </div>
    @endcan

    <div class="row">
        <div class="col-12 col-lg-4">
            <div class="card radius-15">
                <div class="card-body">
                    <div class="d-flex mb-2">
                        <div>
                            <p class="mb-0 font-weight-bold">Sessions</p>
                            <h2 class="mb-0">{{$sessions}}</h2>
                        </div>
                        <div class="ml-auto align-self-end">
                            <p class="mb-0 font-14 text-primary"><i class='bx bxs-up-arrow-circle'></i> <span>1.01% 31 days ago</span>
                            </p>
                        </div>
                    </div>
                    <div id="chart1"></div>
                </div>
            </div>
        </div>
        <div class="col-12 col-lg-4">
            <div class="card radius-15">
                <div class="card-body">
                    <div class="d-flex mb-2">
                        <div>
                            <p class="mb-0 font-weight-bold">Visitors</p>
                            <h2 class="mb-0">{{$visitors->count()}}</h2>
                        </div>
                        <div class="ml-auto align-self-end">
                            <p class="mb-0 font-14 text-success"><i class='bx bxs-up-arrow-circle'></i> <span>0.49% 31 days ago</span>
                            </p>
                        </div>
                    </div>
                    <div id="chart2"></div>
                </div>
            </div>
        </div>
        <div class="col-12 col-lg-4">
            <div class="card radius-15">
                <div class="card-body">
                    <div class="d-flex mb-2">
                        <div>
                            <p class="mb-0 font-weight-bold">Page Views</p>
                            <h2 class="mb-0">2,346</h2>
                        </div>
                        <div class="ml-auto align-self-end">
                            <p class="mb-0 font-14 text-danger"><i class='bx bxs-down-arrow-circle'></i> <span>130.68% 31 days ago</span>
                            </p>
                        </div>
                    </div>
                    <div id="chart3"></div>
                </div>
            </div>
        </div>
    </div>
    <!--end row-->
    <div class="row">
        <div class="col-12 col-lg-4">
            <div class="card-deck flex-column flex-lg-row">
                <div class="card radius-15">
                    <div class="card-body">
                        <div class="card-title">
                            <h5 class="mb-0">Browsers Statistics </h5>
                        </div>
                        <hr/>
                        @foreach($browsers as $browser)
                            <div class="media align-items-center">
                                <div>
                                    <img src="{{asset('assets/back_end/images/icons/').strtolower('/'.$browser->browser.'.png')}}" width="35" height="35" alt=""/>
                                </div>
                                <div class="media-body ml-3">

                                    <h6 class="mb-0">{{$browser->total}}</h6>
                                    <p class="mb-0">{{$browser->browser}}</p>
                                </div>
                                <p class="mb-0">
                                    @if(!empty($browser->total))

                                        {{($browser->total/$browsers->sum('total'))*100 . " %"}}
                                    @endif
                                </p>

                            </div>
                            <hr/>
                        @endforeach


                    </div>
                </div>

            </div>
        </div>

    </div>


@endsection