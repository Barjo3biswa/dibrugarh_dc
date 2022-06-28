@extends('layouts.app', ['activePage' => 'Add_course', 'titlePage' => __('Add_course')])

@section('content')
    <div class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-12">
                <form method="post" action="{{ route('admin.employee.save') }}" autocomplete="off" class="form-horizontal" enctype="multipart/form-data">
                    @csrf
                <div class="card ">
                    <div class="card-header card-header-primary">
                        <h4 class="card-title">Add Job</h4>
                        <p class="card-category">Enter Job information</p>
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
                            <label class="col-sm-2 col-form-label">Job Title</label>
                            <div class="col-sm-4">
                                <input type="text" name="job_title" class="form-control" placeholder="Enter Job Name" required>
                            </div>
                            <label class="col-sm-2 col-form-label">Institute/Company Name</label>
                            <div class="col-sm-4">
                                <input type="text" name="company_name" class="form-control" placeholder="Enter Job Name" required>
                            </div>
                        </div>

                        <div class="row">
                            <label class="col-sm-2 col-form-label">No Of Post</label>
                            <div class="col-sm-4">
                                <input type="number" name="no_of_post" class="form-control" placeholder="Enter Job Name" required>
                            </div>
                            <label class="col-sm-2 col-form-label">Eligible Qualification</label>
                            <div class="col-sm-4">
                                <input type="text" name="qualification" class="form-control" placeholder="Enter Job Name" required>
                            </div>
                        </div>

                        <div class="row">
                            <label class="col-sm-2 col-form-label">Job Location</label>
                            <div class="col-sm-4">
                                <input type="text" name="location" class="form-control" placeholder="Enter Job Name" required>
                            </div>
                            <label class="col-sm-2 col-form-label">Experience</label>
                            <div class="col-sm-4">
                                <input type="text" name="location" class="form-control" placeholder="Enter Job Name" required>
                            </div>
                        </div>

                        <div class="row">
                            <label class="col-sm-2 col-form-label">Enter Attachment(if any)</label>
                            <div class="col-sm-4">
                                <input type="file" name="attachment" accept=".pdf" class="form-control" placeholder="Enter Course Code" required>
                            </div>
                        </div>

                        <div class="row">
                            <label class="col-sm-2 col-form-label">Job Description</label>
                            <div class="col-sm-7">
                                {{-- <textarea id="w3review" name="description" rows="4" cols="50" class="form-control" required>
                                </textarea> --}}
                                <textarea id="editor1" name="description" name="training_details"></textarea>
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
<script type="text/javascript">
    CKEDITOR.replace( 'editor1' );
</script>

@endpush
