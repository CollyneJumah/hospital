@extends('layouts.main')
@section('content')
	<div class="content">
        <div class="row">
            <div class="col-sm-7 col-6">
                <h4 class="page-title"><strong>{{$user->name}} 's </strong>Profile</h4>
            </div>

            <div class="col-sm-5 col-6 text-right m-b-30">
                <a href="edit-profile.html" class="btn btn-primary btn-rounded"><i class="fa fa-plus"></i> Edit Profile</a>
            </div>
        </div>
        <div class="card-box profile-header">
            <div class="row">
                <div class="col-md-12">
                    <div class="profile-view">
                        <div class="profile-img-wrap">
                            <div class="profile-img">
                            <a href="#"><img class="avatar" src="/storage/user_images/{{$user->avatar}}" alt=""></a>
                            </div>
                        </div>

                        <div class="profile-basic">
                            <div class="row">
                                <div class="col-md-5">
                                    <div class="profile-info-left">
                                        <h3 class="user-name m-t-0 mb-0"></h3>
                                        <small class="text-muted"></small>
                                        <div class="staff-id">Update profile Image: </div>
                                        <form action="{{ route('account-profile.update', $user->id )}}" method="post" enctype="multipart/form-data">
                                            @csrf
                                            @method('PATCH')
                                            <input type="file" name="avatar" id="profile" class="form-control">
    
                                            <div class="staff-msg">
                                                <input type="submit" value="update profile" class="btn btn-outline-info btn-sm">
                                            </div>
                                        </form>
                                    </div>
                                </div>
                                <div class="col-md-7">
                                    <ul class="personal-info">
                                        {{-- <li>
                                            <span class="title">Phone:</span>
                                            <span class="text"><a href="#">{{$showDoctors->phone}}</a></span>
                                        </li>
                                        <li>
                                            <span class="title">Email:</span>
                                            <span class="text"><a href="#">{{$showDoctors->email}}</a></span>
                                        </li>
                                        <li>
                                            <span class="title">County:</span>
                                            <span class="text">{{$showDoctors->county}}</span>
                                        </li>
                                        <li>
                                            <span class="title">Address:</span>
                                            <span class="text">{{$showDoctors->address}}</span>
                                        </li>
                                        <li>
                                            <span class="title">Gender:</span>
                                            <span class="text">{{$showDoctors->gender}}</span>
                                        </li> --}}
                                    </ul>
                                    <hr>
                                    {{-- delete doctor ad all related info --}}
                                     
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
                <li class="nav-item"><a class="nav-link" href="#bottom-tab2" data-toggle="tab">Profile</a></li>
                <li class="nav-item"><a class="nav-link" href="#bottom-tab3" data-toggle="tab">Messages</a></li>
            </ul>

			<div class="tab-content">
				<div class="tab-pane show active" id="about-cont">
				</div>
                <div class="tab-pane" id="bottom-tab2">
                    Tab content 2
                </div>
                <div class="tab-pane" id="bottom-tab3">
                    Tab content 3
                </div>
			</div>
		</div>
    </div>
@endsection
