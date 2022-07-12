
@extends('dibrugarh.layout.master')
@section('content')
    <!-- Navbar End -->
    <!-- Carousel Start -->
<div class="container-fluid p-0">
    @extends('dibrugarh.layout.master')
    @section('content')
        <!-- Navbar End -->
        <!-- Carousel Start -->
    <div class="container-fluid p-0">
        <div class="row">
        <div class="col-lg-9 home-slider" style="padding-right:0">
            <div id="header-carousel" class="carousel slide" data-ride="carousel">
            <div class="carousel-inner">
                <div class="carousel-item active">
                <!-- <img class="w-100" src="img/carousel-1.jpg" alt="Image"> -->
                <!-- <img class="w-100" src="{{ asset('dibrugarh') }}/img/skill-development-banner.jpg" alt="banner" height="400px"> -->
                <img class="w-100" src="{{ asset('dibrugarh') }}/img/1.png" alt="banner" height="300px">
                <div class="carousel-caption d-flex flex-column align-items-center justify-content-center">
                </div>
                </div>
                <div class="carousel-item">
                    <img class="w-100" src="{{ asset('dibrugarh') }}/img/2.png" alt="Image" height="300px">
                <div class="carousel-caption d-flex flex-column align-items-center justify-content-center">
                </div>
                </div>
            </div>
            <a class="carousel-control-prev" href="#header-carousel" data-slide="prev">
                <div class="btn btn-primary rounded slider-btn" style="width: 45px; height: 45px;">
                <span class="carousel-control-prev-icon mb-n2"></span>
                </div>
            </a>
            <a class="carousel-control-next" href="#header-carousel" data-slide="next">
                <div class="btn btn-primary rounded slider-btn" style="width: 45px; height: 45px;">
                <span class="carousel-control-next-icon mb-n2"></span>
                </div>
            </a>
            </div>
        </div>
        <div class="col-lg-3 courses-form-div">
            <div class="search-box">
            <h5 style="text-align: center;color: #fff; text-transform:uppercase;margin-top: 0rem;background: #e8af30;color: black;;padding: .2rem 0;">
                Search Courses
            </h5>
            <h6 style="margin-top: 2rem;color:#000;text-align:center;background: #e8af30;
            padding: .2rem 0;">OUR COURSES</h6>
            <form class="courses-form" action={{route('search_courses')}} method="post">
                @csrf
                <div class="select-box-1">
                    <select name="sector" id="lang">
                        <option value="">-- Select Sector --</option>
                        @foreach ($sector as $sec )
                            <option value="{{$sec->sector_id}}">{{$sec->sector_name}}</option>
                        @endforeach
                    </select>
                </div>
                <div class="select-box-2">
                    <select name="courses" id="course">
                        <option value="">-- Select Courses --</option>
                        @foreach ($course as $cor)
                            <option value="{{$cor->course_id}}">{{$cor->course_name}}</option>
                        @endforeach
                    </select>
                </div>
                <button value="submit" class="search-btn"><img src="{{ asset('dibrugarh') }}/icons/icons8-search-24.png" />Search</button>
            </form>
            </div>
        </div>

        </div>

    </div>
    <!-- Carousel End -->


    <!-- NOTICES Start -->
    {{-- <section id="skipToMainContent" class="notice-section"> --}}
    <section id="testing" class="notice-section">
        <div class="container">
        <div class="row">
            <div class="col-lg-4 notice-board-heading">
                <h5>Upcoming Courses</h5>
                <div class="upcoming-courses">
                    <div class="upcoming-courses-inner-div">
                        @foreach ($upcomingevents as $events)
                        <div>
                        <form action="{{route('view_course_details',['id'=>Crypt::encryptString($events->id)])}}" method="post">
                            @csrf
                            <img src="{{ asset('dibrugarh') }}/icons/icons8-book-26.png">
                            <a onclick="this.parentNode.submit();">{{$events->training_name}},&nbsp;starts from {{date('d-m-Y', strtotime($events->start_date))}} to {{date('d-m-Y', strtotime($events->end_date))}}.</a>
                        </form>
                        </div>
                        @endforeach
                    </div>
                    <div class="see-all-courses"><a href="{{route('course_dtl')}}">See All Courses</a></div>
                </div>
            </div>
            <div class="col-lg-4 notice-board-heading">
            <h5>Job Opportunities</h5>
            <div class="job">
                {{-- <marquee behavior="scroll" direction="up" scrollamount="3" height="260px" onmouseover="this.stop();" onmouseout="this.start();"> --}}

                    <div class="job-inner-div">
                            @foreach ($jobs as $job )
                    <div>
                        <img src="{{ asset('dibrugarh') }}/icons/icons8-job-seeker-24.png" alt="">
                        <a href="{{route('employee_corner',['id'=>$job->id])}}" class="job-name">{{$job->job_title}}</a>
                    </div>
                @endforeach
                </div>
                {{-- </marquee> --}}
                <div class="job-btn"><a href="{{route('employee_corner')}}">Browse All Jobs</a></div>
            </div>
            </div>
            <div class="col-lg-4 notice-board-heading">
            <h5>Notice</h5>
                <div class="notice-div" height="310px">
                <marquee behavior="scroll" direction="up" scrollamount="3" height="258px" onmouseover="this.stop();" onmouseout="this.start();">
                    @foreach ($notice as $not)
                        <div class="row">
                            <div class="form-group col-md-4">
                                <h5 style="font-size: 10px;float:right;">{{date('d-m-Y',strtotime($not->notice_date))}}</h5>
                            </div>
                        </div>
                        <div class="notice-content">
                            <img src="{{ asset('dibrugarh') }}/icons/icons8-chevron-right-24 (2).png" alt="">
                            <div>
                            <a href="{{route('notice_board',['id'=>$not->id])}}"><span style="font-weight:bold;color:#e8af30">{{$not->noticationtype->type}}:</span> {{$not->title}}
                                @if($not->new_status==1)
                                    &nbsp;<span class="new-tag">New</span>
                                @endif
                            </a>
                            </div>
                        </div>
                        <hr>
                    @endforeach
                </marquee>
                <div class="notice-more-btn"><a href="{{route('notice_board')}}">More</a></div>
                </div>
            </div>
        </div>
        </div>
    </section>
    <!-- NPOTICES END -->
    <div class="bcpl">
        <p>An initiative of the District Skill Committee in partnership with Brahmaputra Cracker and Polymer Limited (BCPL) CSR.</p>
    </div>
    <!-- SKILL DEVELOPMENT BANNER START -->
    <div class="banner">
        <img src="{{ asset('dibrugarh') }}/img/slider3.jpg" alt="">
    </div>

    <!-- SKILL DEVELOPEMENT BANNER END -->




    <!-- About Start -->
    <div class="container1 py-5" style="padding: 0 2rem 0 0rem;">
        <div class="container-fluid py-5">
        <div class="row py-5">
        <div class="col-lg-7 pb-5 pb-lg-0 px-3 px-lg-5">
            <!-- <h4 class="text-secondary mb-3">Welcome to</h4> -->
            <h2 class="mb-4"><span class="text-primary"></span> <span class="text-secondary"><a href="{{route('about_us')}}">An Initiative of the District Skill Committee</a></span></h2>
            <!-- <h5 class="text-muted mb-3"></h5> -->
            <p class="mb-4" style="text-align:justify">{!!$paragraph!!}<button style="border:none;margin-left: 1rem;" class="welcome-btn"><a href="{{route('about_us')}}">Read More</a></button>
            </p>
        </div>
        <div class="col-lg-5">
            <div class="row px-3">
            <div class="col-12 p-0">
                <!-- <img class="img-fluid w-100" src="{{ asset('dibrugarh') }}/img/about-us.jpg" alt=""> -->
                <div href="{{ asset('dibrugarh') }}/img/abou-us-new-2.jpg">
                    <div id="slider">
                        <figure>
                            <img src="{{ asset('dibrugarh') }}/img/about-us.jpg" alt>
                            <img src="{{ asset('dibrugarh') }}/img/abou-us-new-2.jpg" alt>
                            <img src="{{ asset('dibrugarh') }}/img/abou-us-new-1.jpeg" alt>
                            <img src="{{ asset('dibrugarh') }}/img/abou-us-new-2.jpg" alt>
                            <img src="{{ asset('dibrugarh') }}/img/about-us.jpg" alt>
                        </figure>
                    </div>
                </div>
            </div>
        </div>
        </div>
    </div>
    </div>
    <!-- About End -->


    <!-- Features Start -->
    <div class="container1" style="margin-bottom: 2rem;">
        <div class="row align-items-center">
        <div class="col-lg-12 py-5 py-lg-0 px-3 px-lg-5">
            <h4 class="text-secondary mb-3 why-district">Why District Skill Committee</h4>
            <div class="card-box">
            <div class="courses-container">
                <div class="course">
                <div class="course-preview">
                    <img src="{{ asset('dibrugarh') }}/img/icons8-job-opportunities-68.png" alt="">
                    <h5>Self-Employment Opportunities</h5>
                </div>
                <div class="course-info">
                    <h6>Self-Employment Opportunities</h6>
                    <p>A platform thoughtfully curated to generate self-employment opportunities in Assam for domestic work professionals seeking jobs. </p>
                    <button class="btn">Continue</button>
                </div>
                </div>
                <!-- <div class="course">
                <div class="course-preview">
                    <img src="{{ asset('dibrugarh') }}/img/icons8-choice-64.png" alt="">
                    <h5>Flexible Service Choices</h5>
                </div>
                <div class="course-info">
                    <h6>Self-Employment Opportunities</h6>
                    <p>A platform thoughtfully curated to generate self-employment opportunities in Uttar Pradesh for
                    domestic work professionals seeking jobs. </p>
                    <button class="btn">Continue</button>
                </div>
                </div> -->
                <div class="course">
                <div class="course-preview">
                    <img src="{{ asset('dibrugarh') }}/img/assam-map.png" alt="">
                    <h5>Atmanirbhar Assam</h5>
                </div>
                <div class="course-info">
                    <h6>By Making us Self Reliant</h6>
                    <p>A platform thoughtfully curated to generate self-employment opportunities in Assam for domestic work professionals seeking jobs. </p>
                    <button class="btn">Continue</button>
                </div>
                </div>
                <!-- <div class="course">
                <div class="course-preview">
                    <img src="{{ asset('dibrugarh') }}/img/icons8-job-opportunities-68.png" alt="">
                    <h5>Self-Employment Opportunities</h5>
                </div>
                <div class="course-info">
                    <h6>Self-Employment Opportunities</h6>
                    <p>A platform thoughtfully curated to generate self-employment opportunities in Uttar Pradesh for
                    domestic work professionals seeking jobs. </p>
                    <button class="btn">Continue</button>
                </div>
                </div> -->
            </div>
            </div>
        </div>
        </div>
    </div>
    <!-- Features End -->

    <!-- Counter up start -->
    <div id="counter" class="counter-container">
        <div class="counter-div">
            <div class="counter-value" data-count="300"><span>0</span></div>
            <div class="counter-plus" style="margin-left: -1.7rem;"><img src="{{ asset('dibrugarh') }}/icons/icons8-plus-48.png" alt=""></div>
            <h6>Registered Training Partners</h6>
        </div>
        <div class="counter-div">
            <div class="counter-value" data-count="400">2000</div>
            <div class="counter-plus" style="margin-left: -.8rem;"><img src="{{ asset('dibrugarh') }}/icons/icons8-plus-48.png" alt=""></div>
            <h6>Registered Students</h6>
        </div>
        <div class="counter-div">
            <div class="counter-value" data-count="1500">1000</div>
            <div class="counter-plus"><img src="{{ asset('dibrugarh') }}/icons/icons8-plus-48.png" alt=""></div>
            <h6>Trained Students</h6>
        </div>
        <div class="counter-div">
            <div class="counter-value" data-count="1500">100</div>
            <div class="counter-plus"><img src="{{ asset('dibrugarh') }}/icons/icons8-plus-48.png" alt=""></div>
            <h6>Trained Faculty</h6>
        </div>
        <!-- <div id="overlay1"></div> -->
    </div>

    </div>

    <!-- Counter Up End -->

    <section class="trigger section gutter-horizontal bg-gray gutter-vertical--m gutter-horizontal" style="margin-top:1rem">
        <h4 style="color:#162f65; margin-bottom: 3rem;">Our Partners</h4>
        <div class="customer-logos slider">
        <div class="slide-in-right slide"><img
            src="{{ asset('dibrugarh') }}/img/asdm-logo.png" height="150" width="150"></a></div>
        <div class="slide-in-right slide"><img
            src="{{ asset('dibrugarh') }}/img/asdm-logo.png"
            height="150" width="150"></a></div>
        <div class="slide-in-right slide"><img
            src="{{ asset('dibrugarh') }}/img/asdm-logo.png"
            height="150" width="150"></a></div>
        <div class="slide-in-right slide"><img
            src="{{ asset('dibrugarh') }}/img/asdm-logo.png"
            height="150" width="150"></a></div>
        <div class="slide-in-right slide"><img
            src="{{ asset('dibrugarh') }}/img/asdm-logo.png"
            height="150" width="150" alt="Tannenmuehle"></a></div>
        <div class="slide-in-right slide"><img
            src="{{ asset('dibrugarh') }}/img/asdm-logo.png"
            height="150" width="150" alt="Loeffele"></a></div>
        <div class="slide-in-right slide"><img
            src="{{ asset('dibrugarh') }}/img/asdm-logo.png"
            alt="Krone" height="150" width="150"></a></div>
        <div class="slide-in-right slide"><img
            src="{{ asset('dibrugarh') }}/img/asdm-logo.png"
            alt="Obereggen" height="150" width="150"></a></div>
        <div class="slide-in-right slide"><img
            src="{{ asset('dibrugarh') }}/img/asdm-logo.png"
            alt="Ortnerhof" height="150" width="150"></a></div>
        <div class="slide-in-right slide"><img
            src="{{ asset('dibrugarh') }}/img/asdm-logo.png"
            alt="Ottonenhof" height="150" width="150"></a></div>
        <div class="slide-in-right slide"><img
            src="{{ asset('dibrugarh') }}/img/asdm-logo.png"
            alt="Leiners" height="150" width="150"></a></div>
        <div class="slide-in-right slide"><img
            src="{{ asset('dibrugarh') }}/img/asdm-logo.png"
            alt="Seitenalm" height="150" width="150"></a></div>
        <div class="slide-in-right slide"><img
            src="{{ asset('dibrugarh') }}/img/asdm-logo.png"
            alt="Testerhof" height="150" width="150"></a></div>
    </section>

    <!-- Blog End -->
    @endsection
    @section('scripts')
    <script>
        $(document).ready(function(){
        $('.customer-logos').slick({
        slidesToShow: 4,
        slidesToScroll: 1,
        autoplay: true,
        autoplaySpeed: 1500,
        arrows: true,
        dots: false,
        pauseOnHover: false,
        prevArrow: '<i class="slick-prev fas fa-angle-left"></i>',
        nextArrow: '<i class="slick-next fas fa-angle-right"></i>',
        responsive: [{
        breakpoint: 768,
        settings: {
        slidesToShow: 3
        }
        }, {
        breakpoint: 520,
        settings: {
        slidesToShow: 2
        }
        }]
        });
        });
      </script>

      <!-- js counter -->
      <script>
         var a = 0;
    $(window).scroll(function() {

      var oTop = $('#counter').offset().top - window.innerHeight;
      if (a == 0 && $(window).scrollTop() > oTop) {
        $('.counter-value').each(function() {
          var $this = $(this),
            countTo = $this.attr('data-count');
          $({
            countNum: $this.text()
          }).animate({
              countNum: countTo
            },

            {

              duration: 2000,
              easing: 'swing',
              step: function() {
                $this.text(Math.floor(this.countNum));
              },
              complete: function() {
                $this.text(this.countNum);
                //alert('finished');
              }

            });
        });
        a = 1;
      }

    });
      </script>

    @endsection

    <div class="row">
    <div class="col-lg-9 home-slider" style="padding-right:0">
        <div id="header-carousel" class="carousel slide" data-ride="carousel">
        <div class="carousel-inner">
            <div class="carousel-item active">
            <!-- <img class="w-100" src="img/carousel-1.jpg" alt="Image"> -->
            <!-- <img class="w-100" src="{{ asset('dibrugarh') }}/img/skill-development-banner.jpg" alt="banner" height="400px"> -->
            <img class="w-100" src="{{ asset('dibrugarh') }}/img/slider3.jpg" alt="banner" height="300px">
            <div class="carousel-caption d-flex flex-column align-items-center justify-content-center">
            </div>
            </div>
            <div class="carousel-item">
                <img class="w-100" src="{{ asset('dibrugarh') }}/img/carousel-2.jpg" alt="Image" height="300px">
            <div class="carousel-caption d-flex flex-column align-items-center justify-content-center">
            </div>
            </div>
        </div>
        <a class="carousel-control-prev" href="#header-carousel" data-slide="prev">
            <div class="btn btn-primary rounded slider-btn" style="width: 45px; height: 45px;">
            <span class="carousel-control-prev-icon mb-n2"></span>
            </div>
        </a>
        <a class="carousel-control-next" href="#header-carousel" data-slide="next">
            <div class="btn btn-primary rounded slider-btn" style="width: 45px; height: 45px;">
            <span class="carousel-control-next-icon mb-n2"></span>
            </div>
        </a>
        </div>
    </div>
    <div class="col-lg-3 courses-form-div">
        <div class="search-box">
        <h5 style="text-align: center;color: #fff; text-transform:uppercase;margin-top: 0rem;background: #e8af30;color: black;;padding: .2rem 0;">
            Search Skilled Worker
        </h5>
        <h6 style="margin-top: 2rem;color:#000;text-align:center;background: #e8af30;
        padding: .2rem 0;">OUR COURSES</h6>
        <form class="courses-form" action={{route('search_courses')}} method="post">
            @csrf
            <div class="select-box-1">
                <select name="sector" id="lang">
                    <option value="">-- Select Sector --</option>
                    @foreach ($sector as $sec )
                        <option value="{{$sec->sector_id}}">{{$sec->sector_name}}</option>
                    @endforeach
                </select>
            </div>
            <div class="select-box-2">
                <select name="courses" id="course">
                    <option value="">-- Select Courses --</option>
                    @foreach ($course as $cor)
                        <option value="{{$cor->course_id}}">{{$cor->course_name}}</option>
                    @endforeach
                </select>
            </div>
            <button value="submit" class="search-btn"><img src="{{ asset('dibrugarh') }}/icons/icons8-search-24.png" />Search</button>
        </form>
        </div>
    </div>

    </div>

