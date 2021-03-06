@extends('layouts.main')
@section('content')

    <div class="content">
        <div class="row">
            <div class="col-lg-8 offset-lg-2">
                <h4 class="page-title">Add Doctor</h4>
            </div>
        </div>
        <div class="row">
            <div class="col-lg-8 offset-lg-2">
                <form action="{{ route('doctors.store') }}" method="POST" autocomplete="off" enctype="multipart/form-data">
                    @csrf
                    <div class="row">
                        <div class="col-sm-12">
                            <div class="form-group">
                                <label>Full Name <span class="text-danger">*</span></label>
                                <input class="form-control @error('name') is-invalid @enderror" value="{{ old('name')}}" name="name" id="name" type="text">
                                @error('name')
                                    <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>
                        {{-- <div class="col-sm-6">
                            <div class="form-group">
                                <label>Doctor Id <span class="text-danger">*</span></label>
                            <input class="form-control @error('doctor_id') is-invalid @enderror" name="doctor_id" type="text" id="doctor_id" value="{{ old('doctor_id')}}"> 
                            @error('doctor_id')
                                <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                            </div>
                        </div> --}}
                        <div class="col-sm-4">
                            <div class="form-group">
                                <label>Email <span class="text-danger">*</span></label>
                            <input class="form-control @error('email') is-invalid @enderror" name="email" type="email" value="{{ old('email')}}">
                            @error('email')
                                <span class="invalid-feedback">
                                <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                            </div>
                        </div>
                         <div class="col-sm-4">
                            <div class="form-group">
                                <label>Phone <span class="text-danger">*</span> </label>
                                <input class="form-control @error('phone') is-invalid @enderror" name="phone" value="{{ old('phone')}}" type="tel">
                                @error('phone')
                                    <span class="invalid-feedback">
                                    <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>
                         <div class="col-sm-4">
                            <div class="form-group">
                                <label>Gender<span class="text-danger">*</span></label>
                                <select class="form-control @error('gender') is-invalid @enderror" name="gender">
                                    <option value="">--select--gender--</option>
                                    <option>Male</option>
                                    <option>Female</option>
                                </select>
                                @error('gender')
                                    <span class="invalid-feedback">
                                    <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>
                        <div class="col-sm-12"><hr>
                            <div class="row">
                                <div class="col-sm-4">
                                    <div class="form-group">
                                        <label>County<span class="text-danger">*</span></label>
                                        <select class="form-control @error('county_id') is-invalid @enderror" name="county_id">
                                            <option value="">--select--county--</option>
                                            @foreach ($county as $count)
                                            <option value="{{ $count->id }}">{{ $count->name }}</option>
                                            @endforeach
                                        </select>
                                        @error('county_id')
                                            <span class="invalid-feedback">
                                            <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                </div>
                                <div class="col-sm-4">
                                    <div class="form-group">
                                        <label>Address<span class="text-danger">*</span></label>
                                        <input type="text" name="address" class="form-control @error('address') is-invalid @enderror" value="{{ old('address')}}">
                                        @error('address')
                                            <span class="invalid-feedback">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                </div>
                                <div class="col-sm-4 col-md-4 col-lg-4">
                                    <div class="form-group">
                                        <label>Postal Code</label>
                                        <input type="text" name="postalcode" class="form-control @error('postalcode') is-invalid @enderror" value="{{ old('postalcode')}}">
                                        @error('postalcode')
                                            <span class="invalid-feedback">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-sm-6">
                            <div class="form-group">
                                <label>Avatar/Profile picture (optional)</label>
                                <div class="profile-upload">
                                    <div class="upload-img">
                                        <img alt="" src="{{ URL::to('assets/img/user.jpg')}}">
                                    </div>
                                    <div class="upload-input">
                                        <input type="file" name="profile" class="@error('profile') is-invalid @enderror">
                                        @error('profile')
                                            <span class="invalid-feedback">
                                                <strong>{{ $message }}</strong>
                                            </span>
                        
                                        @enderror
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-sm-6">
                            <div class="form-group">
                                <label>Department<span class="text-danger">*</span><span class="pl-5"><a href="{{route('departments.create')}}" title="add new Department"><i class="fa fa-plus-circle"></i></a></span></label>
                                <select class="form-control @error('department_id') is-invalid @enderror" name="department_id">
                                    <option value="">--select--department:--</option>
                                    {{-- desplay all department from department table  but save its id--}}
                                    @foreach ($depart as $departments)
                                        <option value="{{ $departments->id }}">{{ $departments->name }}</option>
                                    @endforeach
                                </select>
                                @error('department_id')
                                    <span class="invalid-feedback">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>
                    </div>
                    <div class="text-center m-t-20">
                        <button type="submit" class="btn btn-primary submit-btn">Create Doctor</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection