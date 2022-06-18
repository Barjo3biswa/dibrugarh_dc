@extends('dibrugarh.layout.master')
@section('content')
<section class="ftco-section course-details-section">
    <div class="container">
      <div class="row justify-content-center">
        <div class="col-md-12 heading-section text-center ftco-animate">
          <h3>Trainings</h3>
        </div>
      </div>
      <div class="course-details-btn">
        {{-- <form action={{route('search_courses')}} method="post">
            @csrf --}}
        <a href="">Ongoing(01)</a>
        {{-- </form> --}}
        <a href="">Upcoming(02)</a>
        <a href="">Past(03)</a>
        <a href="">Archieves(03)</a>
      </div>
      <div class="row">
        @forelse ($trainings as $training )
        <div class="col-md-4 ftco-animate" style="margin-top:10px;">
          <div class="project-wrap">
              <a href="#" class="img"
              style="background-image:url({{$training->attachments}})"
              >
              @php
                  $start=date('Y-m-d',strtotime($training->start_date));
                  $end  =date('Y-m-d',strtotime($training->end_date));
                  $today=date("Y-m-d");
                  if($start <= $today && $today <= $end){
                    $temp='Ongoing';
                  }
                  elseif($start > $today){
                    $temp='Upcoming';
                  }
                  elseif($today > $end && $today > $start){
                    $temp='Closed';
                  }
                  // $diff=date_diff($today,$start);
              @endphp

              <span class="price">{{$temp}}</span>
            </a>
            <div class="text p-4">
              <span class="days">{{date('d-m-Y',strtotime($start))}} To : {{date('d-m-Y',strtotime($end))}} </span>
              <h3><a href="#">{{$training->training_name}}</a></h3>
              <p class="location"><span class="fa fa-map-marker"></span>{{$training->place}}</p>
              <p class="contact">{{$training->department->department_name}}</p>
              {{-- <ul>
                <li><span class="flaticon-shower"></span>Contact</li>
                <li><span class="flaticon-king-size"></span>3</li>
                <li><span class="flaticon-mountains"></span>Near Mountain</li>
              </ul> --}}
                <form action="{{route('view_course_details',['id'=>Crypt::encryptString($training->id)])}}" method="post">
                @csrf
                  <input type="submit" class="btn btn-primary" value="Apply & Details">
                </form>
              {{-- <a href="{{route('particular_course_dtl',['id'=>])}}" class="book-now-btn">Apply & Details</a> --}}
            </div>

          </div>
        </div>
        @empty
           Not found
        @endforelse
      </div>
    </div>
</section>
@endsection