</div>
<!-- Carousel End -->


<!-- NOTICES Start -->
{{-- <section id="skipToMainContent" class="notice-section"> --}}
<section id="testing" class="notice-section">
    <div class="container">
    <div class="row">
        <div class="col-lg-4 notice-board-heading">
            <h5>Upcoming Courses</h5>
            <div class="upcoming-courses">
                <div class="upcoming-courses-inner-div">
                    @foreach ($upcomingevents as $events)
                    <div>
                    <form action="{{route('view_course_details',['id'=>Crypt::encryptString($events->id)])}}" method="post">
                        @csrf
                        <img src="{{ asset('dibrugarh') }}/icons/icons8-book-26.png">
                        <a onclick="this.parentNode.submit();">{{$events->training_name}},&nbsp;starts from {{date('d-m-Y', strtotime($events->start_date))}} to {{date('d-m-Y', strtotime($events->end_date))}}.</a>
                    </form>
                    </div>
                    @endforeach
                </div>
                <div class="see-all-courses"><a href="{{route('course_dtl')}}">See All Courses</a></div>
            </div>
        </div>
        <div class="col-lg-4 notice-board-heading">
        <h5>New Job</h5>
        <div class="job">
            {{-- <marquee behavior="scroll" direction="up" scrollamount="3" height="260px" onmouseover="this.stop();" onmouseout="this.start();"> --}}

                <div class="job-inner-div">
                        @foreach ($jobs as $job )
                <div>
                    <img src="{{ asset('dibrugarh') }}/icons/icons8-job-seeker-24.png" alt="">
                    <a href="{{route('employee_corner',['id'=>$job->id])}}" class="job-name">{{$job->job_title}}</a>
                </div>
            @endforeach
            </div>
            {{-- </marquee> --}}
            <div class="job-btn"><a href="{{route('employee_corner')}}">Browse All Jobs</a></div>
        </div>
        </div>
        <div class="col-lg-4 notice-board-heading">
        <h5>Notice</h5>
            <div class="notice-div" height="310px">
            <marquee behavior="scroll" direction="up" scrollamount="3" height="258px" onmouseover="this.stop();" onmouseout="this.start();">
                @foreach ($notice as $not)
                    <div class="row">
                        <div class="form-group col-md-4">
                            <h5 style="font-size: 10px;float:right;">{{date('d-m-Y',strtotime($not->notice_date))}}</h5>
                        </div>
                    </div>
                    <div class="notice-content">
                        <img src="{{ asset('dibrugarh') }}/icons/icons8-chevron-right-24 (2).png" alt="">
                        <div>
                        <a href="{{route('notice_board',['id'=>$not->id])}}"><span style="font-weight:bold;color:#e8af30">{{$not->noticationtype->type}}:</span> {{$not->title}}
                            @if($not->new_status==1)
                                &nbsp;<span class="new-tag">New</span>
                            @endif
                        </a>
                        </div>
                    </div>
                    <hr>
                @endforeach
            </marquee>
            <div class="notice-more-btn"><a href="{{route('notice_board')}}">More</a></div>
            </div>
        </div>
    </div>
    </div>
