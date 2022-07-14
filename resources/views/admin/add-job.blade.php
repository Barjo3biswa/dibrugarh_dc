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
                                <input type="text" name="company_name" class="form-control" placeholder="Enter Company/Institute Name" required>
                            </div>
                        </div>

                        <div class="row">
                            <label class="col-sm-2 col-form-label">No Of Post</label>
                            <div class="col-sm-4">
                                <input type="number" name="no_of_post" class="form-control" placeholder="Enter No Of Post" required>
                            </div>
                            <label class="col-sm-2 col-form-label">Eligible Qualification</label>
                            <div class="col-sm-4">
                                <input type="text" name="qualification" class="form-control" placeholder="Enter Eligible Qualification" required>
                            </div>
                        </div>

                        <div class="row">
                            <label class="col-sm-2 col-form-label">Job Location</label>
                            <div class="col-sm-4">
                                <input type="text" name="location" class="form-control" placeholder="Enter Job Location" required>
                            </div>
                            <label class="col-sm-2 col-form-label">Experience</label>
                            <div class="col-sm-4">
                                <input type="text" name="location" class="form-control" placeholder="Enter Experience" required>
                            </div>
                        </div>

                        <div class="row">
                            <label class="col-sm-2 col-form-label">Enter Attachment(if any)</label>
                            <div class="col-sm-4">
                                <input type="file" name="attachment" accept=".pdf" class="form-control" required>
                            </div>
                        </div>

                        <div class="row">
                            <label class="col-sm-2 col-form-label">Job Description</label>
                            <div class="col-sm-10">
                                <textarea class="form-control" id="description" placeholder="Enter the Description"
                                    name="description"></textarea>
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
</script>

@endpush
