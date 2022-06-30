@extends('dibrugarh.layout.master')
@section('content')
    <div class="container1 py-5" style="padding: 0 3rem 0 2rem;">
        <div class="row py-5">
            <div class="col-lg-8 pb-5 pb-lg-0 px-3 px-lg-5">
                <h4>About Dibrugarh</h4>
                    <p>&nbsp;</p>
                    {!!$content->about_dibrugarh!!}
            </div>
            <div class="col-lg-4">
                <img class="img-fluid w-100" src="{{ asset('dibrugarh') }}/img/about-us.jpg" alt="">
            </div>
        </div>
    </div>
@endsection
