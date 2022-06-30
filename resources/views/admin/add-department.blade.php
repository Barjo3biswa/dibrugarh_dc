@extends('layouts.app', ['activePage' => 'Add_course', 'titlePage' => __('Add_course')])

@section('content')
    <div class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-10">
                <form method="post" action="{{ route('admin.department.save') }}" autocomplete="off" class="form-horizontal">
                    @csrf

                <div class="card ">
                    <div class="card-header card-header-primary">
                        <h4 class="card-title">Add Department</h4>
                        <p class="card-category">Enter Department information</p>
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
                            <label class="col-sm-2 col-form-label">Department Name</label>
                            <div class="col-sm-7">
                                <input type="text" name="department_name" class="form-control" placeholder="Enter Department Name">
                            </div>
                        </div>

                        <div class="row">
                            <label class="col-sm-2 col-form-label">Department Code</label>
                            <div class="col-sm-7">
                                <input type="text" name="department_id" class="form-control" placeholder="Enter Department Code">
                            </div>
                        </div>
                        @if ($errors->has('department_id'))
                        <div id="name-error" class="error text-danger pl-3" for="department_id" style="display: block;">
                            <strong>{{ $errors->first('department_id') }}</strong>
                        </div>
                        @endif

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