</section>
<!-- NPOTICES END -->
<div class="bcpl">
    <p>An initiative of the District Skill Committee in partnership with Brahmaputra Cracker and Polymer Limited (BCPL) CSR.</p>
</div>
<!-- SKILL DEVELOPMENT BANNER START -->
<div class="banner">
    <img src="{{ asset('dibrugarh') }}/img/slider3.jpg" alt="">
</div>

<!-- SKILL DEVELOPEMENT BANNER END -->




<!-- About Start -->
<div class="container1 py-5" style="padding: 0 2rem 0 0rem;">
    <div class="container-fluid py-5">
    <div class="row py-5">
    <div class="col-lg-7 pb-5 pb-lg-0 px-3 px-lg-5">
        <h4 class="text-secondary mb-3">Welcome to</h4>
        <h2 class="mb-4"><span class="text-primary"></span> <span class="text-secondary">Initiative of the
            District Skill Committee, Dibrugarh</span></h2>
        <!-- <h5 class="text-muted mb-3"></h5> -->
        <p class="mb-4" style="text-align:justify">{!!$paragraph!!}<button style="border:none;margin-left: 1rem;" class="welcome-btn"><a href="{{route('about_us')}}">Read More</a></button>
        </p>
    </div>
    <div class="col-lg-5">
        <div class="row px-3">
        <div class="col-12 p-0">
            <img class="img-fluid w-100" src="{{ asset('dibrugarh') }}/img/about-us.jpg" alt="">
        </div>
        </div>
    </div>
    </div>
