@extends('layouts.main')

@section('content')
    <div class="content">
        <div class="row">
            <div class="col-sm-4 col-3">
                <h4 class="page-title">Doctors</h4>
            </div>
            <div class="col-sm-8 col-9 text-right m-b-20">
            <a href="{{ route('doctors.create')}}" class="btn btn-primary btn-rounded float-right"><i class="fa fa-plus"></i> Add Doctor</a>
            </div>
        </div>
        <div class="row doctor-grid">
             @foreach ($doctors as $doc)
                <div class="col-md-4 col-sm-4  col-lg-3">
                    <div class="profile-widget">
                        <div class="doctor-img">
                            <a class="avatar" href="profile.html"><img alt="" src="assets/img/doctor-thumb-03.jpg"></a>
                        </div>
                        <div class="dropdown profile-action">
                            <a href="#" class="action-icon dropdown-toggle" data-toggle="dropdown" aria-expanded="false"><i class="fa fa-ellipsis-v"></i></a>
                            <div class="dropdown-menu dropdown-menu-right">
                                <a class="dropdown-item" href="{{ route('doctors.edit', $doc->id) }}"><i class="fa fa-pencil m-r-5"></i> Edit</a>
                                <a class="dropdown-item" href="{{ route('doctors.show', $doc->id) }}"><i class="fa fa-user m-r-5"></i> Profile</a>
                                <a class="dropdown-item" href="{{ route('doctors.destroy', $doc->id) }}"><i class="fa fa-trash-o m-r-5"></i> Delete</a>
                            </div>
                        </div>
                        <h4 class="doctor-name text-ellipsis"><a href="">{{ $doc->name }}</a></h4>
                        <div class="doc-prof">{{ $doc->department }}</div>
                        <div class="user-country">
                            <i class="fa fa-map-marker"></i> Kenya, {{$doc->county }}
                        </div>
                    </div> 
                </div>
             @endforeach   
        </div>
    </div>
@endsection