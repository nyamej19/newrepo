@extends('layouts.publiclayout')
@section('main')



<section class="services">

    <div class="d-flex justify-content-between align-items-center">
        <h2 style="margin-left: 30%; margin-top:20px; margin-bottom:20px;">Contact Reviewer</h2>

    </div>

    </div>
    <div class="container">

        <div class="row">

            <div class="col-md-6 col-lg-3 d-flex align-items-stretch" data-aos="fade-up" data-aos-delay="100">
                <div class="icon-box icon-box-cyan">

                    <div class="icon"><img src="{{ asset('/app/public/'.$userInfo->image) }}" style="width: 50px; height:50px"></div>
                    <p class="description"><a href="#">Name :{{$userInfo->name}} </a></p>

                    <p class="description">Contact: {{$userInfo->phone}}</p>
                    <p class="description">Email: {{$userInfo->email}}</p>


                </div>
            </div>

            @if($userInfo == null)
            <div class="col-md-6 col-lg-3 d-flex align-items-stretch" data-aos="fade-up" data-aos-delay="100">


                <button class="btn btn-success">No Contact Found</button>

            </div>
        </div>
        @endif
    </div>

    </div>
</section>