</div>
</div>
<!-- About End -->


<!-- Features Start -->
<div class="container1" style="margin-bottom: 2rem;">
    <div class="row align-items-center">
    <!-- <div class="col-lg-5">
        <img class="img-fluid w-100" src="img/why-choose-us.jpg" alt="">
    </div> -->
    <div class="col-lg-12 py-5 py-lg-0 px-3 px-lg-5">
        <h4 class="text-secondary mb-3 why-district">Why District Skill Committee</h4>
        <div class="card-box">
        <div class="courses-container">
            <div class="course">
            <div class="course-preview">
                <img src="{{ asset('dibrugarh') }}/img/icons8-job-opportunities-68.png" alt="">
                <h5>Self-Employment Opportunities</h5>
            </div>

@extends('dibrugarh.layout.master')
@section('content')
    <!-- Navbar End -->
    <!-- Carousel Start -->
<div class="container-fluid p-0">
    <div class="row">
    <div class="col-lg-9 home-slider" style="padding-right:0">
        <div id="header-carousel" class="carousel slide" data-ride="carousel">
        <div class="carousel-inner">
            <div class="carousel-item active">
            <!-- <img class="w-100" src="img/carousel-1.jpg" alt="Image"> -->
            <!-- <img class="w-100" src="{{ asset('dibrugarh') }}/img/skill-development-banner.jpg" alt="banner" height="400px"> -->
            <img class="w-100" src="{{ asset('dibrugarh') }}/img/1.png" alt="banner" height="300px">
            <div class="carousel-caption d-flex flex-column align-items-center justify-content-center">
            </div>
            </div>
            <div class="carousel-item">
                <img class="w-100" src="{{ asset('dibrugarh') }}/img/2.png" alt="Image" height="300px">
            <div class="carousel-caption d-flex flex-column align-items-center justify-content-center">
            </div>
            </div>
        </div>
        <a class="carousel-control-prev" href="#header-carousel" data-slide="prev">
            <div class="btn btn-primary rounded slider-btn" style="width: 45px; height: 45px;">
            <span class="carousel-control-prev-icon mb-n2"></span>
            </div>
        </a>
        <a class="carousel-control-next" href="#header-carousel" data-slide="next">
            <div class="btn btn-primary rounded slider-btn" style="width: 45px; height: 45px;">
            <span class="carousel-control-next-icon mb-n2"></span>
            </div>
        </a>
        </div>
    </div>
    <div class="col-lg-3 courses-form-div">
        <div class="search-box">
        <h5 style="text-align: center;color: #fff; text-transform:uppercase;margin-top: 0rem;background: #e8af30;color: black;;padding: .2rem 0;">
            Search Courses
        </h5>
        <h6 style="margin-top: 2rem;color:#000;text-align:center;background: #e8af30;
        padding: .2rem 0;">OUR COURSES</h6>
        <form class="courses-form" action={{route('search_courses')}} method="post">
            @csrf
            <div class="select-box-1">
                <select name="sector" id="lang">
                    <option value="">-- Select Sector --</option>
                    @foreach ($sector as $sec )
                        <option value="{{$sec->sector_id}}">{{$sec->sector_name}}</option>
                    @endforeach
                </select>
            </div>
            <div class="select-box-2">
                <select name="courses" id="course">
                    <option value="">-- Select Courses --</option>
                    @foreach ($course as $cor)
                        <option value="{{$cor->course_id}}">{{$cor->course_name}}</option>
                    @endforeach
                </select>
            </div>
            <button value="submit" class="search-btn"><img src="{{ asset('dibrugarh') }}/icons/icons8-search-24.png" />Search</button>
        </form>
        </div>
    </div>

    </div>

