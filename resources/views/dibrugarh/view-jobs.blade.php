@extends('dibrugarh.layout.master')
@section('content')
@if (session('success'))
<div class="row">
    <div class="col-sm-12">
    <div class="alert alert-success">
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
        <i class="material-icons">close</i>
        </button>
        <span>{{ session('success') }}</span>
    </div>
    </div>
</div>
@endif
<div class="container1 py-5 job-posting-button-div sticky" style="padding: 0 4rem 0 4.4rem;">
    <button type="submit" class="job-posting-btn"><a href="{{route('job_add_request')}}">Request for Job Posting</a></button>
</div>
@if ($job!=null)
<div class="container1 py-5 course-event-main" style="padding:0 4rem 0 4.4rem;">
    <div class="row">
        <div class="col-lg-6 pb-5 pb-lg-0 px-3" style="margin-bottom:2rem">
            <h6 style="color:rgb(0,0,0)">Name Of the Job : {{$job->job_title}}</h6>
            <p style="color:rgb(0,0,0,)">Institute/Cpmpany Name : {{$job->company_name}}</p>
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
                                    <div class="form-group col-md-4">
                                        <p style="color:rgb(31, 71, 124);"><span style="font-weight:bold;">No Of Post : {{$job->no_of_post}}</span></p>
                                    </div>
                                    <div class="form-group col-md-8">
                                        <p style="color:rgb(31, 71, 124);"><span style="font-weight:bold;">Job Location : {{$job->location}}</span></p>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="form-group col-md-4">
                                        <p style="color:rgb(31, 71, 124);"><span style="font-weight:bold;">Job Type : {{$job->job_type}}</span></p>
                                    </div>
                                    <div class="form-group col-md-8">
                                        <p style="color:rgb(31, 71, 124);"><span style="font-weight:bold;">Qualification : {{$job->eligibility}}</span></p>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="form-group col-md-4">
                                        <p style="color:rgb(31, 71, 124);"><span style="font-weight:bold;">Experience : {{$job->experience}}</span></p>
                                    </div>
                                    <div class="form-group col-md-8">
                                        <p style="color:rgb(31, 71, 124);"><span style="font-weight:bold;">Phone No. : {{$job->mobile}}</span></p>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="form-group col-md-12">
                                        <p style="color:rgb(31, 71, 124);"><span style="font-weight:bold;">Email : {{$job->email}}</span></p>
                                    </div>
                                </div>
                                <p style="color:rgb(31, 71, 124);"><span style="font-weight:bold;">Job Description : </span>{{-- {!!$job->description!!}  --}}<span class="job-details-popup" {{-- data-toggle="modal" data-target="#exampleModal1" --}} onclick="showpopup({{$job->id}})">Details</span></p>
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

<div class="container1 py-5 course-event-main" style="padding:0 4rem 0 4.4rem;">
    <div class="row">
        @foreach ($jobs_real as $job)
        <div class="col-lg-6 pb-5 pb-lg-0 px-3" style="margin-bottom:2rem">
            <h6 style="color:rgb(0,0,0)">Name Of the Job : {{$job->job_title}}</h6>
            <p style="color:rgb(0,0,0,)">Institute/Cpmpany Name : {{$job->company_name}}</p>
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
                                    <div class="form-group col-md-4">
                                        <p style="color:rgb(31, 71, 124);"><span style="font-weight:bold;">No Of Post : {{$job->no_of_post}}</span></p>
                                    </div>
                                    <div class="form-group col-md-8">
                                        <p style="color:rgb(31, 71, 124);"><span style="font-weight:bold;">Job Location : {{$job->location}}</span></p>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="form-group col-md-4">
                                        <p style="color:rgb(31, 71, 124);"><span style="font-weight:bold;">Job Type : {{$job->job_type}}</span></p>
                                    </div>
                                    <div class="form-group col-md-8">
                                        <p style="color:rgb(31, 71, 124);"><span style="font-weight:bold;">Qualification : {{$job->eligibility}}</span></p>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="form-group col-md-4">
                                        <p style="color:rgb(31, 71, 124);"><span style="font-weight:bold;">Experience : {{$job->experience}}</span></p>
                                    </div>
                                    <div class="form-group col-md-8">
                                        <p style="color:rgb(31, 71, 124);"><span style="font-weight:bold;">Phone No. : {{$job->mobile}}</span></p>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="form-group col-md-12">
                                        <p style="color:rgb(31, 71, 124);"><span style="font-weight:bold;">Email : {{$job->email}}</span></p>
                                    </div>
                                </div>
                                <p style="color:rgb(31, 71, 124);"><span style="font-weight:bold;">Job Description : </span>{{-- {!!$job->description!!}  --}}<span class="job-details-popup" {{-- data-toggle="modal" data-target="#exampleModal1" --}} onclick="showpopup({{$job->id}})">Details</span></p>
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
        @endforeach
    </div>
</div>

<div class="modal fade bd-example-modal-lg" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg">
    <div class="modal-content">
        <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Job Details</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
        </button>
        </div>
        <div class="modal-body" id="model_data">

        </div>
    </div>
    </div>
</div>
@endsection
@section('scripts')
<script>

function showpopup(job_id){
    $.ajax({
            url: "{{route('show_job_popup')}}",
            type: 'get',
            dataType: 'json',
            data: {id:job_id},
            success:function(success){
                console.log(success.data);

                var html=`<div class="row col-md-12">
                            <div class="col-md-6">
                                    <label><b>Job Title : `+success.data.job_title+`</b></label>
                            </div>
                        </div>
                        <div class="row col-md-12">
                            <div class="col-md-6">
                                <label><b>Institute/Company : `+success.data.company_name+`</b></label>
                            </div>
                            <div class="col-md-6">
                                <label><b>Experience  : `+success.data.experience+`</b></label>
                            </div>
                        </div>
                        <div class="row col-md-12">
                            <div class="col-md-6">
                                    <label><b>No of Post : `+success.data.no_of_post+`</b></label>
                            </div>
                            <div class="col-md-6">
                                <label><b>Job Location : `+success.data.location+`</b></label>
                            </div>
                        </div>
                        <div class="row col-md-12">
                            <div class="col-md-6">
                                    <label><b>Job Type : `+success.data.job_type+`</b></label>
                            </div>
                            <div class="col-md-6">
                                <label><b>Qualification : `+success.data.eligibility+`</b></label>
                            </div>
                        </div>
                        <div class="row col-md-12">
                            <div class="col-md-6">
                                    <label><b>Phone No : `+success.data.mobile+`</b></label>
                            </div>
                            <div class="col-md-6">
                                <label><b>Email : `+success.data.email+`</b></label>
                            </div>
                        </div>
                        <div class="row col-md-12">
                            <div class="col-md-10">
                                    <label><b>Job Description : `+success.data.description+`</b></label>
                            </div>
                        </div>`;
                    $("#model_data").empty();
                    $("#model_data").append(html);
                    $('#myModal').modal('show');
            },
        });
}
</script>
@endsection
