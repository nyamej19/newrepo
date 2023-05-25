@extends('layouts.publiclayout')
@section('main')


<style>
    #ero {
  width: 100%;
  height: 90vh;
  overflow: hidden;
  position: relative;
}

#ero::after {
  content: "";
  position: absolute;
  left: 50%;
  top: 0;
  width: 130%;
  height: 95%;
  background: linear-gradient(to right, rgba(30, 67, 86, 0.8), rgba(30, 67, 86, 0.6)), url("../img/repair-tools.png") center top no-repeat;
  z-index: 0;
  border-radius: 0 0 50% 50%;
  transform: translateX(-50%) rotate(0deg);
}

#ero::before {
  content: "";
  position: absolute;
  left: 50%;
  top: 0;
  width: 130%;
  height: 96%;
  background: #68A4C4;
  opacity: 0.3;
  z-index: 0;
  border-radius: 0 0 50% 50%;
  transform: translateX(-50%) translateY(18px) rotate(2deg);
}

#ero .carousel-container {
  display: flex;
  justify-content: center;
  align-items: center;
  flex-direction: column;
  text-align: center;
  bottom: 0;
  top: 0;
  left: 0;
  right: 0;
}

#ero h2 {
  color: #fff;
  margin-bottom: 30px;
  font-size: 48px;
  font-weight: 700;
}

#ero p {
  width: 80%;
  -webkit-animation-delay: 0.4s;
  animation-delay: 0.4s;
  margin: 0 auto 30px auto;
  color: #fff;
}

#ero .carousel-control-prev,
#ero .carousel-control-next {
  width: 10%;
}

#ero .carousel-control-next-icon,
#ero .carousel-control-prev-icon {
  background: none;
  font-size: 48px;
  line-height: 1;
  width: auto;
  height: auto;
}

#ero .btn-get-started {
  font-family: "Roboto", sans-serif;
  font-weight: 500;
  font-size: 14px;
  letter-spacing: 1px;
  display: inline-block;
  padding: 12px 32px;
  border-radius: 50px;
  transition: 0.5s;
  line-height: 1;
  margin: 10px;
  color: #fff;
  -webkit-animation-delay: 0.8s;
  animation-delay: 0.8s;
  border: 2px solid #68A4C4;
}

#ero .btn-get-started:hover {
  background: #68A4C4;
  color: #fff;
  text-decoration: none;
}

@media (min-width: 1024px) {
  #ero p {
    width: 60%;
  }

  #ero .carousel-control-prev,
  #ero .carousel-control-next {
    width: 5%;
  }
}

@media (max-width: 768px) {
  #ero::after {
    width: 180%;
    height: 95%;
    border-radius: 0 0 50% 50%;
    transform: translateX(-50%) rotate(0deg);
  }

  #ero::before {
    top: 0;
    width: 180%;
    height: 94%;
    border-radius: 0 0 50% 50%;
    transform: translateX(-50%) translateY(20px) rotate(4deg);
  }
}

@media (max-width: 575px) {
  #ero h2 {
    font-size: 30px;
  }

  #ero::after {
    left: 40%;
    top: 0;
    width: 200%;
    height: 95%;
    border-radius: 0 0 50% 50%;
    transform: translateX(-50%) rotate(0deg);
  }

  #ero::before {
    left: 50%;
    top: 0;
    width: 200%;
    height: 94%;
    border-radius: 0 0 50% 50%;
    transform: translateX(-50%) translateY(20px) rotate(4deg);
  }
}

/*--------------------------------------------------------------
# Hero No Slider Section
--------------------------------------------------------------*/
#ero-no-slider {
  width: 100%;
  height: 100vh;
  overflow: hidden;
  position: relative;
  text-align: center;
}

#ero-no-slider::before {
  content: "";
  position: absolute;
  left: 0;
  top: 0;
  right: 0;
  bottom: 0;
  background: linear-gradient(to right, rgba(30, 67, 86, 0.8), rgba(30, 67, 86, 0.6)), url("../img/repair-tools.png") center top no-repeat;
}

#ero-no-slider h2 {
  color: #fff;
  margin-bottom: 15px;
  font-size: 48px;
  font-weight: 700;
}

#ero-no-slider p {
  color: #fff;
}

#ero-no-slider .btn-get-started {
  font-family: "Roboto", sans-serif;
  font-weight: 500;
  font-size: 14px;
  letter-spacing: 1px;
  display: inline-block;
  padding: 12px 32px;
  border-radius: 50px;
  transition: 0.5s;
  line-height: 1;
  margin: 10px;
  color: #fff;
  -webkit-animation-delay: 0.8s;
  animation-delay: 0.8s;
  border: 2px solid #68A4C4;
}

#ero-no-slider .btn-get-started:hover {
  background: #68A4C4;
  color: #fff;
  text-decoration: none;
}

@media (max-width: 575px) {
  #ero-no-slider h2 {
    font-size: 30px;
  }
}
@media screen {
.sBar{
  display: flex;
  margin-left: 0;
  /* width: 0%; */
}
}
.sBar{
  display: flex;
  margin-left: 10%;

}
</style>

<section id="ero" class="d-flex justify-cntent-center align-items-center">
    <div id="heroCarousel" class="container carousel carousel-fade" data-bs-ride="carousel" data-bs-interval="5000">

        <!-- Slide 1 -->
        <div class="carousel-item active">
            <div class="carousel-container">
                <h2 class="animate__animated animate__fadeInDown" style="margin-top: 45px;">Welcome to <span>Our Services</span></h2>
                <p class="animate__animated animate__fadeInUp">Ut velit est quam dolor ad a aliquid qui aliquid. Sequi ea ut et est quaerat sequi nihil ut aliquam. Occaecati alias dolorem mollitia ut. Similique ea voluptatem. Esse doloremque accusamus repellendus deleniti vel. Minus et tempore modi architecto.</p>
                <a href="" class="btn-get-started animate__animated animate__fadeInUp">Read More</a>
            </div>
        </div>

        <!-- Slide 2 -->
        <div class="carousel-item">
            <div class="carousel-container">
                <h2 class="animate__animated animate__fadeInDown">Lorem Ipsum Dolor kk</h2>
                <p class="animate__animated animate__fadeInUp">Ut velit est quam dolor ad a aliquid qui aliquid. Sequi ea ut et est quaerat sequi nihil ut aliquam. Occaecati alias dolorem mollitia ut. Similique ea voluptatem. Esse doloremque accusamus repellendus deleniti vel. Minus et tempore modi architecto.</p>
                <a href="" class="btn-get-started animate__animated animate__fadeInUp">Read More</a>
            </div>
        </div>

        <!-- Slide 3 -->

        <a class="carousel-control-prev" href="#heroCarousel" role="button" data-bs-slide="prev">
            <span class="carousel-control-prev-icon bx bx-chevron-left" aria-hidden="true"></span>
        </a>

        <a class="carousel-control-next" href="#heroCarousel" role="button" data-bs-slide="next">
            <span class="carousel-control-next-icon bx bx-chevron-right" aria-hidden="true"></span>
        </a>

    </div>
</section>

<section class="services">
<div class="footer-newsletter" >
                <div class="container">
                    <div class="row" >

                        <div>

                        <form action="{{ route('search') }}" method="GET">
                          <div  class="sBar">
                                <input type="text" style="border-radius: 8px; border-color:blue; width:100%;margin-left:60px;" class="form-control" placeholder="Search service..." name="service">
                                <button class="btn btn-primary" type="submit" style=" padding:3px;margin-left:3px">Search</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
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
