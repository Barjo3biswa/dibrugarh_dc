@extends('layouts.app', ['activePage' => 'Add_course', 'titlePage' => __('Add_course')])

@section('content')
    <div class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-8">
                <form class="form" method="POST" action="{{ route('admin.department_user.save') }}">
                    @csrf
                    <div class="card ">
                        <div class="card-header card-header-primary">
                            <h4 class="card-title">Add User</h4>
                            <p class="card-category">Enter User information</p>
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
                                <label class="col-sm-2 col-form-label">Select Department</label>
                                <div class="col-sm-7">
                                    <select name="department" id="department" class="form-control">
                                        <option value="">Select</option>
                                        @foreach ($department as $dept)
                                            <option value="{{$dept->department_id}}" {{old('department')==$dept->department_id ? 'selected' : '' }}>{{$dept->department_name}}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>

                            <div class="row">
                                <label class="col-sm-2 col-form-label">Select Role</label>
                                <div class="col-sm-7">
                                    <select name="role" id="role" class="form-control">
                                        <option value="">Select</option>
                                        @foreach ($role as $le)
                                            <option value="{{$le->role_id}}" {{old('department')==$le->role_id ? 'selected' : '' }}>{{$le->role_title}}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>

                            <div class="row">
                                <label class="col-sm-2 col-form-label">Name</label>
                                <div class="col-sm-7">
                                    <input type="text" name="name" class="form-control" placeholder="Enter Department Code" value="{{old('name') ?? ''}}">
                                </div>
                            </div>
                            @if ($errors->has('name'))
                                <div id="name-error" class="error text-danger pl-3" for="name" style="display: block;">
                                <strong>{{ $errors->first('name') }}</strong>
                                </div>
                            @endif

                            <div class="row">
                                <label class="col-sm-2 col-form-label">Email</label>
                                <div class="col-sm-7">
                                    <input type="email" name="email" class="form-control" placeholder="Enter Department Code" value="{{old('email')?? ''}}">
                                </div>
                            </div>
                            @if ($errors->has('email'))
                                <div id="email-error" class="error text-danger pl-3" for="email" style="display: block;">
                                <strong>{{ $errors->first('email') }}</strong>
                                </div>
                            @endif

                            <div class="row">
                                <label class="col-sm-2 col-form-label">Password</label>
                                <div class="col-sm-7">
                                    <input type="password" name="password" class="form-control" placeholder="Enter Department Code">
                                </div>
                            </div>
                            @if ($errors->has('password'))
                                <div id="password-error" class="error text-danger pl-3" for="password" style="display: block;">
                                <strong>{{ $errors->first('password') }}</strong>
                                </div>
                            @endif

                            <div class="row">
                                <label class="col-sm-2 col-form-label">Confirm Password</label>
                                <div class="col-sm-7">
                                    <input type="password" name="password_confirmation" class="form-control" placeholder="Enter Department Code">
                                </div>
                            </div>
                            @if ($errors->has('password_confirmation'))
                                <div id="password_confirmation-error" class="error text-danger pl-3" for="password_confirmation" style="display: block;">
                                <strong>{{ $errors->first('password_confirmation') }}</strong>
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
</div>
@endsection
