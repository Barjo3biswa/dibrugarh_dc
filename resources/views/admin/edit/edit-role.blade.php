@extends('layouts.app', ['activePage' => 'Add_course', 'titlePage' => __('Add_course')])

@section('content')
    <div class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-8">
                <form method="post" action="{{ route('admin.user_roles.update') }}" autocomplete="off" class="form-horizontal">
                    @csrf

                <div class="card ">
                    <div class="card-header card-header-primary">
                        <h4 class="card-title">Edit Role</h4>
                        <p class="card-category">Enter Role information</p>
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
                        @if (session('error'))
                        <div class="row">
                            <div class="col-sm-12">
                            <div class="alert alert-danger">
                                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                <i class="material-icons">close</i>
                                </button>
                                <span>{{ session('status') }}</span>
                            </div>
                            </div>
                        </div>
                        @endif
                        <div class="row">
                            <label class="col-sm-2 col-form-label">Role Name</label>
                            <div class="col-sm-7">
                                <input readonly name="Role_name" class="form-control" value="{{$role->role_title}}" >
                            </div>
                        </div><br/>

                        <div class="row">
                            <label class="col-sm-2 col-form-label">Role Code</label>
                            <div class="col-sm-7">
                                <input readonly name="Role_code" class="form-control" placeholder="Enter Role Code" value="{{$role->role_id}}">
                            </div>
                        </div><br/>
                        @if ($errors->has('Role_code'))
                        <div id="name-error" class="error text-danger pl-3" for="Role_code" style="display: block;">
                            <strong>{{ $errors->first('Role_code') }}</strong>
                        </div>
                        @endif

                        <div class="row">
                            <label class="col-sm-2 col-form-label">Assign Permission</label>
                            <div class="col-sm-7">
                                <select class=" form-control js-example-basic-multiple" name="permission[]" multiple="multiple">
                                    @foreach ($permission as $per)
                                        <option value="{{$per->per_id}}"
                                            @foreach ($role->permission as $val)
                                                  @if ($per->per_id == $val->per_id)
                                                  selected = "selected"
                                                  @endif
                                            @endforeach

                                            >{{$per->per_title}}</option>
                                        {{-- <option value="{{ $id }}" {{ (in_array($id, old('permissions', [])) || isset($role) && $role->permissions->contains($id)) ? 'selected' : '' }}>
                                            {{ $permissions }}
                                        </option> --}}
                                    @endforeach
                                </select>
                            </div>
                        </div>



                    </div>
                    <div class="card-footer ml-auto mr-auto">
                        <button type="submit" class="btn btn-primary">{{ __('Update') }}</button>
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
    $('.js-example-basic-multiple').select2();
});
</script>

@endpush
