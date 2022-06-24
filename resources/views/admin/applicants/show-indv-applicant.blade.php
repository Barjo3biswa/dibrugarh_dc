@extends('layouts.app', ['activePage' => 'test', 'titlePage' => 'test'])
@push('css')
<style>
    .bold {
        font-weight: bold;
    }
    table td, table th{
        padding: 7px;
        /* border-color: #ddd; */

    }
    table{
        /* border-color: #ddd; */
    }
    *{
        font-family: Verdana, Geneva, Tahoma, sans-serif;
        font-size: 11px;
    }
    .table>tbody>tr>td{border-color: #323232;}
</style>
@endpush
@section('content')
<div class="content">
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-12">
            <div class="card">
                <div class="card-body">
                    @include('both-end.download-show')
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
