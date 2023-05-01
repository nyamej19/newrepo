@extends('layouts.adminlayout')
@section('main')


<section class="services">

    <div class="d-flex justify-content-between align-items-center">
        <h2 style="margin-left: 30%; margin-top:20px; margin-bottom:20px;">All Services</h2>

    </div>

    </div>
    <div class="container">

        <div class="row">
            @foreach($allMessages as $allMessage)
            <div class="col-md-6 col-lg-3 d-flex align-items-stretch" data-aos="fade-up" data-aos-delay="100">
                <div class="icon-box icon-box-cyan">
                    <!-- <div class="icon"><i class="bx bx-file"></i></div> -->
                    <h4 class="title"><a href="#">Name: {{$allMessage->name}}</a></h4>
                    <h4 class="title"><a href="#">Email: {{$allMessage->email}}</a></h4>
                    <h4 class="title"><a href="#">Subject: {{$allMessage->subject}}</a></h4>
                    <p class="description">
                    <h4>Message:</h4> {{$allMessage->message}}</p>

                </div>
            </div>
            @endforeach

            @if($allMessages == null)
            <div class="col-md-6 col-lg-3 d-flex align-items-stretch" data-aos="fade-up" data-aos-delay="100">


                <button class="btn btn-success">No Messages Yet </button>

            </div>
        </div>
        @endif

    </div>

    </div>
</section>
