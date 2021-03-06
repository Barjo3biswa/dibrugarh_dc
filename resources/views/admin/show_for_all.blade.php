@extends('layouts.app', ['activePage' => 'test', 'titlePage' => 'test'])

@section('content')
<div class="content">
  <div class="container-fluid">
    <div class="row">
      <div class="col-md-12">
        <div>
            <a href="{{route($route)}}" class="btn btn-primary">{{$btn_name}}</a>
        </div>
        <div class="card">
          <div class="card-header card-header-primary">
            <h4 class="card-title ">{{$title}}</h4>
            <p class="card-category"> {{$subtitle}}</p>
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
                  @foreach ($thead as $head)
                      <th>{{$head}}</th>
                  @endforeach
                </thead>
                <tbody>
                    @if($route=="admin.add_department")
                        @forelse ($list_item as $key=>$item)
                            <tr>
                                <th>{{++$key}}</th>
                                <th>{{$item->department_name}}</th>
                                <th>{{$item->department_id}}</th>
                                <form action="">
                                    <th><button type="submit" rel="tooltip" title="Edit Deoartment Details" class="btn btn-primary btn-link btn-sm">
                                        <i class="material-icons">edit</i>
                                      </button></th>
                                </form>
                                <form action="{{route('admin.department.delete',['id'=>$item->id])}}" method="post">
                                    @csrf
                                    <th><button type="submit" rel="tooltip" title="Remove" class="btn btn-danger btn-link btn-sm delete">
                                        <i class="material-icons">close</i>
                                      </button></th>
                                </form>
                            </tr>
                        @empty
                        <tr>
                            <th style='text-align:center'>No records found</th>
                        </tr>
                        @endforelse
                    @elseif($route=="admin.add_course")
                        @forelse ($list_item as $key=>$item)
                        <tr>
                            <th>{{++$key}}</th>
                            <th>{{$item->course_name}}</th>
                            <th>{{$item->course_id}}</th>
                            <form action="">
                                <th><button type="submit" rel="tooltip" title="Edit Course Details" class="btn btn-primary btn-link btn-sm">
                                    <i class="material-icons">edit</i>
                                  </button></th>
                            </form>
                            <form action="{{route('admin.course.delete',['id'=>$item->id])}}" method="post">
                                @csrf
                                <th><button type="submit" rel="tooltip" title="Remove" class="btn btn-danger btn-link btn-sm delete">
                                    <i class="material-icons">close</i>
                                  </button></th>
                            </form>
                        </tr>
                        @empty
                        <tr>
                            <th style='text-align:center'>No records found</th>
                        </tr>
                        @endforelse
                    @elseif ($route=="admin.add_scheme")
                        @forelse ($list_item as $key=>$item)
                        <tr>
                            <th>{{++$key}}</th>
                            <th>{{$item->scheme_name}}</th>
                            <th>{{$item->scheme_id}}</th>
                            <form action="">
                                <th><button type="submit" rel="tooltip" title="Edit Scheme Details" class="btn btn-primary btn-link btn-sm">
                                    <i class="material-icons">edit</i>
                                  </button></th>
                            </form>
                            <form action="{{route('admin.scheme.delete',['id'=>$item->id])}}" method="post">
                                @csrf
                                <th><button type="submit" rel="tooltip" title="Remove" class="btn btn-danger btn-link btn-sm delete">
                                    <i class="material-icons">close</i>
                                  </button></th>
                            </form>
                        </tr>
                        @empty
                        <tr>
                            <th style='text-align:center'>No records found</th>
                        </tr>
                        @endforelse
                    @elseif ($route=="admin.add_sector")
                        @forelse ($list_item as $key=>$item)
                        <tr>
                            <th>{{++$key}}</th>
                            <th>{{$item->sector_name}}</th>
                            <th>{{$item->sector_id}}</th>
                            <form action="">
                                <th><button type="submit" rel="tooltip" title="Edit Scheme Details" class="btn btn-primary btn-link btn-sm">
                                    <i class="material-icons">edit</i>
                                  </button></th>
                            </form>
                            <form action="{{route('admin.sector.delete',['id'=>$item->id])}}" method="post">
                                @csrf
                                <th><button type="submit" rel="tooltip" title="Remove" class="btn btn-danger btn-link btn-sm delete">
                                    <i class="material-icons">close</i>
                                  </button></th>
                            </form>
                        </tr>
                        @empty
                        <tr>
                            <th style='text-align:center'>No records found</th>
                        </tr>
                    @endforelse
                    @else
                        @forelse ($list_item as $key=>$item)
                        <tr>
                            <th>{{++$key}}</th>
                            <th>{{$item->training_name}}</th>
                            <th>{{$item->training_id}}</th>
                            <th>{{$item->course_id}}</th>
                            <th>{{$item->scheme_id}}</th>
                            <th>{{$item->department_code}}</th>
                            <th>{{$item->start_date}}</th>
                            <th>{{$item->end_date}}</th>
                            <form action="">
                                <th><button type="submit" rel="tooltip" title="Edit Training Details" class="btn btn-primary btn-link btn-sm">
                                    <i class="material-icons">edit</i>
                                  </button></th>
                            </form>
                            <form action="{{route('admin.training.delete',['id'=>$item->id])}}" method="post">
                                @csrf
                                <th><button type="submit" rel="tooltip" title="Remove" class="btn btn-danger btn-link btn-sm delete">
                                    <i class="material-icons">close</i>
                                  </button></th>
                            </form>


                        </tr>
                        @empty
                        <tr>
                            <th style='text-align:center'>No records found</th>
                        </tr>
                        @endforelse
                    @endif
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
