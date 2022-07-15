
@extends('dibrugarh.layout.master')
@section('content')
    <!-- Navbar End -->
    <!-- Carousel Start -->
<div class="container-fluid entreprenurs-container" style="margin-top:2rem;padding: 0 4.4rem">
    <div class="entreprenures-div">
        <div class="entreprenurs-upcoming-events">
            <div class="notice-header">
                <div><img src="dibrugarh/icons/icons8-events-58.png" alt=""></div>
                <h6>Upcoming Events(Entreprenurs only)</h6>
            </div>
            <div class="notice-board-content-div">
                <ul>
                    @forelse ($event as $evn)
                        <li> <a href="{{route('entreprenurs_event',['id'=>$evn->id])}}">{{$evn->event_name}}</a></li>
                    @empty
                        <li>Not Found Any Event Yet</li>
                    @endforelse

                </ul>
                <button class="entreprenur-notice-btn" {{-- data-toggle="modal" data-target="#myModal1" --}}><a href="{{route('entreprenurs_event')}}">More</a></button>
                {{-- <div class="modal" id="myModal1">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="modal-header">
                        <h6 class="modal-title">All Upcoming Events for Entreprenuers</h6>
                        <button type="button" class="close" data-dismiss="modal">&times;</button>
                        </div>
                        <div class="modal-body">
                            <ul>
                                <li>Lorem ipsum dolor sit amet.</li>
                                <li>Lorem ipsum dolor sit amet consectetur adipisicing elit. Possimus, quisquam.</li>
                                <li>Lorem ipsum dolor sit amet consectetur adipisicing elit. Molestiae aspernatur laboriosam nisi iste assumenda!</li>
                                <li>Lorem ipsum dolor sit amet consectetur adipisicing.</li>
                                <li>Lorem ipsum dolor sit amet consectetur adipisicing elit.</li>
                                <li>Lorem ipsum dolor sit.</li>
                                <li>Lorem ipsum dolor sit amet.</li>
                                <li>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Illum beatae maxime quod ut vitae placeat laudantium quisquam est non neque.</li>

                            </ul>
                        </div>
                    </div>
                </div> --}}
                </div>
            </div>
        </div>
        <div class="entreprenurs-schemes-available">
            <div class="notice-header">
                <div><img src="dibrugarh/icons/icons8-plan-58.png" alt=""></div>
                <h6>Schemes Available</h6>
            </div>
            <div class="notice-board-content-div">
                <ul>
                    <li>Lorem ipsum dolor sit amet consectetur adipisicing elit.</li>
                    <li>Lorem ipsum dolor sit amet consectetur.</li>
                    <li>Lorem, ipsum dolor sit amet consectetur adipisicing.</li>
                    <!-- <li>Lorem ipsum dolor sit.</li>
                    <li>Lorem ipsum dolor sit amet consectetur adipisicing elit. Natus, esse.</li>
                    <li>Lorem ipsum dolor sit amet consectetur adipisicing elit. Necessitatibus minus sequi corporis!</li> -->
                </ul>
                <button class="entreprenur-notice-btn" data-toggle="modal" data-target="#myModal2"><a href="#">More</a></button>
                <div class="modal" id="myModal2">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="modal-header">
                        <h6 class="modal-title">Schemes Available</h6>
                        <button type="button" class="close" data-dismiss="modal">&times;</button>
                        </div>
                        <div class="modal-body">
                            <ul>
                                <li>Lorem ipsum dolor sit amet.</li>
                                <li>Lorem ipsum dolor sit amet consectetur adipisicing elit. Possimus, quisquam.</li>
                                <li>Lorem ipsum dolor sit amet consectetur adipisicing elit. Molestiae aspernatur laboriosam nisi iste assumenda!</li>
                                <li>Lorem ipsum dolor sit amet consectetur adipisicing.</li>
                                <li>Lorem ipsum dolor sit amet consectetur adipisicing elit.</li>
                                <li>Lorem ipsum dolor sit.</li>
                                <li>Lorem ipsum dolor sit amet.</li>
                                <li>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Illum beatae maxime quod ut vitae placeat laudantium quisquam est non neque.</li>

                            </ul>
                        </div>
                    </div>
                </div>
                </div>
            </div>

        </div>
        <div class="entreprenurs-stories">
            <div class="notice-header">
                <div><img src="dibrugarh/icons/icons8-story-58.png" alt=""></div>
                <h6>Stories from Dibrugarh</h6>
            </div>
            <div class="notice-board-content-div">
                <ul>
                    @forelse ($story as $evn)
                        <li>{{$evn->name}}</li>
                    @empty
                        <li>Not Found Any Story Yet</li>
                    @endforelse
                </ul>
                <button id="show" class="entreprenur-notice-btn" data-toggle="modal" data-target="#myModal3"><a href="#">More</a></button>
                <div class="modal" id="myModal3">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="modal-header">
                        <h6 class="modal-title">Stories from Dibrugarh</h6>
                        <button type="button" class="close" data-dismiss="modal">&times;</button>
                        </div>
                        <div class="modal-body">
                            <ul>
                                <li>Lorem ipsum dolor sit amet.</li>
                                <li>Lorem ipsum dolor sit amet consectetur adipisicing elit. Possimus, quisquam.</li>
                                <li>Lorem ipsum dolor sit amet consectetur adipisicing elit. Molestiae aspernatur laboriosam nisi iste assumenda!</li>
                                <li>Lorem ipsum dolor sit amet consectetur adipisicing.</li>
                                <li>Lorem ipsum dolor sit amet consectetur adipisicing elit.</li>
                                <li>Lorem ipsum dolor sit.</li>
                                <li>Lorem ipsum dolor sit amet.</li>
                                <li>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Illum beatae maxime quod ut vitae placeat laudantium quisquam est non neque.</li>

                            </ul>
                        </div>
                    </div>
                </div>
                </div>
            </div>
        </div>
    </div>
</div>
        <!-- The Modal -->
@endsection

