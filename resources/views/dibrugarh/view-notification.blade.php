@extends('dibrugarh.layout.master')
@section('content')
@if ($notice!=0)
<div class="container1 py-5 course-event-main" style="padding: 0 3rem 0 2rem;">
    <div class="row py-5">
        <div class="col-lg-8 pb-5 pb-lg-0 px-3 px-lg-5">
            <h5 style="color:rgb(31, 71, 124)">{{$notice->title}}
                @if($notice->new_status==1)
                &nbsp;<span class="new-tag" style="font-size: 12px;">New</span>
                @endif
            </h5>
            <div class="course-event">
                <div class="events">
                    <ul>
                        <li>
                            <div class="time">
                                <img src="{{ asset('dibrugarh') }}/icons/icons8-calendar-26.png" alt="">
                                <span>{{ date('d-M-Y',strtotime($notice->date))}} </span>
                            </div>
                            <div class="details">
                                <p style="color:rgb(31, 71, 124);"><span style="font-weight:bold;"> Description : </span>{!!$notice->description!!}</p>
                                @if($notice->attachments != null)
                                    <p style="color:rgb(31, 71, 124);font-weight:bold;"><a href="{{$notice->attachments}}" target="blabk">View PDF &nbsp;<span><img src="{{ asset('dibrugarh') }}/icons/icons8-pdf-50.png" width="30"></span></a></p>
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
@foreach ($noticepartii as $notice)
<div class="container1 py-5 course-event-main" style="padding: 0 3rem 0 2rem;">
    <div class="row py-5">
        <div class="col-lg-8 pb-5 pb-lg-0 px-3 px-lg-5">
            <h5 style="color:rgb(31, 71, 124)">{{$notice->title}}
                @if($notice->new_status==1)
                &nbsp;<span class="new-tag" style="font-size: 12px;">New</span>
                @endif
            </h5>
            <div class="course-event">
                <div class="events">
                    <ul>
                        <li>
                            <div class="time">
                                <img src="{{ asset('dibrugarh') }}/icons/icons8-calendar-26.png" alt="">
                                <span>{{ date('d-M-Y',strtotime($notice->date))}} </span>
                            </div>
                            <div class="details">
                                <p style="color:rgb(31, 71, 124);"><span style="font-weight:bold;"> Description : </span>{!!$notice->description!!}</p>
                                @if($notice->attachments != null)
                                    <p style="color:rgb(31, 71, 124);font-weight:bold;"><a href="{{$notice->attachments}}" target="blabk">View PDF &nbsp;<span><img src="{{ asset('dibrugarh') }}/icons/icons8-pdf-50.png" width="30"></span></a></p>
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
