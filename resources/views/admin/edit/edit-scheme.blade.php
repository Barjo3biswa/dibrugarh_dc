@extends('layouts.app', ['activePage' => 'Add_course', 'titlePage' => __('Add_course')])

@section('content')
    <div class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-8">
                <form method="post" action="{{ route('admin.scheme.update') }}" autocomplete="off" class="form-horizontal">
                    @csrf
                <div class="card ">
                    <div class="card-header card-header-primary">
                        <h4 class="card-title">Update Scheme</h4>
                        <p class="card-category">Update Scheme information</p>
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
                            <label class="col-sm-2 col-form-label">Scheme Name</label>
                            <div class="col-sm-7">
                                <input type="text" name="scheme_name" class="form-control" placeholder="Enter Scheme Name" value="{{$scheme_dtl->scheme_name}}">
                            </div>
                        </div>

                        <div class="row">
                            <label class="col-sm-2 col-form-label">Scheme Code</label>
                            <div class="col-sm-7">
                                <input readonly name="scheme_code" class="form-control" placeholder="Enter Scheme Code" value="{{$scheme_dtl->scheme_id}}">
                            </div>
                        </div>
                        @if ($errors->has('scheme_code'))
                        <div id="name-error" class="error text-danger pl-3" for="scheme_code" style="display: block;">
                            <strong>{{ $errors->first('scheme_code') }}</strong>
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