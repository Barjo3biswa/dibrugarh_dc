@extends('dibrugarh.layout.master')
@section('content')
<section class="ftco-section">
    <div class="container">
      <div class="row justify-content-center pb-4">
        <div class="col-md-12 heading-section text-center ftco-animate">
          <h3 class="mb-4">Trainings</h3>
        </div>
      </div>
      <div class="row">
        @forelse ($trainings as $training )
        <div class="col-md-4 ftco-animate">
          <div class="project-wrap">
              <a href="#" class="img"
              style="background-image:url({{$training->attachments}})"
              >
              @php
                  $start=date('d-m-Y',strtotime($training->start_date));
                  $end  =date('d-m-Y',strtotime($training->end_date));
                  $today=date("d-m-Y");
                  if($start <= $today && $today <= $end){
                    $temp='Ongoing';
                  }
                  if($start > $today){
                    $temp='Upcoming';
                  }
                  if($today > $end){
                    $temp='Closed';
                  }
              @endphp

              <span class="price">{{$temp}}</span>
            </a>
            <div class="text p-4">
              <span class="days">From : {{ date('d-m-Y',strtotime($training->start_date))}} To : {{date('d-m-Y',strtotime($training->end_date))}}</span>
              <h3><a href="#">{{$training->training_name}}</a></h3>
              <p class="location"><span class="fa fa-map-marker"></span>{{$training->place}}</p>
              <p class="contact">{{$training->department->department_name}}</p>
              {{-- <ul>
                <li><span class="flaticon-shower"></span>Contact</li>
                <li><span class="flaticon-king-size"></span>3</li>
                <li><span class="flaticon-mountains"></span>Near Mountain</li>
              </ul> --}}
              <form action="{{route('view_course_details',['id'=>$training->id])}}" method="post">
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
