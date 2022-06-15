@extends('layouts.app', ['activePage' => 'Add_course', 'titlePage' => __('Add_course')])

@section('content')
    <div class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-12">
                <form method="post" action="{{ route('admin.training.save') }}" enctype="multipart/form-data" autocomplete="off" class="form-horizontal">
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
                        <div class="col-sm-7">
                            <input type="text" name="training_name" id="training_name" class="form-control" placeholder="Enter Training Name">
                        </div>
                    </div>

                    <div class="row">
                        <label class="col-sm-2 col-form-label">Training Code</label>
                        <div class="col-sm-7">
                            <input type="text" name="training_code" class="form-control" placeholder="Enter Training Code">
                        </div>
                    </div>


                    <div class="row">
                        <label class="col-sm-2 col-form-label">Organised By</label>
                        <div class="col-sm-7">
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
                        <div class="col-sm-7">
                            <select name="scheme_code" class="form-control">
                                <option value="">--Select--</option>
                                @foreach ($scheme as $sc)
                                     <option value="{{$sc->scheme_id}}">{{$sc->scheme_name}}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>

                    <div class="row">
                        <label class="col-sm-2 col-form-label">Under Which Course</label>
                        <div class="col-sm-7">
                            <select name="course_code" class="form-control">
                                <option value="">--Select--</option>
                                @foreach ($course as $de)
                                     <option value="{{$de->course_id}}">{{$de->course_name}}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>

                    <div class="row">
                        <label class="col-sm-2 col-form-label">Start Date</label>
                        <div class="col-sm-7">
                            <input type="date" name="start_date" id="start_date" class="form-control" >
                        </div>
                    </div>

                    <div class="row">
                        <label class="col-sm-2 col-form-label">End Date</label>
                        <div class="col-sm-7">
                            <input type="date" name="End_date" id="End_date" class="form-control" >
                        </div>
                    </div>

                    <div class="row">
                        <label class="col-sm-2 col-form-label">Place</label>
                        <div class="col-sm-7">
                            <input type="text" name="place" class="form-control" >
                        </div>
                    </div>

                    <div class="row">
                        <label class="col-sm-2 col-form-label">Contact Details</label>
                        <div class="col-sm-7">
                            <input type="text" name="contact_details" class="form-control" >
                        </div>
                    </div>

                    <div class="row">
                        <label class="col-sm-2 col-form-label">Enter Training Details </label>
                        <div class="col-sm-7">
                            <textarea id="w3review" name="training_details" rows="4" cols="50" class="form-control">
                            </textarea>
                        </div>
                    </div>

                    <div class="row">
                        <label class="col-sm-2 col-form-label">Enter Relative Image </label>
                        <div class="col-sm-7">
                            <input type="file" name="training_attachments" class="form-control" accept="image/jpeg, image/png">
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
<script src="path/to/zebra_datepicker.min.js"></script>
  <script>
    $('#start_date').Zebra_DatePicker();
    $('#end_date').Zebra_DatePicker();

  </script>
@endpush
