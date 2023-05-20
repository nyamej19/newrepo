@extends('layouts.publiclayout')
@section('main')


<style>
    .slider {
 margin-top:20px ;
 overflow: hidden;
 width: 100vw;
 height: 100vh;
 position: relative;
}

.slider .slide {
 position: absolute;
 top: 0;
 left: 0;
 width: 100%;
 height: 100%;
 background-size: cover;
 background-position: center;
 animation: slider 12.5s infinite;
}

.slider .slide:nth-child(1) {
   background-image: url('https://img.freepik.com/premium-photo/cleaning-kit-detergents-napkins-sponges-gloves-blue-background-concept-home-cleaning-cleaning-company-services_721474-102.jpg?w=2000');
   animation-delay: 0s;
}

.slider .slide:nth-child(2) {
   background-image: url('https://thumbs.dreamstime.com/b/mowing-cutting-long-grass-lawn-mower-gardening-concept-background-182546301.jpg');
   animation-delay: -2.5s;
}

.slider .slide:nth-child(3) {
   background-image: url('https://nzacksisecurity.co.za/wp-content/uploads/2019/06/Security-Services-Cape-Town-Nzacksi-Security-Services.jpg');
   animation-delay: -5s;
}

.slider .slide:nth-child(4) {
   background-image: url('https://previews.123rf.com/images/tatom/tatom2012/tatom201200048/160989736-house-cleaning-product-on-blue-table-background-housekeeping-and-home-service-concept.jpg');
   animation-delay: -7.5s;
}

.slider .slide:nth-child(5) {
   background-image: url('https://thumbs.dreamstime.com/b/home-improvement-background-plumbing-tools-equipment-home-improvement-background-plumbing-tools-equipment-187178705.jpg');
   animation-delay: -10s;
}

@keyframes slider {
 0%, 16%, 100% {
   transform: translateX(0);
   animation-timing-function: ease;
 }
 20% {
   transform: translateX(-100%);
   animation-timing-function: step-end;
 }
 96% {
   transform: translateX(100%);
   animation-timing-function: ease;
 }
}
</style>


<div class="slider">
    <div class="slide">
    <div class="carousel-item active">
            
        </div>
    </div>
    <div class="slide"></div>
    <div class="slide"></div>
    <div class="slide"></div>
    <div class="slide"></div>
</div>

<section class="services">
      <div class="container">

        <div class="row">

        @foreach($services as $service)
          <div class="col-md-6 col-lg-3 d-flex align-items-stretch" data-aos="fade-up" data-aos-delay="100">
            <div class="icon-box icon-box-cyan">
              <div class="icon"><img src="./asset/img/repair-tools.png" style="height: 50px;width: 50px;"></div>
              <h4 class="title"><a href="">{{$service->Name}}</a></h4>
              <p class="description">{{$service->Desc}}</p>
              <a class="btn btn-primary" href="{{route('req-service-person' ,$service->id)}}">Find Personnel</a>
            </div>

          </div>
          @endforeach
        </div>

      </div>
    </section>

 <!-- <section class="services">

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
                    <div class="icon"><img src="./asset/img/repair-tools.png" style="width: 50px;height:50px"></div>
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
</section> -->
