@extends('layouts.app', ['activePage' => 'Add_course', 'titlePage' => __('Add_course')])

@section('content')
    <div class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-12">
                <form method="post" action="{{ route('admin.notification.save') }}" enctype="multipart/form-data" autocomplete="off" class="form-horizontal">
                    @csrf
                <div class="card ">
                    <div class="card-header card-header-primary">
                        <h4 class="card-title">Add Notification</h4>
                        <p class="card-category">Enter Notification Information</p>
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
                            <label class="col-sm-3 col-form-label">Notification Title</label>
                            <div class="col-sm-7">
                                <input type="text" name="notifi_title" class="form-control" placeholder="Enter Scheme Name" value="{{old('notifi_title')}}">
                            </div>
                        </div>

                        <div class="row">
                            <label class="col-sm-3 col-form-label">Notification Type</label>
                            <div class="col-sm-7">
                                {{-- <input type="text" name="notifi_type" class="form-control" placeholder="Enter Scheme Name" value="{{old('notifi_type')}}"> --}}
                                <select name="notifi_type" id="notifi_type" class="form-control">
                                    <option value="">--Select--</option>
                                    @foreach ($type as $typ )
                                        <option value="{{$typ->id}}">{{$typ->type}}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>

                        <div class="row">
                            <label class="col-sm-3 col-form-label">Notification Date</label>
                            <div class="col-sm-7">
                                <input type="text" name="date" id="date" class="form-control" value="{{old('date')}}">
                            </div>
                        </div>

                        <div class="row">
                            <label class="col-sm-3 col-form-label">Attachment (PDF)</label>
                            <div class="col-sm-7">
                                <input type="file" name="attachments" class="form-control" accept=".pdf">
                            </div>
                        </div>

                        <div class="row">
                            <label class="col-sm-3 col-form-label">Description</label>
                            <div class="col-sm-7">
                                <textarea class="form-control" id="description" placeholder="Enter the Description"
                                    name="descrip"></textarea>
                            </div>
                        </div>



                        <div class="row" style="margin-top:5px;">
                            <label class="col-sm-3 col-form-label">Publish  Now </label>
                            <div class="col-sm-3">
                                <label>Yes</label>
                                <input type="radio" id="yes_pub" name="publish_now" value="1" >
                            </div>
                            <div class="col-sm-1">
                                <label>No</label>
                                <input type="radio" id="no_pub" name="publish_now" value="0" checked="checked">
                            </div>
                        </div>

                        <div class="row" style="margin-top:5px;">
                            <label class="col-sm-3 col-form-label">Publish As New  </label>
                            <div class="col-sm-3">
                                <label>Yes</label>
                                <input type="radio" id="yes_new" name="new" value="1" >
                            </div>
                            <div class="col-sm-1">
                                <label>No</label>
                                <input type="radio" id="no_new" name="new" value="0" checked="checked">
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
<script>
    $(document).ready(function() {

        // assuming the controls you want to attach the plugin to
        // have the "datepicker" class set
        $('#date').Zebra_DatePicker();

    });
</script>

@endpush
