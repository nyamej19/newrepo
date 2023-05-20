@extends('layouts.publiclayout')
@section('main')


<section class="team" data-aos="fade-up" data-aos-easing="ease-in-out" data-aos-duration="500">
    <!-- <br> -->
<div class="footer-newsletter" style="margin-top: 40px;">
                <div class="container">
                    <div class="row" >

                        <div class="col-lg-6" style="margin-left:26%">

                        <form action="{{ route('search') }}" method="GET">
                                <select style="border-radius: 8px; width:44% ;border-color:blue;" name="filter">
                                    <option value="" hidden>Filter Service Personnel By</option>
                                    <option value="country" >Country</option>
                                    <!-- <option value="country" >Ghana</option>
                                    <option value="country" >Ghana</option> -->

                                </select>
                                <button class="btn btn-primary" type="submit" style="margin-left: 5px; padding:3px; width:100px">Filter</button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>

    <div class="d-flex justify-content-between align-items-center">
        <h2 style="margin-left: 30%; margin-top:20px; margin-bottom:20px;">{{$service->Name}} Personnel</h2>

    </div>

    </div>
    <div class="container">

        <div class="row">

            @foreach($serviceworkers as $worker)

            <div class="col-lg-4 col-md-6 d-flex align-items-stretch">
            <div class="member">
              <div class="member-img">
                <img src="{{ asset('/app/public/'.$worker->image) }}" class="img-fluid" alt="" style="border: radius 50%; height: 50%;">
                <!-- <div class="social">
                  <a href=""><i class="bi bi-twitter"></i></a>
                  <a href=""><i class="bi bi-facebook"></i></a>
                  <a href=""><i class="bi bi-instagram"></i></a>
                  <a href=""><i class="bi bi-linkedin"></i></a>
                </div> -->
              </div>
              <div class="member-info">
                <h4>Name : {{$worker->name}}</h4>
                <span><a href="{{route('worker-info' ,$worker->id)}}" class="btn btn-secondary">View Worker Profile And Reviews</a></span>
                <p><h4>What I can Offer</h4> <br> quam repellendus nihil nobis dolor. Est sapiente occaecati et dolore. Omnis aut ut nesciunt explicabo qui. Eius nam deleniti ut omnis repudiandae perferendis qui. Neque non quidem sit sed pariatur quia modi ea occaecati. Incidunt ea non est corporis in.</p>
              </div>
              <a href="{{route('req-service-page',[$service->id,$worker->id])}}">
              <button class="btn btn-primary"> Make Request</button>
              </a>

            </div>
          </div>

            @endforeach

            @if($serviceworkers == null)
            <div class="col-md-6 col-lg-3 d-flex align-items-stretch" data-aos="fade-up" data-aos-delay="100">


                <button class="btn btn-success">No Personnels Yet </button>

            </div>
        </div>
        @endif
    </div>

    </div>
</section>