</div>
<!-- Carousel End -->


<!-- NOTICES Start -->
{{-- <section id="skipToMainContent" class="notice-section"> --}}
<section id="testing" class="notice-section">
    <div class="container">
    <div class="row">
        <div class="col-lg-4 notice-board-heading">
            <h5>Upcoming Courses</h5>
            <div class="upcoming-courses">
                <div class="upcoming-courses-inner-div">
                    @foreach ($upcomingevents as $events)
                    <div>
                    <form action="{{route('view_course_details',['id'=>Crypt::encryptString($events->id)])}}" method="post">
                        @csrf
                        <img src="{{ asset('dibrugarh') }}/icons/icons8-book-26.png">
                        <a onclick="this.parentNode.submit();">{{$events->training_name}},&nbsp;starts from {{date('d-m-Y', strtotime($events->start_date))}} to {{date('d-m-Y', strtotime($events->end_date))}}.</a>
                    </form>
                    </div>
                    @endforeach
                </div>
                <div class="see-all-courses"><a href="{{route('course_dtl')}}">See All Courses</a></div>
            </div>
        </div>
        <div class="col-lg-4 notice-board-heading">
        <h5>Job Opportunities</h5>
        <div class="job">
            {{-- <marquee behavior="scroll" direction="up" scrollamount="3" height="260px" onmouseover="this.stop();" onmouseout="this.start();"> --}}

                <div class="job-inner-div">
                        @foreach ($jobs as $job )
                <div>
                    <img src="{{ asset('dibrugarh') }}/icons/icons8-job-seeker-24.png" alt="">
                    <a href="{{route('employee_corner',['id'=>$job->id])}}" class="job-name">{{$job->job_title}}</a>
                </div>
            @endforeach
            </div>
            {{-- </marquee> --}}
            <div class="job-btn"><a href="{{route('employee_corner')}}">Browse All Jobs</a></div>
        </div>
        </div>
        <div class="col-lg-4 notice-board-heading">
        <h5>Notice</h5>
            <div class="notice-div" height="310px">
            <marquee behavior="scroll" direction="up" scrollamount="3" height="258px" onmouseover="this.stop();" onmouseout="this.start();">
                @foreach ($notice as $not)
                    <div class="row">
                        <div class="form-group col-md-4">
                            <h5 style="font-size: 10px;float:right;">{{date('d-m-Y',strtotime($not->notice_date))}}</h5>
                        </div>
                    </div>
                    <div class="notice-content">
                        <img src="{{ asset('dibrugarh') }}/icons/icons8-chevron-right-24 (2).png" alt="">
                        <div>
                        <a href="{{route('notice_board',['id'=>$not->id])}}"><span style="font-weight:bold;color:#e8af30">{{$not->noticationtype->type}}:</span> {{$not->title}}
                            @if($not->new_status==1)
                                &nbsp;<span class="new-tag">New</span>
                            @endif
                        </a>
                        </div>
                    </div>
                    <hr>
                @endforeach
            </marquee>
            <div class="notice-more-btn"><a href="{{route('notice_board')}}">More</a></div>
            </div>
        </div>
    </div>
    </div>
