<div class="card">
    <div class="card-header card-header-primary">
        <h4 class="card-title ">Filter Applications</h4>
        <p class="card-category"> Filter By Below fields</p>
    </div>
    <div class="card-body">
        <div class="row">
            <label class="col-sm-2 col-form-label">Registration No</label>
            <div class="col-sm-3">
                <input type="text" name="reg_No" class="form-control" value="{{$filter['reg_No'] ?? " "}}">
            </div>
            <label class="col-sm-2 col-form-label">Qualification</label>
            <div class="col-sm-3">
                <select name="Qualification" class="form-control" >
                    <option value="">--Select--</option>
                    @foreach ($qualification as $quali)
                         <option value="{{$quali->id}}"
                            @if(isset($filter['Qualification']))
                            {{$filter['Qualification']== $quali->id ? 'selected':''}}
                            @endif
                         >{{$quali->title}}</option>
                    @endforeach
                </select>
            </div>
        </div>

        <div class="row">
            <label class="col-sm-2 col-form-label">Caste</label>
            <div class="col-sm-3">
                <select name="cast" class="form-control" >
                    <option value="">--Select--</option>
                    @foreach ($cast as $cas)
                         <option value="{{$cas->id}}"
                            @if(isset($filter['cast']))
                            {{$filter['cast']== $cas->id ? 'selected':''}}
                            @endif
                            >{{$cas->cast_name}}</option>
                    @endforeach
                </select>
            </div>
            <label class="col-sm-2 col-form-label">Gender</label>
            <div class="col-sm-3">
                <select name="gender" id="gender" class="form-control">
                    <option value="">--Select--</option>
                    <option value="Male"
                    @if(isset($filter['gender']))
                        {{$filter['gender']== 'Male' ? 'selected':''}}
                    @endif
                    >Male</option>
                    <option value="Female"
                    @if(isset($filter['gender']))
                        {{$filter['gender']== 'Female' ? 'selected':''}}
                    @endif
                    >Female</option>
                    <option value="Others"
                    @if(isset($filter['gender']))
                        {{$filter['gender']== 'Others' ? 'selected':''}}
                    @endif
                    >Others</option>
                </select>
            </div>
        </div>

        {{-- @if (auth()->user()->user_role == 'role-1')
        <div class="row">
            <label class="col-sm-2 col-form-label">Department</label>
            <div class="col-sm-3">
                <select name="department" class="form-control" >
                    <option value="">--Select--</option>
                </select>
            </div>
            <label class="col-sm-2 col-form-label">Training</label>
            <div class="col-sm-3">
                <select name="taraining" class="form-control" >
                    <option value="">--Select--</option>
                </select>
            </div>
        </div>
        @endif --}}

        <div class="card-footer ml-auto mr-auto">
            <button type="submit" class="btn btn-primary">{{ __('Filter') }}</button>
        </div>
    </div>
</div>
