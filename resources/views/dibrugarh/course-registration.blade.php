@extends('dibrugarh.layout.master')
@section('content')
    <section class="registration-form-section">
        <div class="registration-form">
            <form action="{{route('training_register')}}" method="post" enctype="multipart/form-data" autocomplete="off">
                @csrf
                <div class="container">
                    <div class="form-div">
                        @if (session('error'))
                        <div class="row">
                            <div class="col-sm-12">
                            <div class="alert alert-danger">
                                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                <i class="material-icons">close</i>
                                </button>
                                <span>{{ session('error') }}</span>
                            </div>
                            </div>
                        </div>
                        @endif
                        <div class="form-heading">
                            <h1>Registration</h1>
                            <p>Please fill in this form for Course Regitration</p>
                        </div>
                        {{-- <div class=""></div> --}}
                        <div class="row">
                            <div class="form-group col-md-12">
                                <label for="name"><b>Training Name</b></label>
                                <input value="{{$coursedtl->training_name}}" readonly class="form-control" placeholder="Enter Your Name"  id="name" required >
                                <input value="{{$coursedtl->training_id}}" hidden name="Training_id" required >
                            </div>
                        </div>


                        <div class="row">
                            <div class="form-group col-md-12">
                                <label for="name"><b>Applicant's Name</b></label>
                                <input value="{{old('Training_id') ?? ""}}" type="text" class="form-control" placeholder="Enter Your Name" name="name" id="name" required>
                            </div>
                        </div>

                        <div class="row">
                            <div class="form-group col-md-6">
                                <label for="name"><b>Applicant's Father Name</b></label>
                                <input value="{{old('father_name') ?? ""}}" type="text" class="form-control" placeholder="Enter Your Father Name" name="father_name" id="name" required>
                            </div>
                            <div class="form-group col-md-6">
                                <label for="name"><b>Applicant's Mother Name</b></label>
                                <input value="{{old('mother_name') ?? ""}}" type="text" class="form-control" placeholder="Enter Your Mother Name" name="mother_name" id="name" required>
                            </div>
                        </div>


                        <div class="row">
                            <div class="form-group col-md-6">
                                <label for="email"><b>Email</b></label>
                                <input value="{{old('email') ?? ""}}" type="text" class="form-control" placeholder="Enter Email" name="email" id="email">
                            </div>
                            <div class="form-group col-md-6">
                                <label for="mobile"><b>Mobile No</b></label>
                                <input value="{{old('mobile') ?? ""}}" type="text" class="form-control" placeholder="Enter Mobile No." name="mobile" id="mobile">
                            </div>
                        </div>


                        <div class="row">
                            <div class="form-group col-md-6">
                                <label for="dob"><b>Date Of Birth</b></label>
                                <input value="{{old('dob') ?? ""}}" type="date" name="dob" id="dob" class="form-control">
                            </div>
                            <div class="form-group col-md-6">
                                <label for="gendwe"><b>Gender</b></label>
                                <select name="gender" id="gender" class="form-control">
                                    <option value="Male {{old('gender')=='Male' ?? "selected"}}">Male</option>
                                    <option value="Female {{old('gender')=='Female' ?? "selected"}}">Female</option>
                                    <option value="Others {{old('gender')=='Others' ?? "selected"}}">Others</option>
                                </select>
                            </div>
                        </div>

                        <br/>
                        <div class="row">
                            <div class="form-group col-md-6">
                                <label for="email"><b>Highest Educational Qualification</b></label>
                                <select name="qualification" id="qualification" class="form-control">
                                    @foreach ($qualification as $quali )
                                        <option value="{{$quali->id}}" {{old('qualification')==$quali->id ? 'selected':""}}>{{$quali->title}}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="form-group col-md-6">
                                <label for="email"><b>Category</b></label>
                                <select name="category" id="category" class="form-control">
                                    @foreach ($cast as $cas )
                                        <option value="{{$cas->id}}" {{old('category')==$cas->id ? 'selected':""}}>{{$cas->cast_name}}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                        <br/>


                        <hr><label for="present"><b>Present Address :</b></label>
                        <div class="row">
                            <div class="form-group col-md-6">
                                <label for="email"><b>Village/Town</b></label>
                                <input value="{{old('p_village') ?? ""}}" type="text" class="form-control" placeholder="Enter Your Village/Town" name="p_village" id="p_village">
                            </div>
                            <div class="form-group col-md-6">
                                <label for="mobile"><b>District</b></label>
                                <input value="{{old('p_district') ?? ""}}" type="text" class="form-control" placeholder="Enter Your District" name="p_district" id="p_district">
                            </div>
                        </div>
                        <div class="row">
                            <div class="form-group col-md-6">
                                <label for="email"><b>State</b></label>
                                <input value="{{old('p_state') ?? ""}}" type="text" class="form-control" placeholder="Enter Your State" name="p_state" id="p_state">
                            </div>
                            <div class="form-group col-md-6">
                                <label for="mobile"><b>Zip Code</b></label>
                                <input value="{{old('p_zip') ?? ""}}" type="text" class="form-control" placeholder="Enter Your Zip Code" name="p_zip" id="p_zip">
                            </div>
                        </div>
                        <div class="row">
                            <div class="form-group col-md-6">
                                <label for="email"><b>Post Office</b></label>
                                <input value="{{old('p_po') ?? ""}}" type="text" class="form-control" placeholder="Enter Your Post Office" name="p_po" id="p_po">
                            </div>
                            <div class="form-group col-md-6">
                                <label for="mobile"><b>Police Station</b></label>
                                <input value="{{old('p_ps') ?? ""}}" type="text" class="form-control" placeholder="Enter Your Police Sattion" name="p_ps" id="p_ps">
                            </div>
                        </div>



                        <hr><label for="present"><b>Permanent Address</b></label>(
                        <input type="checkbox" id="same_as_present">
                        <label for="email">Same as Present</label>)
                        <div class="row">
                            <div class="form-group col-md-6">
                                <label for="email"><b>Village/Town</b></label>
                                <input value="{{old('per_village') ?? ""}}" type="text" class="form-control" placeholder="Enter Your Village/Town." name="per_village" id="per_village">
                            </div>
                            <div class="form-group col-md-6">
                                <label for="mobile"><b>District</b></label>
                                <input value="{{old('per_district') ?? ""}}" type="text" class="form-control" placeholder="Enter Your District." name="per_district" id="per_district">
                            </div>
                        </div>
                        <div class="row">
                            <div class="form-group col-md-6">
                                <label for="email"><b>State</b></label>
                                <input value="{{old('per_state') ?? ""}}" type="text" class="form-control" placeholder="Enter Your State" name="per_state" id="per_state">
                            </div>
                            <div class="form-group col-md-6">
                                <label for="mobile"><b>Zip Code</b></label>
                                <input value="{{old('per_zip') ?? ""}}" type="text" class="form-control" placeholder="Enter Your Zip Code" name="per_zip" id="per_zip">
                            </div>
                        </div>
                        <div class="row">
                            <div class="form-group col-md-6">
                                <label for="email"><b>Post Office</b></label>
                                <input value="{{old('per_po') ?? ""}}" type="text" class="form-control" placeholder="Enter Your Post Office" name="per_po" id="per_po">
                            </div>
                            <div class="form-group col-md-6">
                                <label for="mobile"><b>Police Station</b></label>
                                <input value="{{old('per_ps') ?? ""}}" type="text" class="form-control" placeholder="Enter Your Police Station" name="per_ps" id="per_ps">
                            </div>
                        </div>


                       <br/>

                        <div class="row">
                            <div class="form-group col-md-6">
                                <label for="voter_card"><b>Upload Your Voter Card</b></label>
                                <input value="{{old('voter_card') ?? ""}}" type="file" accept=".pdf" class="form-control" name="voter_card">
                            </div>
                            <div class="form-group col-md-6">
                                <label for="mobile"><b>Upload Your Aadhar Card</b></label>
                                <input value="{{old('aadhar_card') ?? ""}}" type="file" accept=".pdf" class="form-control" name="aadhar_card">
                            </div>
                        </div>

                        <div class="row">
                            <div class="form-group col-md-6">
                                <label for="email"><b>Upload Your Pan Card</b></label>
                                <input value="{{old('pan_card') ?? ""}}" type="file" accept=".pdf" class="form-control" name="pan_card">
                            </div>
                            <div class="form-group col-md-6">
                                <label for="mobile"><b>Upload Your Pan Card</b></label>
                                <input value="{{old('resume') ?? ""}}" type="file" accept=".pdf" class="form-control" name="resume">
                            </div>
                        </div>

                        <!-- <p>By creating an account you agree to our <a href="#">Terms & Privacy</a>.</p> -->
                        <div class="submit-btn">
                            <input type="submit" class="registerbtn" value="Register">
                        </div>
                    </div>
                </div>
            </form>
        </div>
    </section>
@endsection
@section('scripts')
<script>
    $('#same_as_present').click(function(){

        var p_village =$('#p_village').val();
        var p_district=$('#p_district').val();
        var p_state   =$('#p_state').val();
        var p_zip     =$('#p_zip').val();
        var p_po      =$('#p_po').val();
        var p_ps      =$('#p_ps').val();
        // alert(p_ps);
        $('#per_village').val(p_village);
        $('#per_district').val(p_district);
        $('#per_state').val(p_state);
        $('#per_zip').val(p_zip);
        $('#per_po').val(p_po);
        $('#per_ps').val(p_ps);
    })
</script>

@endsection
