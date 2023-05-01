@extends('layouts.publiclayout')
@section('main')

<main id="main">

    <!-- ======= About Us Section ======= -->
    <section class="breadcrumbs">
        <div class="container">

            <div class="d-flex justify-content-between align-items-center">
                <h2>About Us</h2>
                <ol>
                    <li><a href="index.html">Home</a></li>
                    <li>About Us</li>
                </ol>
            </div>

        </div>
    </section><!-- End About Us Section -->

    <!-- ======= About Section ======= -->
    <section class="about" data-aos="fade-up">
        <div class="container">

            <p> Welcome to our premier real estate site, your ultimate destination for all your property needs! Whether you are looking to buy, sell or rent a property, we are here to help you every step of the way.</p>
            <p>Our site offers a wide range of properties across different locations, including apartments, houses, condos, and townhouses. With our easy-to-use search tools and filters, you can quickly find the perfect property that meets your specific requirements.</p>

            <p>At our site, we believe in providing our clients with personalized and professional services. Our team of experienced and knowledgeable real estate agents is always ready to answer your questions, guide you through the buying or selling process, and ensure that your real estate experience is as smooth and stress-free as possible.</p>

        </div>
    </section><!-- End About Section -->

    <!-- ======= Facts Section ======= -->
    <section class="facts section-bg" data-aos="fade-up">
        <div class="container">

            <div class="row counters">

                <div class="col-lg-3 col-6 text-center">
                    <span data-purecounter-start="0" data-purecounter-end="232" data-purecounter-duration="1" class="purecounter"></span>
                    <p>Clients</p>
                </div>

                <div class="col-lg-3 col-6 text-center">
                    <span data-purecounter-start="0" data-purecounter-end="521" data-purecounter-duration="1" class="purecounter"></span>
                    <p>Projects</p>
                </div>

                <div class="col-lg-3 col-6 text-center">
                    <span data-purecounter-start="0" data-purecounter-end="1463" data-purecounter-duration="1" class="purecounter"></span>
                    <p>Service Personnel</p>
                </div>

                <!-- <div class="col-lg-3 col-6 text-center">
        <span data-purecounter-start="0" data-purecounter-end="15" data-purecounter-duration="1" class="purecounter"></span>
        <p>Hard Workers</p>
      </div> -->

            </div>

        </div>
    </section><!-- End Facts Section -->



    <!-- ======= Tetstimonials Section ======= -->
    <section class="testimonials" data-aos="fade-up">
        <div class="container">

            <div class="section-title">
                <h2>Tetstimonials</h2>
                <p>Here are some of our testimonials</p>
            </div>

            <div class="testimonials-carousel swiper">
                <div class="swiper-wrapper">
                    <div class="testimonial-item swiper-slide">
                        <img src="{{asset('asset/img/df.webp')}}" class="testimonial-img" alt="">
                        <h3>John Doe</h3>
                        <h4>Country/Nationality: Ghana</h4>
                        <p>
                            <i class="bx bxs-quote-alt-left quote-icon-left"></i>
                            I highly recommend this real estate company for their exceptional service and expertise. Their agents were knowledgeable, professional and went above and beyond to ensure a smooth transaction. I couldn't be happier with the results!
                            <i class="bx bxs-quote-alt-right quote-icon-right"></i>
                        </p>
                    </div>

                    <div class="testimonial-item swiper-slide">
                        <img src="{{asset('asset/img/df.webp')}}" class="testimonial-img" alt="">
                        <h3>Saul Goodman</h3>
                        <h4>Country/Nationality: Ghana</h4>
                        <p>
                            <i class="bx bxs-quote-alt-left quote-icon-left"></i>
                            I highly recommend this real estate company for their exceptional service and expertise. Their agents were knowledgeable, professional and went above and beyond to ensure a smooth transaction. I couldn't be happier with the results!
                            <i class="bx bxs-quote-alt-right quote-icon-right"></i>
                        </p>
                    </div>

                    <div class="testimonial-item swiper-slide">
                        <img src="{{asset('asset/img/df.webp')}}" class="testimonial-img" alt="">
                        <h3>John Doe</h3>
                        <h4>Country: Ghana</h4>
                        <p>
                            <i class="bx bxs-quote-alt-left quote-icon-left"></i>
                            I highly recommend this real estate company for their exceptional service and expertise. Their agents were knowledgeable, professional and went above and beyond to ensure a smooth transaction. I couldn't be happier with the results!
                            <i class="bx bxs-quote-alt-right quote-icon-right"></i>
                        </p>
                    </div>

                    <div class="testimonial-item swiper-slide">
                        <img src="{{asset('asset/img/df.webp')}}" class="testimonial-img" alt="">
                        <h3>John Doe</h3>
                        <h4>Country: Ghana</h4>
                        <p>
                            <i class="bx bxs-quote-alt-left quote-icon-left"></i>
                            I highly recommend this real estate company for their exceptional service and expertise. Their agents were knowledgeable, professional and went above and beyond to ensure a smooth transaction. I couldn't be happier with the results!
                            <i class="bx bxs-quote-alt-right quote-icon-right"></i>
                        </p>
                    </div>

                    <div class="testimonial-item swiper-slide">
                        <img src="{{asset('asset/img/df.webp')}}" class="testimonial-img" alt="">
                        <h3>John Doe</h3>
                        <h4>Country: Ghana</h4>
                        <p>
                            <i class="bx bxs-quote-alt-left quote-icon-left"></i>
                            I highly recommend this real estate company for their exceptional service and expertise. Their agents were knowledgeable, professional and went above and beyond to ensure a smooth transaction. I couldn't be happier with the results!
                            <i class="bx bxs-quote-alt-right quote-icon-right"></i>
                        </p>
                    </div>
                </div>
                <div class="swiper-pagination"></div>
            </div>

        </div>
    </section><!-- End Ttstimonials Section -->

</main>
