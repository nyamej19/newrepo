@extends('layouts.servicelayout')
@section('main')


<section class="services">

    <div class="d-flex justify-content-between align-items-center">
        <h2 style="margin-left: 30%; margin-top:20px; margin-bottom:20px;">All Services</h2>

    </div>
    <div class="col-md-6 col-lg-3 d-flex align-items-stretch" data-aos="fade-up" data-aos-delay="100">

@foreach($myservices as $service)
<button class="btn btn-secondary" style="margin-left: 20%;">You Are Signed Up As A {{$service->Name}}</button>
@endforeach
</div>
    </div>
    <div class="container">

        <div class="row">
            @foreach($myreqs as $req)
            <div class="col-md-6 col-lg-3 d-flex align-items-stretch" data-aos="fade-up" data-aos-delay="100">
                <div class="icon-box icon-box-cyan">
                    <!-- <div class="icon"><i class="bx bx-file"></i></div> -->
                    <h4 class="title"><a href="#">Name of Solicitant: {{$req->user_name}}</a></h4>
                    <h4 class="title"><a href="#">Phone of Solicitant: {{$req->phone}}</a></h4>
                    <h4 class="title"><a href="#">Time Of Service: {{$req->time_of_service}}</a></h4>
                    <h4 class="title"><a href="#">State Of Service: {{$req->service_state}}</a></h4>
                    <h4 class="title"><a href="#">Email:{{$req->email}}</a></h4>

                    <p class="description">
                    <h4>Problem /Issue</h4>{{$req->statement}}</p>

                    @if($req->service_state =='completed')
                    <button class="btn btn-primary">Service Ended</button>
                    @else
                    <a class="link" href="{{route('start-sevice-worker' ,$req->userrequestId)}}">
                        <button class="btn btn-primary">Start Service</button>
                    </a>
                    @endif


                </div>

            </div>
            @endforeach
            @if($myreqs == null)
            <div class="col-md-6 col-lg-3 d-flex align-items-stretch" data-aos="fade-up" data-aos-delay="100">


                <button class="btn btn-success">No Request Yet </button>

            </div>
        </div>
        @endif
    </div>

    </div>
</section>
