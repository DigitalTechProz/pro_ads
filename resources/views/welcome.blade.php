@extends('layouts.public')
@section('title','Welcome ')

@section('content')


 <!--- ********************* Header Start ***********************--->
<main>
    <header>

        @include('includes.public.header')

    </header>

  <!--- ********************* Header End ***********************--->

 <!-- *********************** HOME START *******************-->

    @include('includes.public.courasel')

<!-- ********************** HOME END **********************-->

<!--********************* ABOUT START ********************-->


    @include('includes.public.admemberships')


 <!--********************* ABOUT End ********************-->

 <!--********************* Call To Action START ********************-->
    @include('includes.public.callto-action')

 <!--********************* Call to Action  END ******--->
 <!--********************* SERVICES START ********************-->

    @include('includes.public.services')


 <!--********************* SERVICES END ********************-->

 <!--********************* Pricing START ********************-->

   @include('includes.public.pricing')

 <!--********************* Pricing END ********************-->

 <!--********************* Features START ********************-->

    @include('includes.public.features')
 <!--********************* Features END ********************-->

 <!--********************* Testimonials START ********************-->
   @include('includes.public.testimonials')
 <!--********************* Testimonials END ********************-->

 <!--********************* Blog Post START ********************-->

  @include('includes.public.blog-post')

 <!--********************* Blog Post END ********************-->
 <!--********************* WEBSITE STATS START ********************-->
@if($settings)
    <div class="float-md-center text-center">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-md-12">
                    <h4 class="title">Thank you for your support!</h4>
                </div>
                <button  class="btn btn-round">Total Members &#xB7; {{$total->user}}</button>
                <br>
                <!--<button  class="btn btn-round ">Running Days &#xB7;</button>-->
                <br>
                <button  class="btn btn-round ">Total Deposits &#xB7; {{config('app.currency_code')}} {{$total->dep}}</button>
            </div>
        </div>
    </div>
@endif


 <!--********************* WEBSITE STATS END ********************-->

 <!--********************* CONTACT US START ********************-->

    @include('includes.public.contact-us')

 <!--********************CONTACT US END ********************-->

<!-- *************************** FOOTER START ************************-->
</main>
<footer>


    <div class="footer-main" data-background="adptc/assets/img/shape/footer_bg.png">
         @include('includes.public.footer')
     <!-- footer-bottom aera -->
    </div>


 </footer>

<!--************************** FOOTER END ******************-->
@endsection

@section('scripts')
@if($settings)

    @include('includes.chat')

@endif
@endsection
