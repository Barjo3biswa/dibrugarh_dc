@extends('dibrugarh.layout.master')
@section('content')
    <section class="registration-form-section">
        <div class="registration-form">
            <form action="{{route('save_job_request')}}" method="post" enctype="multipart/form-data" autocomplete="off">
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
                            <h1>Job Request</h1>
                            <p>Please fill in this form for Post Job</p>
                        </div>
                        {{-- <div class=""></div> --}}



                        <div class="row">
                            <div class="col-sm-6">
                                <label><b>Job Title</b></label>
                                <input type="text" name="job_title" class="form-control" placeholder="Enter Job Name" required>
                            </div>

                            <div class="col-sm-6">
                                <label><b>Institute/Company Name</b></label>
                                <input type="text" name="company_name" class="form-control" placeholder="Enter Company/Institute Name" required>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-sm-6">
                                <label><b>Institute/Company Type</b></label>
                                <select name="comp_type" id="comp_type" class="form-control" required>
                                    <option value="">--Select--</option>
                                    <option value="Government">Government</option>
                                    <option value="Private">Private</option>
                                </select>
                            </div>
                            <div class="col-sm-6">
                                <label><b>Company Registration Number</b></label>
                                <input type="number" name="company_reg_no" class="form-control" placeholder="Enter Company Reg No" required>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-sm-6">
                            <label><b>Phone Number</b></label>
                                <input type="number" name="phone" class="form-control" placeholder="Enter Phone Number" required>
                            </div>
                            <div class="col-sm-6">
                            <label><b>Email Address</b></label>
                                <input type="text" name="email_address" class="form-control" placeholder="Enter Email Address.." required>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-sm-6">
                            <label><b>No Of Post</b></label>
                                <input type="number" name="no_of_post" class="form-control" placeholder="Enter No Of Post" required>
                            </div>
                            <div class="col-sm-6">
                            <label><b>Eligible Qualification</b></label>
                                {{-- <input type="text" name="qualification" class="form-control" placeholder="Enter Eligible Qualification" required> --}}
                                <select name="qualification" id="qualification" class="form-control">
                                    <option value="">--Select--</option>
                                    @foreach ($qualification as $val)
                                        <option value="{{$val->id}}">{{$val->title}}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-sm-6">
                            <label><b>Job Location</b></label>
                                <input type="text" name="location" class="form-control" placeholder="Enter Job Location" required>
                            </div>
                            <div class="col-sm-6">
                            <label><b>Experience</b></label>
                                <input type="number" name="location" class="form-control" placeholder="Enter Experience" required>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-sm-6">
                            <label><b>Enter Attachment(if any)</b></label>
                                <input type="file" name="attachment" accept=".pdf" class="form-control" required>
                            </div>
                        </div>
                        <br/>
                        <div class="row">
                            <div class="col-sm-8">
                                <label><b>Job Description</b></label>
                                <textarea class="form-control" id="description" placeholder="Enter the Description"
                                    name="description"></textarea>
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
{{-- <script>
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
</script> --}}



{{-- <script src="https://cdn.ckeditor.com/4.19.0/standard/ckeditor.js"></script>
<script>
    CKEDITOR.replace('description', {
        filebrowserUploadUrl: "{{ route('admin.upload', ['_token' => csrf_token()]) }}",
            filebrowserUploadMethod: 'form'
    })
</script>

<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"
    integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous">
</script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"
    integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous">
</script> --}}


@endsection
