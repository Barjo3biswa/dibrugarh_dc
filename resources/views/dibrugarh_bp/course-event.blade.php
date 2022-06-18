@extends('dibrugarh.layout.master')
@section('content')
<div class="container1 py-5 course-event-main" style="padding: 0 3rem 0 2rem;">
    <div class="row py-5">
        <div class="col-lg-8 pb-5 pb-lg-0 px-3 px-lg-5">
            @php
                $start=date('Y-m-d',strtotime($coursedtl->registration_starts));
                $end  =date('Y-m-d',strtotime($coursedtl->registration_ends));
                $today=date("Y-m-d");
                if($start <= $today && $today <= $end){
                $temp='Ongoing';
                }
                elseif($start > $today){
                $temp='Upcoming';
                }
                elseif($today > $end && $today > $start){
                $temp='Closed';
                }
                // $diff=date_diff($today,$start);
            @endphp
            <h3 style="color:rgb(31, 71, 124)">Training : {{$coursedtl->training_name}}</h3>
            <div class="course-event">
                <div class="events">
                    <ul>
                        <li>
                            <div class="time">
                                <img src="{{ asset('dibrugarh') }}/icons/icons8-calendar-26.png" alt="">
                                <span>{{ date('d-M-Y',strtotime($coursedtl->start_date))}} To {{ date('d-M-Y',strtotime($coursedtl->end_date))}}</span>
                            </div>
                            <div class="details">
                                <p style="color:rgb(31, 71, 124);font-weight:bold;">Department : {{$coursedtl->department->department_name}}</p>
                                <p style="color:rgb(34, 75, 129);font-weight:bold;">Scheme : {{$coursedtl->scheme->scheme_name}}</p>
                                <p style="color:rgb(31, 71, 124);font-weight:bold;">Course : {{$coursedtl->course->course_name}}</p>
                                <p style="color:rgb(31, 71, 124);font-weight:bold;">Registration Opens on {{ date('d-M-Y',strtotime($start))}} / Closing on {{ date('d-M-Y',strtotime($end))}}</p>
                                @if($temp=='Ongoing')
                                    <a href="{{route('apply_reqistration',['id'=>$coursedtl->id])}}">Apply</a>
                                @elseif($temp=='Upcoming')
                                    <a href="#">Opening Soon</a>
                                @else
                                    <a href="#">Registration Closed</a>
                                @endif
                            </div>
                            <div style="clear: both;"></div>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
        <div class="col-lg-4">
            <img class="img-fluid w-100" src="{{$coursedtl->attachments}}" alt="">
        </div>
    </div>
    <div class="course-details-event" style="padding: 0 2rem;">
        <h4>Details :</h4>
        <p>{{$coursedtl->training_details}}</p>
    </div>
</div>
@endsection