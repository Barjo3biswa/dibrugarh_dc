@extends('layouts.app', ['activePage' => 'Add_course', 'titlePage' => __('Add_course')])

@section('content')
    <div class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-8">
                <form method="post" action="{{ route('admin.course.save') }}" autocomplete="off" class="form-horizontal">
                    @csrf
                <div class="card ">
                    <div class="card-header card-header-primary">
                        <h4 class="card-title">Add Course</h4>
                        <p class="card-category">Enter Course information</p>
                    </div><br/>
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
                            <label class="col-sm-2 col-form-label">Course Name</label>
                            <div class="col-sm-7">
                                <input type="text" name="course_name" class="form-control" placeholder="Enter Course Name">
                            </div>
                        </div>

                        <div class="row">
                            <label class="col-sm-2 col-form-label">Course Code</label>
                            <div class="col-sm-7">
                                <input type="text" name="course_code" class="form-control" placeholder="Enter Course Code">
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
