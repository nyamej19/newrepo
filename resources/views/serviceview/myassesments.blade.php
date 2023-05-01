@extends('layouts.servicelayout')
@section('main')



<section class="services">

    <div class="d-flex justify-content-between align-items-center">
        <h2 style="margin-left: 30%; margin-top:20px; margin-bottom:20px;">My Assesments</h2>

    </div>

    </div>
    <div class="container">

        <div class="row">
            @foreach($myassesments as $assesment)
            <div class="col-md-6 col-lg-3 d-flex align-items-stretch" data-aos="fade-up" data-aos-delay="100">
                <div class="icon-box icon-box-cyan">
                    <!-- <div class="icon"><i class="bx bx-file"></i></div> -->



                    <p class="description">
                    <h4>Assesment {{$assesment->id}}</h4>{{$assesment->assesment}}</p>
                    <a class="link" href="#">

                        <!-- <button class="btn btn-primary">View User Info</button> -->
                    </a>
                </div>

            </div>
            @endforeach
            @if($myassesments == null)
            <div class="col-md-6 col-lg-3 d-flex align-items-stretch" data-aos="fade-up" data-aos-delay="100">


                <button class="btn btn-success">No Assesment </button>

            </div>
        </div>
        @endif
    </div>

    </div>
</section>
