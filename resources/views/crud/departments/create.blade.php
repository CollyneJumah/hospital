@extends('layouts.main')
@section('content')
    <div class="content">
        <div class="row">
            <div class="col-lg-8 offset-lg-2">
                <span class="pull-right"><a href="{{route('departments.index')}}" title="Back" class="btn btn-info btn-sm"><i class="fa fa-backward"></i></a></span>
                <h4 class="page-title"> 
                    <i class="fa fa-plus-square btn btn-info btn-sm"></i>
                    Department
                </h4>
                <hr>
            </div>
        </div>
        <div class="row">
            @include('pages.error')
            <div class="col-lg-8 offset-lg-2">
                <form method="POST" action="{{route('departments.store')}}" autocomplete="off">
                    @csrf
                    <div class="form-group">
                        <label>Department Name</label>
                    <input class="form-control @error('name') is-invalid @enderror" name="name" type="text" value="{{ old('name')}}">
                        @error('name')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{$message}}</strong>
                            </span>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label>Description</label>
                        <textarea cols="30" rows="4" name="description" class="form-control @error('description') is-invalid @enderror">
                            {{old('description')}}
                        </textarea>
                            @error('description')
                                <span class="invalid-feedback">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                    </div>
                    <div class="m-t-20 text-center">
                        <button class="btn btn-primary submit-btn">Create Department</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection