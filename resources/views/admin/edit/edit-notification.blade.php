@extends('layouts.app', ['activePage' => 'Add_course', 'titlePage' => __('Add_course')])

@section('content')
    <div class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-12">
                <form method="post" action="{{ route('admin.notification.update') }}" enctype="multipart/form-data" autocomplete="off" class="form-horizontal">
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
                                <input type="text" name="notifi_title" class="form-control" placeholder="Enter Scheme Name" value="{{$notifi_dtl->title}}">
                                <input hidden name="test" value="{{$notifi_dtl->id}}">
                            </div>
                        </div>

                        <div class="row">
                            <label class="col-sm-3 col-form-label">Notification Type</label>
                            <div class="col-sm-7">
                                {{-- <input type="text" name="notifi_type" class="form-control" placeholder="Enter Scheme Name" value="{{old('notifi_type')}}"> --}}
                                <select name="notifi_type" id="notifi_type" class="form-control">
                                    <option value="">--Select--</option>
                                    @foreach ($type as $typ )
                                        <option value="{{$typ->id}}" {{$notifi_dtl->type==$typ->id ? 'selected':''}}>{{$typ->type}}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>

                        <div class="row">
                            <label class="col-sm-3 col-form-label">Notification Date</label>
                            <div class="col-sm-7">
                                <input type="text" name="date" id="date" class="form-control" value="{{$notifi_dtl->notice_date}}">
                            </div>
                        </div>

                        <div class="row">
                            <label class="col-sm-3 col-form-label">Change Attachment (PDF)</label>
                            <div class="col-sm-7">
                                <input type="file" name="attachments" class="form-control" accept=".pdf">
                            </div>
                        </div>

                        <div class="row">
                            <label class="col-sm-3 col-form-label">Description</label>
                            <div class="col-sm-7">
                                {{-- <textarea id="w3review" name="descrip" rows="4" cols="50" class="form-control">
                                </textarea> --}}
                                <textarea id="editor1" name="descrip" name="training_details">{!!$notifi_dtl->description!!}</textarea>
                                {{-- <input type="text" name="descrip" class="form-control" placeholder="Enter Scheme Code" value="{{old('descrip')}}"> --}}
                            </div>
                        </div>



                        <div class="row" style="margin-top:5px;">
                            <label class="col-sm-3 col-form-label">Publish  Now </label>
                            <div class="col-sm-3">
                                <label>Yes</label>
                                @if ($notifi_dtl->status==0)
                                    <input type="radio" id="yes_pub" name="publish_now" value="1" >
                                @else
                                    <input type="radio" id="yes_pub" name="publish_now" value="1" checked="checked">
                                @endif

                            </div>
                            <div class="col-sm-1">
                                <label>No</label>
                                @if ($notifi_dtl->status==0)
                                    <input type="radio" id="no_pub" name="publish_now" value="0" checked="checked">
                                @else
                                    <input type="radio" id="no_pub" name="publish_now" value="0" >
                                @endif

                            </div>
                        </div>

                        <div class="row" style="margin-top:5px;">
                            <label class="col-sm-3 col-form-label">Publish As New  </label>
                            <div class="col-sm-3">
                                <label>Yes</label>
                                @if ($notifi_dtl->new_status==0)
                                    <input type="radio" id="yes_new" name="new" value="1" >
                                @else
                                    <input type="radio" id="yes_new" name="new" value="1" checked="checked">
                                @endif

                            </div>
                            <div class="col-sm-1">
                                <label>No</label>
                                @if ($notifi_dtl->new_status==0)
                                    <input type="radio" id="no_new" name="new" value="0" checked="checked">
                                @else
                                    <input type="radio" id="no_new" name="new" value="0" >
                                @endif

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
<script>
    $(document).ready(function() {

        // assuming the controls you want to attach the plugin to
        // have the "datepicker" class set
        $('#date').Zebra_DatePicker();

    });
</script>

@endpush