</section>
<!-- NPOTICES END -->
<div class="bcpl">
    <p>An initiative of the District Skill Committee in partnership with Brahmaputra Cracker and Polymer Limited (BCPL) CSR.</p>
</div>
<!-- SKILL DEVELOPMENT BANNER START -->
<div class="banner">
    <img src="{{ asset('dibrugarh') }}/img/slider3.jpg" alt="">
</div>

<!-- SKILL DEVELOPEMENT BANNER END -->




<!-- About Start -->
<div class="container1 py-5" style="padding: 0 2rem 0 0rem;">
    <div class="container-fluid py-5">
    <div class="row py-5">
    <div class="col-lg-7 pb-5 pb-lg-0 px-3 px-lg-5">
        <!-- <h4 class="text-secondary mb-3">Welcome to</h4> -->
        <h2 class="mb-4"><span class="text-primary"></span> <span class="text-secondary"><a href="{{route('about_us')}}">An Initiative of the District Skill Committee</a></span></h2>
        <!-- <h5 class="text-muted mb-3"></h5> -->
        <p class="mb-4" style="text-align:justify">{!!$paragraph!!}<button style="border:none;margin-left: 1rem;" class="welcome-btn"><a href="{{route('about_us')}}">Read More</a></button>
        </p>
    </div>
    <div class="col-lg-5">
        <div class="row px-3">
        <div class="col-12 p-0">
            <!-- <img class="img-fluid w-100" src="{{ asset('dibrugarh') }}/img/about-us.jpg" alt=""> -->
            <div href="{{ asset('dibrugarh') }}/img/abou-us-new-2.jpg">
                <div id="slider">
                    <figure>
                        <img src="{{ asset('dibrugarh') }}/img/about-us.jpg" alt>
                        <img src="{{ asset('dibrugarh') }}/img/abou-us-new-2.jpg" alt>
                        <img src="{{ asset('dibrugarh') }}/img/abou-us-new-1.jpeg" alt>
                        <img src="{{ asset('dibrugarh') }}/img/abou-us-new-2.jpg" alt>
                        <img src="{{ asset('dibrugarh') }}/img/about-us.jpg" alt>
                    </figure>
                </div>
            </div>
        </div>
    </div>
    </div>
</div>
</div>
<!-- About End -->


<!-- Features Start -->
<div class="container1" style="margin-bottom: 2rem;">
    <div class="row align-items-center">
    <div class="col-lg-12 py-5 py-lg-0 px-3 px-lg-5">
        <h4 class="text-secondary mb-3 why-district">Why District Skill Committee</h4>
        <div class="card-box">
        <div class="courses-container">
            <div class="course">
            <div class="course-preview">
                <img src="{{ asset('dibrugarh') }}/img/icons8-job-opportunities-68.png" alt="">
                <h5>Self-Employment Opportunities</h5>
            </div>
            <div class="course-info">
                <h6>Self-Employment Opportunities</h6>
                <p>A platform thoughtfully curated to generate self-employment opportunities in Assam for domestic work professionals seeking jobs. </p>
                <button class="btn">Continue</button>
            </div>
            </div>
            <!-- <div class="course">
            <div class="course-preview">
                <img src="{{ asset('dibrugarh') }}/img/icons8-choice-64.png" alt="">
                <h5>Flexible Service Choices</h5>
            </div>
            <div class="course-info">
                <h6>Self-Employment Opportunities</h6>
                <p>A platform thoughtfully curated to generate self-employment opportunities in Uttar Pradesh for
                domestic work professionals seeking jobs. </p>
                <button class="btn">Continue</button>
            </div>
            </div> -->
            <div class="course">
            <div class="course-preview">
                <img src="{{ asset('dibrugarh') }}/img/assam-map.png" alt="">
                <h5>Atmanirbhar Assam</h5>
            </div>
            <div class="course-info">
                <h6>By Making us Self Reliant</h6>
                <p>A platform thoughtfully curated to generate self-employment opportunities in Assam for domestic work professionals seeking jobs. </p>
                <button class="btn">Continue</button>
            </div>
            </div>
            <!-- <div class="course">
            <div class="course-preview">
                <img src="{{ asset('dibrugarh') }}/img/icons8-job-opportunities-68.png" alt="">
                <h5>Self-Employment Opportunities</h5>
            </div>
            <div class="course-info">
                <h6>Self-Employment Opportunities</h6>
                <p>A platform thoughtfully curated to generate self-employment opportunities in Uttar Pradesh for
                domestic work professionals seeking jobs. </p>
                <button class="btn">Continue</button>
            </div>
            </div> -->
        </div>
        </div>
    </div>
    </div>
