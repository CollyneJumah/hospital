@extends('layouts.main')
@section('content')
	<div class="content">
        <div class="row">
            <div class="col-sm-7 col-6">
                <h4 class="page-title">Doctor [ {{ $showDoctors->name }}]</h4>
            </div>

            <div class="text-right col-sm-5 col-6 m-b-30">
                <a href="edit-profile.html" class="btn btn-primary btn-rounded"><i class="fa fa-plus"></i> Edit Profile</a>
            </div>
        </div>
        <div class="card-box profile-header">
            <div class="row">
                <div class="col-md-12">
                    <div class="profile-view">
                        <div class="profile-img-wrap">
                            <div class="profile-img">
                            <a href="#"><img class="avatar" src="
                                @if ($showDoctors->profile)
                                {{URL::to('/storage/doctor_images/'.$showDoctors->profile) }}
                                @else
                                {{ URL::to('/storage/doctor_images/user.jpg')}}
                                @endif "                              
                                alt=""></a>
                            </div>
                        </div>

                        <div class="profile-basic">
                            <div class="row">
                                <div class="col-md-5">
                                    <div class="profile-info-left">
                                        <h3 class="mb-0 user-name m-t-0">{{$showDoctors->name }}</h3>
                                        <small class="text-muted">{{$showDoctors->department}}</small>
                                        
                                        <form action="/updateDoctorProfile" method="post" enctype="multipart/form-data">
                                           {{ csrf_field() }}
                                          
                                            <input type="file" name="profile" id="profile">
                                            <div class="staff-msg">
                                                <button type="submit" class="btn btn-primary btn-sm"><i class="fa fa-send-o"></i>Update profile picture</button>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                                <div class="col-md-7">
                                    <ul class="personal-info">
                                        <li>
                                            <span class="title">Phone:</span>
                                            <span class="text"><a href="#">{{$showDoctors->phone}}</a></span>
                                        </li>
                                        <li>
                                            <span class="title">Email:</span>
                                            <span class="text"><a href="#">{{$showDoctors->email}}</a></span>
                                        </li>
                                        <li>
                                            <span class="title">County:</span>
                                            <span class="text">{{$showDoctors->county->name}}</span>
                                        </li>
                                        <li>
                                            <span class="title">Address:</span>
                                            <span class="text">{{$showDoctors->address}}</span>
                                        </li>
                                        <li>
                                            <span class="title">Gender:</span>
                                            <span class="text">{{$showDoctors->gender}}</span>
                                        </li>
                                    </ul>
                                    <hr>
                                    {{-- delete doctor ad all related info --}}
                                     <span class="pull-right">
                                        <form action="{{ route('doctors.destroy', $showDoctors->id) }}" method="POST">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn btn-danger input-group-sm btn-sm"><i class="fa fa-trash-o"></i></button>
                                        </form>
                                    </span>
                                </div>
                            </div>
                        </div>
                    </div>                        
                </div>
            </div>
        </div>
		<div class="profile-tabs">
            <ul class="nav nav-tabs nav-tabs-bottom">
                <li class="nav-item"><a class="nav-link active" href="#about-cont" data-toggle="tab">About</a></li>
                {{-- {{-- <li class="nav-item"><a class="nav-link" href="#bottom-tab2" data-toggle="tab">Profile</a></li> --}}
                <li class="nav-item"><a class="nav-link" href="#bottom-tab3" data-toggle="tab">Appointents</a></li> --}}
            </ul>

			<div class="tab-content">
				<div class="tab-pane show active" id="about-cont">
                <div class="row">
                    <div class="col-md-12">
                        <div class="card-box">
                            <h3 class="card-title">Department</h3>
                            <div class="experience-box">
                                <ul class="experience-list">
                                    <li>
                                        <div class="experience-user">
                                            <div class="before-circle"></div>
                                        </div>
                                        <div class="experience-content">
                                            <div class="timeline-content">
                                                <a href="#/" class="name">
                                                    {{$showDoctors->departments->name}}
                                                </a>
                                                <div>Employed On</div>
                                                <span class="time">{{ $showDoctors->created_at }}</span>
                                            </div>
                                        </div>
                                    </li>
                                </ul>
                            </div>
                        </div>
                        {{-- <div class="mb-0 card-box">
                            <h3 class="card-title">Experience</h3>
                            <div class="experience-box">
                                <ul class="experience-list">
                                    <li>
                                        <div class="experience-user">
                                            <div class="before-circle"></div>
                                        </div>
                                        <div class="experience-content">
                                            <div class="timeline-content">
                                                <a href="#/" class="name">Consultant Gynecologist</a>
                                                <span class="time">Jan 2014 - Present (4 years 8 months)</span>
                                            </div>
                                        </div>
                                    </li>
                                    <li>
                                        <div class="experience-user">
                                            <div class="before-circle"></div>
                                        </div>
                                        <div class="experience-content">
                                            <div class="timeline-content">
                                                <a href="#/" class="name">Consultant Gynecologist</a>
                                                <span class="time">Jan 2009 - Present (6 years 1 month)</span>
                                            </div>
                                        </div>
                                    </li>
                                    <li>
                                        <div class="experience-user">
                                            <div class="before-circle"></div>
                                        </div>
                                        <div class="experience-content">
                                            <div class="timeline-content">
                                                <a href="#/" class="name">Consultant Gynecologist</a>
                                                <span class="time">Jan 2004 - Present (5 years 2 months)</span>
                                            </div>
                                        </div>
                                    </li>
                                </ul>
                            </div>
                        </div> --}}
                    </div>
                </div>
			</div>
        
            <div class="tab-pane" id="bottom-tab3">
                Tab content 3
            </div>
        </div>
    </div>
				
@endsection
