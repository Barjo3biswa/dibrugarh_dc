@extends('dibrugarh.layout.master')
@section('content')
    <!-- Navbar End -->


    <!-- About Start -->
    <div class="container1 py-5" style="padding: 0 3rem 0 2rem;">
        <div class="row py-5">
            <div class="col-lg-8 pb-5 pb-lg-0 px-3 px-lg-5">
                <h4>About Us</h4>
                <!-- <h4 class="text-secondary mb-3">Welcome to</h4>
                <h2 class="mb-4"><span class="text-primary">Initiative of</span> <span class="text-secondary">the
                        District Skill Committee.</span></h2> -->
                <p class="mb-4" style="text-align: justify;">The district of Dibrugarh with only one sub-division is situated in the eastern part of Assam. The district is surrounded by Dhemaji district and a part of Lakhimpur district in the north, part of Sivasagar district and Arunachal Pradesh in the south, Tinsukia district in the East and Sivasagar dist in the West. The district occupies an area of 3381 Sq Km.</p>

                    <p class="mb-4" style="text-align: justify;">The river Brahmaputra flows throughout the North Western boundary of the district. The only tributary falling at Brahmaputra in the district is Buridihing tributary which divided the district from East to West. It touches the town Naharkatia in the East, Khowang in the middle and at the last part of its course forms the boundary line between Dibrugarh and Sibsagar districts. The Dibrugarh district is a plain district of Assam. The entire is flat with gradual slop from the East Arunachal hills to the West. The soil of the district is mostly fertile Alluvial soil and this adjorning with the river Brahmaputra are composed sand and clay in varying proportion.</p>
                <!-- <a href="" class="btn btn-lg btn-primary mt-3 px-4 learn-more-btn">Learn More</a> -->
            </div>
            <div class="col-lg-4">
                <!-- <div class="row px-3">
                    <div class="col-6 p-0"> -->
                        <img class="img-fluid w-100" src="{{ asset('dibrugarh') }}/img/about-us.jpg" alt="">
                    <!-- </div> -->
                <!-- </div> -->
            </div>
        </div>
    </div>
    <!-- About End -->


    <!-- Features Start -->
    <!-- <div class="container-fluid bg-light">
        <div class="container">
            <div class="row align-items-center">
                <div class="col-lg-5">
                    <img class="img-fluid w-100" src="img/feature.jpg" alt="">
                </div>
                <div class="col-lg-7 py-5 py-lg-0 px-3 px-lg-5">
                    <h4 class="text-secondary mb-3">Why Choose Us?</h4>
                    <h1 class="display-4 mb-4"><span class="text-primary">Special Care</span> On Pets</h1>
                    <p class="mb-4">Dolor lorem lorem ipsum sit et ipsum. Sadip sea amet diam sed ut vero no sit. Et elitr stet sed sit sed kasd. Erat duo eos et erat sed diam duo</p>
                    <div class="row py-2">
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
                    </div>
                </div>
            </div>
        </div>
    </div> -->
    <!-- Features End -->


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


  @endsection
