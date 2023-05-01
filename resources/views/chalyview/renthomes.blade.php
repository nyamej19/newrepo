@extends('layouts.publiclayout')
@section('main')

<br><br>
<section class="why-us section-bg" data-aos="fade-up" date-aos-delay="200">
    @foreach($homes as $home)
    <div class="container">

        <div class="row">

            <div class="col-lg-6 video-box">
                <img src="{{ asset('/app/public/'.$home->homeImg) }}" class="img-fluid" alt="">
                <!-- {{ asset('audio/crow.ogg') }} -->
                <!-- <a href="https://www.youtube.com/watch?v=jDDaplaOz7Q" class="venobox play-btn mb-4" data-vbtype="video" data-autoplay="true"></a> -->
            </div>

            <div class="col-lg-6 d-flex flex-column justify-content-center p-5">

                <h4 class="title"><a href="">Price: {{$home->price}}</a></h4>
                <p class="description"><strong>Detail Description:{{$home->detailDesc}}</strong></p>
                <p class="title"><strong>Location: {{$home->location}}</strong></p>
                <p class="title"><strong>Availability: {{$home->availability}}</strong></p>
                <p class="title"><strong>HomeType :{{$home->homeType}}</strong></p>
                <p class="title"><strong>SaleType :{{$home->saleType}}</strong></p>
                <a href="#">
                    <button class="btn btn-primary outline" style="width:250px">Link To A video of the building</button>
                </a>
                <div style="display:flex;margin-top:15px">
                    <a href="{{route('rent-home-page',$home->id)}}">
                        <button class="btn btn-primary" style="margin-right:10px;padding:8px">Rent Home</button>
                    </a>
                    <form action="{{route('wishlist' ,$home->id)}}" method="post">
                        {{ csrf_field() }}
                        <button style="margin-right:10px;padding:8px;" class="btn btn-primary" type="submit">Add To Wish List</button>
                    </form>
                </div>
            </div>


        </div>

    </div>

    </div>
    @endforeach
    @if($homes == null)
    <div class="col-md-6 col-lg-3 d-flex align-items-stretch" data-aos="fade-up" data-aos-delay="100">


        <button class="btn btn-success">No Homes Available </button>

    </div>
    </div>
    @endif
</section>
