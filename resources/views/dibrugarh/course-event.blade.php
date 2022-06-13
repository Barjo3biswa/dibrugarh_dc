@include('dibrugarh\header')
@include('dibrugarh\link-bar')
<div class="container1 py-5 course-event-main" style="padding: 0 3rem 0 2rem;">
    <div class="row py-5">
        <div class="col-lg-8 pb-5 pb-lg-0 px-3 px-lg-5">
            <h4>Department : {{$coursedtl->training_name}}</h4>
            <div class="course-event">
                <div class="events">
                    <ul>
                        <li>
                            <div class="time">
                                <img src="./icons/icons8-calendar-26.png" alt="">
                                <span>{{ date('d-M-Y',strtotime($coursedtl->start_date))}} To {{ date('d-M-Y',strtotime($coursedtl->end_date))}}</span>
                            </div>
                            <div class="details">
                                <h3>{{$coursedtl->training_name}}</h3>
                                <p>{{$coursedtl->training_details}}</p>
                                <a href="{{route('apply_login')}}">Apply</a>
                            </div>
                            <div style="clear: both;"></div>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
        <div class="col-lg-4">
            <img class="img-fluid w-100" src="{{ asset('dibrugarh') }}/img/about-us.jpg" alt="">
        </div>
    </div>
    <div class="course-details-event" style="margin-top:2rem;padding: 0 2rem;">
        <h4>Details</h4>
        <p>{{$coursedtl->training_details}}</p>
    </div>
</div>
@include('dibrugarh\footer')
