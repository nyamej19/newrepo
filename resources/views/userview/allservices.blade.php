@extends('layouts.userlayout')
@section('main')


<section class="services">

    <div class="d-flex justify-content-between align-items-center">
        <h2 style="margin-left: 30%; margin-top:20px; margin-bottom:20px;">Our Services</h2>

    </div>

    </div>
    <div class="container">

        <div class="row">
            @foreach($userservices as $service)
            <div class="col-md-6 col-lg-3 d-flex align-items-stretch" data-aos="fade-up">
                <div class="icon-box icon-box-pink">
                    <div class="icon"><i class="bx bxl-dribbble"></i></div>
                    <h4 class="title"><a href="">{{$service->Name}}</a></h4>
                    <p class="description">{{$service->Desc}}</p>
                    <a href="{{route('req-service-person',$service->id)}}">
                        <button  class="btn btn-primary">Request Service</button>
                    </a>


                </div>
            </div>
            @endforeach
        </div>

    </div>
</section>
