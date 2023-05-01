@extends('layouts.adminlayout')
@section('main')


<section class="services">

    <div class="d-flex justify-content-between align-items-center">
        <h2 style="margin-left: 30%; margin-top:20px; margin-bottom:20px;">All Services</h2>

    </div>

    </div>
    <div class="container">

        <div class="row">

            @foreach($allservices as $service)
            <div class="col-md-6 col-lg-3 d-flex align-items-stretch" data-aos="fade-up" data-aos-delay="100">
                <div class="icon-box icon-box-cyan">
                    <div class="icon"><i class="bx bx-file"></i></div>
                    <h4 class="title"><a href="#">{{$service->Name}}</a></h4>
                    <p class="description"> {{$service->Desc}}</p>
                    <form action="{{route('remove-service',$service->id)}}" method="post">
                        {{csrf_field()}}
                        {{method_field('DELETE')}}
                        <button class="btn btn-danger" style="margin-top: 10px;" type="submit">Remove Service</button>
                    </form>
                </div>
            </div>
            @endforeach

            @if($allservices == null)
            <div class="col-md-6 col-lg-3 d-flex align-items-stretch" data-aos="fade-up" data-aos-delay="100">


                <button class="btn btn-success">No Services </button>

            </div>
        </div>
        @endif
    </div>

    </div>
</section>
