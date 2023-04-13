@extends('layouts.userlayout')
@section('main')


<section class="services">

    <div class="d-flex justify-content-between align-items-center">
        <h2 style="margin-left: 30%; margin-top:20px; margin-bottom:20px;">All Services</h2>

    </div>

    </div>
    <div class="container">

        <div class="row">
            @foreach($serviceInfos as $serviceInfo)
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



        </div>

    </div>
</section>
