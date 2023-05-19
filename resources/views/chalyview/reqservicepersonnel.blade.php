@extends('layouts.publiclayout')
@section('main')


<section class="services">

    <div class="d-flex justify-content-between align-items-center">
        <h2 style="margin-left: 30%; margin-top:20px; margin-bottom:20px;">{{$service->Name}} Personnel</h2>

    </div>

    </div>
    <div class="container">

        <div class="row">

            @foreach($serviceworkers as $worker)
            <div class="col-md-6 col-lg-3 d-flex align-items-stretch" data-aos="fade-up" data-aos-delay="100">
                <div class="icon-box icon-box-cyan">

                <div class="col-lg-6 video-box">
                <img src="{{ asset('/app/public/'.$worker->image) }}" class="img-fluid" alt="" style="border-radius:50%;margin-left:40px;height:80px;width: 80px;">
                <!-- {{ asset('audio/crow.ogg') }} -->
                <!-- <a href="https://www.youtube.com/watch?v=jDDaplaOz7Q" class="venobox play-btn mb-4" data-vbtype="video" data-autoplay="true"></a> -->
            </div>
                    <p class="description"><a href="#">Name :{{$worker->name}} </a></p>

                    <p class="description">Contact: {{$worker->phone}}</p>
                    <p class="description">Email: {{$worker->email}}</p>
                    <p> <a href="{{route('worker-info' ,$worker->id)}}">View more about worker</a></p>
                    <a href="{{route('req-service-page' ,[$service->id,$worker->id])}}">

                        <button class="btn btn-primary" style="margin-top: 10px;">Request Service</button>
                    </a>
                </div>
            </div>
            @endforeach

            @if($serviceworkers == null)
            <div class="col-md-6 col-lg-3 d-flex align-items-stretch" data-aos="fade-up" data-aos-delay="100">


                <button class="btn btn-success">No Request Yet </button>

            </div>
        </div>
        @endif
    </div>

    </div>
</section>
