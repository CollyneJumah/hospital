@extends('layouts.main')
@section('content')
    <div class="content">
        <div class="row">
            <div class="col-lg-8 offset-lg-2">
                <span class="pull-right"><a href="{{ route('patients.index')}}" class="btn btn-outline-info btn-sm"> <i class="fa fa-step-backward"></i> </a> </span>
                <h4 class="page-title">Edit Patient</h4>
                @include('pages.message')
            </div>
        </div>
        <div class="row">
            <div class="col-lg-8 offset-lg-2">
                <form method="POST" action="{{ route('patients.update', $patient)}}" enctype="multipart/form-data" autocomplete="off">
                    @csrf
                    @method('PATCH')
                    <div class="row">
                        <div class="col-sm-6">
                            <div class="form-group">
                                <label>First Name <span class="text-danger">*</span></label>
                                <input class="form-control @error('first_name') is-invalid @enderror" type="text" name="first_name" value="{{ $patient->first_name ?? old('first_name') }}">
                                @error('first_name')
                                    <span class="invalid-feedback">
                                        <strong>{{$message}}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>
                        <div class="col-sm-6">
                            <div class="form-group">
                                <label>Last Name</label>
                                <input class="form-control @error('last_name') is-invalid @enderror " type="text" name="last_name" value="{{$patient->last_name ?? old('last_name')}}">
                                @error('last_name')
                                    <span class="invalid-feedback">
                                        <strong>{{$message}}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>
                        
                        <div class="col-sm-6">
                            <div class="form-group">
                                <label>Phone <span class="text-danger">*</span></label>
                                <input class="form-control @error('phone') is-invalid @enderror" type="tel" name="phone" value="{{$patient->phone ?? old('phone')}}">
                                @error('phone')
                                    <span class="invalid-feedback">
                                        <strong>{{$message}}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>
                        <div class="col-sm-6">
                            <div class="form-group">
                                <label>Email <span class="text-danger">*</span></label>
                                <input class="form-control @error('email') is-invalid @enderror" type="email" name="email" value="{{$patient->email ?? old('email')}}">
                                @error('email')
                                    <span class="invalid-feedback">
                                        <strong>{{$message}}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>
                        <div class="col-sm-6">
                            <div class="form-group">
                                <label>Date of Birth</label>
                                <input type="date" class="form-control @error('date_of_birth') is-invalid @enderror" name="date_of_birth" value="{{$patient->date_of_birth ?? old('date_of_birth')}}">
                                @error('date_of_birth')
                                    <span class="invalid-feedback">
                                        <strong>{{$message}}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>
                        <div class="col-sm-6">
                            <div class="form-group gender-select">
                                <label class="gen-label">Gender:</label>
                                <select class="form-control @error('gender') is-invalid @enderror select" name="gender">
                                    <option>{{ $patient->gender }}</option>
                                    <option>Male</option>
                                    <option>Female</option>
                                </select>
                                @error('gender')
                                    <span class="invalid-feedback">
                                        <strong>{{$message}}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>
                       
                        <div class="col-sm-6">
                            <div class="form-group">
                                <label>Address</label>
                                <input type="text" class="form-control @error('address') is-invalid @enderror" name="address" value="{{ $patient->address ?? old('address') }}">
                                @error('address')
                                    <span class="invalid-feedback">
                                        <strong>{{$message}}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>
                        <div class="col-sm-6 col-md-6 col-lg-6">
                            <div class="form-group">
                                <label>County</label>
                                <select class="form-control @error('county') is-invalid @enderror select" name="county">
                                    <option>{{ $patient->county }}</option>
                                    <option>United Kingdom</option>
                                </select>
                                @error('county')
                                    <span class="invalid-feedback">
                                        <strong>{{$message}}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>
                        <div class="col-sm-6 col-md-6 col-lg-6">
                            <div class="form-group">
                                <label>Postal Code</label>
                                <input type="text" class="form-control @error('postal_code') is-invalid @enderror" name="postal_code" value="{{ $patient->postal_code ?? old('postal_code')}}">
                                @error('postal_code')
                                    <span class="invalid-feedback">
                                        <strong>{{$message}}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>
                    </div>
                    <div class="text-center m-t-20">
                        <button class="btn btn-primary submit-btn">Save</button>
                    </div>
                </form>
            </div>
        </div>
    </div>

@endsection