@extends('dibrugarh.layout.master')
@section('content')
@if($job!=null)
<div class="container1 py-5 course-event-main" style="padding: 0 3rem 0 2rem;">
    <div class="row py-5">
        <div class="col-lg-8 pb-5 pb-lg-0 px-3 px-lg-5">
            <h5 style="color:rgb(31, 71, 124)">Name Of the Job : {{$job->job_title}}</h5>
            <h6 style="color:rgb(31, 71, 124)">Institute/Cpmpany Name : {{$job->company_name}}</h6>
            <div class="course-event">
                <div class="events">
                    <ul>
                        <li>
                            <div class="time">
                                <img src="{{ asset('dibrugarh') }}/icons/icons8-calendar-26.png" alt="">
                                <span>Posted On <br/>{{ date('d-M-Y',strtotime($job->date))}} </span>
                            </div>
                            <div class="details">
                                <div class="row">
                                    <div class="form-group col-md-6">
                                        <p style="color:rgb(31, 71, 124);"><span style="font-weight:bold;">No Of Post : {{$job->no_of_post}}</span></p>
                                    </div>
                                    <div class="form-group col-md-6">
                                        <p style="color:rgb(31, 71, 124);"><span style="font-weight:bold;">Job Location : {{$job->location}}</span></p>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="form-group col-md-6">
                                        <p style="color:rgb(31, 71, 124);"><span style="font-weight:bold;">Qualification : {{$job->eligibility}}</span></p>
                                    </div>
                                    <div class="form-group col-md-6">
                                        <p style="color:rgb(31, 71, 124);"><span style="font-weight:bold;">Experience : {{$job->experience}}</span></p>
                                    </div>
                                </div>
                                <p style="color:rgb(31, 71, 124);"><span style="font-weight:bold;">Job Description : </span>{!!$job->description!!}</p>
                                @if($job->attachments != null)
                                    <p style="color:rgb(31, 71, 124);font-weight:bold;"><a href="{{$job->attachments}}" target="blabk">View PDF &nbsp;<span><img src="{{ asset('dibrugarh') }}/icons/icons8-pdf-50.png" width="30"></span></a></p>
                                @endif
                            </div>
                            <div style="clear: both;"></div>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
</div>
@endif
@foreach ($jobs_real as $job)
<div class="container1 py-5 course-event-main" style="padding: 0 3rem 0 2rem;">
    <div class="row py-5">
        <div class="col-lg-8 pb-5 pb-lg-0 px-3 px-lg-5">
            <h5 style="color:rgb(31, 71, 124)">Name Of the Job : {{$job->job_title}}</h5>
            <h6 style="color:rgb(31, 71, 124)">Institute/Cpmpany Name : {{$job->company_name}}</h6>
            <div class="course-event">
                <div class="events">
                    <ul>
                        <li>
                            <div class="time">
                                <img src="{{ asset('dibrugarh') }}/icons/icons8-calendar-26.png" alt="">
                                <span>Posted On <br/>{{ date('d-M-Y',strtotime($job->date))}} </span>
                            </div>
                            <div class="details">
                                <div class="row">
                                    <div class="form-group col-md-6">
                                        <p style="color:rgb(31, 71, 124);"><span style="font-weight:bold;">No Of Post : {{$job->no_of_post}}</span></p>
                                    </div>
                                    <div class="form-group col-md-6">
                                        <p style="color:rgb(31, 71, 124);"><span style="font-weight:bold;">Job Location : {{$job->location}}</span></p>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="form-group col-md-6">
                                        <p style="color:rgb(31, 71, 124);"><span style="font-weight:bold;">Qualification : {{$job->eligibility}}</span></p>
                                    </div>
                                    <div class="form-group col-md-6">
                                        <p style="color:rgb(31, 71, 124);"><span style="font-weight:bold;">Experience : {{$job->experience}}</span></p>
                                    </div>
                                </div>
                                <p style="color:rgb(31, 71, 124);"><span style="font-weight:bold;">Job Description : </span>{!!$job->description!!}</p>
                                @if($job->attachments != null)
                                    <p style="color:rgb(31, 71, 124);font-weight:bold;"><a href="{{$job->attachments}}" target="blabk">View PDF &nbsp;<span><img src="{{ asset('dibrugarh') }}/icons/icons8-pdf-50.png" width="20"></span></a></p>
                                @endif
                            </div>
                            <div style="clear: both;"></div>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
</div>
@endforeach
@endsection
