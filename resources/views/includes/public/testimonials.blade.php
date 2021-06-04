<!-- TESTIMONIAL START -->
@if(count($testimonials) > 0)

<div class="testimonial-area">
    <div class="container">
       <div class="testimonial-main">
            <!-- Section-tittle -->
            <div class="row d-flex justify-content-center">
                <div class="col-lg-5  col-md-8 pr-0">
                    <div class="section-tittle text-center">
                        <h2>What Client Say About Us</h2>
                    </div>
                </div>
            </div>
            <div class="row d-flex justify-content-center">
                    <div class="col-lg-10 col-md-9">
                        <div class="h1-testimonial-active">
                            <!-- Single Testimonial -->
                            <div class="single-testimonial text-center">
                                <div class="testimonial-caption ">
                                    <div class="testimonial-top-cap">
                                        <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Quis ipsum suspendisse ultrices gravida. Risus commodo viverra maecenas accumsan lacus vel facilisis. </p>
                                    </div>
                                    <!-- founder -->
                                    <div class="testimonial-founder d-flex align-items-center justify-content-center">
                                        <div class="founder-img">
                                            <img src="adptc/assets/img/testmonial/testimonial.png" alt="">
                                        </div>
                                    <div class="founder-text">
                                        <span>Oliva jems</span>
                                        <p>UIX designer</p>
                                    </div>
                                    </div>
                                </div>
                            </div><!-- Single Testimonial -->
                            <div class="single-testimonial text-center">
                                <div class="testimonial-caption ">
                                    <div class="testimonial-top-cap">
                                        <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Quis ipsum suspendisse ultrices gravida. Risus commodo viverra maecenas accumsan lacus vel facilisis. </p>
                                    </div>
                                    <!-- founder -->
                                    <div class="testimonial-founder d-flex align-items-center justify-content-center">
                                        <div class="founder-img">
                                            <img src="adptc/assets/img/testmonial/testimonial.png" alt="">
                                        </div>
                                    <div class="founder-text">
                                        <span>Oliva jems</span>
                                        <p>UIX designer</p>
                                    </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
            </div>
       </div>
    </div>
</div>

    {{--<section class="section bg-fixed" style="background-image: url('alita/images/home/bg-home-3.jpg');">
        <div class="bg-overlay"></div>
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-md-8">
                    <div class="client-counter">
                        @foreach($testimonials as $testimonial)

                            <div id="owl-demo" class="owl-carousel">

                                <div class="testi-box">
                                    <div class="text-center">
                                        <div class="client-drow mt-0">
                                            <img src="alita/images/client/img-1.jpg" alt="" class="img-fluid img-thumbnail testi-img rounded-circle">
                                            <div class="testi-content">
                                                <p class="user-review text-center text-light"><i class="mdi mdi-format-quote-open"></i>  {!! $testimonial->comment !!} </p>
                                                <div class="client-name">
                                                    <h4>{{$testimonial->user->name}}</h4>
                                                    <p class=""></p>
                                                </div>
                                                <div class="review-star">
                                                    <ul class="list-unstyled">
                                                        <li class="list-inline-item"><i class="fas fa-star"></i></li>
                                                        <li class="list-inline-item"><i class="fas fa-star"></i></li>
                                                        <li class="list-inline-item"><i class="fas fa-star"></i></li>
                                                        <li class="list-inline-item"><i class="fas fa-star"></i></li>
                                                        <li class="list-inline-item"><i class="fas fa-star-half-alt"></i></li>
                                                    </ul>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <div class="testi-box">
                                    <div class="text-center">
                                        <div class="client-drow mt-0">
                                            <img src="alita/images/client/img-2.jpg" alt="" class="img-fluid img-thumbnail testi-img rounded-circle">
                                            <div class="testi-content">
                                                <p class="user-review text-center text-light"><i class="mdi mdi-format-quote-open"></i>At vero eos et accusamus et iusto odio dignissimos ducimus qui blanditiis praesentium voluptatum deleniti atque corrupti quos dolores et quas molestias excepturi sint occaecati cupiditate non provident, similique sunt</p>
                                                <div class="client-name">
                                                    <h4>Norman Watson</h4>
                                                    <p class="">C.E.O</p>
                                                </div>
                                                <div class="review-star">
                                                    <ul class="list-unstyled">
                                                        <li class="list-inline-item"><i class="fas fa-star"></i></li>
                                                        <li class="list-inline-item"><i class="fas fa-star"></i></li>
                                                        <li class="list-inline-item"><i class="fas fa-star"></i></li>
                                                        <li class="list-inline-item"><i class="fas fa-star"></i></li>
                                                        <li class="list-inline-item"><i class="fas fa-star-half-alt"></i></li>
                                                    </ul>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <div class="testi-box">
                                    <div class="text-center">
                                        <div class="client-drow mt-0">
                                            <img src="alita/images/client/img-3.jpg" alt="" class="img-fluid img-thumbnail testi-img rounded-circle">
                                            <div class="testi-content">
                                                <p class="user-review text-center text-light"><i class="mdi mdi-format-quote-open"></i>Quisque eget turpis volutpat, posuere ipsum sed, hendrerit nisi. Mauris ac placerat dui. Fusce venenatis porta ipsum, Fusce venenatis porta ipsum et aliquet lacus posuere sed. Etiam efficitur a ligula at condimentum.</p>
                                                <div class="client-name">
                                                    <h4>Nancy Nunez</h4>
                                                    <p class="">Adviser</p>
                                                </div>
                                                <div class="review-star">
                                                    <ul class="list-unstyled">
                                                        <li class="list-inline-item"><i class="fas fa-star"></i></li>
                                                        <li class="list-inline-item"><i class="fas fa-star"></i></li>
                                                        <li class="list-inline-item"><i class="fas fa-star"></i></li>
                                                        <li class="list-inline-item"><i class="fas fa-star"></i></li>
                                                        <li class="list-inline-item"><i class="fas fa-star-half-alt"></i></li>
                                                    </ul>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
    </section>--}}
@endif
<!-- TESTIMONIAL END -->
