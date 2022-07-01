@extends('layouts.app', ['activePage' => 'test', 'titlePage' => 'test'])

@section('content')
<div class="content">
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-12">
                @if($add==1)
                <div>
                    <a href="{{ route($route) }}" class="btn btn-primary">{{ $btn_name }}</a>
                </div>
                @endif
                <div class="card">
                    <div class="card-header card-header-primary">
                        <h4 class="card-title ">{{ $title }}</h4>
                        <p class="card-category"> {{ $subtitle }}</p>
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
                                        @if(isset($checkbox))
                                            <th><input id="checkall" name="applicable_for_all" type="checkbox" ></th>
                                        @endif
                                        @foreach ($thead as $head)
                                            <th>{{ $head }}</th>
                                        @endforeach
                                    </tr>

                                </thead>
                                <tbody>
                                    {{-- Indexing Of $tbody
                                        $tbody=[       0 =>'status(for checkbox)',
                                                1 to n-2 =>'table data',
                                                     n-1 =>'database id to edit, delete & view']--}}

                                    @for ($i = 0; $i < count($tbody); $i++)
                                        @php
                                            $length = count($tbody[$i]);
                                        @endphp
                                        <tr>
                                            {{-- this checkbox is not active for all  --}}
                                            @if(isset($checkbox))
                                                @if ($tbody[$i][0]==0)
                                                    <th><input value="{{$tbody[$i][$length - 1]}}" class="checkboxes" name="values[]" id="applicable-for-all" type="checkbox" onclick="PushToArr()"></th>
                                                @else
                                                    <th><input class="checkboxes" id="applicable-for-all" type="checkbox" disabled ></th>
                                                @endif
                                            @endif
                                            {{-- Table content data is in here --}}
                                            @for ($j = 1; $j < $length - 1; $j++)
                                                <th>{{ $tbody[$i][$j] }}</th>
                                            @endfor
                                            {{-- table data ends --}}
                                            @if($edit==1)  {{-- This condition is check whether the user have permission to acces this  --}}
                                            <form
                                                action="{{ route($editroute, ['id' => $tbody[$i][$length - 1]]) }}"
                                                method="post">
                                                @csrf
                                                <th><button type="submit" rel="tooltip" title="Edit Details"
                                                        class="btn btn-primary btn-link btn-sm">
                                                        <i class="material-icons">edit</i>
                                                    </button></th>
                                            </form>
                                            @endif
                                            @if($delete==1)  {{-- This condition is check whether the user have permission to acces this  --}}
                                            <form
                                                action="{{ route($deleteroute, ['id' => $tbody[$i][$length - 1]]) }}"
                                                method="post">
                                                @csrf
                                                <th><button type="submit" rel="tooltip" title="Remove"
                                                        class="btn btn-danger btn-link btn-sm delete">
                                                        <i class="material-icons">close</i>
                                                    </button></th>
                                            </form>
                                            @endif

                                            {{-- this form is not viewable for all pages till now in training blade--}}
                                            @if (isset($viewable))
                                                <form
                                                    action="{{ route('admin.department_user.view_applications', ['id' => $tbody[$i][$length - 1]]) }}"
                                                    method="post">
                                                    @csrf
                                                    <th><button type="submit" rel="tooltip" title="View"
                                                            class="btn btn-primary btn-link btn-sm">
                                                            View Applicants
                                                        </button></th>
                                                </form>
                                            @endif
                                        </tr>
                                    @endfor
                                </tbody>
                            </table>
                        </div>
                        @if(isset($checkbox)){{-- Checkbox is appear for all user but submit button is applicable for those who can edit --}}
                        @if($edit==1)
                            @if($checkbox=='true')  {{-- for training --}}
                                <button class="btn btn-primary" id="submit">Activate &nbsp; Selected</button>
                            @elseif($checkbox=='trueii')  {{-- for notification --}}
                                <button class="btn btn-primary" id="submitii">Activate &nbsp; Selected</button>
                            @elseif($checkbox=='trueiii')  {{-- for jobs --}}
                                <button class="btn btn-primary" id="submitiii">Approve &nbsp; Selected &nbsp; Jobs</button>
                            @endif
                        @endif
                        @endif
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@push('js')
    <script>
        var arr=[];
        $('.delete').click(function() {
            return confirm('Are you sure you want to delete this item?');
        })

        $("#checkall").click(function (){
            if ($("#checkall").is(':checked')){
                arr=[];
                $(".checkboxes").not("[disabled]").each(function (){
                    $(this).prop("checked", true);
                    arr.push($(this).val());
                    });
            }else{
                $(".checkboxes").not("[disabled]").each(function (){
                    $(this).prop("checked", false);
                    arr=[];
                });
            }
        });

        function PushToArr(){
            arr=[];
            $(".checkboxes").not("[disabled]").each(function (){
                if($(this).is(':checked')){
                    arr.push($(this).val());
                }
            });
        }


        $('#submit').click(function(){
            $.ajax({
                url: "{{route('admin.training.active_training')}}",
                type: 'get',
                dataType: 'json',
                data: {value:arr},
                success:function(success){
                    console.log(success);
                    location.reload();
                },
            });
        });

        $('#submitii').click(function(){
            $.ajax({
                url: "{{route('admin.notification.active_notification')}}",
                type: 'get',
                dataType: 'json',
                data: {value:arr},
                success:function(success){
                    console.log(success);
                    location.reload();
                },
            });
        });

        $('#submitiii').click(function(){
            $.ajax({
                url: "{{route('admin.employee.active_job')}}",
                type: 'get',
                dataType: 'json',
                data: {value:arr},
                success:function(success){
                    console.log(success);
                    location.reload();
                },
            });
        });
    </script>
@endpush
