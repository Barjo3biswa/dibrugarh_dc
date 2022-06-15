
@extends('dibrugarh.layout.master')
@section('content')

    <!-- Navbar End -->


    <!-- Carousel Start -->
    <div class="container-fluid p-0">
      <div class="row">
        <div class="col-lg-9" style="padding-right:0">
          <div id="header-carousel" class="carousel slide" data-ride="carousel">
            <div class="carousel-inner">
              <div class="carousel-item active">
                <!-- <img class="w-100" src="img/carousel-1.jpg" alt="Image"> -->
                <!-- <img class="w-100" src="{{ asset('dibrugarh') }}/img/skill-development-banner.jpg" alt="banner" height="400px"> -->
                <img class="w-100" src="{{ asset('dibrugarh') }}/img/slider3.jpg" alt="banner" height="400px">
                <div class="carousel-caption d-flex flex-column align-items-center justify-content-center">
                </div>
              </div>
              <div class="carousel-item">
                <img class="w-100" src="img/carousel-2.jpg" alt="Image" height="400px">
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
          <div class="px-sm-5 search-box">
            <h5 style="text-align: center;color: #fff; text-transform:uppercase;margin-top: 0rem;background: #e8af30;color: black;;padding: .2rem 0;">
              Search Skilled Worker
            </h5>
            <h6 style="margin-top: 2rem;color:#fff;text-align:center">OUR COURSES</h6>
            <form class="courses-form">
              <div class="select-box-1">
                <select name="languages" id="lang">
                  <option value="--Select Courses--">-- Select Sector --
                  </option>
                  <option value="electrician">Dibrugarh
                  </option>
                  <option value="hardware">Tinsukia</option>
                  <option value="plumber">Sivasagar</option>
                  <option value="carpenter">Jorhat</option>
                  <option value="painter">Golaghat</option>
                </select>
              </div>
              <div class="select-box-2">
                <select name="courses" id="course">
                  <option value="--Select Courses--">-- Select Courses --
                  </option>
                  <option value="electrician">Electrician
                  </option>
                  <option value="hardware">IT Hardware</option>
                  <option value="plumber">Plumber</option>
                  <option value="carpenter">Carpenter</option>
                  <option value="painter">Painter</option>
                </select>
              </div>
              <a href="#" class="search-btn"><img src="{{ asset('dibrugarh') }}/icons/icons8-search-24.png" />Search</a>
            </form>
          </div>
        </div>

      </div>

    </div>
    <!-- Carousel End -->


    <!-- NOTICES Start -->
    <section class="notice-section">
      <div class="container">
        <div class="row">
          <div class="col-lg-4">
            <h5>Upcoming Courses</h5>
            <div class="upcoming-courses">
              <div>
                <img src="{{ asset('dibrugarh') }}/icons/icons8-book-26.png">
                <a href="">Lorem ipsum dolor sit amet. Lorem ipsum dolor sit amet consectetur.</a>
              </div>
              <div>
                <img src="{{ asset('dibrugarh') }}/icons/icons8-book-26.png">
                <a href="">Lorem ipsum dolor sit amet consectetur.</a>
              </div>
              <div>
                <img src="{{ asset('dibrugarh') }}/icons/icons8-book-26.png">
                <a href="">Lorem ipsum dolor sit amet consectetur.</a>
              </div>
              <div>
                <img src="{{ asset('dibrugarh') }}/icons/icons8-book-26.png">
                <a href="">Lorem ipsum dolor sit amet consectetur.</a>
              </div>
              <div>
                <img src="{{ asset('dibrugarh') }}/icons/icons8-book-26.png">
                <a href="">Lorem ipsum dolor sit amet consectetur.</a>
              </div>
              <div>
                <img src="{{ asset('dibrugarh') }}/icons/icons8-book-26.png">
                <a href="">Lorem ipsum dolor sit amet consectetur.</a>
              </div>
              <div class="see-all-courses"><a href="#">See All Courses</a></div>
            </div>
          </div>
          <div class="col-lg-4">
            <h5>New Job</h5>
            <div class="job">
              <!-- <marquee behavior="scroll" direction="up" scrollamount="1" height="300px"> -->
              <div>
                <img src="{{ asset('dibrugarh') }}/icons/icons8-job-seeker-24.png" alt="">
                <a href="" class="job-name">Lorem ipsum dolor sit. Lorem ipsum dolor sit.</a>
              </div>
              <div>
                <img src="{{ asset('dibrugarh') }}/icons/icons8-job-seeker-24.png" alt="">
                <a href="" class="job-name">Lorem ipsum dolor sit. Lorem ipsum dolor sit.</a>
              </div>
              <div>
                <img src="{{ asset('dibrugarh') }}/icons/icons8-job-seeker-24.png" alt="">
                <a href="" class="job-name">Lorem ipsum dolor sit. Lorem ipsum dolor sit.</a>
              </div>
              <div>
                <img src="{{ asset('dibrugarh') }}/icons/icons8-job-seeker-24.png" alt="">
                <a href="" class="job-name">Lorem ipsum dolor sit. Lorem ipsum dolor sit.</a>
              </div>
              <div>
                <img src="{{ asset('dibrugarh') }}/icons/icons8-job-seeker-24.png" alt="">
                <a href="" class="job-name">Lorem ipsum dolor sit. Lorem ipsum dolor sit.</a>
              </div>
              <div>
                <img src="{{ asset('dibrugarh') }}/icons/icons8-job-seeker-24.png" alt="">
                <a href="" class="job-name">Lorem ipsum dolor sit. Lorem ipsum dolor sit.</a>
              </div>
              <!-- </marquee> -->
              <div class="job-btn"><a href="#">Browse All Jobs</a></div>
            </div>
          </div>
          <div class="col-lg-4">
            <h5>Notice</h5>
              <div class="notice-div" height="310px">
                <marquee behavior="scroll" direction="up" scrollamount="1" height="300px">
                <div class="notice-content">
                  <img src="{{ asset('dibrugarh') }}/icons/icons8-chevron-right-24 (2).png" alt="">
                  <div>
                    <a href="">Lorem ipsum dolor sit amet consectetur adipisicing elit.</a>
                  </div>
                </div>
                <hr>
                <div class="notice-content">
                  <img src="{{ asset('dibrugarh') }}/icons/icons8-chevron-right-24 (2).png" alt="">
                  <div>
                    <a href="">Lorem ipsum dolor sit amet consectetur adipisicing elit.</a>
                  </div>
                </div>
                <hr>
                <div class="notice-content">
                  <img src="{{ asset('dibrugarh') }}/icons/icons8-chevron-right-24 (2).png" alt="">
                  <div>
                    <a href="">Lorem ipsum dolor sit amet consectetur adipisicing elit.</a>
                  </div>
                </div>
                <hr>
                <div class="notice-content">
                  <img src="{{ asset('dibrugarh') }}/icons/icons8-chevron-right-24 (2).png" alt="">
                  <div>
                    <a href="">Lorem ipsum dolor sit amet consectetur adipisicing elit.</a>
                  </div>
                </div>
                <hr>
                <div class="notice-content">
                  <img src="{{ asset('dibrugarh') }}/icons/icons8-chevron-right-24 (2).png" alt="">
                  <div>
                    <a href="">Lorem ipsum dolor sit amet consectetur adipisicing elit.</a>
                  </div>
                </div>
                </marquee>
                <div class="notice-more-btn"><a href="#">More</a></div>
              </div>
          </div>
        </div>
      </div>
    </section>

    <!-- class container-fluid -->
    <!-- <div class="container" id="tab-content">
        <div class="row align-items-center notice-section">
          <div class="col-lg-12 py-5 py-lg-0 px-3 px-lg-5 advertisement">
            <div class="row ad-box">
              <div class="tab">
                <button class="tablinks" onclick="openCity(event, 'Notice')" id="defaultOpen">NOTICE</button>
                <button class="tablinks" onclick="openCity(event, 'Circular')">CIRCULAR</button>
                <button class="tablinks" onclick="openCity(event, 'Advertisement')">ADVERTISEMENT</button>
              </div>

              <div id="Notice" class="tabcontent">
                <div class="notice-tabcontent">
                  <div>
                    <img src="{{ asset('dibrugarh') }}/img/icons8-right-arrow-26.png" alt="">
                    <p> Notice regarding Centre of Excellence (CoE)</p>
                  </div>
                  <div>
                    <img src="{{ asset('dibrugarh') }}/img/icons8-right-arrow-26.png" alt="">
                    <p> Public Notice of deactivation of 21 Qualification of Healthcare SSC</p>
                  </div>
                  <div>
                    <img src="{{ asset('dibrugarh') }}/img/icons8-right-arrow-26.png" alt="">
                    <p> Detailed Demand for Grants 2022-23</p>
                  </div>
                  <div>
                    <img src="{{ asset('dibrugarh') }}/img/icons8-right-arrow-26.png" alt="">
                    <p> Financial closure of Pradhan Mantri Kaushal Vikas
                      Yojana (PMKVY 2.0) (2016-20)- Submission of
                      pending committed liability alongwith Utilisation Certificates (UCs) for the release of funds
                      under
                      PMKVY 2.0 </p>
                  </div>
                  <div>
                    <img src="{{ asset('dibrugarh') }}/img/icons8-right-arrow-26.png" alt="">
                    <p> Notice regarding Centre of Excellence (CoE)</p>
                  </div>
                  <div>
                    <img src="{{ asset('dibrugarh') }}/img/icons8-right-arrow-26.png" alt="">
                    <p> Notice regarding Centre of Excellence (CoE)</p>
                  </div>
                  <div>
                    <img src="{{ asset('dibrugarh') }}/img/icons8-right-arrow-26.png" alt="">
                    <p> Notice regarding Centre of Excellence (CoE)</p>
                  </div>
                </div>

              </div>

              <div id="Circular" class="tabcontent">
                <ul>
                  <li><img src="{{ asset('dibrugarh') }}/img/icons8-right-arrow-26.png"> Financial closure of Pradhan Mantri Kaushal Vikas
                    Yojana (PMKVY 2.0) (2016-20)- Submission of
                    pending committed liability alongwith Utilisation Certificates (UCs) for the release of funds under
                    PMKVY 2.0 </li>
                  <li><img src="{{ asset('dibrugarh') }}/img/icons8-right-arrow-26.png"> Public Notice of deactivation of 21 Qualification of
                    Healthcare SSC</li>
                  <li><img src="{{ asset('dibrugarh') }}/img/icons8-right-arrow-26.png"> Detailed Demand for Grants 2022-23 </li>
                  <li><img src="{{ asset('dibrugarh') }}/img/icons8-right-arrow-26.png"> Notice regarding Centre of Excellence (CoE) </li>
                  <li><img src="{{ asset('dibrugarh') }}/img/icons8-right-arrow-26.png"> Notice regarding Centre of Excellence (CoE) </li>
                  <li><img src="{{ asset('dibrugarh') }}/img/icons8-right-arrow-26.png"> Notice regarding Centre of Excellence (CoE) </li>
                </ul>
              </div>

              <div id="Advertisement" class="tabcontent">
                <ul>
                  <li><img src="{{ asset('dibrugarh') }}/img/icons8-right-arrow-26.png"> Notice regarding Centre of Excellence (CoE) </li>
                  <li><img src="{{ asset('dibrugarh') }}/img/icons8-right-arrow-26.png">Public Notice of deactivation of 21 Qualification of
                    Healthcare SSC</li>
                  <li><img src="{{ asset('dibrugarh') }}/img/icons8-right-arrow-26.png"> Detailed Demand for Grants 2022-23 </li>
                  <li><img src="{{ asset('dibrugarh') }}/img/icons8-right-arrow-26.png"> Financial closure of Pradhan Mantri Kaushal Vikas
                    Yojana (PMKVY 2.0) (2016-20)- Submission of
                    pending committed liability alongwith Utilisation Certificates (UCs) for the release of funds under
                    PMKVY 2.0 </li>
                  <li><img src="{{ asset('dibrugarh') }}/img/icons8-right-arrow-26.png"> Notice regarding Centre of Excellence (CoE) </li>
                  <li><img src="{{ asset('dibrugarh') }}/img/icons8-right-arrow-26.png"> Notice regarding Centre of Excellence (CoE) </li>
                </ul>
              </div>
            </div>
          </div>
        </div>
    </div> -->
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
    <div class="container1 py-5" style="padding: 0 3rem 0 2rem;">
      <div class="row py-5">
        <div class="col-lg-7 pb-5 pb-lg-0 px-3 px-lg-5">
          <h4 class="text-secondary mb-3">Welcome to</h4>
          <h2 class="mb-4"><span class="text-primary">Initiative of</span> <span class="text-secondary">the
              District Skill Committee, Dibrugarh</span></h2>
          <!-- <h5 class="text-muted mb-3"></h5> -->
          <p class="mb-4" style="text-align:justify">The District Skill Committee, Dibrugarh is responsible for co-ordination of all Skill Development efforts across the Assam, removal of disconnect between demand and supply of skilled manpower, building the vocational and technical training framework, skill up-gradation, building of new skills and innovative thinking not only for existing jobs but also jobs that are to be created.The Ministry aims to skill on a large scale with speed and high standards in order to achieve it's vision of
            a 'Skilled Assam'.<button style="border:none;margin-left: 1rem;" class="welcome-btn"><a href="about.html">Details</a></button>
            </p>
          <!-- <ul class="list-inline">
            <li><h5><i class="fa fa-check-double text-secondary mr-3"></i>Best In Industry</h5></li>
            <li><h5><i class="fa fa-check-double text-secondary mr-3"></i>Emergency Services</h5></li>
            <li><h5><i class="fa fa-check-double text-secondary mr-3"></i>24/7 Customer Support</h5></li>
          </ul> -->
          <!-- <a href="" class="btn btn-lg btn-primary mt-3 px-4 learn-more-btn">Learn More</a> -->
        </div>
        <div class="col-lg-5">
          <div class="row px-3">
            <div class="col-12 p-0">
              <img class="img-fluid w-100" src="{{ asset('dibrugarh') }}/img/about-us.jpg" alt="">
            </div>
            <!-- <div class="col-6 p-0">
              <img class="img-fluid w-100" src="img/abou-us-new-1.jpeg" alt="" style="height:100%">
            </div>
            <div class="col-6 p-0">
              <img class="img-fluid w-100" src="img/abou-us-new-2.jpg" alt="">
            </div> -->
          </div>
        </div>
      </div>
    </div>
    <!-- About End -->


    <!-- Services Start -->
    <!-- <div class="container-fluid bg-light pt-5">
      <div class="container py-5">
        <div class="d-flex flex-column text-center mb-5">
          <h4 class="text-secondary mb-3">Our Services</h4>
          <h1 class="display-4 m-0"><span class="text-primary">Premium</span> Pet Services</h1>
        </div>
        <div class="row pb-3">
          <div class="col-md-6 col-lg-4 mb-4">
            <div class="d-flex flex-column text-center bg-white mb-2 p-3 p-sm-5">
              <h3 class="flaticon-house display-3 font-weight-normal text-secondary mb-3"></h3>
              <h3 class="mb-3">Pet Boarding</h3>
              <p>Diam amet eos at no eos sit lorem, amet rebum ipsum clita stet, diam sea est magna diam eos, rebum sit vero stet ipsum justo</p>
                <a class="text-uppercase font-weight-bold" href="">Read More</a>
            </div>
          </div>
          <div class="col-md-6 col-lg-4 mb-4">
            <div class="d-flex flex-column text-center bg-white mb-2 p-3 p-sm-5">
              <h3 class="flaticon-food display-3 font-weight-normal text-secondary mb-3"></h3>
              <h3 class="mb-3">Pet Feeding</h3>
              <p>Diam amet eos at no eos sit lorem, amet rebum ipsum clita stet, diam sea est magna diam eos, rebum sit vero stet ipsum justo</p>
              <a class="text-uppercase font-weight-bold" href="">Read More</a>
            </div>
          </div>
          <div class="col-md-6 col-lg-4 mb-4">
            <div class="d-flex flex-column text-center bg-white mb-2 p-3 p-sm-5">
              <h3 class="flaticon-grooming display-3 font-weight-normal text-secondary mb-3"></h3>
              <h3 class="mb-3">Pet Grooming</h3>
              <p>Diam amet eos at no eos sit lorem, amet rebum ipsum clita stet, diam sea est magna diam eos, rebum sit vero stet ipsum justo</p>
              <a class="text-uppercase font-weight-bold" href="">Read More</a>
            </div>
          </div>
          <div class="col-md-6 col-lg-4 mb-4">
            <div class="d-flex flex-column text-center bg-white mb-2 p-3 p-sm-5">
              <h3 class="flaticon-cat display-3 font-weight-normal text-secondary mb-3"></h3>
              <h3 class="mb-3">Per Training</h3>
              <p>Diam amet eos at no eos sit lorem, amet rebum ipsum clita stet, diam sea est magna diam eos, rebum sit vero stet ipsum justo</p>
              <a class="text-uppercase font-weight-bold" href="">Read More</a>
            </div>
          </div>
          <div class="col-md-6 col-lg-4 mb-4">
            <div class="d-flex flex-column text-center bg-white mb-2 p-3 p-sm-5">
              <h3 class="flaticon-dog display-3 font-weight-normal text-secondary mb-3"></h3>
              <h3 class="mb-3">Pet Exercise</h3>
              <p>Diam amet eos at no eos sit lorem, amet rebum ipsum clita stet, diam sea est magna diam eos, rebum sit vero stet ipsum justo</p>
              <a class="text-uppercase font-weight-bold" href="">Read More</a>
            </div>
          </div>
          <div class="col-md-6 col-lg-4 mb-4">
            <div class="d-flex flex-column text-center bg-white mb-2 p-3 p-sm-5">
              <h3 class="flaticon-vaccine display-3 font-weight-normal text-secondary mb-3"></h3>
              <h3 class="mb-3">Pet Treatment</h3>
              <p>Diam amet eos at no eos sit lorem, amet rebum ipsum clita stet, diam sea est magna diam eos, rebum sit vero stet ipsum justo</p>
              <a class="text-uppercase font-weight-bold" href="">Read More</a>
            </div>
          </div>
        </div>
      </div>
    </div> -->
    <!-- Services End -->

    <!-- Features Start -->
    <div class="container1" style="margin-bottom: 2rem;">
      <div class="row align-items-center">
        <!-- <div class="col-lg-5">
          <img class="img-fluid w-100" src="img/why-choose-us.jpg" alt="">
        </div> -->
        <div class="col-lg-12 py-5 py-lg-0 px-3 px-lg-5">
          <h4 class="text-secondary mb-3">Why District Skill Committee</h4>
          <!-- <p class="mb-4">Dolor lorem lorem ipsum sit et ipsum. Sadip sea amet diam sed ut vero no sit. Et elitr stet sed sit sed kasd. Erat duo eos et erat sed diam duo</p> -->
          <!-- <div class="row py-2">
            <div class="col-6">
              <div class="d-flex align-items-center mb-4">
                <h1 class="flaticon-cat font-weight-normal text-secondary m-0 mr-3"></h1>
                <h5 class="text-truncate m-0">Best In Industry</h5>
              </div>
            </div>
            <div class="col-6">
              <div class="d-flex align-items-center mb-4">
                <h1 class="flaticon-doctor font-weight-normal text-secondary m-0 mr-3"></h1>
                <h5 class="text-truncate m-0">Emergency Services</h5>
              </div>
            </div>
            <div class="col-6">
              <div class="d-flex align-items-center">
                <h1 class="flaticon-care font-weight-normal text-secondary m-0 mr-3"></h1>
                <h5 class="text-truncate m-0">Special Care</h5>
              </div>
            </div>
            <div class="col-6">
              <div class="d-flex align-items-center">
                <h1 class="flaticon-dog font-weight-normal text-secondary m-0 mr-3"></h1>
                <h5 class="text-truncate m-0">Customer Support</h5>
              </div>
            </div>
          </div> -->
          <div class="card-box">
            <div class="courses-container">
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


    <!-- Pricing Plan Start -->
    <!-- <div class="container-fluid bg-light pt-5 pb-4">
      <div class="container py-5">
        <div class="d-flex flex-column text-center mb-5">
          <h4 class="text-secondary mb-3">Pricing Plan</h4>
          <h1 class="display-4 m-0">Choose the <span class="text-primary">Best Price</span></h1>
        </div>
        <div class="row">
          <div class="col-lg-4 mb-4">
            <div class="card border-0">
              <div class="card-header position-relative border-0 p-0 mb-4">
                <img class="card-img-top" src="img/price-1.jpg" alt="">
                <div class="position-absolute d-flex flex-column align-items-center justify-content-center w-100 h-100" style="top: 0; left: 0; z-index: 1; background: rgba(0, 0, 0, .5);">
                  <h3 class="text-primary mb-3">Basic</h3>
                  <h1 class="display-4 text-white mb-0">
                    <small class="align-top" style="font-size: 22px; line-height: 45px;">$</small>49<small class="align-bottom" style="font-size: 16px; line-height: 40px;">/ Mo</small>
                  </h1>
                </div>
              </div>
              <div class="card-body text-center p-0">
                <ul class="list-group list-group-flush mb-4">
                  <li class="list-group-item p-2"><i class="fa fa-check text-secondary mr-2"></i>Feeding</li>
                  <li class="list-group-item p-2"><i class="fa fa-check text-secondary mr-2"></i>Boarding</li>
                  <li class="list-group-item p-2"><i class="fa fa-times text-danger mr-2"></i>Spa & Grooming</li>
                  <li class="list-group-item p-2"><i class="fa fa-times text-danger mr-2"></i>Veterinary Medicine</li>
                </ul>
              </div>
              <div class="card-footer border-0 p-0">
                <a href="" class="btn btn-primary btn-block p-3" style="border-radius: 0;">Signup Now</a>
              </div>
            </div>
          </div>
          <div class="col-lg-4 mb-4">
            <div class="card border-0">
              <div class="card-header position-relative border-0 p-0 mb-4">
                <img class="card-img-top" src="img/price-2.jpg" alt="">
                <div class="position-absolute d-flex flex-column align-items-center justify-content-center w-100 h-100" style="top: 0; left: 0; z-index: 1; background: rgba(0, 0, 0, .5);">
                  <h3 class="text-secondary mb-3">Standard</h3>
                  <h1 class="display-4 text-white mb-0">
                    <small class="align-top" style="font-size: 22px; line-height: 45px;">$</small>99<small class="align-bottom" style="font-size: 16px; line-height: 40px;">/ Mo</small>
                  </h1>
                </div>
              </div>
              <div class="card-body text-center p-0">
                <ul class="list-group list-group-flush mb-4">
                  <li class="list-group-item p-2"><i class="fa fa-check text-secondary mr-2"></i>Feeding</li>
                  <li class="list-group-item p-2"><i class="fa fa-check text-secondary mr-2"></i>Boarding</li>
                  <li class="list-group-item p-2"><i class="fa fa-check text-secondary mr-2"></i>Spa & Grooming</li>
                  <li class="list-group-item p-2"><i class="fa fa-times text-danger mr-2"></i>Veterinary Medicine</li>
                </ul>
              </div>
              <div class="card-footer border-0 p-0">
                <a href="" class="btn btn-secondary btn-block p-3" style="border-radius: 0;">Signup Now</a>
              </div>
            </div>
          </div>
          <div class="col-lg-4 mb-4">
            <div class="card border-0">
              <div class="card-header position-relative border-0 p-0 mb-4">
                <img class="card-img-top" src="img/price-3.jpg" alt="">
                <div class="position-absolute d-flex flex-column align-items-center justify-content-center w-100 h-100" style="top: 0; left: 0; z-index: 1; background: rgba(0, 0, 0, .5);">
                  <h3 class="text-primary mb-3">Premium</h3>
                  <h1 class="display-4 text-white mb-0">
                    <small class="align-top" style="font-size: 22px; line-height: 45px;">$</small>149<small class="align-bottom" style="font-size: 16px; line-height: 40px;">/ Mo</small>
                  </h1>
                </div>
              </div>
              <div class="card-body text-center p-0">
                <ul class="list-group list-group-flush mb-4">
                  <li class="list-group-item p-2"><i class="fa fa-check text-secondary mr-2"></i>Feeding</li>
                  <li class="list-group-item p-2"><i class="fa fa-check text-secondary mr-2"></i>Boarding</li>
                  <li class="list-group-item p-2"><i class="fa fa-check text-secondary mr-2"></i>Spa & Grooming</li>
                  <li class="list-group-item p-2"><i class="fa fa-check text-secondary mr-2"></i>Veterinary Medicine</li>
                </ul>
              </div>
              <div class="card-footer border-0 p-0">
                <a href="" class="btn btn-primary btn-block p-3" style="border-radius: 0;">Signup Now</a>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div> -->

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



    <!-- <section class="counter-section-new">
      <h4 style="color: #2980b9;">Achievements</h4>
      <div class="counter-section-main-div level">
        <div class="counter-box1">
          <div class="counter-box-icon-1st"><img src="{{ asset('dibrugarh') }}/img/icons8-user-account-50.png" style="position: absolute;
            top: 34%;
            left: 34%;
            z-index: 1;
            width: auto;
            height: 36px;
            color: white;">
          </div>
          <div class="counter-box-icon-2nd">
          </div>
          <p>All District Covered</p>
        </div>
        <div class="counter-box1">
          <div class="counter-box-icon-1st"><img src="{{ asset('dibrugarh') }}/img/icons8-user-account-50.png" style="position: absolute;
            top: 34%;
            left: 34%;
            z-index: 1;
            width: auto;
            height: 36px;
            color: white;">
          </div>
          <p>Our Partners</p>
        </div>
        <div class="counter-box1">
          <div class="counter-box-icon-1st">
            <img src="{{ asset('dibrugarh') }}/img/icons8-user-account-50.png" style="position: absolute;
            top: 34%;
            left: 34%;
            z-index: 1;
            width: auto;
            height: 36px;
            color: white;">
          </div>
          <p>Total Services</p>
        </div>
        <div class="counter-box1">
          <div class="counter-box-icon-1st"><img src="{{ asset('dibrugarh') }}/img/icons8-user-account-50.png" style="position: absolute;
            top: 34%;
            left: 34%;
            z-index: 1;
            width: auto;
            height: 36px;
            color: white;">
          </div>
          <p>Our Students</p>
        </div>
      </div>
    </section> -->


    <!-- Pricing Plan End -->


    <!-- Team Start -->
    <!-- <div class="container mt-5 pt-5 pb-3">
      <div class="d-flex flex-column text-center mb-5">
        <h4 class="text-secondary mb-3">Team Member</h4>
        <h1 class="display-4 m-0">Meet Our <span class="text-primary">Team Member</span></h1>
      </div>
      <div class="row">
        <div class="col-lg-3 col-md-6">
          <div class="team card position-relative overflow-hidden border-0 mb-4">
            <img class="card-img-top" src="img/team-1.jpg" alt="">
            <div class="card-body text-center p-0">
              <div class="team-text d-flex flex-column justify-content-center bg-light">
                <h5>Mollie Ross</h5>
                <i>Founder & CEO</i>
              </div>
              <div class="team-social d-flex align-items-center justify-content-center bg-dark">
                <a class="btn btn-outline-primary rounded-circle text-center mr-2 px-0" style="width: 36px; height: 36px;" href="#"><i class="fab fa-twitter"></i></a>
                <a class="btn btn-outline-primary rounded-circle text-center mr-2 px-0" style="width: 36px; height: 36px;" href="#"><i class="fab fa-facebook-f"></i></a>
                <a class="btn btn-outline-primary rounded-circle text-center mr-2 px-0" style="width: 36px; height: 36px;" href="#"><i class="fab fa-linkedin-in"></i></a>
                <a class="btn btn-outline-primary rounded-circle text-center px-0" style="width: 36px; height: 36px;" href="#"><i class="fab fa-instagram"></i></a>
              </div>
            </div>
          </div>
        </div>
        <div class="col-lg-3 col-md-6">
          <div class="team card position-relative overflow-hidden border-0 mb-4">
            <img class="card-img-top" src="img/team-2.jpg" alt="">
            <div class="card-body text-center p-0">
              <div class="team-text d-flex flex-column justify-content-center bg-light">
                <h5>Jennifer Page</h5>
                <i>Chef Executive</i>
              </div>
              <div class="team-social d-flex align-items-center justify-content-center bg-dark">
                <a class="btn btn-outline-primary rounded-circle text-center mr-2 px-0" style="width: 36px; height: 36px;" href="#"><i class="fab fa-twitter"></i></a>
                <a class="btn btn-outline-primary rounded-circle text-center mr-2 px-0" style="width: 36px; height: 36px;" href="#"><i class="fab fa-facebook-f"></i></a>
                <a class="btn btn-outline-primary rounded-circle text-center mr-2 px-0" style="width: 36px; height: 36px;" href="#"><i class="fab fa-linkedin-in"></i></a>
                <a class="btn btn-outline-primary rounded-circle text-center px-0" style="width: 36px; height: 36px;" href="#"><i class="fab fa-instagram"></i></a>
              </div>
            </div>
          </div>
        </div>
        <div class="col-lg-3 col-md-6">
          <div class="team card position-relative overflow-hidden border-0 mb-4">
            <img class="card-img-top" src="img/team-3.jpg" alt="">
            <div class="card-body text-center p-0">
              <div class="team-text d-flex flex-column justify-content-center bg-light">
                <h5>Kate Glover</h5>
                <i>Doctor</i>
              </div>
              <div class="team-social d-flex align-items-center justify-content-center bg-dark">
                <a class="btn btn-outline-primary rounded-circle text-center mr-2 px-0" style="width: 36px; height: 36px;" href="#"><i class="fab fa-twitter"></i></a>
                <a class="btn btn-outline-primary rounded-circle text-center mr-2 px-0" style="width: 36px; height: 36px;" href="#"><i class="fab fa-facebook-f"></i></a>
                <a class="btn btn-outline-primary rounded-circle text-center mr-2 px-0" style="width: 36px; height: 36px;" href="#"><i class="fab fa-linkedin-in"></i></a>
                <a class="btn btn-outline-primary rounded-circle text-center px-0" style="width: 36px; height: 36px;" href="#"><i class="fab fa-instagram"></i></a>
              </div>
            </div>
          </div>
        </div>
        <div class="col-lg-3 col-md-6">
          <div class="team card position-relative overflow-hidden border-0 mb-4">
            <img class="card-img-top" src="img/team-4.jpg" alt="">
            <div class="card-body text-center p-0">
              <div class="team-text d-flex flex-column justify-content-center bg-light">
                <h5>Lilly Fry</h5>
                <i>Trainer</i>
              </div>
              <div class="team-social d-flex align-items-center justify-content-center bg-dark">
                <a class="btn btn-outline-primary rounded-circle text-center mr-2 px-0" style="width: 36px; height: 36px;" href="#"><i class="fab fa-twitter"></i></a>
                <a class="btn btn-outline-primary rounded-circle text-center mr-2 px-0" style="width: 36px; height: 36px;" href="#"><i class="fab fa-facebook-f"></i></a>
                <a class="btn btn-outline-primary rounded-circle text-center mr-2 px-0" style="width: 36px; height: 36px;" href="#"><i class="fab fa-linkedin-in"></i></a>
                <a class="btn btn-outline-primary rounded-circle text-center px-0" style="width: 36px; height: 36px;" href="#"><i class="fab fa-instagram"></i></a>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div> -->
    <!-- Team End -->


    <!-- Testimonial Start -->

    <!-- Testimonial End -->


    <!-- Blog Start -->
    <!-- <div class="container pt-5">
      <div class="d-flex flex-column text-center mb-5">
        <h4 class="text-secondary mb-3">Pet Blog</h4>
        <h1 class="display-4 m-0"><span class="text-primary">Updates</span> From Blog</h1>
      </div>
      <div class="row pb-3">
        <div class="col-lg-4 mb-4">
          <div class="card border-0 mb-2">
            <img class="card-img-top" src="img/blog-1.jpg" alt="">
            <div class="card-body bg-light p-4">
              <h4 class="card-title text-truncate">Diam amet eos at no eos</h4>
              <div class="d-flex mb-3">
                <small class="mr-2"><i class="fa fa-user text-muted"></i> Admin</small>
                <small class="mr-2"><i class="fa fa-folder text-muted"></i> Web Design</small>
                <small class="mr-2"><i class="fa fa-comments text-muted"></i> 15</small>
              </div>
              <p>Diam amet eos at no eos sit lorem, amet rebum ipsum clita stet, diam sea est diam eos, rebum sit vero stet justo</p>
              <a class="font-weight-bold" href="">Read More</a>
            </div>
          </div>
        </div>
        <div class="col-lg-4 mb-4">
          <div class="card border-0 mb-2">
            <img class="card-img-top" src="img/blog-2.jpg" alt="">
            <div class="card-body bg-light p-4">
              <h4 class="card-title text-truncate">Diam amet eos at no eos</h4>
              <div class="d-flex mb-3">
                <small class="mr-2"><i class="fa fa-user text-muted"></i> Admin</small>
                <small class="mr-2"><i class="fa fa-folder text-muted"></i> Web Design</small>
                <small class="mr-2"><i class="fa fa-comments text-muted"></i> 15</small>
              </div>
              <p>Diam amet eos at no eos sit lorem, amet rebum ipsum clita stet, diam sea est diam eos, rebum sit vero stet justo</p>
              <a class="font-weight-bold" href="">Read More</a>
            </div>
          </div>
        </div>
        <div class="col-lg-4 mb-4">
          <div class="card border-0 mb-2">
            <img class="card-img-top" src="img/blog-3.jpg" alt="">
            <div class="card-body bg-light p-4">
              <h4 class="card-title text-truncate">Diam amet eos at no eos</h4>
              <div class="d-flex mb-3">
                <small class="mr-2"><i class="fa fa-user text-muted"></i> Admin</small>
                <small class="mr-2"><i class="fa fa-folder text-muted"></i> Web Design</small>
                <small class="mr-2"><i class="fa fa-comments text-muted"></i> 15</small>
              </div>
              <p>Diam amet eos at no eos sit lorem, amet rebum ipsum clita stet, diam sea est diam eos, rebum sit vero stet justo</p>
              <a class="font-weight-bold" href="">Read More</a>
            </div>
          </div>
        </div>
      </div>
    </div> -->
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
