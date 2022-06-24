@extends('layouts.app', ['activePage' => 'Add_course', 'titlePage' => __('Add_course')])

@section('content')
    <div class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-12">
                <form method="post" action="{{route('admin.training.save') }}" enctype="multipart/form-data" autocomplete="off" class="form-horizontal">
                    @csrf

                <div class="card ">
                <div class="card-header card-header-primary">
                    <h4 class="card-title">Add Training</h4>
                    <p class="card-category">Enter Training information</p>
                </div>
                <div class="card-body ">
                    @if (session('status'))
                    <div class="row">
                        <div class="col-sm-12">
                        <div class="alert alert-success">
                            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                            <i class="material-icons">close</i>
                            </button>
                            <span>{{ session('status') }}</span>
                        </div>
                        </div>
                    </div>
                    @endif
                    <div class="row">
                        <label class="col-sm-2 col-form-label">Training Name</label>
                        <div class="col-sm-4">
                            <input type="text" name="training_name" id="training_name" class="form-control" placeholder="Enter Training Name">
                        </div>
                    </div>

                    <div class="row">
                        <label class="col-sm-2 col-form-label">Training Code</label>
                        <div class="col-sm-4">
                            <input readonly name="training_code" class="form-control" value="{{$training_id}}">
                        </div>
                    </div>
                    @if ($errors->has('training_code'))
                        <div id="name-error" class="error text-danger pl-3" for="training_code" style="display: block;">
                            <strong>{{ $errors->first('training_code') }}</strong>
                        </div>
                    @endif

                    <div class="row">
                        <label class="col-sm-2 col-form-label">Sector Details</label>
                        <div class="col-sm-4">
                            <select name="sector_code" class="form-control">
                                <option value="">--Select--</option>
                                @foreach ($sector as $se)
                                     <option value="{{$se->sector_id}}">{{$se->sector_name}}</option>
                                @endforeach
                            </select>
                        </div>
                        <label class="col-sm-2 col-form-label">Organised By</label>
                        <div class="col-sm-4">
                            <select name="department_code" class="form-control">
                                <option value="">--Select--</option>
                                @foreach ($department as $de)
                                     <option value="{{$de->department_id}}">{{$de->department_name}}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>

                    <div class="row">
                        <label class="col-sm-2 col-form-label">Under Which Scheme</label>
                        <div class="col-sm-4">
                            <select name="scheme_code" class="form-control">
                                <option value="">--Select--</option>
                                @foreach ($scheme as $sc)
                                     <option value="{{$sc->scheme_id}}">{{$sc->scheme_name}}</option>
                                @endforeach
                            </select>
                        </div>
                        <label class="col-sm-2 col-form-label">Under Which Course</label>
                        <div class="col-sm-4">
                            <select name="course_code" class="form-control">
                                <option value="">--Select--</option>
                                @foreach ($course as $de)
                                     <option value="{{$de->course_id}}">{{$de->course_name}}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>

                    <div class="row">
                        <label class="col-sm-2 col-form-label">Registration Start Date</label>
                        <div class="col-sm-4">
                            <input type="date" name="reg_start_date" id="reg_start_date" class="form-control" >
                        </div>
                    {{-- </div>

                    <div class="row"> --}}
                        <label class="col-sm-2 col-form-label">Registration End Date</label>
                        <div class="col-sm-4">
                            <input type="date" name="reg_End_date" id="reg_End_date" class="form-control" >
                        </div>
                    </div>

                    <div class="row">
                        <label class="col-sm-2 col-form-label">Training Start Date</label>
                        <div class="col-sm-4">
                            <input type="date" name="start_date" id="start_date" class="form-control" >
                        </div>
                    {{-- </div>

                    <div class="row"> --}}
                        <label class="col-sm-2 col-form-label">Training End Date</label>
                        <div class="col-sm-4">
                            <input type="date" name="End_date" id="End_date" class="form-control" >
                        </div>
                    </div>

                    <div class="row">
                        <label class="col-sm-2 col-form-label">Place</label>
                        <div class="col-sm-4">
                            <input type="text" name="place" class="form-control" >
                        </div>
                        <label class="col-sm-2 col-form-label">Contact Details</label>
                        <div class="col-sm-4">
                            <input type="text" name="contact_details" class="form-control" >
                        </div>
                    </div>

                    <div class="row">
                        <label class="col-sm-2 col-form-label">Enter Document For This Training </label>
                        <div class="col-sm-4">
                            <input type="file" name="training_pdf" class="form-control" accept=".pdf">
                        </div>
                        <label class="col-sm-2 col-form-label">Enter Relative Image </label>
                        <div class="col-sm-4">
                            <input type="file" name="training_attachments" class="form-control" accept="image/jpeg, image/png">
                        </div>
                    </div>

                    <div class="row">
                        <label class="col-sm-2 col-form-label">Enter Training Details </label>
                        <div class="col-sm-7">
                            <textarea id="w3review" name="training_details" rows="4" cols="50" class="form-control">
                            </textarea>
                        </div>
                    </div>

                    <div class="row" style="margin-top:5px;">
                        <label class="col-sm-3 col-form-label">Publish This Training Now </label>
                        <div class="col-sm-1">
                            <label>Yes</label>
                            <input type="radio" id="yes_pub" name="publish_now" value="1" >
                        </div>
                        <div class="col-sm-1">
                            <label>No</label>
                            <input type="radio" id="no_pub" name="publish_now" value="0" checked="checked">
                        </div>
                    </div>

                </div>

                <div class="card-footer ml-auto mr-auto">
                    <button type="submit" class="btn btn-primary">{{ __('Save') }}</button>
                </div>
                </div>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection
@push('js')
  <script>
    $(document).ready(function() {

    // assuming the controls you want to attach the plugin to
    // have the "datepicker" class set
    $('#start_date').Zebra_DatePicker();
    $('#End_date').Zebra_DatePicker();
    $('#reg_start_date').Zebra_DatePicker();
    $('#reg_End_date').Zebra_DatePicker();

    });

  </script>
@endpush
