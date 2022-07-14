@extends('layouts.app', ['activePage' => 'Add_course', 'titlePage' => __('Add_course')])

@section('content')
@forelse ($messages as $msg)
    <div class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-10">
                <div class="card ">
                    <div class="card-header card-header-primary">
                        <h4 class="card-title">{{$msg->name}}</h4>
                        <div class="row">
                            <p class="card-category col-md-3">{{$msg->email}}</p>
                            <p class="card-category col-md-2">{{$msg->phone}}</p>
                            @if ($msg->status==0)
                            <p class="card-category col-md-3" style="color:rgb(154, 204, 154)">{{ date('h:m:s d-M-Y',strtotime($msg->created_at))}}</p>
                            @else
                            <p class="card-category col-md-3">{{ date('h:m:s d-M-Y',strtotime($msg->created_at))}}</p>
                            @endif

                        </div>
                    </div>
                    <div class="card-body ">
                        <div class="row">
                            <p><b>{{$msg->message}}</b></p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@empty
    <div class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-10">
                <div class="card ">
                    <div class="card-header card-header-primary">
                        <h4 class="card-title">No Enquiry Found</h4>
                    </div>
                    <div class="card-body ">
                    </div>
                </div>
            </div>
        </div>
    </div>
@endforelse
@endsection
@push('js')
<script>
   $(window).on('load', function() {
    // alert("ok");
    $.ajax({
        url: "{{route('admin.enquiry.all_read')}}",
        type: 'get',
        dataType: 'json',
        data: {id:1},
        success:function(success){
            console.log(success);

        },
    });
  });
</script>
@endpush
