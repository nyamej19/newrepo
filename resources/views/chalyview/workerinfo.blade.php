@extends('layouts.publiclayout')
@section('main')



<section class="services">

    <div class="d-flex justify-content-between align-items-center">
        <h2 style="margin-left: 30%; margin-top:20px; margin-bottom:20px;">Worker Assesments</h2>

    </div>

    </div>
    <div class="container">

        <div class="row">
            @foreach($workerInfos as $assesment)
            <div class="col-md-6 col-lg-3 d-flex align-items-stretch" data-aos="fade-up" data-aos-delay="100">
                <div class="icon-box icon-box-cyan">
                    <!-- <div class="icon"><i class="bx bx-file"></i></div> -->



                    <p class="description">
                    <h4>Assesment {{$assesment->id}}</h4>{{$assesment->assesment}}</p>
                    <a class="link" href="{{route('contact-reviewer' ,$assesment->user_id)}}">

                        <button class="btn btn-primary">Contact the reviewer</button>
                    </a>
                </div>

            </div>
            @endforeach
            @if($workerInfos == null)
            <div class="col-md-6 col-lg-3 d-flex align-items-stretch" data-aos="fade-up" data-aos-delay="100">


                <button class="btn btn-success">No Assesment </button>

            </div>
        </div>
        @endif
    </div>

    </div>
</section>
