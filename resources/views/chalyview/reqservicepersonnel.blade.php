@extends('layouts.publiclayout')
@section('main')


<section class="services">

    <div class="d-flex justify-content-between align-items-center">
        <h2 style="margin-left: 30%; margin-top:20px; margin-bottom:20px;">{{$service->Name}} Personnel</h2>
        1
    </div>

    </div>
    <div class="container">

        <div class="row">

            @foreach($serviceworkers as $worker)
            <div class="col-md-6 col-lg-3 d-flex align-items-stretch" data-aos="fade-up" data-aos-delay="100">
                <div class="icon-box icon-box-cyan">
                    <div class="icon"><i class="bx bx-file"></i></div>
                    <h4 class="title"><a href="#">{{$worker->name}}</a></h4>
                    <p class="description"> {{$worker->phone}}</p>
                    <p class="description"> {{$worker->email}}</p>
                    <a href="{{route('req-service-page' ,[$service->id,$worker->id])}}">
                        <button class="btn btn-primary" style="margin-top: 10px;">Request Service</button>
                    </a>
                </div>
            </div>
            @endforeach


        </div>

    </div>
</section>
