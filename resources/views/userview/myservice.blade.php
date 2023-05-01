@extends('layouts.userlayout')
@section('main')


<section class="services">

    <div class="d-flex justify-content-between align-items-center">
        <h2 style="margin-left: 30%; margin-top:20px; margin-bottom:20px;">My Requested Services</h2>

    </div>

    </div>
    <div class="container">

        <div class="row ">
            <h4>Pending Serivce</h4>
            @foreach($awaitedserviceInfos as $serviceInfo)
            <div class="col-md-6 col-lg-3 d-flex align-items-stretch" data-aos="fade-up" data-aos-delay="100">
                <div class="icon-box icon-box-cyan">
                    <!-- <div class="icon"><i class="bx bx-file"></i></div> -->
                    <h4 class="title"><a href="#">Name of ServicePerson: {{$serviceInfo->name}}</a></h4>
                    <h4 class="title"><a href="#">Contact of ServicePerson: {{$serviceInfo->phone}}</a></h4>
                    <!-- <h4 class="title"><a href="#">Service Requested: {{$serviceInfo->service_id}}</a></h4> -->
                    <p class="description">
                        <a href="{{route('start-service',$serviceInfo->id)}}">
                            <button class="btn btn-primary">Start Service</button>
                        </a>
                </div>
            </div>
            @endforeach
            @if($awaitedserviceInfos == null)
            <div class="col-md-6 col-lg-3 d-flex align-items-stretch" data-aos="fade-up" data-aos-delay="100">


                <button class="btn btn-secondary">No Service Requested</button>

            </div>
        </div>
        @endif
    </div>
    </div>

    <div class="container">

        <div class="row ">
            <h4>Completed Serivce</h4>
            @foreach($completedserviceInfos as $serviceInfo)
            <div class="col-md-6 col-lg-3 d-flex align-items-stretch" data-aos="fade-up" data-aos-delay="100">
                <div class="icon-box icon-box-cyan">
                    <!-- <div class="icon"><i class="bx bx-file"></i></div> -->
                    <h4 class="title"><a href="#">Name of ServicePerson: {{$serviceInfo->name}}</a></h4>
                    <h4 class="title"><a href="#">Contact of ServicePerson: {{$serviceInfo->phone}}</a></h4>
                    <!-- <h4 class="title"><a href="#">Service Requested: {{$serviceInfo->service_id}}</a></h4> -->
                    <p class="description">

                        <button class="btn btn-success">Service Ended</button>

                </div>
            </div>
            @endforeach
            @if($completedserviceInfos == null)
            <div class="col-md-6 col-lg-3 d-flex align-items-stretch" data-aos="fade-up" data-aos-delay="100">


                <button class="btn btn-success">No Service Completed</button>

            </div>
        </div>
        @endif
    </div>
    </div>
</section>
