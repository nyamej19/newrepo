@extends('layouts.publiclayout')
@section('main')


<section class="services">

    <div class="d-flex justify-content-between align-items-center">

        <h2 style="margin-left: 40%; margin-top:5%;margin-bottom:20px; text-decoration:underline">All Services</h2>

    </div>
    <form action="{{ route('search') }}" method="GET">

        <div class="" style=" margin-bottom: 8px; display:flex;">

            <input type="text" style="width: 75%;margin-left: 10%;border-radius:10px;height:40px" placeholder="Search service..." name="service">
            <button class="btn btn-primary" type="submit" style="margin-left: 5px;">Search</button>

        </div>

    </form>

    <div class="container">

        <div class="row">

            @foreach($services as $service)
            <div class="col-md-6 col-lg-3 d-flex align-items-stretch" data-aos="fade-up" data-aos-delay="100">
                <div class="icon-box icon-box-cyan">
                    <div class="icon"><i class="bx bx-file"></i></div>
                    <h4 class="title"><a href="#">{{$service->Name}}</a></h4>
                    <p class="description"> {{$service->Desc}}</p>
                    <a href="{{route('req-service-person' ,$service->id)}}">
                        <button class="btn btn-primary" style="margin-top: 10px;">Request Service</button>
                    </a>
                </div>
            </div>
            @endforeach

            @if($services == null)
            <div class="col-md-6 col-lg-3 d-flex align-items-stretch" data-aos="fade-up" data-aos-delay="100">


                <button class="btn btn-success">No Services </button>

            </div>
        </div>
        @endif
       

    </div>

    </div>
</section>
