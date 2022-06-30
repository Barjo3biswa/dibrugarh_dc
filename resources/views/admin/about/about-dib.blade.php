@extends('layouts.app', ['activePage' => 'Add_course', 'titlePage' => __('Add_course')])

@section('content')
    <div class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-12">
                <form method="post" action="{{route('admin.about_dib_save') }}" enctype="multipart/form-data" autocomplete="off" class="form-horizontal">
                    @csrf

                <div class="card ">
                <div class="card-header card-header-primary">
                    <h4 class="card-title">About Dibrugarh</h4>
                    <p class="card-category">Update About Dibrugarh Details</p>
                </div>
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
                        <label class="col-sm-2 col-form-label">About Dibrugarh </label>
                        <div class="col-sm-10">
                            <textarea id="editor1" name="about">{!!$content->about_dibrugarh!!}</textarea>
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
