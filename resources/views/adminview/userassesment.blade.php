@extends('layouts.adminlayout')
@section('main')



<section class="services">

    <div class="d-flex justify-content-between align-items-center">
        <h2 style="margin-left: 30%; margin-top:20px; margin-bottom:20px;">All Services</h2>

    </div>

    </div>
    <div class="container">

        <div class="row">
            @foreach($userAssesments as $user)
            <div class="col-md-6 col-lg-3 d-flex align-items-stretch" data-aos="fade-up" data-aos-delay="100">
                <div class="icon-box icon-box-cyan">
                    <!-- <div class="icon"><i class="bx bx-file"></i></div> -->
                    <h4 class="title"><a href="#">User ID: {{$user->id}}</a></h4>
                    <!-- <h4 class="title"><a href="#">Phone of Solicitant:</a></h4> -->


                    <p class="description">
                    <h4>Assesment</h4>{{$user->assesment}}</p>
                    <a class="link" href="#">

                        <button class="btn btn-primary">View User Info</button>
                    </a>
                </div>

            </div>
            @endforeach
        </div>

    </div>
</section>