</div>
<!-- Features End -->

<!-- Counter up start -->
<div id="counter" class="counter-container">
    <div class="counter-div">
        <div class="counter-value" data-count="300"><span>0</span></div>
        <div class="counter-plus" style="margin-left: -1.7rem;"><img src="{{ asset('dibrugarh') }}/icons/icons8-plus-48.png" alt=""></div>
        <h6>Registered Training Partners</h6>
    </div>
    <div class="counter-div">
        <div class="counter-value" data-count="400">2000</div>
        <div class="counter-plus" style="margin-left: -.8rem;"><img src="{{ asset('dibrugarh') }}/icons/icons8-plus-48.png" alt=""></div>
        <h6>Registered Students</h6>
    </div>
    <div class="counter-div">
        <div class="counter-value" data-count="1500">1000</div>
        <div class="counter-plus"><img src="{{ asset('dibrugarh') }}/icons/icons8-plus-48.png" alt=""></div>
        <h6>Trained Students</h6>
    </div>
    <div class="counter-div">
        <div class="counter-value" data-count="1500">100</div>
        <div class="counter-plus"><img src="{{ asset('dibrugarh') }}/icons/icons8-plus-48.png" alt=""></div>
        <h6>Trained Faculty</h6>
    </div>
    <!-- <div id="overlay1"></div> -->
</div>

</div>

<!-- Counter Up End -->

<section class="trigger section gutter-horizontal bg-gray gutter-vertical--m gutter-horizontal" style="margin-top:1rem">
    <h4 style="color:#162f65; margin-bottom: 3rem;">Our Partners</h4>
    <div class="customer-logos slider">
    <div class="slide-in-right slide"><img
        src="{{ asset('dibrugarh') }}/img/asdm-logo.png" height="150" width="150"></a></div>
    <div class="slide-in-right slide"><img
        src="{{ asset('dibrugarh') }}/img/asdm-logo.png"
        height="150" width="150"></a></div>
    <div class="slide-in-right slide"><img
        src="{{ asset('dibrugarh') }}/img/asdm-logo.png"
        height="150" width="150"></a></div>
    <div class="slide-in-right slide"><img
        src="{{ asset('dibrugarh') }}/img/asdm-logo.png"
        height="150" width="150"></a></div>
    <div class="slide-in-right slide"><img
        src="{{ asset('dibrugarh') }}/img/asdm-logo.png"
        height="150" width="150" alt="Tannenmuehle"></a></div>
    <div class="slide-in-right slide"><img
        src="{{ asset('dibrugarh') }}/img/asdm-logo.png"
        height="150" width="150" alt="Loeffele"></a></div>
    <div class="slide-in-right slide"><img
        src="{{ asset('dibrugarh') }}/img/asdm-logo.png"
        alt="Krone" height="150" width="150"></a></div>
    <div class="slide-in-right slide"><img
        src="{{ asset('dibrugarh') }}/img/asdm-logo.png"
        alt="Obereggen" height="150" width="150"></a></div>
    <div class="slide-in-right slide"><img
        src="{{ asset('dibrugarh') }}/img/asdm-logo.png"
        alt="Ortnerhof" height="150" width="150"></a></div>
    <div class="slide-in-right slide"><img
        src="{{ asset('dibrugarh') }}/img/asdm-logo.png"
        alt="Ottonenhof" height="150" width="150"></a></div>
    <div class="slide-in-right slide"><img
        src="{{ asset('dibrugarh') }}/img/asdm-logo.png"
        alt="Leiners" height="150" width="150"></a></div>
    <div class="slide-in-right slide"><img
        src="{{ asset('dibrugarh') }}/img/asdm-logo.png"
        alt="Seitenalm" height="150" width="150"></a></div>
    <div class="slide-in-right slide"><img
        src="{{ asset('dibrugarh') }}/img/asdm-logo.png"
        alt="Testerhof" height="150" width="150"></a></div>
</section>

<!-- Blog End -->
@endsection
@section('scripts')
<script>
    $(document).ready(function(){
    $('.customer-logos').slick({
    slidesToShow: 4,
    slidesToScroll: 1,
    autoplay: true,
    autoplaySpeed: 1500,
    arrows: true,
    dots: false,
    pauseOnHover: false,
    prevArrow: '<i class="slick-prev fas fa-angle-left"></i>',
    nextArrow: '<i class="slick-next fas fa-angle-right"></i>',
    responsive: [{
    breakpoint: 768,
    settings: {
    slidesToShow: 3
    }
    }, {
    breakpoint: 520,
    settings: {
    slidesToShow: 2
    }
    }]
    });
    });
  </script>

  <!-- js counter -->
  <script>
     var a = 0;
