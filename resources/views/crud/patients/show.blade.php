@extends('layouts.main')
@section('content')
	<div class="content">
        <div class="row">
            <div class="col-sm-7 col-6">
             <h4 class="page-title">Patient :: {{ $patient->patient_id}}</h4>
            </div>

            <div class="text-right col-sm-5 col-6 m-b-30">
                <a href="{{route('patients.edit',$patient->id)}}" class="btn btn-primary btn-rounded"><i class="fa fa-pencil"></i> Edit Profile</a>
            </div>
        </div>
        <div class="card-box profile-header">
            <div class="row">
                <div class="col-md-12">
                    <div class="profile-view">
                        <div class="profile-img-wrap">
                            <img class="inline-block" src="{{ URL::to('/storage/doctor_images/user.jpg')}}" alt="user">
                            <div class="fileupload btn">
                                <span class="btn-text">edit</span>
                                <input class="upload" type="file">
                            </div>
                        </div>
                        <div class="profile-basic">
                            <div class="row">
                                <div class="col-md-5">
                                    <div class="profile-info-left">
                                        <h3 class="mb-0 user-name m-t-0">{{$patient->name }}</h3>
                                        <div class="staff-id">{{$patient->first_name}} {{$patient->last_name}}</div>
                                    </div>
                                </div>
                                <div class="col-md-7">
                                    <ul class="personal-info">
                                        <li>
                                            <span class="title">Phone:</span>
                                            <span class="text"><a href="#">{{$patient->phone}}</a></span>
                                        </li>
                                        <li>
                                            <span class="title">Email:</span>
                                            <span class="text"><a href="#">{{$patient->email}}</a></span>
                                        </li>
                                        <li>
                                            <span class="title">County:</span>
                                            <span class="text">{{$patient->county}}</span>
                                        </li>
                                        <li>
                                            <span class="title">Address:</span>
                                            <span class="text">{{$patient->address}}</span>
                                        </li>
                                        <li>
                                            <span class="title">Gender:</span>
                                            <span class="text">{{$patient->gender}}</span>
                                        </li>
                                         <li>
                                            <span class="title">Date of Birth:</span>
                                            <span class="text">{{$patient->date_of_birth}}</span>
                                        </li>
                                    </ul>
                                    <hr>
                                    {{-- delete doctor ad all related info --}}
                                     <span class="pull-right">
                                        <a href="{{ route('patients.index')}}" class="shadow btn btn-info input-group-sm btn-sm" title="back to patient list" style="border-radius: 50%"><i class="fa fa-angle-double-left"></i></a>
                                        <a href="#" class="shadow btn btn-danger input-group-sm btn-sm" onclick="confirm('You\'re about to delete {{ $patient->first_name}}. All related information will be deleted.') ? document.getElementById('delete-patient-{{ $patient}}').submit() : '' " title="delete {{ $patient->first_name}}" style="border-radius: 50%"><i class="fa fa-trash-o"></i></a>

                                        <form action="{{ route('patients.destroy',$patient)}}" method="POST" id="delete-patient-{{ $patient }}">
                                        @csrf
                                        @method('DELETE')
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
                <li class="nav-item"><a class="nav-link" href="#bottom-tab2" data-toggle="tab">Profile</a></li>
                <li class="nav-item"><a class="nav-link" href="#bottom-tab3" data-toggle="tab">Messages</a></li>
            </ul>

			<div class="tab-content">
				<div class="tab-pane show active" id="about-cont">
                    Tab 1
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
