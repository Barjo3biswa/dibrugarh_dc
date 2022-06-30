@extends('layouts.app', ['activePage' => 'Add_course', 'titlePage' => __('Add_course')])

@section('content')
    <div class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-10">
                <form method="post" action="{{route('admin.sector.save')}}" autocomplete="off" class="form-horizontal">
                    @csrf

                <div class="card ">
                    <div class="card-header card-header-primary">
                        <h4 class="card-title">Add Sector</h4>
                        <p class="card-category">Enter Sector information</p>
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
                            <label class="col-sm-2 col-form-label">Sector Name</label>
                            <div class="col-sm-7">
                                <input type="text" name="sector_name" class="form-control" placeholder="Enter sector Name" value="{{old('sector_name')}}">
                            </div>
                        </div>

                        <div class="row">
                            <label class="col-sm-2 col-form-label">Sector Id</label>
                            <div class="col-sm-7">
                                <input type="text" name="sector_id" class="form-control" placeholder="Enter sector Code" value="{{old('sector_id')}}">
                            </div>
                        </div>
                        @if ($errors->has('sector_id'))
                        <div id="name-error" class="error text-danger pl-3" for="sector_id" style="display: block;">
                            <strong>{{ $errors->first('sector_id') }}</strong>
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
