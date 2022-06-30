@extends('layouts.app', ['activePage' => 'test', 'titlePage' => 'test'])

@section('content')
<div class="content">
<div class="container-fluid">
    <div class="row">
    <div class="col-md-12">
        <form action="{{ route('admin.department_user.view_applications',['id'=>$id])}}" method="post">
            @csrf
            @include('admin.applicants.admin-filter')
        </form>

        <form action="{{ route('admin.department_user.view_applications',['id'=>$id])}}" method="post">
            @csrf
            <input hidden name="reg_No" value="{{$filter['reg_No'] ?? " "}}">
            <input hidden name="Qualification" value="{{$filter['Qualification'] ?? " "}}">
            <input hidden name="cast" value="{{$filter['cast'] ?? " "}}">
            <input hidden name="gender" value="{{$filter['gender'] ?? " "}}">
            <input hidden name="export" value="yes">
            <input type="submit" class="btn btn-primary" value="Export To excel">
        </form>


        <div class="card">
        <div class="card-header card-header-primary">
            <h4 class="card-title ">Applications</h4>
            <p class="card-category"> All Applications</p>
        </div>
        <div class="card-body">
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
            <div class="table-responsive">
            <table class="table">
                <thead class=" text-primary">
                <tr>
                    <th>#</th>
                    <th>Reg. No</th>
                    <th>Name</th>
                    <th>DOB</th>
                    <th>Qualification</th>
                    <th>Attachments</th>
                    <th>Action</th>
                </tr>
                </thead>
                <tbody>
                    @forelse ($applicants as $key=>$app )
                        <tr>
                            <th>{{++$key}}</th>
                            <th>{{$app->application_id}}</th>
                            <th>{{$app->app_name}}</th>
                            <th>{{$app->app_dob}}</th>
                            <th>{{$app->app_qualification}}</th>

                            {{-- <form action="{{route('admin.department_user.download_attachments',['id'=>Crypt::encryptString($app->application_id)])}}" method="post">
                                @csrf --}}
                                <th><input type="submit" class="btn btn-primary" value="Download"></th>
                            {{-- </form> --}}
                            <form action="{{route('admin.department_user.view_application',['id'=>Crypt::encryptString($app->application_id)])}}" method="post">
                                @csrf
                                <th><input type="submit" class="btn btn-primary" value="View Application"></th>
                            </form>
                            {{-- <th><a href="#">View Application</a></th> --}}
                        </tr>
                    @empty
                        <tr>
                            <th colspan="7" style="text-align:center">No Application Found</th>
                        </tr>
                    @endforelse

                </tbody>
            </table>
            </div>
        </div>
        </div>
    </div>
</div>
</div>
@endsection

@push('js')
  <script>
    $('.delete').click(function(){
        return confirm('Are you sure you want to delete this item?');
    })
  </script>
@endpush

{{-- <div class="card">
    <div class="card-header card-header-primary">
        <h4 class="card-title ">Filter</h4>
        <p class="card-category"> Filter By your Choice</p>
    </div>
    <div class="card-body">
        <div class="table-responsive">
        <table class="table">
            <thead class=" text-primary">
            <tr>
                <th>#</th>
                <th>Reg. No</th>
                <th>Name</th>
                <th>DOB</th>
                <th>Qualification</th>
                <th>Attachments</th>
                <th>Action</th>
            </tr>
            </thead>
        <table>
        </div>
    </div>
</div> --}}