$(window).scroll(function() {

  var oTop = $('#counter').offset().top - window.innerHeight;
  if (a == 0 && $(window).scrollTop() > oTop) {
    $('.counter-value').each(function() {
      var $this = $(this),
        countTo = $this.attr('data-count');
      $({
        countNum: $this.text()
      }).animate({
          countNum: countTo
        },

        {

          duration: 2000,
          easing: 'swing',
          step: function() {
            $this.text(Math.floor(this.countNum));
          },
          complete: function() {
            $this.text(this.countNum);
            //alert('finished');
          }

        });
    });
    a = 1;
  }

});
  </script>

@endsection
     <div class="course-info">
                <h6>Self-Employment Opportunities</h6>
                <p>A platform thoughtfully curated to generate self-employment opportunities in Uttar Pradesh for
                domestic work professionals seeking jobs. </p>
                <button class="btn">Continue</button>
            </div>
            </div>
            <div class="course">
            <div class="course-preview">
                <img src="{{ asset('dibrugarh') }}/img/icons8-choice-64.png" alt="">
                <h5>Flexible Service Choices</h5>
            </div>
            <div class="course-info">
                <h6>Self-Employment Opportunities</h6>
                <p>A platform thoughtfully curated to generate self-employment opportunities in Uttar Pradesh for
                domestic work professionals seeking jobs. </p>
                <button class="btn">Continue</button>
            </div>
            </div>
            <div class="course">
            <div class="course-preview">
                <img src="{{ asset('dibrugarh') }}/img/assam-map.png" alt="">
                <h5>Atmanirbhar Assam</h5>
            </div>
            <div class="course-info">
                <h6>Self-Employment Opportunities</h6>
                <p>A platform thoughtfully curated to generate self-employment opportunities in Uttar Pradesh for
                domestic work professionals seeking jobs. </p>
                <button class="btn">Continue</button>
            </div>
            </div>
            <div class="course">
            <div class="course-preview">
                <img src="{{ asset('dibrugarh') }}/img/icons8-job-opportunities-68.png" alt="">
                <h5>Self-Employment Opportunities</h5>
            </div>
            <div class="course-info">
                <h6>Self-Employment Opportunities</h6>
                <p>A platform thoughtfully curated to generate self-employment opportunities in Uttar Pradesh for
                domestic work professionals seeking jobs. </p>
                <button class="btn">Continue</button>
            </div>
            </div>
        </div>
        </div>
    </div>
    </div>
</div>
<!-- Features End -->

<section class="trigger section gutter-horizontal bg-gray gutter-vertical--m gutter-horizontal">
    <h4 style="color:#162f65; margin-bottom: 3rem;">Our Partners</h4>
    <div class="customer-logos slider">
    <div class="slide-in-right slide"><img
        src="{{ asset('dibrugarh') }}/img/asdm-logo.png" height="150" width="150"></a></div>
    <div class="slide-in-right slide"><img
        src="{{ asset('dibrugarh') }}/img/asdm-logo.png"
        height="150" width="150"></a></div>
    <div class="slide-in-right slide"><img
        src="{{ asset('dibrugarh') }}/img/asdm-logo.png"
        height="150" width="150"></a></div>
    <div class="slide-in-right slide"><img
        src="{{ asset('dibrugarh') }}/img/asdm-logo.png"
        height="150" width="150"></a></div>
    <div class="slide-in-right slide"><img
        src="{{ asset('dibrugarh') }}/img/asdm-logo.png"
        height="150" width="150" alt="Tannenmuehle"></a></div>
    <div class="slide-in-right slide"><img
        src="{{ asset('dibrugarh') }}/img/asdm-logo.png"
        height="150" width="150" alt="Loeffele"></a></div>
    <div class="slide-in-right slide"><img
        src="{{ asset('dibrugarh') }}/img/asdm-logo.png"
        alt="Krone" height="150" width="150"></a></div>
    <div class="slide-in-right slide"><img
        src="{{ asset('dibrugarh') }}/img/asdm-logo.png"
        alt="Obereggen" height="150" width="150"></a></div>
    <div class="slide-in-right slide"><img
        src="{{ asset('dibrugarh') }}/img/asdm-logo.png"
        alt="Ortnerhof" height="150" width="150"></a></div>
    <div class="slide-in-right slide"><img
        src="{{ asset('dibrugarh') }}/img/asdm-logo.png"
        alt="Ottonenhof" height="150" width="150"></a></div>
    <div class="slide-in-right slide"><img
        src="{{ asset('dibrugarh') }}/img/asdm-logo.png"
        alt="Leiners" height="150" width="150"></a></div>
    <div class="slide-in-right slide"><img
        src="{{ asset('dibrugarh') }}/img/asdm-logo.png"
        alt="Seitenalm" height="150" width="150"></a></div>
    <div class="slide-in-right slide"><img
        src="{{ asset('dibrugarh') }}/img/asdm-logo.png"
        alt="Testerhof" height="150" width="150"></a></div>
</section>

<!-- Blog End -->
@endsection
@section('scripts')
<script>
    $(document).ready(function(){
    $('.customer-logos').slick({
    slidesToShow: 4,
    slidesToScroll: 1,
    autoplay: true,
    autoplaySpeed: 1500,
    arrows: true,
    dots: false,
    pauseOnHover: false,
    prevArrow: '<i class="slick-prev fas fa-angle-left"></i>',
    nextArrow: '<i class="slick-next fas fa-angle-right"></i>',
    responsive: [{
    breakpoint: 768,
    settings: {
    slidesToShow: 3
    }
    }, {
    breakpoint: 520,
    settings: {
    slidesToShow: 2
    }
    }]
    });
    });
  </script>
@endsection
