@extends('layouts.publiclayout')
@section('main')



<main id="main">

    <!-- ======= Blog Section ======= -->
    <section class="breadcrumbs">
        <div class="container">

            <div class="d-flex justify-content-between align-items-center">
                <h2>Profile And Reviews</h2>

                <ol>

                    <li>Profile And Reviews</li>
                </ol>
            </div>

        </div>
    </section><!-- End Blog Section -->

    <!-- ======= Blog Section ======= -->
    <section id="blog" class="blog">
        <div class="container" data-aos="fade-up">

            <div class="row">

                <div class="col-lg-8 entries">

                    <article class="entry">



                        <div class="entry-meta">
                            <ul>
                            <li>
                            <img src="{{ asset('/app/public/team-3.jpg') }}" style="width: 50px;height:50px;border-radius:50%">
                                </li>
                                 <li class="d-flex align-items-center"><i class="bi bi-person"></i> <a href="#">John Doe</a></li>


                            </ul>
                        </div>

                        <div class="entry-content">
                            <p>
                               Lorem ipsum dolor sit amet consectetur adipisicing elit. Cum aliquam eaque alias quaerat eos veniam aliquid, quae porro voluptatum !
                            </p>

                        </div>

                    </article>




                     <article class="entry">



                    <div class="entry-meta">
                        <ul>
                        <li>
                        <img src="{{ asset('/app/public/team-4.jpg') }}" style="width: 50px;height:50px;border-radius:50%">
                            </li>
                            <li class="d-flex align-items-center"><i class="bi bi-person"></i> <a href="#">John Doe</a></li>


                        </ul>
                    </div>

                    <div class="entry-content">
                        <p>
                        Lorem ipsum dolor sit amet consectetur adipisicing elit. Cum aliquam eaque alias quaerat eos veniam aliquid, quae porro voluptatum !
                        </p>

                    </div>

                    </article>
                </div>


              <!-- End blog sidebar -->
              <div class="col-lg-4">

                    <div class="sidebar">

                        <h3 class="sidebar-title">My Profile</h3>
                        <div class="sidebar-item search-form">
                        <img src="{{ asset('/app/public/team-5.jpg') }}" style="width: 70px;height:70px;border-radius:50%">
                        </div><!-- End sidebar search formn-->

                        <!-- <h3 class="sidebar-title">Categories</h3> -->
                        <div class="sidebar-item categories">
                            <ul>
                                <!-- <li><a href="#">General <span>(25)</span></a></li> -->
                                <li><a href="#">Name:John Doe </a></li>
                                <li><a href="#">Email: johndoe@mail.com</a></li>
                                <li><a href="#">Phone: +233501459677</a></li>
                                <li><a href="#">Ratings: 4.7 <i class="fa-solid fa-star"></i></a></li>
                                <!-- <li><a href="#">CyberSecurity<span>(8)</span></a></li> -->
                                <!-- <li><a href="#">Database Systems<span>(14)</span></a></li> -->
                            </ul>
                        </div><!-- End sidebar categories-->

                                               </div><!-- End sidebar recent posts-->


                    </div><!-- End sidebar -->

                </div>

            </div>

        </div>
    </section><!-- End Blog Section -->

</main>
